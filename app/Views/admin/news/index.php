<?= $this->extend('admin/layout/index') ?>
<?= $this->section('content') ?>

<!-- Header Section -->
<div class="flex justify-between items-center mb-6">
  <div>
    <h1 class="text-2xl font-bold text-primary">Daftar Berita</h1>
    <p class="text-gray-600 mt-1">Kelola berita dan informasi Uji KIR</p>
  </div>
  <a href="<?= base_url('admin/berita/create') ?>" class="btn-primary px-4 py-2 rounded-md font-medium flex items-center">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
    </svg>
    Tambah Berita
  </a>
</div>

<!-- Table Section -->
<div class="bg-white rounded-lg shadow-sm overflow-hidden">
  <table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
      <tr>
        <th class="px-6 py-3 text-left text-xs font-medium text-primary uppercase tracking-wider">No</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-primary uppercase tracking-wider">Judul Berita</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-primary uppercase tracking-wider">Tanggal</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-primary uppercase tracking-wider">Aksi</th>
      </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
      <?php foreach ($berita as $i => $b): ?>
      <tr class="hover:bg-gray-50 transition-colors duration-150">
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-primary text-center"><?= $i + 1 ?></td>
        <td class="px-6 py-4">
          <div class="flex items-center">
            <div class="bg-primary p-2 rounded mr-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
              </svg>
            </div>
            <div>
              <p class="font-semibold text-gray-900"><?= esc($b['judul']) ?></p>
              <p class="text-xs text-gray-500 mt-1"><?= character_limiter(strip_tags($b['isi'] ?? ''), 80) ?></p>
            </div>
          </div>
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
          <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <?= date('d M Y', strtotime($b['created_at'])) ?>
          </div>
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
          <div class="flex space-x-3">
            <a href="<?= base_url('admin/berita/edit/' . $b['id']) ?>" class="text-primary hover:text-purple-900 flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
              </svg>
              Edit
            </a>
            <span class="text-gray-300">|</span>
            <a href="<?= base_url('admin/berita/delete/' . $b['id']) ?>" onclick="return confirm('Yakin ingin menghapus berita ini?')" class="text-red-600 hover:text-red-900 flex items-center">
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

<!-- Empty State -->
<?php if(empty($berita)): ?>
<div class="bg-white rounded-lg shadow-sm p-8 text-center">
  <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
  </svg>
  <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada berita</h3>
  <p class="text-gray-500 mb-4">Mulai dengan menambahkan berita pertama Anda</p>
  <a href="<?= base_url('admin/berita/create') ?>" class="btn-primary px-4 py-2 rounded-md font-medium inline-flex items-center">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
    </svg>
    Tambah Berita Pertama
  </a>
</div>
<?php endif; ?>

<?= $this->endSection() ?>