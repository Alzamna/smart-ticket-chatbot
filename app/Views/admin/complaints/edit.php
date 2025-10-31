<?= $this->extend('admin/layout/index') ?>
<?= $this->section('content') ?>

<!-- Header Section -->
<div class="flex justify-between items-center mb-6">
  <div>
    <h2 class="text-xl font-bold text-primary">Tindak Lanjut Keluhan</h2>
    <p class="text-gray-600 mt-1">Kelola dan update status keluhan masyarakat</p>
    <div class="flex items-center mt-2 text-sm text-gray-500">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
      </svg>
      <span>ID Keluhan: <strong class="font-mono text-primary"><?= esc($complaint['id_complaint']) ?></strong></span>
    </div>
  </div>
  <a href="/admin/complaints" class="text-gray-600 hover:text-primary flex items-center">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
    </svg>
    Kembali
  </a>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
  <!-- Informasi Keluhan -->
  <div class="bg-white rounded-lg shadow-sm p-6">
    <h3 class="text-lg font-semibold text-primary mb-4 flex items-center">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
      </svg>
      Detail Keluhan
    </h3>
    
    <div class="space-y-4">
      <!-- Informasi Pengadu -->
      <div class="flex items-start space-x-3">
        <div class="bg-primary p-2 rounded-full mt-1">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
          </svg>
        </div>
        <div class="flex-1">
          <p class="text-sm font-medium text-gray-500">Nama Pengadu</p>
          <p class="text-gray-900 font-semibold"><?= esc($complaint['nama']) ?></p>
        </div>
      </div>

      <!-- Telepon -->
      <div class="flex items-start space-x-3">
        <div class="bg-gray-100 p-2 rounded-full mt-1">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
          </svg>
        </div>
        <div class="flex-1">
          <p class="text-sm font-medium text-gray-500">Telepon</p>
          <p class="text-gray-900 font-semibold"><?= esc($complaint['telepon']) ?></p>
        </div>
      </div>

      <!-- Jenis Keluhan -->
      <div class="flex items-start space-x-3">
        <div class="bg-purple-100 p-2 rounded-full mt-1">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
          </svg>
        </div>
        <div class="flex-1">
          <p class="text-sm font-medium text-gray-500">Jenis Keluhan</p>
          <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
            <?= esc($complaint['jenis_keluhan']) ?>
          </span>
        </div>
      </div>

      <!-- Status Saat Ini -->
      <div class="flex items-start space-x-3">
        <div class="bg-yellow-100 p-2 rounded-full mt-1">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </div>
        <div class="flex-1">
          <p class="text-sm font-medium text-gray-500">Status Saat Ini</p>
          <?php
          $statusColor = 'bg-gray-100 text-gray-800';
          if ($complaint['status'] == 'Selesai') $statusColor = 'bg-green-100 text-green-800';
          elseif ($complaint['status'] == 'Diproses') $statusColor = 'bg-yellow-100 text-yellow-800';
          elseif ($complaint['status'] == 'Ditolak') $statusColor = 'bg-red-100 text-red-800';
          ?>
          <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium <?= $statusColor ?>">
            <?= esc($complaint['status']) ?>
          </span>
        </div>
      </div>
    </div>

    <!-- Isi Keluhan -->
    <div class="mt-6 pt-4 border-t border-gray-200">
      <p class="text-sm font-medium text-gray-500 mb-2">Isi Keluhan</p>
      <div class="bg-gray-50 rounded-lg p-4">
        <p class="text-gray-700 leading-relaxed"><?= nl2br(esc($complaint['isi_keluhan'])) ?></p>
      </div>
    </div>

    <!-- Bukti Foto -->
    <?php if ($complaint['bukti_foto']): ?>
    <div class="mt-6 pt-4 border-t border-gray-200">
      <p class="text-sm font-medium text-gray-500 mb-3">Bukti Foto</p>
      <div class="bg-gray-50 rounded-lg p-4">
        <img src="/uploads/complaints/<?= esc($complaint['bukti_foto']) ?>" 
             alt="Bukti foto keluhan" 
             class="w-full max-w-xs rounded-lg shadow-md hover:shadow-lg transition-shadow cursor-pointer"
             onclick="openImageModal(this.src)">
      </div>
    </div>
    <?php endif; ?>
  </div>

  <!-- Form Tindak Lanjut -->
  <div class="bg-white rounded-lg shadow-sm p-6">
    <h3 class="text-lg font-semibold text-primary mb-4 flex items-center">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
      </svg>
      Tindak Lanjut
    </h3>

    <form action="/admin/complaints/update/<?= $complaint['id_complaint'] ?>" method="post" class="space-y-6">
      <?= csrf_field() ?>
      
      <!-- Status Selection -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Ubah Status</label>
        <div class="relative">
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
          <select name="status" class="w-full border border-gray-300 rounded-lg pl-10 pr-3 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-colors appearance-none">
            <?php foreach(['Menunggu', 'Diproses', 'Selesai', 'Ditolak'] as $s): ?>
              <option value="<?= $s ?>" <?= $complaint['status']==$s?'selected':'' ?>><?= $s ?></option>
            <?php endforeach; ?>
          </select>
          <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
            <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </div>
        </div>
      </div>

      <!-- Action Buttons -->
      <div class="flex items-center justify-end space-x-4 pt-4 border-t border-gray-200">
        <a href="/admin/complaints" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors font-medium">
          Batal
        </a>
        <button type="submit" class="btn-primary px-6 py-2 rounded-lg font-medium hover:bg-purple-800 transition-colors flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
          Simpan Perubahan
        </button>
      </div>
    </form>
  </div>
</div>

<!-- Image Modal -->
<div id="imageModal" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50 hidden">
  <div class="max-w-4xl max-h-full p-4">
    <img id="modalImage" src="" alt="" class="max-w-full max-h-full rounded-lg">
    <button onclick="closeImageModal()" class="absolute top-4 right-4 text-white hover:text-gray-300">
      <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>
  </div>
</div>

<script>
function openImageModal(src) {
  document.getElementById('modalImage').src = src;
  document.getElementById('imageModal').classList.remove('hidden');
}

function closeImageModal() {
  document.getElementById('imageModal').classList.add('hidden');
}

// Close modal on outside click
document.getElementById('imageModal').addEventListener('click', function(e) {
  if (e.target === this) closeImageModal();
});
</script>

<?= $this->endSection() ?>