<?= $this->extend('fe/layouts/index') ?>
<?= $this->section('content') ?>

<div class="text-center py-16">
  <h1 class="text-3xl font-bold mb-4 text-blue-700">Selamat Datang di Portal Uji KIR Digital 🚗</h1>
  <p class="text-gray-700 max-w-2xl mx-auto mb-6">
    Layanan digital resmi untuk pendaftaran dan pengecekan Uji KIR kendaraan bermotor.
    Kini lebih mudah, cepat, dan transparan!
  </p>

  <div class="space-x-3">
    <a href="/pendaftaran" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Daftar Uji KIR</a>
    <a href="/cek-status" class="bg-gray-200 text-blue-700 px-6 py-2 rounded hover:bg-gray-300">Cek Status</a>
  </div>

  <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-6 text-left max-w-4xl mx-auto">
    <div class="bg-white p-6 rounded shadow">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Pendaftaran Online</h3>
      <p class="text-gray-600 text-sm">Daftarkan kendaraan Anda untuk uji KIR tanpa harus datang ke kantor Dishub.</p>
    </div>
    <div class="bg-white p-6 rounded shadow">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Transparan & Akurat</h3>
      <p class="text-gray-600 text-sm">Cek status dan hasil uji KIR kendaraan Anda secara real-time.</p>
    </div>
    <div class="bg-white p-6 rounded shadow">
      <h3 class="text-lg font-semibold text-blue-600 mb-2">Pelayanan Terpadu</h3>
      <p class="text-gray-600 text-sm">Laporkan kendala atau keluhan Anda langsung dari website ini.</p>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
