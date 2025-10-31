<?= $this->extend('admin/layout/index') ?>
<?= $this->section('content') ?>

<!-- Header Section -->
<div class="flex justify-between items-center mb-6">
  <div>
    <h2 class="text-xl font-bold text-primary">Edit Layanan</h2>
    <p class="text-gray-600 mt-1">Update informasi layanan Uji KIR</p>
    <div class="flex items-center mt-2 text-sm text-gray-500">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
      </svg>
      <span>ID Layanan: <strong class="font-mono text-primary"><?= esc($service['id_service']) ?></strong></span>
    </div>
  </div>
  <a href="/admin/services" class="text-gray-600 hover:text-primary flex items-center">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
    </svg>
    Kembali
  </a>
</div>

<!-- Form Section -->
<div class="bg-white rounded-lg shadow-sm p-6 max-w-2xl">
  <form action="/admin/services/update/<?= $service['id_service'] ?>" method="post" class="space-y-6">
    <?= csrf_field() ?>

    <!-- Nama Layanan -->
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-2">
        Nama Layanan
        <span class="text-red-500">*</span>
      </label>
      <div class="relative">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
          </svg>
        </div>
        <input type="text" name="nama_layanan" value="<?= esc($service['nama_layanan']) ?>" required 
          class="w-full border border-gray-300 rounded-lg pl-10 pr-3 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-colors"
          placeholder="Masukkan nama layanan">
      </div>
      <?php if(isset($validation) && $validation->hasError('nama_layanan')): ?>
        <p class="text-red-600 text-sm mt-1"><?= $validation->getError('nama_layanan') ?></p>
      <?php endif; ?>
    </div>

    <!-- Deskripsi -->
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
      <div class="relative">
        <div class="absolute top-3 left-3 pointer-events-none">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
          </svg>
        </div>
        <textarea name="deskripsi" rows="4"
          class="w-full border border-gray-300 rounded-lg pl-10 pr-3 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-colors"
          placeholder="Deskripsikan layanan ini..."><?= esc($service['deskripsi']) ?></textarea>
      </div>
      <?php if(isset($validation) && $validation->hasError('deskripsi')): ?>
        <p class="text-red-600 text-sm mt-1"><?= $validation->getError('deskripsi') ?></p>
      <?php endif; ?>
    </div>

    <!-- Biaya -->
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-2">Biaya</label>
      <div class="relative">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
          </svg>
        </div>
        <input type="number" name="biaya" step="1000" value="<?= esc($service['biaya']) ?>"
          class="w-full border border-gray-300 rounded-lg pl-10 pr-3 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-colors"
          placeholder="0">
      </div>
      <p class="text-gray-500 text-sm mt-1">Biaya dalam Rupiah (kelipatan 1000)</p>
      <?php if(isset($validation) && $validation->hasError('biaya')): ?>
        <p class="text-red-600 text-sm mt-1"><?= $validation->getError('biaya') ?></p>
      <?php endif; ?>
    </div>

    <!-- Action Buttons -->
    <div class="flex items-center justify-end space-x-4 pt-4 border-t border-gray-200">
      <a href="/admin/services" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors font-medium">
        Batal
      </a>
      <button type="submit" class="btn-primary px-6 py-2 rounded-lg font-medium hover:bg-purple-800 transition-colors flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
        </svg>
        Update Layanan
      </button>
    </div>
  </form>
</div>

<!-- Current Data Preview -->
<div class="mt-6 bg-gray-50 border border-gray-200 rounded-lg p-4 max-w-2xl">
  <div class="flex items-start">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
    <div>
      <h4 class="text-sm font-medium text-gray-800">Data Saat Ini</h4>
      <div class="text-sm text-gray-700 mt-2 space-y-2">
        <div class="flex">
          <span class="font-medium w-24">Nama:</span>
          <span><?= esc($service['nama_layanan']) ?></span>
        </div>
        <div class="flex">
          <span class="font-medium w-24">Deskripsi:</span>
          <span class="flex-1"><?= esc($service['deskripsi'] ?: '-') ?></span>
        </div>
        <div class="flex">
          <span class="font-medium w-24">Biaya:</span>
          <span class="font-semibold text-primary">Rp <?= number_format($service['biaya'], 0, ',', '.') ?></span>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>