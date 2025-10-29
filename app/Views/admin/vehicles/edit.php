<?= $this->extend('admin/layout/index') ?>
<?= $this->section('content') ?>

<h2 class="text-xl font-bold mb-4">Edit Kendaraan</h2>

<form action="/admin/vehicles/update/<?= $vehicle['id_vehicle'] ?>" method="post" class="space-y-4 max-w-lg">
  <?= csrf_field() ?>

  <div>
    <label class="block text-sm">Pemilik (Opsional)</label>
    <select name="id_user" class="w-full border rounded px-3 py-2">
      <option value="">-- Pilih --</option>
      <?php foreach($users as $u): ?>
        <option value="<?= $u['id_user'] ?>" <?= $vehicle['id_user']==$u['id_user']?'selected':'' ?>>
          <?= esc($u['nama']) ?>
        </option>
      <?php endforeach; ?>
    </select>
  </div>

  <div>
    <label class="block text-sm">Plat Nomor</label>
    <input type="text" name="plat_nomor" value="<?= esc($vehicle['plat_nomor']) ?>" class="w-full border rounded px-3 py-2 uppercase" required>
  </div>

  <div>
    <label class="block text-sm">Jenis Kendaraan</label>
    <input type="text" name="jenis_kendaraan" value="<?= esc($vehicle['jenis_kendaraan']) ?>" class="w-full border rounded px-3 py-2" required>
  </div>

  <div>
    <label class="block text-sm">Merk</label>
    <input type="text" name="merk" value="<?= esc($vehicle['merk']) ?>" class="w-full border rounded px-3 py-2">
  </div>

  <div class="grid grid-cols-2 gap-4">
    <div>
      <label class="block text-sm">Tahun Pembuatan</label>
      <input type="number" name="tahun_pembuatan" value="<?= esc($vehicle['tahun_pembuatan']) ?>" class="w-full border rounded px-3 py-2">
    </div>
    <div>
      <label class="block text-sm">Warna</label>
      <input type="text" name="warna" value="<?= esc($vehicle['warna']) ?>" class="w-full border rounded px-3 py-2">
    </div>
  </div>

  <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
  <a href="/admin/vehicles" class="text-gray-600 ml-3">Batal</a>
</form>

<?= $this->endSection() ?>
s