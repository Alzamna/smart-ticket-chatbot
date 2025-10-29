<?= $this->extend('fe/layouts/index') ?>
<?= $this->section('content') ?>

<h2 class="text-2xl font-bold mb-6 text-center text-blue-700">Hasil Pencarian Status Uji KIR</h2>

<?php if ($ticket): ?>
<div class="bg-white p-6 rounded shadow max-w-2xl mx-auto">
  <p><strong>Nama Pemilik:</strong> <?= esc($ticket['nama']) ?></p>
  <p><strong>Plat Kendaraan:</strong> <?= esc($ticket['plat_nomor']) ?></p>
  <p><strong>Jenis Kendaraan:</strong> <?= esc($ticket['jenis_kendaraan']) ?></p>
  <p><strong>Nomor Tiket:</strong> <?= esc($ticket['nomor_tiket']) ?></p>
  <p><strong>Tanggal Pengujian:</strong> <?= esc($ticket['tanggal_pengajuan']) ?></p>
  <p><strong>Status:</strong>
    <span class="font-semibold <?= $ticket['status']=='Selesai'?'text-green-600':'text-yellow-600' ?>">
      <?= esc($ticket['status']) ?>
    </span>
  </p>
</div>
<?php else: ?>
  <p class="text-center text-gray-600">❌ Data tidak ditemukan. Periksa kembali nomor tiket atau plat kendaraan Anda.</p>
<?php endif; ?>

<div class="text-center mt-6">
  <a href="/cek-status" class="text-blue-600 hover:underline">🔙 Kembali ke Halaman Cek Status</a>
</div>

<?= $this->endSection() ?>
