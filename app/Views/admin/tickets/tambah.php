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
    <input type="text" name="jenis_layanan" class="w-full border rounded px-3 py-2" required>
  </div>

  <div>
    <label class="block text-sm">Catatan</label>
    <textarea name="catatan" class="w-full border rounded px-3 py-2"></textarea>
  </div>

  <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
  <a href="/admin/tickets" class="text-gray-600 ml-3">Batal</a>
</form>

<?= $this->endSection() ?>
