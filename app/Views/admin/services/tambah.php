<?= $this->extend('admin/layout/index') ?>
<?= $this->section('content') ?>

<h2 class="text-xl font-bold mb-4">Edit Layanan</h2>

<form action="/admin/services/update/<?= $service['id_service'] ?>" method="post" class="space-y-4 max-w-lg">
  <?= csrf_field() ?>

  <div>
    <label class="block text-sm">Nama Layanan</label>
    <input type="text" name="nama_layanan" value="<?= esc($service['nama_layanan']) ?>" required class="w-full border rounded px-3 py-2">
  </div>

  <div>
    <label class="block text-sm">Deskripsi</label>
    <textarea name="deskripsi" class="w-full border rounded px-3 py-2"><?= esc($service['deskripsi']) ?></textarea>
  </div>

  <div>
    <label class="block text-sm">Biaya</label>
    <input type="number" name="biaya" step="1000" value="<?= esc($service['biaya']) ?>" class="w-full border rounded px-3 py-2">
  </div>

  <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
  <a href="/admin/services" class="text-gray-600 ml-3">Batal</a>
</form>

<?= $this->endSection() ?>
