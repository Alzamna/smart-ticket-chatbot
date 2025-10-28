<?= $this->extend('admin/layout/index') ?>
<?= $this->section('content') ?>

<div class="flex justify-between mb-4">
  <h2 class="text-xl font-bold">Daftar Layanan</h2>
  <a href="/admin/services/add" class="bg-blue-600 text-white px-4 py-2 rounded">+ Tambah Layanan</a>
</div>

<table class="table-auto w-full border-collapse border">
  <thead class="bg-gray-200">
    <tr>
      <th class="border p-2">No</th>
      <th class="border p-2">Nama Layanan</th>
      <th class="border p-2">Deskripsi</th>
      <th class="border p-2">Biaya</th>
      <th class="border p-2">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $no=1; foreach($services as $s): ?>
    <tr>
      <td class="border p-2 text-center"><?= $no++ ?></td>
      <td class="border p-2"><?= esc($s['nama_layanan']) ?></td>
      <td class="border p-2"><?= esc($s['deskripsi']) ?></td>
      <td class="border p-2 text-right">Rp <?= number_format($s['biaya'],0,',','.') ?></td>
      <td class="border p-2 text-center">
        <a href="/admin/services/edit/<?= $s['id_service'] ?>" class="text-blue-600">Edit</a> |
        <a href="/admin/services/delete/<?= $s['id_service'] ?>" class="text-red-600" onclick="return confirm('Hapus layanan ini?')">Hapus</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?= $this->endSection() ?>
