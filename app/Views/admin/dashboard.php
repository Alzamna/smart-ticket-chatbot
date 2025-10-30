<?= $this->extend('admin/layout/index') ?>
<?= $this->section('content') ?>

<!-- Header Dashboard -->
<div class="flex justify-between items-center mb-6">
  <div>
    <h2 class="text-2xl font-bold text-primary">Dashboard</h2>
    <p class="text-gray-600 mt-1">Ringkasan aktivitas Uji KIR Dinas Perhubungan</p>
  </div>
  <div class="text-sm text-gray-500">
    <?= date('l, d F Y') ?>
  </div>
</div>

<!-- Statistik Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
  <!-- Total Tiket -->
  <div class="bg-white p-6 rounded-lg shadow-sm border-l-4 border-primary">
    <div class="flex justify-between items-start">
      <div>
        <h3 class="text-lg font-semibold text-primary">Total Tiket</h3>
        <p class="text-3xl font-bold mt-2 text-gray-900"><?= $total_tickets ?></p>
        <p class="text-sm text-gray-500 mt-1">Semua tiket</p>
      </div>
      <div class="bg-primary p-3 rounded-full">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
        </svg>
      </div>
    </div>
    <div class="mt-4 flex items-center text-sm text-green-600">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
      </svg>
      <span>+12% dari bulan lalu</span>
    </div>
  </div>

  <!-- Menunggu -->
  <div class="bg-white p-6 rounded-lg shadow-sm border-l-4 border-yellow-500">
    <div class="flex justify-between items-start">
      <div>
        <h3 class="text-lg font-semibold text-primary">Menunggu</h3>
        <p class="text-3xl font-bold mt-2 text-gray-900"><?= $waiting ?></p>
        <p class="text-sm text-gray-500 mt-1">Tiket pending</p>
      </div>
      <div class="bg-yellow-100 p-3 rounded-full">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
      </div>
    </div>
    <div class="mt-4 flex items-center text-sm text-yellow-600">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
      </svg>
      <span>+5% dari kemarin</span>
    </div>
  </div>

  <!-- Selesai -->
  <div class="bg-white p-6 rounded-lg shadow-sm border-l-4 border-green-500">
    <div class="flex justify-between items-start">
      <div>
        <h3 class="text-lg font-semibold text-primary">Selesai</h3>
        <p class="text-3xl font-bold mt-2 text-gray-900"><?= $finished ?></p>
        <p class="text-sm text-gray-500 mt-1">Tiket completed</p>
      </div>
      <div class="bg-green-100 p-3 rounded-full">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
      </div>
    </div>
    <div class="mt-4 flex items-center text-sm text-green-600">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
      </svg>
      <span>+18% dari bulan lalu</span>
    </div>
  </div>

  <!-- Total User -->
  <div class="bg-white p-6 rounded-lg shadow-sm border-l-4 border-purple-500">
    <div class="flex justify-between items-start">
      <div>
        <h3 class="text-lg font-semibold text-primary">Total User</h3>
        <p class="text-3xl font-bold mt-2 text-gray-900"><?= $total_users ?></p>
        <p class="text-sm text-gray-500 mt-1">Pengguna terdaftar</p>
      </div>
      <div class="bg-purple-100 p-3 rounded-full">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
        </svg>
      </div>
    </div>
    <div class="mt-4 flex items-center text-sm text-green-600">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
      </svg>
      <span>+8% dari bulan lalu</span>
    </div>
  </div>
</div>

