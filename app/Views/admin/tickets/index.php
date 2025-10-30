<?= $this->extend('admin/layout/index') ?>
<?= $this->section('content') ?>

<div class="flex justify-between items-center mb-6">
  <div>
    <h2 class="text-xl font-bold text-primary">Daftar Tiket</h2>
    <p class="text-gray-600 mt-1">Kelola semua tiket Uji KIR</p>
  </div>
  <a href="/admin/tickets/add" class="btn-primary px-4 py-2 rounded-md font-medium flex items-center">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
    </svg>
    Tambah Tiket
  </a>
</div>

<div class="bg-white rounded-lg shadow-sm overflow-hidden">
  <table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
      <tr>
        <th class="px-6 py-3 text-left text-xs font-medium text-primary uppercase tracking-wider">No</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-primary uppercase tracking-wider">Pemilik</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-primary uppercase tracking-wider">Layanan</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-primary uppercase tracking-wider">Nomor Tiket</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-primary uppercase tracking-wider">Status</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-primary uppercase tracking-wider">Aksi</th>
      </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
      <?php $no=1; foreach($tickets as $t): ?>
      <tr class="hover:bg-gray-50 transition-colors duration-150">
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-primary text-center"><?= $no++ ?></td>
        <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900"><?= esc($t['owner_name']) ?></td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600"><?= esc($t['jenis_layanan']) ?></td>
        <td class="px-6 py-4 whitespace-nowrap text-sm font-mono text-primary font-bold"><?= esc($t['nomor_tiket']) ?></td>
        <td class="px-6 py-4 whitespace-nowrap">
          <?php
          $statusColor = 'bg-gray-100 text-gray-800';
          $statusText = $t['status'];
          
          if ($t['status'] === 'Selesai') {
            $statusColor = 'bg-green-100 text-green-800';
          } elseif ($t['status'] === 'Proses') {
            $statusColor = 'bg-yellow-100 text-yellow-800';
          } elseif ($t['status'] === 'Menunggu') {
            $statusColor = 'bg-blue-100 text-blue-800';
          } elseif ($t['status'] === 'Ditolak') {
            $statusColor = 'bg-red-100 text-red-800';
          }
          ?>
          <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full <?= $statusColor ?>">
            <?= esc($statusText) ?>
          </span>
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
          <div class="flex space-x-3">
            <a href="/admin/tickets/edit/<?= $t['id_ticket'] ?>" class="text-primary hover:text-purple-900 flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
              </svg>
              Edit
            </a>
            <span class="text-gray-300">|</span>
            <a href="/admin/tickets/delete/<?= $t['id_ticket'] ?>" class="text-red-600 hover:text-red-900 flex items-center" onclick="return confirm('Yakin hapus tiket ini?')">
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
<?php if(empty($tickets)): ?>
<div class="bg-white rounded-lg shadow-sm p-8 text-center">
  <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
  </svg>
  <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada tiket</h3>
  <p class="text-gray-500 mb-4">Mulai dengan menambahkan tiket pertama Anda</p>
  <a href="/admin/tickets/add" class="btn-primary px-4 py-2 rounded-md font-medium inline-flex items-center">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
    </svg>
    Tambah Tiket Pertama
  </a>
</div>
<?php endif; ?>

<?= $this->endSection() ?>