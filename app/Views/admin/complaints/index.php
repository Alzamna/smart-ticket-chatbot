<?= $this->extend('admin/layout/index') ?>
<?= $this->section('content') ?>

<div class="flex justify-between mb-4">
  <h2 class="text-xl font-bold">Daftar Keluhan Masyarakat</h2>
</div>

<table class="table-auto w-full border-collapse border">
  <thead class="bg-gray-200">
    <tr>
      <th class="border p-2">No</th>
      <th class="border p-2">Nama</th>
      <th class="border p-2">Telepon</th>
      <th class="border p-2">Jenis Keluhan</th>
      <th class="border p-2">Isi Keluhan</th>
      <th class="border p-2">Status</th>
      <th class="border p-2">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $no=1; foreach($complaints as $c): ?>
    <tr>
      <td class="border p-2 text-center"><?= $no++ ?></td>
      <td class="border p-2"><?= esc($c['nama']) ?></td>
      <td class="border p-2"><?= esc($c['telepon']) ?></td>
      <td class="border p-2"><?= esc($c['jenis_keluhan']) ?></td>
      <td class="border p-2"><?= esc($c['isi_keluhan']) ?></td>
      <td class="border p-2 text-center">
        <span class="px-2 py-1 rounded <?= $c['status']=='Selesai'?'bg-green-200':'bg-yellow-200' ?>">
          <?= esc($c['status']) ?>
        </span>
      </td>
      <td class="border p-2 text-center">
        <a href="/admin/complaints/edit/<?= $c['id_complaint'] ?>" class="text-blue-600">Tindak Lanjut</a> |
        <a href="/admin/complaints/delete/<?= $c['id_complaint'] ?>" class="text-red-600" onclick="return confirm('Hapus keluhan ini?')">Hapus</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?= $this->endSection() ?>
