<?php namespace App\Controllers;

use App\Models\TicketModel;
use App\Models\ComplaintModel;
use App\Models\ServiceModel;
use App\Models\VehicleModel;

class User extends BaseController
{
    public function index()
    {
        return view('fe/home');
    }

    public function informasi()
    {
        $serviceModel = new ServiceModel();
        $data['services'] = $serviceModel->findAll();
        return view('fe/informasi', $data);
    }

    public function pendaftaran()
    {
        $serviceModel = new ServiceModel();
        $vehicleModel = new VehicleModel();
        $data = [
            'services' => $serviceModel->findAll(),
            'vehicles' => $vehicleModel->findAll()
        ];
        return view('fe/pendaftaran', $data);
    }

    public function simpan_pendaftaran()
    {
        $ticketModel = new TicketModel();
        $file = $this->request->getFile('dokumen');
        $fileName = null;

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move('uploads/documents', $fileName);
        }

        $tahun = date('Y');
        $jumlahTiket = $ticketModel->countAll() + 1;
        $nomorTiket = sprintf("KIR-%s-%03d", $tahun, $jumlahTiket);

        $data = [
            'plate_no'          => $this->request->getPost('plat_nomor'),
            'owner_name'        => $this->request->getPost('nama'),
            'jenis_kendaraan'   => $this->request->getPost('jenis_kendaraan'),
            'jenis_layanan'     => 'Uji KIR',
            'nomor_tiket'       => $nomorTiket,
            'status'            => 'Menunggu',
            'tanggal_pengajuan' => date('Y-m-d H:i:s'),
            'tanggal_uji'       => $this->request->getPost('tanggal'),
            'biaya'             => 0.00,
            'catatan'           => '',
        ];

        if ($fileName) {
            $data['document'] = $fileName;
        }

        $ticketModel->insert($data);

        return redirect()->to('/pendaftaran')->with('success', '✅ Pendaftaran berhasil! Nomor Tiket Anda: ' . $nomorTiket);
    }



    public function cek_status()
    {
        return view('fe/cek_status');
    }

    public function hasil_status()
    {
        $ticketModel = new TicketModel();
        $keyword = $this->request->getPost('keyword');
        $data['ticket'] = $ticketModel
            ->where('nomor_tiket', $keyword)
            ->orWhere('plate_no', $keyword)
            ->first();
        return view('fe/hasil_status', $data);
    }

    public function pengaduan()
    {
        return view('fe/pengaduan');
    }

    public function simpan_pengaduan()
    {
        $complaintModel = new ComplaintModel();
        $file = $this->request->getFile('bukti_foto');
        $fileName = null;

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move('uploads/complaints', $fileName);
        }

        $complaintModel->insert([
            'nama' => $this->request->getPost('nama'),
            'telepon' => $this->request->getPost('telepon'),
            'jenis_keluhan' => $this->request->getPost('jenis_keluhan'),
            'isi_keluhan' => $this->request->getPost('isi_keluhan'),
            'bukti_foto' => $fileName,
            'status' => 'Menunggu'
        ]);

        return redirect()->to('/pengaduan')->with('success', 'Keluhan berhasil dikirim!');
    }
}
