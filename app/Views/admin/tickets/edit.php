<?= $this->extend('admin/layout/index') ?>
<?= $this->section('content') ?>

<!-- Header Section -->
<div class="flex justify-between items-center mb-6">
  <div>
    <h2 class="text-xl font-bold text-primary">Edit Tiket</h2>
    <p class="text-gray-600 mt-1">Update informasi tiket Uji KIR</p>
    <div class="flex items-center mt-2 text-sm text-gray-500">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
      </svg>
      <span>ID Tiket: <strong class="font-mono text-primary"><?= esc($ticket['nomor_tiket'] ?? $ticket['id_ticket']) ?></strong></span>
    </div>
  </div>
  <a href="/admin/tickets" class="text-gray-600 hover:text-primary flex items-center">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
    </svg>
    Kembali
  </a>
</div>

<!-- Form Section -->
<div class="bg-white rounded-lg shadow-sm p-6 max-w-2xl">
  <form action="/admin/tickets/update/<?= $ticket['id_ticket'] ?>" method="post" class="space-y-6">
    <?= csrf_field() ?>

    <!-- Pilih Pengguna -->
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Pengguna</label>
      <div class="relative">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
          </svg>
        </div>
        <select name="id_user" class="w-full border border-gray-300 rounded-lg pl-10 pr-3 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-colors appearance-none">
          <?php foreach($users as $u): ?>
            <option value="<?= $u['id_user'] ?>" <?= $u['id_user']==$ticket['id_user']?'selected':'' ?>>
              <?= esc($u['nama']) ?>
            </option>
          <?php endforeach; ?>
        </select>
        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
          <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </div>
      </div>
    </div>

    <!-- Jenis Layanan -->
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Layanan</label>
      <div class="relative">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
          </svg>
        </div>
        <input type="text" name="jenis_layanan" value="<?= esc($ticket['jenis_layanan']) ?>" 
          class="w-full border border-gray-300 rounded-lg pl-10 pr-3 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-colors"
          placeholder="Masukkan jenis layanan">
      </div>
    </div>

    <!-- Status -->
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
      <div class="relative">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </div>
        <select name="status" class="w-full border border-gray-300 rounded-lg pl-10 pr-3 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-colors appearance-none">
          <?php foreach(['Menunggu','Verifikasi','Ditolak','Selesai'] as $s): ?>
            <option value="<?= $s ?>" <?= $ticket['status']==$s?'selected':'' ?>>
              <?= $s ?>
            </option>
          <?php endforeach; ?>
        </select>
        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
          <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </div>
      </div>
    </div>

    <!-- Catatan -->
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-2">Catatan</label>
      <div class="relative">
        <div class="absolute top-3 left-3 pointer-events-none">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
          </svg>
        </div>
        <textarea name="catatan" rows="4" 
          class="w-full border border-gray-300 rounded-lg pl-10 pr-3 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-colors"
          placeholder="Tambahkan catatan jika diperlukan..."><?= esc($ticket['catatan']) ?></textarea>
      </div>
    </div>

    <!-- Action Buttons -->
    <div class="flex items-center justify-end space-x-4 pt-4 border-t border-gray-200">
      <a href="/admin/tickets" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors font-medium">
        Batal
      </a>
      <button type="submit" class="btn-primary px-6 py-2 rounded-lg font-medium hover:bg-purple-800 transition-colors flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
        </svg>
        Update Tiket
      </button>
    </div>
  </form>
</div>

<!-- Status Info Box -->
<div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4 max-w-2xl">
  <div class="flex items-start">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
    <div>
      <h4 class="text-sm font-medium text-blue-800">Informasi Status</h4>
      <ul class="text-sm text-blue-700 mt-1 space-y-1">
        <li>• <strong>Menunggu</strong>: Tiket baru dibuat, menunggu proses</li>
        <li>• <strong>Verifikasi</strong>: Sedang dalam proses verifikasi</li>
        <li>• <strong>Ditolak</strong>: Tiket tidak memenuhi persyaratan</li>
        <li>• <strong>Selesai</strong>: Proses Uji KIR telah selesai</li>
      </ul>
    </div>
  </div>
</div>

<?= $this->endSection() ?>