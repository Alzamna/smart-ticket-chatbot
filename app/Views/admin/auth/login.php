<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Admin - Uji KIR</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    :root {
      --primary-color: #3f1871;
      --secondary-color: #fcdb00;
    }
    
    .btn-primary {
      background-color: var(--primary-color);
      color: white;
    }
    
    .btn-primary:hover {
      background-color: #321256;
    }
    
    .focus-primary:focus {
      ring-color: var(--primary-color);
      border-color: var(--primary-color);
    }
  </style>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">

  <div class="bg-white shadow-xl rounded-lg w-full max-w-md p-8 border-t-4 border-secondary">
    <!-- Logo Area -->
    <div class="flex justify-center mb-4">
      <div class="w-20 h-20 bg-primary rounded-full flex items-center justify-center text-white mb-2">
        <img src="<?= base_url('images/logo.png') ?>" alt="Logo Dinas Perhubungan" class="w-25 h-25 object-contain">
      </div>
    </div>


    <!-- Judul -->
    <h2 class="text-2xl font-bold mb-2 text-center text-primary">Login Admin</h2>
    <p class="text-gray-600 text-center mb-6">Sistem Uji KIR Dinas Perhubungan</p>
    
    <!-- Flash Message -->
    <?php if(session()->getFlashdata('error')): ?>
      <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded mb-4">
        <div class="flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
          </svg>
          <span class="font-medium">Login Gagal!</span>
        </div>
        <p class="mt-1 text-sm"><?= session('error') ?></p>
      </div>
    <?php endif; ?>

    <!-- Form Login -->
    <form action="/b0/login" method="post" class="space-y-6">
      <?= csrf_field() ?>

      <!-- Username Field -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Username</label>
        <div class="relative">
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
          </div>
          <input type="text" name="username" required
            class="w-full border border-gray-300 rounded-lg pl-10 pr-3 py-3 focus:ring-2 focus:ring-primary focus:border-primary focus-primary transition-colors"
            placeholder="Masukkan username">
        </div>
      </div>

      <!-- Password Field -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
        <div class="relative">
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
            </svg>
          </div>
          <input type="password" name="password" required
            class="w-full border border-gray-300 rounded-lg pl-10 pr-3 py-3 focus:ring-2 focus:ring-primary focus:border-primary focus-primary transition-colors"
            placeholder="Masukkan password">
        </div>
      </div>

      <!-- Submit Button -->
      <button type="submit"
        class="w-full btn-primary text-white py-3 rounded-lg font-medium hover:bg-purple-800 transition-colors duration-200 flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
        </svg>
        Masuk
      </button>
    </form>

    <!-- Footer -->
    <div class="mt-8 pt-6 border-t border-gray-200">
      <p class="text-center text-sm text-gray-500">
        © <?= date('Y') ?> Uji KIR • Dinas Perhubungan
      </p>
    </div>
  </div>

</body>
</html>