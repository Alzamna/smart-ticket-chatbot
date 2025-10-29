<?= $this->extend('fe/layouts/index') ?>
<?= $this->section('content') ?>

<h2 class="text-2xl font-bold mb-6 text-center text-blue-700">Form Pendaftaran Uji KIR</h2>

<form action="/pendaftaran/save" method="post" enctype="multipart/form-data" class="max-w-2xl mx-auto bg-white p-6 rounded shadow space-y-4">
  <?= csrf_field() ?>

  <div>
    <label class="block text-sm font-semibold">Nama Pemilik</label>
    <input type="text" name="nama" required class="w-full border rounded px-3 py-2">
  </div>

  <div>
    <label class="block text-sm font-semibold">Nomor Plat Kendaraan</label>
    <input type="text" name="plat_nomor" required class="w-full border rounded px-3 py-2 uppercase">
  </div>

  <div>
    <label class="block text-sm font-semibold">Jenis Kendaraan</label>
    <input type="text" name="jenis_kendaraan" required class="w-full border rounded px-3 py-2">
  </div>

  <div>
    <label class="block text-sm font-semibold">Nomor Telepon / Email</label>
    <input type="text" name="kontak" class="w-full border rounded px-3 py-2">
  </div>

  <div>
    <label class="block text-sm font-semibold">Tanggal Pengujian yang Diinginkan</label>
    <input type="date" name="tanggal" required class="w-full border rounded px-3 py-2">
  </div>

  <div>
    <label class="block text-sm font-semibold">Upload Dokumen (Opsional)</label>
    <input type="file" name="dokumen" class="w-full border rounded px-3 py-2">
  </div>

  <div class="text-center">
    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Daftar Sekarang</button>
  </div>
</form>

<?= $this->endSection() ?>
