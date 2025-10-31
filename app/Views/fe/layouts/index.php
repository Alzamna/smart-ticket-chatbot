<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= esc($title ?? 'Uji KIR Digital - Dinas Perhubungan') ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary-color: #3f1871; /* Ungu */
      --secondary-color: #fcdb00; /* Kuning */
    }
    
    .font-\[Poppins\] {
      font-family: 'Poppins', sans-serif;
    }
    
    .gradient-primary {
      background-color: var(--primary-color);
    }
    
    .btn-primary {
      background-color: var(--primary-color);
      color: white;
    }
    
    .btn-primary:hover {
      background-color: #321256;
    }
    
    .btn-secondary {
      background-color: var(--secondary-color);
      color: #3f1871;
      font-weight: 600;
    }
    
    .btn-secondary:hover {
      background-color: #e6c500;
    }
    
    .text-primary {
      color: var(--primary-color);
    }
    
    .border-primary {
      border-color: var(--primary-color);
    }
  </style>
</head>
<body class="bg-gray-50 flex flex-col min-h-screen font-[Poppins]">

  <!-- Navbar -->
  <nav class="gradient-primary text-white shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center h-16">
        <!-- Logo & Brand -->
        <div class="flex items-center space-x-3">
          <div class="w-16 h-16 flex items-center justify-center">
            <img src="<?= base_url('images/logo.png') ?>" alt="Logo Dinas Perhubungan" class="w-10 h-10 object-contain">
          </div>
          <div>
            <a href="/" class="text-xl font-bold tracking-wide">KIR Digital</a>
            <p class="text-xs text-purple-200">Dinas Perhubungan Kota</p>
          </div>
        </div>

        <!-- Navigation Menu -->
        <div class="hidden md:flex space-x-8 text-sm font-medium">
          <a href="/" class="hover:text-yellow-300 transition-colors duration-200 flex items-center">
            Beranda
          </a>
          <a href="/pendaftaran" class="hover:text-yellow-300 transition-colors duration-200 flex items-center">
            Daftar Uji KIR
          </a>
          <a href="/cek-status" class="hover:text-yellow-300 transition-colors duration-200 flex items-center">
            Cek Status
          </a>
          <a href="/informasi" class="hover:text-yellow-300 transition-colors duration-200 flex items-center">
            Informasi
          </a>
          <a href="/berita" class="hover:text-yellow-300 transition-colors duration-200 flex items-center">
            Berita
          </a>
          <a href="/pengaduan" class="hover:text-yellow-300 transition-colors duration-200 flex items-center">
            Pengaduan
          </a>
        </div>

        <!-- Mobile menu button -->
        <div class="md:hidden">
          <button type="button" class="text-white hover:text-yellow-300">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
        </div>
      </div>
    </div>
  </nav>

  <!-- Konten -->
  <main class="flex-grow py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <!-- Flash messages -->
      <?php if(session()->getFlashdata('success')): ?>
        <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 rounded mb-6 shadow-sm">
          <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
            <span class="font-medium">Berhasil!</span>
          </div>
          <p class="mt-1"><?= session('success') ?></p>
        </div>
      <?php elseif(session()->getFlashdata('error')): ?>
        <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded mb-6 shadow-sm">
          <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
            </svg>
            <span class="font-medium">Terjadi Kesalahan!</span>
          </div>
          <p class="mt-1"><?= session('error') ?></p>
        </div>
      <?php endif; ?>

      <?= $this->renderSection('content') ?>
    </div>
  </main>

  <!-- Footer -->
  <footer class="gradient-primary text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Brand Section -->
        <div class="space-y-4">
          <div class="flex items-center space-x-3">
            <div class="w-12 h-12 flex items-center justify-center">
              <img src="<?= base_url('images/logo.png') ?>" alt="Logo Dinas Perhubungan" class="w-10 h-10 object-contain">
            </div>
            <div>
              <h3 class="text-lg font-bold">KIR Digital</h3>
              <p class="text-sm text-purple-200">Dinas Perhubungan Kota</p>
            </div>
          </div>
          <p class="text-sm text-purple-100">
            Layanan Uji KIR digital untuk kemudahan dan transparansi pelayanan publik.
          </p>
        </div>

        <!-- Quick Links -->
        <div class="space-y-4">
          <h4 class="font-semibold text-yellow-300">Tautan Cepat</h4>
          <div class="space-y-2">
            <a href="/pendaftaran" class="block text-sm text-purple-100 hover:text-yellow-300 transition-colors flex items-center">
              Pendaftaran Uji KIR
            </a>
            <a href="/cek-status" class="block text-sm text-purple-100 hover:text-yellow-300 transition-colors flex items-center">
              Cek Status Pengajuan
            </a>
            <a href="/informasi" class="block text-sm text-purple-100 hover:text-yellow-300 transition-colors flex items-center">
              Informasi Layanan
            </a>
            <a href="/pengaduan" class="block text-sm text-purple-100 hover:text-yellow-300 transition-colors flex items-center">
              Layanan Pengaduan
            </a>
          </div>
        </div>

        <!-- Contact Info -->
        <div class="space-y-4">
          <h4 class="font-semibold text-yellow-300">Kontak</h4>
          <div class="space-y-3 text-sm text-purple-100">
            <div class="flex items-center">
              <span>Senin - Jumat: 08:00 - 16:00</span>
            </div>
            <div class="flex items-center">
              <span>(021) 1234-5678</span>
            </div>
            <div class="flex items-center">
              <span>kir@dishub.kota.go.id</span>
            </div>
            <div class="flex items-center">
              <span>Jl. Contoh No. 123, Kota</span>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Bottom Bar -->
      <div class="border-t border-purple-500 mt-8 pt-6 text-center">
        <p class="text-sm text-purple-200">
          &copy; <?= date('Y') ?> Dinas Perhubungan Kota — Layanan Uji KIR Digital
        </p>
      </div>
    </div>
  </footer>

</body>
</html>