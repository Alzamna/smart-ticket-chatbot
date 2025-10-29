<?= $this->extend('admin/layout/index') ?>
<?= $this->section('content') ?>

<h2 class="text-xl font-bold mb-4">Tindak Lanjut Keluhan</h2>

<div class="border rounded p-4 bg-white shadow max-w-2xl">
  <p><strong>Nama:</strong> <?= esc($complaint['nama']) ?></p>
  <p><strong>Telepon:</strong> <?= esc($complaint['telepon']) ?></p>
  <p><strong>Jenis Keluhan:</strong> <?= esc($complaint['jenis_keluhan']) ?></p>
  <p><strong>Isi Keluhan:</strong><br><?= nl2br(esc($complaint['isi_keluhan'])) ?></p>

  <?php if ($complaint['bukti_foto']): ?>
    <p class="mt-2"><strong>Bukti Foto:</strong><br>
      <img src="/uploads/complaints/<?= esc($complaint['bukti_foto']) ?>" class="w-48 rounded shadow">
    </p>
  <?php endif; ?>

  <form action="/admin/complaints/update/<?= $complaint['id_complaint'] ?>" method="post" class="mt-4 space-y-3">
    <?= csrf_field() ?>
    <div>
      <label class="block text-sm font-semibold">Ubah Status</label>
      <select name="status" class="w-full border rounded px-3 py-2">
        <?php foreach(['Menunggu', 'Diproses', 'Selesai', 'Ditolak'] as $s): ?>
          <option value="<?= $s ?>" <?= $complaint['status']==$s?'selected':'' ?>><?= $s ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan Perubahan</button>
    <a href="/admin/complaints" class="text-gray-600 ml-3">Kembali</a>
  </form>
</div>

<?= $this->endSection() ?>
