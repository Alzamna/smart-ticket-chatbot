<?= $this->extend('admin/layout/index') ?>
<?= $this->section('content') ?>

<div class="flex justify-between items-center mb-6">
  <div>
    <h2 class="text-xl font-bold text-primary">Daftar Keluhan Masyarakat</h2>
    <p class="text-gray-600 mt-1">Kelola pengaduan dan keluhan dari masyarakat</p>
  </div>
  <div class="flex items-center space-x-2 text-sm text-gray-500">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
    <span>Total: <?= count($complaints) ?> keluhan</span>
  </div>
</div>

<div class="bg-white rounded-lg shadow-sm overflow-hidden">
  <table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
      <tr>
        <th class="px-6 py-3 text-left text-xs font-medium text-primary uppercase tracking-wider">No</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-primary uppercase tracking-wider">Nama</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-primary uppercase tracking-wider">Telepon</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-primary uppercase tracking-wider">Jenis Keluhan</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-primary uppercase tracking-wider">Isi Keluhan</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-primary uppercase tracking-wider">Status</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-primary uppercase tracking-wider">Aksi</th>
      </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
      <?php $no=1; foreach($complaints as $c): ?>
      <tr class="hover:bg-gray-50 transition-colors duration-150">
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-primary text-center"><?= $no++ ?></td>
        <td class="px-6 py-4 whitespace-nowrap">
          <div class="flex items-center">
            <div class="bg-primary text-white p-2 rounded mr-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
              </svg>
            </div>
            <span class="font-semibold text-gray-900"><?= esc($c['nama']) ?></span>
          </div>
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
          <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
            </svg>
            <?= esc($c['telepon']) ?>
          </div>
        </td>
        <td class="px-6 py-4 whitespace-nowrap">
          <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
            <?= esc($c['jenis_keluhan']) ?>
          </span>
        </td>
        <td class="px-6 py-4 text-sm text-gray-600 max-w-xs">
          <div class="line-clamp-2"><?= esc($c['isi_keluhan']) ?></div>
        </td>
        <td class="px-6 py-4 whitespace-nowrap">
          <?php
          $statusColor = 'bg-gray-100 text-gray-800';
          $statusIcon = '';
          
          if ($c['status'] == 'Selesai') {
            $statusColor = 'bg-green-100 text-green-800';
            $statusIcon = '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>';
          } elseif ($c['status'] == 'Proses') {
            $statusColor = 'bg-yellow-100 text-yellow-800';
            $statusIcon = '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>';
          } elseif ($c['status'] == 'Menunggu') {
            $statusColor = 'bg-blue-100 text-blue-800';
            $statusIcon = '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>';
          } elseif ($c['status'] == 'Ditolak') {
            $statusColor = 'bg-red-100 text-red-800';
            $statusIcon = '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>';
          }
          ?>
          <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium <?= $statusColor ?>">
            <?= $statusIcon ?>
            <?= esc($c['status']) ?>
          </span>
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
          <div class="flex space-x-3">
            <a href="/admin/complaints/edit/<?= $c['id_complaint'] ?>" class="text-primary hover:text-purple-900 flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
              </svg>
              Tindak Lanjut
            </a>
            <span class="text-gray-300">|</span>
            <a href="/admin/complaints/delete/<?= $c['id_complaint'] ?>" class="text-red-600 hover:text-red-900 flex items-center" onclick="return confirm('Hapus keluhan ini?')">
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
<?php if(empty($complaints)): ?>
<div class="bg-white rounded-lg shadow-sm p-8 text-center">
  <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
  </svg>
  <h3 class="text-lg font-medium text-gray-900 mb-2">Tidak ada keluhan</h3>
  <p class="text-gray-500">Semua pengaduan masyarakat telah ditangani dengan baik</p>
</div>
<?php endif; ?>

<style>
.line-clamp-2 {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
</style>

<?= $this->endSection() ?>