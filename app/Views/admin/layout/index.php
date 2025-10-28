<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= esc($title ?? 'Admin Panel') ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex">

  <!-- Sidebar -->
  <aside class="w-64 bg-slate-800 text-white min-h-screen">
    <div class="p-4 text-center border-b border-slate-700">
      <h1 class="text-xl font-bold">Uji KIR Admin</h1>
      <p class="text-sm text-gray-300"><?= session('username') ?></p>
    </div>
    <nav class="mt-4 space-y-1">
      <a href="/admin/dashboard" class="block px-4 py-2 hover:bg-slate-700 <?= url_is('admin/dashboard')?'bg-slate-700':'' ?>">📊 Dashboard</a>
      <a href="/admin/tickets" class="block px-4 py-2 hover:bg-slate-700 <?= url_is('admin/tickets*')?'bg-slate-700':'' ?>">🎫 Tiket</a>
      <a href="/admin/services" class="block px-4 py-2 hover:bg-slate-700 <?= url_is('admin/services*')?'bg-slate-700':'' ?>">⚙️ Layanan</a>
      <a href="/admin/complaints" class="block px-4 py-2 hover:bg-slate-700 <?= url_is('admin/complaints*')?'bg-slate-700':'' ?>">🗣️ Keluhan</a>
      <a href="/b0/logout" class="block px-4 py-2 mt-4 border-t border-slate-700 hover:bg-red-700 text-red-200">🚪 Logout</a>
    </nav>
  </aside>

  <!-- Main Content -->
  <main class="flex-1 p-6">
    <!-- Flash messages -->
    <?php if(session()->getFlashdata('success')): ?>
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
        <?= session('success') ?>
      </div>
    <?php elseif(session()->getFlashdata('error')): ?>
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
        <?= session('error') ?>
      </div>
    <?php endif; ?>

    <?= $this->renderSection('content') ?>
  </main>

</body>
</html>
