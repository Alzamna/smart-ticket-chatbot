<?php

namespace App\Controllers;

use App\Libraries\AIService;

class Chatbot extends BaseController
{
    protected $ai;

    public function __construct()
    {
        $this->ai = new AIService();
    }

    /**
     * 🏠 Halaman utama chatbot
     */
    public function index()
    {
        return view('chatbot');
    }

    /**
     * 💬 Endpoint AJAX untuk mengirim pesan ke AI
     */
    public function sendMessage()
    {
        // Ambil input user
        $message = $this->request->getPost('message');
        if (!$message) {
            return $this->response->setJSON(['reply' => 'Pesan tidak boleh kosong.']);
        }

        // Ambil sesi sebelumnya (riwayat percakapan)
        $session = session()->get('chat_session') ?? [];

        // Panggil layanan AI
        $reply = $this->ai->handleMessage($message, $session);

        // Simpan sesi chat (untuk konteks selanjutnya)
        $session[] = [
            'user' => $message,
            'bot'  => $reply
        ];
        session()->set('chat_session', $session);

        // Kirim balik ke frontend dalam bentuk JSON
        return $this->response->setJSON([
            'reply'   => $reply,
            'session' => $session
        ]);
    }

    /**
     * 🧹 Hapus riwayat chat (opsional)
     */
    public function reset()
    {
        session()->remove('chat_session');
        return $this->response->setJSON(['message' => 'Sesi chat dihapus.']);
    }
}
