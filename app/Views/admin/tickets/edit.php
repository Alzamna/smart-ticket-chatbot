<?= $this->extend('admin/layout/index') ?>
<?= $this->section('content') ?>

<h2 class="text-xl font-bold mb-4">Edit Tiket</h2>

<form action="/admin/tickets/update/<?= $ticket['id_ticket'] ?>" method="post" class="space-y-4 max-w-lg">
  <?= csrf_field() ?>

  <div>
    <label class="block text-sm">Pilih Pengguna</label>
    <select name="id_user" class="w-full border rounded px-3 py-2">
      <?php foreach($users as $u): ?>
        <option value="<?= $u['id_user'] ?>" <?= $u['id_user']==$ticket['id_user']?'selected':'' ?>>
          <?= esc($u['nama']) ?>
        </option>
      <?php endforeach; ?>
    </select>
  </div>

  <div>
    <label class="block text-sm">Jenis Layanan</label>
    <input type="text" name="jenis_layanan" value="<?= esc($ticket['jenis_layanan']) ?>" class="w-full border rounded px-3 py-2">
  </div>

  <div>
    <label class="block text-sm">Status</label>
    <select name="status" class="w-full border rounded px-3 py-2">
      <?php foreach(['Menunggu','Verifikasi','Ditolak','Selesai'] as $s): ?>
        <option value="<?= $s ?>" <?= $ticket['status']==$s?'selected':'' ?>><?= $s ?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <div>
    <label class="block text-sm">Catatan</label>
    <textarea name="catatan" class="w-full border rounded px-3 py-2"><?= esc($ticket['catatan']) ?></textarea>
  </div>

  <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
  <a href="/admin/tickets" class="text-gray-600 ml-3">Batal</a>
</form>

<?= $this->endSection() ?>
