<?php

namespace App\Controllers;
use App\Models\DocumentModel;
use App\Libraries\AIService;

class Documents extends BaseController
{
    protected $documentModel;
    protected $ai;

    public function __construct()
    {
        $this->documentModel = new DocumentModel();
        $this->ai = new AIService();
    }

    public function upload($ticketId)
    {
        $file = $this->request->getFile('file');
        $tipe = $this->request->getPost('tipe_dokumen');

        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $path = 'uploads/' . $newName;
            $file->move('uploads', $newName);

            // Validasi dokumen dengan AI
            $validationResult = $this->ai->validateDocument($file->getClientName(), $tipe);

            // Simpan hasil validasi ke database
            $this->documentModel->insert([
                'id_ticket' => $ticketId,
                'nama_dokumen' => $file->getClientName(),
                'tipe_dokumen' => $tipe,
                'path_file' => $path,
                'status_validasi' => 'Divalidasi AI',
                'keterangan' => $validationResult
            ]);

            return redirect()->back()->with('success', 'Dokumen berhasil diupload dan divalidasi!')->with('ai_message', $validationResult);
        }

        return redirect()->back()->with('error', 'Upload gagal.');
    }
}