<!-- Charts & Recent Activity Section -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
  <!-- Chart Area (Placeholder) -->
  <div class="bg-white p-6 rounded-lg shadow-sm">
    <div class="flex justify-between items-center mb-4">
      <h3 class="text-lg font-semibold text-primary">Statistik Tiket Bulan Ini</h3>
      <select class="text-sm border border-gray-300 rounded px-3 py-1">
        <option>Bulan Ini</option>
        <option>Bulan Lalu</option>
        <option>3 Bulan Terakhir</option>
      </select>
    </div>
    <div class="bg-gray-50 rounded-lg p-8 text-center">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
      </svg>
      <p class="text-gray-500">Chart akan ditampilkan di sini</p>
      <p class="text-sm text-gray-400 mt-1">Integrasi dengan library chart seperti Chart.js</p>
    </div>
  </div>

  <!-- Recent Activity -->
  <div class="bg-white p-6 rounded-lg shadow-sm">
    <div class="flex justify-between items-center mb-4">
      <h3 class="text-lg font-semibold text-primary">Aktivitas Terbaru</h3>
      <a href="/admin/tickets" class="text-primary text-sm font-medium hover:text-purple-900">Lihat Semua</a>
    </div>
    <div class="space-y-4">
      <!-- Activity Item 1 -->
      <div class="flex items-start space-x-3">
        <div class="bg-green-100 p-2 rounded-full mt-1">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
        </div>
        <div class="flex-1">
          <p class="text-sm font-medium text-gray-900">Tiket TKT-00123 diselesaikan</p>
          <p class="text-xs text-gray-500">Uji KIR Kendaraan Baru - B 1234 ABC</p>
          <p class="text-xs text-gray-400 mt-1">2 jam yang lalu</p>
        </div>
      </div>

      <!-- Activity Item 2 -->
      <div class="flex items-start space-x-3">
        <div class="bg-yellow-100 p-2 rounded-full mt-1">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </div>
        <div class="flex-1">
          <p class="text-sm font-medium text-gray-900">Tiket TKT-00124 ditambahkan</p>
          <p class="text-xs text-gray-500">Perpanjangan KIR - B 5678 XYZ</p>
          <p class="text-xs text-gray-400 mt-1">4 jam yang lalu</p>
        </div>
      </div>

      <!-- Activity Item 3 -->
      <div class="flex items-start space-x-3">
        <div class="bg-blue-100 p-2 rounded-full mt-1">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
          </svg>
        </div>
        <div class="flex-1">
          <p class="text-sm font-medium text-gray-900">User baru terdaftar</p>
          <p class="text-xs text-gray-500">PT. Transportasi Maju Jaya</p>
          <p class="text-xs text-gray-400 mt-1">6 jam yang lalu</p>
        </div>
      </div>

      <!-- Activity Item 4 -->
      <div class="flex items-start space-x-3">
        <div class="bg-primary p-2 rounded-full mt-1">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
          </svg>
        </div>
        <div class="flex-1">
          <p class="text-sm font-medium text-gray-900">Kendaraan baru ditambahkan</p>
          <p class="text-xs text-gray-500">Mitsubishi Fuso - B 9012 DEF</p>
          <p class="text-xs text-gray-400 mt-1">1 hari yang lalu</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Quick Actions -->
<div class="mt-6 bg-white p-6 rounded-lg shadow-sm">
  <h3 class="text-lg font-semibold text-primary mb-4">Aksi Cepat</h3>
  <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
    <a href="/admin/tickets/add" class="bg-primary text-white p-4 rounded-lg text-center hover:bg-purple-800 transition-colors">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
      </svg>
      <span class="font-medium">Tambah Tiket</span>
    </a>
    <a href="/admin/vehicles/add" class="bg-secondary text-primary p-4 rounded-lg text-center hover:bg-yellow-200 transition-colors">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
      </svg>
      <span class="font-medium">Tambah Kendaraan</span>
    </a>
    <a href="/admin/services" class="bg-gray-100 text-primary p-4 rounded-lg text-center hover:bg-gray-200 transition-colors">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
      </svg>
      <span class="font-medium">Kelola Layanan</span>
    </a>
    <a href="/admin/complaints" class="bg-gray-100 text-primary p-4 rounded-lg text-center hover:bg-gray-200 transition-colors">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
      </svg>
      <span class="font-medium">Lihat Keluhan</span>
    </a>
  </div>
</div>

<?= $this->endSection() ?>