<?php namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\TicketModel;
use App\Models\ComplaintModel;
use App\Models\UserModel;

class Admin extends BaseController
{
    protected $session;
    protected $ticketModel;
    protected $complaintModel;
    protected $userModel;
    protected $adminModel;

    public function __construct()
    {
        $this->session = session();
        $this->ticketModel = new TicketModel();
        $this->complaintModel = new ComplaintModel();
        $this->userModel = new UserModel();
        $this->adminModel = new AdminModel();
    }

    //Dashboard
    public function dashboard()
    {
        $data = [
            'title' => 'Dashboard Admin',
            'total_tickets' => $this->ticketModel->countAllResults(),
            'waiting' => $this->ticketModel->where('status', 'Menunggu')->countAllResults(),
            'verified' => $this->ticketModel->where('status', 'Verifikasi')->countAllResults(),
            'finished' => $this->ticketModel->where('status', 'Selesai')->countAllResults(),
            'total_users' => $this->userModel->countAllResults()
        ];

        return view('admin/dashboard', $data);
    }

    // Ticket Management
    public function tickets()
    {
        $data = [
            'title' => 'Data Tiket',
            'tickets' => $this->ticketModel
                ->select('tickets.*, users.nama')
                ->join('users', 'users.id_user = tickets.id_user', 'left')
                ->orderBy('tickets.tanggal_pengajuan', 'DESC')
                ->findAll()
        ];
        return view('admin/tickets/index', $data);
    }

    public function add_ticket()
    {
        $data = [
            'title' => 'Tambah Tiket Baru',
            'users' => $this->userModel->findAll()
        ];
        return view('admin/tickets/tambah', $data);
    }

    public function save_ticket()
    {
        $ticketNo = $this->ticketModel->generateTicketNo();
        $data = [
            'id_user' => $this->request->getPost('id_user'),
            'jenis_layanan' => $this->request->getPost('jenis_layanan'),
            'nomor_tiket' => $ticketNo,
            'status' => 'Menunggu',
            'catatan' => $this->request->getPost('catatan')
        ];
        $this->ticketModel->insert($data);
        return redirect()->to('/admin/tickets')->with('success', 'Tiket berhasil ditambahkan!');
    }

    public function edit_ticket($id)
    {
        $data = [
            'title' => 'Edit Tiket',
            'ticket' => $this->ticketModel->find($id),
            'users' => $this->userModel->findAll()
        ];
        return view('admin/tickets/edit', $data);
    }

    public function update_ticket($id)
    {
        $data = [
            'id_user' => $this->request->getPost('id_user'),
            'jenis_layanan' => $this->request->getPost('jenis_layanan'),
            'status' => $this->request->getPost('status'),
            'catatan' => $this->request->getPost('catatan')
        ];
        $this->ticketModel->update($id, $data);
        return redirect()->to('/admin/tickets')->with('success', 'Tiket berhasil diperbarui!');
    }

    public function delete_ticket($id)
    {
        $this->ticketModel->delete($id);
        return redirect()->to('/admin/tickets')->with('success', 'Tiket berhasil dihapus!');
    }


    //Complaint Management
    public function complaints()
    {
        $data = [
            'title' => 'Keluhan Masyarakat',
            'complaints' => $this->complaintModel
                ->orderBy('created_at', 'DESC')
                ->findAll()
        ];

        return view('admin/complaints', $data);
    }

    public function update_complaint($id)
    {
        $status = $this->request->getPost('status');
        $this->complaintModel->update($id, ['status' => $status]);
        return redirect()->back()->with('success', 'Status keluhan diperbarui');
    }

    public function delete_complaint($id)
    {
        $this->complaintModel->delete($id);
        return redirect()->back()->with('success', 'Data keluhan dihapus');
    }
}
