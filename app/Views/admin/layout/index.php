<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= esc($title ?? 'Admin Panel Dinas Perhubungan') ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    /* Warna kustom untuk Dinas Perhubungan */
    :root {
      --primary-color: #3f1871; /* Ungu */
      --secondary-color: #fcdb00; /* Kuning */
      --accent-color: #e11d48; /* Merah untuk aksen */
    }

    .font-\[Poppins\] {
      font-family: 'Poppins', sans-serif;
    }
    
    .gradient-header {
      background: linear-gradient(135deg, var(--primary-color) 0%, #5e2a9c 100%);
    }
    
    .active-nav {
      background-color: rgba(252, 219, 0, 0.15);
      border-left: 4px solid var(--secondary-color);
      color: var(--primary-color);
      font-weight: 600;
    }
    
    .hover-nav:hover {
      background-color: rgba(63, 24, 113, 0.08);
      border-left: 4px solid var(--primary-color);
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
    
    .border-accent {
      border-color: var(--secondary-color);
    }
    
    .text-primary {
      color: var(--primary-color);
    }
    
    .bg-primary {
      background-color: var(--primary-color);
    }
    
    .bg-secondary {
      background-color: var(--secondary-color);
    }
  </style>
</head>
<body class="bg-gray-50 flex font-[Poppins]">

  <!-- Sidebar -->
  <aside class="w-64 bg-white text-slate-800 min-h-screen shadow-lg">
    <div class="p-4 text-center gradient-header text-white">
      <div class="flex items-center justify-center mb-2">
        <div class="w-25 h-25 bg-white rounded-full flex items-center justify-center mb-2 p-1">
          <img src="<?= base_url('images/logo.png') ?>" alt="Logo Dinas Perhubungan" class="w-20 h-20 object-contain">
        </div>
      </div>
      <h1 class="text-xl font-bold">Dishub KIR</h1>
      <p class="text-sm text-purple-100"><?= session('username') ?></p>
    </div>
    <nav class="mt-4 space-y-1">
      <a href="/admin/dashboard" class="flex items-center px-4 py-3 hover-nav <?= url_is('admin/dashboard')?'active-nav':'' ?>">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
        </svg>
        Dashboard
      </a>
      <a href="/admin/tickets" class="flex items-center px-4 py-3 hover-nav <?= url_is('admin/tickets*')?'active-nav':'' ?>">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
        </svg>
        Tiket
      </a>
      <a href="/admin/services" class="flex items-center px-4 py-3 hover-nav <?= url_is('admin/services*')?'active-nav':'' ?>">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
        </svg>
        Layanan
      </a>
      <a href="/admin/vehicles" class="flex items-center px-4 py-3 hover-nav <?= url_is('admin/vehicles*')?'active-nav':'' ?>">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
        </svg>
        Kendaraan
      </a>
      <a href="/admin/berita" class="flex items-center px-4 py-3 hover-nav <?= url_is('admin/berita*')?'active-nav':'' ?>">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
        </svg>
        Berita
      </a>
      <a href="/admin/complaints" class="flex items-center px-4 py-3 hover-nav <?= url_is('admin/complaints*')?'active-nav':'' ?>">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
        </svg>
        Keluhan
      </a>
      <a href="/b0/logout" class="flex items-center px-4 py-3 mt-4 border-t border-gray-200 text-red-600 hover:bg-red-50">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
        </svg>
        Logout
      </a>
    </nav>
  </aside>

  <!-- Main Content -->
  <div class="flex-1 flex flex-col">
    <!-- Simple Header -->
    <header class="bg-white shadow-sm border-b border-gray-200">
      <div class="flex items-center justify-between px-6 py-4">
        <div class="flex items-center space-x-4">
          <h1 class="text-xl font-bold text-primary"><?= esc($title ?? 'Admin Panel') ?></h1>
          <?php if(isset($subtitle)): ?>
            <span class="text-gray-400">/</span>
            <span class="text-gray-600"><?= esc($subtitle) ?></span>
          <?php endif; ?>
        </div>
        
        <div class="flex items-center space-x-4">
          <!-- Notifications -->
          <button class="p-2 text-gray-500 hover:text-primary hover:bg-gray-100 rounded-full transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
          </button>
          
          <!-- User Profile -->
          <div class="flex items-center space-x-3">
            <div class="w-8 h-8 bg-primary rounded-full flex items-center justify-center text-white text-sm font-semibold">
              <?= strtoupper(substr(session('username'), 0, 1)) ?>
            </div>
            <div class="hidden md:block">
              <p class="text-sm font-medium text-gray-900"><?= session('username') ?></p>
              <p class="text-xs text-gray-500">Administrator</p>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content Area -->
    <main class="flex-1 p-6 font-[Poppins] overflow-auto">
      <!-- Flash messages -->
      <?php if(session()->getFlashdata('success')): ?>
        <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 rounded mb-4 shadow-sm">
          <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
            <span class="font-medium">Berhasil!</span>
          </div>
          <p class="mt-1"><?= session('success') ?></p>
        </div>
      <?php elseif(session()->getFlashdata('error')): ?>
        <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded mb-4 shadow-sm">
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
    </main>
  </div>

</body>
</html>