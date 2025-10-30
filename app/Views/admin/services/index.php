<?= $this->extend('admin/layout/index') ?>
<?= $this->section('content') ?>

<div class="flex justify-between items-center mb-6">
  <div>
    <h2 class="text-xl font-bold text-primary">Daftar Layanan</h2>
    <p class="text-gray-600 mt-1">Kelola semua layanan Uji KIR yang tersedia</p>
  </div>
  <a href="/admin/services/add" class="btn-primary px-4 py-2 rounded-md font-medium flex items-center">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
    </svg>
    Tambah Layanan
  </a>
</div>

<div class="bg-white rounded-lg shadow-sm overflow-hidden">
  <table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
      <tr>
        <th class="px-6 py-3 text-left text-xs font-medium text-primary uppercase tracking-wider">No</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-primary uppercase tracking-wider">Nama Layanan</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-primary uppercase tracking-wider">Deskripsi</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-primary uppercase tracking-wider">Biaya</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-primary uppercase tracking-wider">Aksi</th>
      </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
      <?php $no=1; foreach($services as $s): ?>
      <tr class="hover:bg-gray-50 transition-colors duration-150">
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-primary text-center"><?= $no++ ?></td>
        <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900"><?= esc($s['nama_layanan']) ?></td>
        <td class="px-6 py-4 text-sm text-gray-600 max-w-xs"><?= esc($s['deskripsi']) ?></td>
        <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-primary text-right">Rp <?= number_format($s['biaya'],0,',','.') ?></td>
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
          <div class="flex space-x-3">
            <a href="/admin/services/edit/<?= $s['id_service'] ?>" class="text-primary hover:text-purple-900 flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
              </svg>
              Edit
            </a>
            <span class="text-gray-300">|</span>
            <a href="/admin/services/delete/<?= $s['id_service'] ?>" class="text-red-600 hover:text-red-900 flex items-center" onclick="return confirm('Hapus layanan ini?')">
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
<?php if(empty($services)): ?>
<div class="bg-white rounded-lg shadow-sm p-8 text-center">
  <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
  </svg>
  <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada layanan</h3>
  <p class="text-gray-500 mb-4">Mulai dengan menambahkan layanan pertama Anda</p>
  <a href="/admin/services/add" class="btn-primary px-4 py-2 rounded-md font-medium inline-flex items-center">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
    </svg>
    Tambah Layanan Pertama
  </a>
</div>
<?php endif; ?>

<?= $this->endSection() ?>