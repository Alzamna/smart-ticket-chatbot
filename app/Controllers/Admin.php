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
            'catatan' => $this->request->getPost('catatan'),
            'id_vehicle' => $this->request->getPost('id_vehicle')
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

    //Service Management
    public function services()
    {
        $serviceModel = new \App\Models\ServiceModel();
        $data = [
            'title' => 'Data Layanan',
            'services' => $serviceModel->orderBy('id_service', 'DESC')->findAll()
        ];
        return view('admin/services/index', $data);
    }

    public function add_service()
    {
        $data['title'] = 'Tambah Layanan Baru';
        return view('admin/services/tambah', $data);
    }

    public function save_service()
    {
        $serviceModel = new \App\Models\ServiceModel();
        $serviceModel->insert([
            'nama_layanan' => $this->request->getPost('nama_layanan'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'biaya' => $this->request->getPost('biaya')
        ]);
        return redirect()->to('/admin/services')->with('success', 'Layanan berhasil ditambahkan!');
    }

    public function edit_service($id)
    {
        $serviceModel = new \App\Models\ServiceModel();
        $data = [
            'title' => 'Edit Layanan',
            'service' => $serviceModel->find($id)
        ];
        return view('admin/services/edit', $data);
    }

    public function update_service($id)
    {
        $serviceModel = new \App\Models\ServiceModel();
        $serviceModel->update($id, [
            'nama_layanan' => $this->request->getPost('nama_layanan'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'biaya' => $this->request->getPost('biaya')
        ]);
        return redirect()->to('/admin/services')->with('success', 'Layanan berhasil diperbarui!');
    }

    public function delete_service($id)
    {
        $serviceModel = new \App\Models\ServiceModel();
        $serviceModel->delete($id);
        return redirect()->to('/admin/services')->with('success', 'Layanan berhasil dihapus!');
    }

    // Kendaraan
    public function vehicles()
    {
        $vehicleModel = new \App\Models\VehicleModel();
        $userModel = new \App\Models\UserModel();
        $data = [
            'title' => 'Data Kendaraan',
            'vehicles' => $vehicleModel
                ->select('vehicles.*, users.nama')
                ->join('users', 'users.id_user = vehicles.id_user', 'left')
                ->orderBy('id_vehicle', 'DESC')
                ->findAll()
        ];
        return view('admin/vehicles/index', $data);
    }

    public function add_vehicle()
    {
        $userModel = new \App\Models\UserModel();
        $data = [
            'title' => 'Tambah Kendaraan',
            'users' => $userModel->findAll()
        ];
        return view('admin/vehicles/tambah', $data);
    }

    public function save_vehicle()
    {
        $vehicleModel = new \App\Models\VehicleModel();
        $vehicleModel->insert([
            'id_user' => $this->request->getPost('id_user'),
            'plat_nomor' => strtoupper($this->request->getPost('plat_nomor')),
            'jenis_kendaraan' => $this->request->getPost('jenis_kendaraan'),
            'merk' => $this->request->getPost('merk'),
            'tahun_pembuatan' => $this->request->getPost('tahun_pembuatan'),
            'warna' => $this->request->getPost('warna'),
        ]);
        return redirect()->to('/admin/vehicles')->with('success', 'Kendaraan berhasil ditambahkan!');
    }

    public function edit_vehicle($id)
    {
        $vehicleModel = new \App\Models\VehicleModel();
        $userModel = new \App\Models\UserModel();
        $data = [
            'title' => 'Edit Kendaraan',
            'vehicle' => $vehicleModel->find($id),
            'users' => $userModel->findAll()
        ];
        return view('admin/vehicles/edit', $data);
    }

    public function update_vehicle($id)
    {
        $vehicleModel = new \App\Models\VehicleModel();
        $vehicleModel->update($id, [
            'id_user' => $this->request->getPost('id_user'),
            'plat_nomor' => strtoupper($this->request->getPost('plat_nomor')),
            'jenis_kendaraan' => $this->request->getPost('jenis_kendaraan'),
            'merk' => $this->request->getPost('merk'),
            'tahun_pembuatan' => $this->request->getPost('tahun_pembuatan'),
            'warna' => $this->request->getPost('warna'),
        ]);
        return redirect()->to('/admin/vehicles')->with('success', 'Kendaraan berhasil diperbarui!');
    }

    public function delete_vehicle($id)
    {
        $vehicleModel = new \App\Models\VehicleModel();
        $vehicleModel->delete($id);
        return redirect()->to('/admin/vehicles')->with('success', 'Kendaraan berhasil dihapus!');
    }

    // Complaint

    public function complaints()
    {
        $complaintModel = new \App\Models\ComplaintModel();
        $data = [
            'title' => 'Data Keluhan',
            'complaints' => $complaintModel->orderBy('created_at', 'DESC')->findAll()
        ];
        return view('admin/complaints/index', $data);
    }

    public function edit_complaint($id)
    {
        $complaintModel = new \App\Models\ComplaintModel();
        $data = [
            'title' => 'Tindak Lanjut Keluhan',
            'complaint' => $complaintModel->find($id)
        ];
        return view('admin/complaints/edit', $data);
    }

    public function update_complaint($id)
    {
        $complaintModel = new \App\Models\ComplaintModel();
        $complaintModel->update($id, [
            'status' => $this->request->getPost('status')
        ]);
        return redirect()->to('/admin/complaints')->with('success', 'Status keluhan berhasil diperbarui!');
    }

    public function delete_complaint($id)
    {
        $complaintModel = new \App\Models\ComplaintModel();
        $complaintModel->delete($id);
        return redirect()->to('/admin/complaints')->with('success', 'Keluhan berhasil dihapus!');
    }

}
