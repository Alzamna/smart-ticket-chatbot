<?= $this->extend('fe/layouts/index') ?>
<?= $this->section('content') ?>

<h2 class="text-2xl font-bold mb-4 text-center">🗣️ Form Pengaduan</h2>

<?php if(session()->getFlashdata('success')): ?>
  <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
    <?= session()->getFlashdata('success') ?>
  </div>
<?php endif; ?>

<form action="/pengaduan/save" method="post" enctype="multipart/form-data" class="space-y-4 max-w-xl mx-auto bg-white p-6 rounded shadow">
  <?= csrf_field() ?>

  <div>
    <label class="block text-sm font-semibold">Nama Lengkap</label>
    <input type="text" name="nama" required class="w-full border rounded px-3 py-2">
  </div>

  <div>
    <label class="block text-sm font-semibold">Nomor Telepon</label>
    <input type="text" name="telepon" class="w-full border rounded px-3 py-2">
  </div>

  <div>
    <label class="block text-sm font-semibold">Jenis Keluhan</label>
    <input type="text" name="jenis_keluhan" required class="w-full border rounded px-3 py-2">
  </div>

  <div>
    <label class="block text-sm font-semibold">Isi Keluhan</label>
    <textarea name="isi_keluhan" rows="4" required class="w-full border rounded px-3 py-2"></textarea>
  </div>

  <div>
    <label class="block text-sm font-semibold">Upload Bukti (opsional)</label>
    <input type="file" name="bukti_foto" accept="image/*" class="w-full border rounded px-3 py-2">
  </div>

  <div class="text-center">
    <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">Kirim</button>
  </div>
</form>

<?= $this->endSection() ?>
