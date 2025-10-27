<?php

namespace App\Controllers;
use App\Models\TicketModel;
use App\Models\UserModel;

class Tiketing extends BaseController
{
    protected $ticketModel;
    protected $userModel;

    public function __construct()
    {
        $this->ticketModel = new TicketModel();
        $this->userModel = new UserModel();
    }

    // Halaman daftar tiket
    public function index()
    {
        $data['tickets'] = $this->ticketModel
            ->select('tickets.*, users.nama')
            ->join('users', 'users.id_user = tickets.id_user', 'left')
            ->orderBy('tickets.tanggal_pengajuan', 'DESC')
            ->findAll();

        return view('tiket_list', $data);
    }

    // Form tambah tiket
    public function create()
    {
        return view('form_tiket');
    }

    // Simpan tiket baru
    public function store()
    {
        $userId = $this->request->getPost('id_user');
        $jenis = $this->request->getPost('jenis_layanan');

        $nomorTiket = 'TIK-' . strtoupper(uniqid());

        $this->ticketModel->insert([
            'id_user' => $userId,
            'jenis_layanan' => $jenis,
            'nomor_tiket' => $nomorTiket,
            'status' => 'Menunggu'
        ]);

        return redirect()->to('/tiketing')->with('success', 'Tiket berhasil dibuat!');
    }

    // Detail tiket
    public function show($id)
    {
        $data['ticket'] = $this->ticketModel
            ->select('tickets.*, users.nama')
            ->join('users', 'users.id_user = tickets.id_user', 'left')
            ->where('tickets.id_ticket', $id)
            ->first();

        return view('tiket_detail', $data);
    }

    // Ubah status tiket (untuk admin)
    public function updateStatus($id)
    {
        $status = $this->request->getPost('status');
        $catatan = $this->request->getPost('catatan');

        $this->ticketModel->update($id, [
            'status' => $status,
            'catatan' => $catatan
        ]);

        return redirect()->back()->with('success', 'Status tiket diperbarui.');
    }
}
