<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= esc($title ?? 'Uji KIR Digital') ?></title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">

  <!-- Navbar -->
  <nav class="bg-blue-700 text-white shadow-lg">
    <div class="max-w-6xl mx-auto px-4">
      <div class="flex justify-between items-center h-16">
        <a href="/" class="text-xl font-bold tracking-wide">Uji KIR Digital</a>
        <div class="flex space-x-6 text-sm font-medium">
          <a href="/" class="hover:text-yellow-300">Beranda</a>
          <a href="/pendaftaran" class="hover:text-yellow-300">Daftar Uji KIR</a>
          <a href="/cek-status" class="hover:text-yellow-300">Cek Status</a>
          <a href="/informasi" class="hover:text-yellow-300">Informasi</a>
          <a href="/pengaduan" class="hover:text-yellow-300">Pengaduan</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Konten -->
  <main class="flex-grow py-10">
    <div class="max-w-6xl mx-auto px-4">
      <?= $this->renderSection('content') ?>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-blue-700 text-white text-center py-4 mt-10">
    <p class="text-sm">&copy; <?= date('Y') ?> Dinas Perhubungan Kota — Layanan Uji KIR Digital.</p>
    <p class="text-xs mt-1 text-blue-200">Dibangun untuk kemudahan pelayanan publik 🚗</p>
  </footer>

</body>
</html>
