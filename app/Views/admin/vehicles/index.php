<?= $this->extend('admin/layout/index') ?>
<?= $this->section('content') ?>

<div class="flex justify-between mb-4">
  <h2 class="text-xl font-bold">Daftar Kendaraan</h2>
  <a href="/admin/vehicles/add" class="bg-blue-600 text-white px-4 py-2 rounded">+ Tambah Kendaraan</a>
</div>

<table class="table-auto w-full border-collapse border">
  <thead class="bg-gray-200">
    <tr>
      <th class="border p-2">No</th>
      <th class="border p-2">Plat Nomor</th>
      <th class="border p-2">Jenis</th>
      <th class="border p-2">Merk</th>
      <th class="border p-2">Tahun</th>
      <th class="border p-2">Warna</th>
      <th class="border p-2">Pemilik</th>
      <th class="border p-2">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $no=1; foreach($vehicles as $v): ?>
    <tr>
      <td class="border p-2 text-center"><?= $no++ ?></td>
      <td class="border p-2"><?= esc($v['plat_nomor']) ?></td>
      <td class="border p-2"><?= esc($v['jenis_kendaraan']) ?></td>
      <td class="border p-2"><?= esc($v['merk']) ?></td>
      <td class="border p-2 text-center"><?= esc($v['tahun_pembuatan']) ?></td>
      <td class="border p-2"><?= esc($v['warna']) ?></td>
      <td class="border p-2"><?= esc($v['nama']) ?></td>
      <td class="border p-2 text-center">
        <a href="/admin/vehicles/edit/<?= $v['id_vehicle'] ?>" class="text-blue-600">Edit</a> |
        <a href="/admin/vehicles/delete/<?= $v['id_vehicle'] ?>" class="text-red-600" onclick="return confirm('Yakin hapus kendaraan ini?')">Hapus</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?= $this->endSection() ?>
