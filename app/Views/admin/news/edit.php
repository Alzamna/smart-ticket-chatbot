<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<!-- Header Section -->
<div class="flex justify-between items-center mb-6">
  <div>
    <h1 class="text-2xl font-bold text-primary">Edit Berita</h1>
    <p class="text-gray-600 mt-1">Update informasi berita Uji KIR</p>
    <div class="flex items-center mt-2 text-sm text-gray-500">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
      </svg>
      <span>ID Berita: <strong class="font-mono text-primary"><?= esc($berita['id']) ?></strong></span>
    </div>
  </div>
  <a href="<?= base_url('admin/berita') ?>" class="text-gray-600 hover:text-primary flex items-center">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
    </svg>
    Kembali
  </a>
</div>

<!-- Form Section -->
<div class="bg-white rounded-lg shadow-sm p-6 max-w-4xl">
  <form action="<?= base_url('admin/update_berita/' . $berita['id']) ?>" method="post" enctype="multipart/form-data" class="space-y-6">
    <?= csrf_field() ?>

    <!-- Judul Berita -->
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-2">
        Judul Berita
        <span class="text-red-500">*</span>
      </label>
      <div class="relative">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
          </svg>
        </div>
        <input type="text" name="judul" value="<?= esc($berita['judul']) ?>" required
          class="w-full border border-gray-300 rounded-lg pl-10 pr-3 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-colors"
          placeholder="Masukkan judul berita">
      </div>
      <?php if(isset($validation) && $validation->hasError('judul')): ?>
        <p class="text-red-600 text-sm mt-1"><?= $validation->getError('judul') ?></p>
      <?php endif; ?>
    </div>

    <!-- Isi Berita -->
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-2">
        Isi Berita
        <span class="text-red-500">*</span>
      </label>
      <div class="border border-gray-300 rounded-lg overflow-hidden">
        <div id="editor" style="height: 300px;"><?= $berita['isi'] ?></div>
      </div>
      <input type="hidden" name="isi" id="isi" required>
      <?php if(isset($validation) && $validation->hasError('isi')): ?>
        <p class="text-red-600 text-sm mt-1"><?= $validation->getError('isi') ?></p>
      <?php endif; ?>
    </div>

    <!-- Upload Gambar -->
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Berita</label>
      
      <!-- Current Image Preview -->
      <?php if (!empty($berita['gambar'])): ?>
      <div class="mb-4 p-4 bg-gray-50 rounded-lg">
        <p class="text-sm font-medium text-gray-700 mb-2">Gambar Saat Ini:</p>
        <div class="flex items-center space-x-4">
          <img src="<?= base_url('uploads/berita/' . $berita['gambar']) ?>" 
               alt="Gambar Berita" 
               class="w-32 h-32 object-cover rounded-lg shadow-sm border">
          <div class="text-sm text-gray-600">
            <p class="font-medium"><?= esc($berita['gambar']) ?></p>
            <p class="text-xs mt-1">Kosongkan jika tidak ingin mengubah gambar</p>
          </div>
        </div>
      </div>
      <?php endif; ?>

      <!-- File Upload -->
      <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-primary transition-colors">
        <div class="flex flex-col items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
          </svg>
          <p class="text-sm text-gray-600 mb-2">Klik untuk upload gambar baru atau drag & drop</p>
          <p class="text-xs text-gray-500 mb-3">Format: JPG, PNG, GIF (Maks. 2MB)</p>
          <input type="file" name="gambar" accept="image/*" 
            class="w-full max-w-xs mx-auto file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-purple-800">
        </div>
      </div>
      <?php if(isset($validation) && $validation->hasError('gambar')): ?>
        <p class="text-red-600 text-sm mt-1"><?= $validation->getError('gambar') ?></p>
      <?php endif; ?>
    </div>

    <!-- Action Buttons -->
    <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
      <a href="<?= base_url('admin/berita') ?>" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors font-medium">
        Batal
      </a>
      <button type="submit" class="btn-primary px-6 py-2 rounded-lg font-medium hover:bg-purple-800 transition-colors flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
        </svg>
        Update Berita
      </button>
    </div>
  </form>
</div>

<!-- Current Data Preview -->
<div class="mt-6 bg-gray-50 border border-gray-200 rounded-lg p-4 max-w-4xl">
  <div class="flex items-start">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
    <div>
      <h4 class="text-sm font-medium text-gray-800">Informasi Berita</h4>
      <div class="text-sm text-gray-700 mt-2 space-y-2">
        <div class="flex">
          <span class="font-medium w-20">Dibuat:</span>
          <span><?= date('d M Y H:i', strtotime($berita['created_at'])) ?></span>
        </div>
        <?php if(isset($berita['updated_at']) && $berita['updated_at'] != $berita['created_at']): ?>
        <div class="flex">
          <span class="font-medium w-20">Diupdate:</span>
          <span><?= date('d M Y H:i', strtotime($berita['updated_at'])) ?></span>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<!-- Quill.js -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<script>
  // Initialize Quill editor with existing content
  const quill = new Quill('#editor', {
    theme: 'snow',
    modules: {
      toolbar: [
        [{ 'header': [1, 2, 3, false] }],
        ['bold', 'italic', 'underline'],
        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
        ['link', 'image'],
        ['clean']
      ]
    },
    placeholder: 'Tulis isi berita di sini...'
  });

  // Set existing content to Quill editor
  const existingContent = `<?= $berita['isi'] ?>`;
  quill.root.innerHTML = existingContent;

  // Handle form submission
  const form = document.querySelector('form');
  form.onsubmit = function() {
    const content = quill.root.innerHTML;
    document.querySelector('#isi').value = content;
    
    // Basic validation
    if (content === '<p><br></p>' || content === '') {
      alert('Isi berita tidak boleh kosong');
      return false;
    }
  };

  // File upload preview
  const fileInput = document.querySelector('input[type="file"]');
  fileInput.addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
      const fileName = document.createElement('p');
      fileName.className = 'text-sm text-green-600 mt-2';
      fileName.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
      </svg> File terpilih: ${file.name}`;
      
      // Remove existing file name if any
      const existingFileName = fileInput.parentNode.querySelector('.text-green-600');
      if (existingFileName) {
        existingFileName.remove();
      }
      
      fileInput.parentNode.appendChild(fileName);
    }
  });
</script>

<?= $this->endSection() ?>