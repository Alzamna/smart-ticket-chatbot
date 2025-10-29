<?= $this->extend('admin/layout/index') ?>
<?= $this->section('content') ?>

<div class="flex justify-between mb-4">
  <h2 class="text-xl font-bold">Daftar Tiket</h2>
  <a href="/admin/tickets/add" class="bg-blue-600 text-white px-4 py-2 rounded">+ Tambah Tiket</a>
</div>

<table class="table-auto w-full border-collapse border">
  <thead class="bg-gray-200">
    <tr>
      <th class="border p-2">No</th>
      <th class="border p-2">Pemilik</th>
      <th class="border p-2">Layanan</th>
      <th class="border p-2">Nomor Tiket</th>
      <th class="border p-2">Status</th>
      <th class="border p-2">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $no=1; foreach($tickets as $t): ?>
    <tr>
      <td class="border p-2 text-center"><?= $no++ ?></td>
      <td class="border p-2"><?= esc($t['owner_name']) ?></td>
      <td class="border p-2"><?= esc($t['jenis_layanan']) ?></td>
      <td class="border p-2"><?= esc($t['nomor_tiket']) ?></td>
      <td class="border p-2"><?= esc($t['status']) ?></td>
      <td class="border p-2 text-center">
        <a href="/admin/tickets/edit/<?= $t['id_ticket'] ?>" class="text-blue-600">Edit</a> |
        <a href="/admin/tickets/delete/<?= $t['id_ticket'] ?>" class="text-red-600" onclick="return confirm('Yakin hapus tiket ini?')">Hapus</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?= $this->endSection() ?>
