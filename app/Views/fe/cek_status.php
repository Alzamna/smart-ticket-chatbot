<?= $this->extend('fe/layouts/index') ?>
<?= $this->section('content') ?>

<h2 class="text-2xl font-bold mb-6 text-center text-blue-700">Cek Status Uji KIR Kendaraan</h2>

<form action="/cek-status" method="post" class="max-w-md mx-auto bg-white p-6 rounded shadow space-y-4">
  <?= csrf_field() ?>
  <div>
    <label class="block text-sm font-semibold">Nomor Tiket / Plat Kendaraan</label>
    <input type="text" name="keyword" required class="w-full border rounded px-3 py-2 text-center">
  </div>
  <div class="text-center">
    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Cari</button>
  </div>
</form>

<?= $this->endSection() ?>
