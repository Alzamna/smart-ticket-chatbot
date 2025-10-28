<?= $this->extend('admin/layout/index') ?>
<?= $this->section('content') ?>
<h2 class="text-xl font-bold mb-4">Data Tiket</h2>
<table class="table-auto w-full border-collapse border">
  <thead>
    <tr class="bg-gray-200">
      <th class="p-2 border">No</th>
      <th class="p-2 border">Pemilik</th>
      <th class="p-2 border">Layanan</th>
      <th class="p-2 border">Nomor</th>
      <th class="p-2 border">Status</th>
      <th class="p-2 border">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $no=1; foreach($tickets as $row): ?>
    <tr>
      <td class="border p-2"><?= $no++ ?></td>
      <td class="border p-2"><?= esc($row['nama']) ?></td>
      <td class="border p-2"><?= esc($row['jenis_layanan']) ?></td>
      <td class="border p-2"><?= esc($row['nomor_tiket']) ?></td>
      <td class="border p-2"><?= esc($row['status']) ?></td>
      <td class="border p-2">
        <form method="post" action="/admin/tickets/update/<?= $row['id_ticket'] ?>" class="inline">
          <?= csrf_field() ?>
          <select name="status" onchange="this.form.submit()" class="border rounded">
            <?php foreach(['Menunggu','Verifikasi','Ditolak','Selesai'] as $s): ?>
              <option value="<?= $s ?>" <?= $s==$row['status']?'selected':'' ?>><?= $s ?></option>
            <?php endforeach ?>
          </select>
        </form>
        <a href="/admin/tickets/delete/<?= $row['id_ticket'] ?>" class="text-red-600 ml-2" onclick="return confirm('Hapus?')">Hapus</a>
      </td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>
<?= $this->endSection() ?>
