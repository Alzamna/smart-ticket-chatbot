<?= $this->extend('admin/layout/index') ?>
<?= $this->section('content') ?>

<h2 class="text-xl font-bold mb-4">Tambah Tiket Baru</h2>

<form action="/admin/tickets/save" method="post" class="space-y-4 max-w-lg">
  <?= csrf_field() ?>

  <div>
    <label class="block text-sm">Pilih Pengguna</label>
    <select name="id_user" class="w-full border rounded px-3 py-2">
      <option value="">-- Pilih --</option>
      <?php foreach($users as $u): ?>
        <option value="<?= $u['id_user'] ?>"><?= esc($u['nama']) ?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <div>
    <label class="block text-sm">Jenis Layanan</label>
    <select name="jenis_layanan" class="w-full border rounded px-3 py-2">
      <option value="">-- Pilih Layanan --</option>
      <?php foreach((new \App\Models\ServiceModel())->findAll() as $s): ?>
        <option value="<?= esc($s['nama_layanan']) ?>"><?= esc($s['nama_layanan']) ?> (Rp <?= number_format($s['biaya'],0,',','.') ?>)</option>
      <?php endforeach; ?>
    </select>
  </div>

  <div>
    <label class="block text-sm">Pilih Kendaraan</label>
    <select name="id_vehicle" class="w-full border rounded px-3 py-2" required>
      <option value="">-- Pilih Kendaraan --</option>
      <?php foreach((new \App\Models\VehicleModel())->findAll() as $v): ?>
        <option value="<?= $v['id_vehicle'] ?>"><?= esc($v['plat_nomor']) ?> (<?= esc($v['jenis_kendaraan']) ?>)</option>
      <?php endforeach; ?>
    </select>
  </div>


  <div>
    <label class="block text-sm">Catatan</label>
    <textarea name="catatan" class="w-full border rounded px-3 py-2"></textarea>
  </div>

  <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
  <a href="/admin/tickets" class="text-gray-600 ml-3">Batal</a>
</form>

<?= $this->endSection() ?>
