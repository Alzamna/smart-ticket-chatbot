<?php

namespace App\Libraries;

use App\Models\TicketModel;
use App\Models\UserModel;
use App\Models\DocumentModel;

class AIService
{
    protected $ticketModel;
    protected $userModel;
    protected $documentModel;
    protected $apiKey = 'AIzaSyAG6pj5bs-tPRVekdPulF8SCUsnNx4MOoo';

    public function __construct()
    {
        $this->ticketModel = new TicketModel();
        $this->userModel = new UserModel();
        $this->documentModel = new DocumentModel();
        $this->apiKey = getenv('GEMINI_API_KEY');
    }

    // 🔹 Daftar kata kunci agar chatbot tetap fokus pada konteks tiket
    protected $relevantKeywords = [
        'tiket', 'layanan', 'dokumen', 'pembelian', 'formulir', 'data diri',
        'verifikasi', 'persyaratan', 'proses', 'unggah', 'upload'
    ];

    // 🔹 Jawaban default ketika AI tidak yakin
    protected $defaultResponse = "Maaf, saya hanya bisa bantu terkait tiket dan dokumen layanan.";


    public function generateContent($prompt)
    {
        $url = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent';

        // data JSON seperti di contoh curl kamu
        $data = [
            'contents' => [[
                'parts' => [['text' => $prompt]]
            ]]
        ];

        // pakai cURL bawaan PHP
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'X-goog-api-key: ' . $this->apiKey
            ],
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($data),
        ]);

        $response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        if ($error) {
            log_message('error', 'CURL Error: ' . $error);
            return "Terjadi kesalahan koneksi ke AI.";
        }

        $result = json_decode($response, true);

        // cek apakah ada jawaban dari model
        if (isset($result['candidates'][0]['content']['parts'][0]['text'])) {
            return $result['candidates'][0]['content']['parts'][0]['text'];
        }

        // jika ada error dari API
        if (isset($result['error']['message'])) {
            log_message('error', 'Gemini API Error: ' . $result['error']['message']);
            return "Terjadi kesalahan: " . $result['error']['message'];
        }

        return "Maaf, tidak ada respons dari Gemini.";
    }

    public function handleMessage($message, $session)
    {
        $message = trim(strtolower($message));

        // Respons cepat
        if (strpos($message, 'halo') !== false) {
            return "Halo! Saya asisten layanan tiket. Saya bisa bantu pembelian tiket dan verifikasi dokumen.";
        }
        if (strpos($message, 'langkah') !== false) {
            return "Langkah pertama adalah mengisi formulir dan mengunggah dokumen KTP. Setelah itu, sistem akan memverifikasi datanya.";
        }
        if (strpos($message, 'dokumen') !== false) {
            return "Dokumen yang dibutuhkan antara lain KTP, bukti pembayaran, dan formulir pendaftaran.";
        }

        // Jika tidak cocok, panggil Gemini API
        $prompt = "Kamu adalah chatbot asisten tiket layanan pemerintah. Fokus hanya pada tiket, dokumen, atau verifikasi.\nUser: $message";
        $reply = $this->callGeminiAPI($prompt);

        return $reply ?: $this->defaultResponse;
    }


     protected function callGeminiAPI($prompt)
    {
        $url = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent';

        $data = [
            'contents' => [[
                'parts' => [['text' => $prompt]]
            ]]
        ];

        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'X-goog-api-key: ' . $this->apiKey
            ],
            CURLOPT_POSTFIELDS => json_encode($data),
        ]);

        $response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        if ($error) {
            log_message('error', 'CURL Error: ' . $error);
            return null;
        }

        $result = json_decode($response, true);

        return $result['candidates'][0]['content']['parts'][0]['text']
            ?? $this->defaultResponse;
    }

    public function validateDocument($filename, $type)
    {
        // Analisis nama file dan jenis dokumen
        $prompt = "
        Saya adalah sistem validasi dokumen pelayanan publik.
        Saya ingin kamu periksa apakah dokumen ini valid.

        Nama file: $filename
        Tipe dokumen: $type

        Tugasmu:
        1. Deteksi apakah nama dan format file ini sesuai dengan standar dokumen umum (KTP, KK, NPWP, Surat Keterangan Usaha, dsb).
        2. Jika salah, berikan penjelasan singkat dan saran nama yang benar.
        3. Jawab ringkas dan dalam konteks formal (maks 3 kalimat).
        ";

        $response = $this->callGeminiAPI($prompt);
        return $response ?: "Tidak dapat memvalidasi dokumen saat ini.";
    }

    public function validateLastDocument($userId)
    {
        // Ambil dokumen terakhir user
        $doc = $this->documentModel
            ->join('tickets', 'tickets.id_ticket = documents.id_ticket', 'left')
            ->where('tickets.id_user', $userId)
            ->orderBy('documents.id_doc', 'DESC')
            ->first();

        if (!$doc) {
            return "Kamu belum pernah upload dokumen apa pun. Silakan upload dulu.";
        }

        // Panggil validasi AI
        $response = $this->validateDocument($doc['nama_dokumen'], $doc['tipe_dokumen']);

        // Update hasil ke DB
        $this->documentModel->update($doc['id_doc'], [
            'status_validasi' => 'Divalidasi AI (via Chatbot)',
            'keterangan' => $response
        ]);

        return "Hasil pemeriksaan dokumen terakhir kamu (*" . $doc['nama_dokumen'] . "*):\n\n" . $response;
    }

    private function isIrrelevant($message)
    {
        $relevantKeywords = [
            'tiket', 'layanan', 'dokumen', 'upload', 'validasi',
            'status', 'beli', 'buat', 'ktp', 'kartu', 'formulir', 
            'langkah', 'syarat', 'proses', 'cara', 'apa'
        ];

        foreach ($relevantKeywords as $word) {
            if (strpos($message, $word) !== false) {
                return false; // relevan
            }
        }

        return true; // tidak relevan
    }


    


}
