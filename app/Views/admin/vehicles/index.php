<?= $this->extend('admin/layout/index') ?>
<?= $this->section('content') ?>

<div class="flex justify-between items-center mb-6">
  <div>
    <h2 class="text-xl font-bold text-primary">Daftar Kendaraan</h2>
    <p class="text-gray-600 mt-1">Kelola semua data kendaraan Uji KIR</p>
  </div>
  <a href="/admin/vehicles/tambah" class="btn-primary px-4 py-2 rounded-md font-medium flex items-center">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
    </svg>
    Tambah Kendaraan
  </a>
</div>

<div class="bg-white rounded-lg shadow-sm overflow-hidden">
  <table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
      <tr>
        <th class="px-6 py-3 text-left text-xs font-medium text-primary uppercase tracking-wider">No</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-primary uppercase tracking-wider">Plat Nomor</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-primary uppercase tracking-wider">Jenis</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-primary uppercase tracking-wider">Merk</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-primary uppercase tracking-wider">Tahun</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-primary uppercase tracking-wider">Warna</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-primary uppercase tracking-wider">Pemilik</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-primary uppercase tracking-wider">Aksi</th>
      </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
      <?php $no=1; foreach($vehicles as $v): ?>
      <tr class="hover:bg-gray-50 transition-colors duration-150">
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-primary text-center"><?= $no++ ?></td>
        <td class="px-6 py-4 whitespace-nowrap">
          <div class="flex items-center">
            <div class="bg-primary text-white p-2 rounded mr-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
              </svg>
            </div>
            <span class="font-mono font-bold text-primary"><?= esc($v['plat_nomor']) ?></span>
          </div>
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600"><?= esc($v['jenis_kendaraan']) ?></td>
        <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900"><?= esc($v['merk']) ?></td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-600"><?= esc($v['tahun_pembuatan']) ?></td>
        <td class="px-6 py-4 whitespace-nowrap">
          <div class="flex items-center">
            <div class="w-3 h-3 rounded-full mr-2 border border-gray-300" style="background-color: <?= esc($v['warna']) ?>"></div>
            <span class="text-sm text-gray-600"><?= esc($v['warna']) ?></span>
          </div>
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= esc($v['nama']) ?></td>
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
          <div class="flex space-x-3">
            <a href="/admin/vehicles/edit/<?= $v['id_vehicle'] ?>" class="text-primary hover:text-purple-900 flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
              </svg>
              Edit
            </a>
            <span class="text-gray-300">|</span>
            <a href="/admin/vehicles/delete/<?= $v['id_vehicle'] ?>" class="text-red-600 hover:text-red-900 flex items-center" onclick="return confirm('Yakin hapus kendaraan ini?')">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
              </svg>
              Hapus
            </a>
          </div>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<!-- Empty State (jika tidak ada data) -->
<?php if(empty($vehicles)): ?>
<div class="bg-white rounded-lg shadow-sm p-8 text-center">
  <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
  </svg>
  <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada kendaraan</h3>
  <p class="text-gray-500 mb-4">Mulai dengan menambahkan kendaraan pertama</p>
  <a href="/admin/vehicles/add" class="btn-primary px-4 py-2 rounded-md font-medium inline-flex items-center">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
    </svg>
    Tambah Kendaraan Pertama
  </a>
</div>
<?php endif; ?>

<?= $this->endSection() ?>