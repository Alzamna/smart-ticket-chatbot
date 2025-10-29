<?= $this->extend('fe/layouts/index') ?>
<?= $this->section('content') ?>

<h2 class="text-2xl font-bold mb-6 text-center text-blue-700">Informasi Layanan Uji KIR</h2>

<div class="max-w-3xl mx-auto bg-white p-6 rounded shadow space-y-4">
  <p><strong>📋 Syarat Uji KIR:</strong></p>
  <ul class="list-disc ml-6 text-gray-700 text-sm">
    <li>Fotokopi STNK dan BPKB kendaraan</li>
    <li>Fotokopi KTP pemilik</li>
    <li>Surat permohonan uji kendaraan bermotor</li>
  </ul>

  <p><strong>💰 Biaya Layanan:</strong></p>
  <?php if (!empty($services)): ?>
  <ul class="list-disc ml-6 text-gray-700 text-sm">
    <?php foreach($services as $s): ?>
      <li><?= esc($s['nama_layanan']) ?> — Rp <?= number_format($s['biaya'],0,',','.') ?></li>
    <?php endforeach; ?>
  </ul>
  <?php else: ?>
    <p class="text-gray-600 text-sm">Data biaya layanan belum tersedia.</p>
  <?php endif; ?>

  <p><strong>🕒 Jam Operasional:</strong> Senin – Jumat, pukul 08.00 – 15.00 WIB</p>
  <p><strong>📍 Lokasi UPTD Pengujian Kendaraan Bermotor:</strong><br>
     Jl. Raya Perhubungan No. 45, Kota Madiun</p>
  <p><strong>☎️ Kontak:</strong> (0351) 123456 / dishub@madiunkota.go.id</p>
</div>

<?= $this->endSection() ?>
