<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= esc($title ?? 'Admin Panel Dinas Perhubungan') ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Warna kustom untuk Dinas Perhubungan */
    :root {
      --primary-color: #3f1871; /* Ungu */
      --secondary-color: #fcdb00; /* Kuning */
      --accent-color: #e11d48; /* Merah untuk aksen */
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
<body class="bg-gray-50 flex">

  <!-- Sidebar -->
  <aside class="w-64 bg-white text-slate-800 min-h-screen shadow-lg">
    <div class="p-4 text-center gradient-header text-white">
      <div class="flex items-center justify-center mb-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
        </svg>
        <h1 class="text-xl font-bold">Dishub KIR</h1>
      </div>
      <p class="text-sm text-purple-100"><?= session('username') ?></p>
      <p class="text-xs mt-1 text-purple-200">Admin Panel</p>
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
  <main class="flex-1 p-6">
    <?= $this->renderSection('content') ?>
  </main>

</body>
</html>