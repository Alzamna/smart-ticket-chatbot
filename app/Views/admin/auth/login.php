<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Admin - Uji KIR</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="bg-white shadow-lg rounded-lg w-full max-w-md p-8">
    <h2 class="text-2xl font-bold mb-4 text-center text-slate-700">Login Admin</h2>
    <?php if(session()->getFlashdata('error')): ?>
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
        <?= session('error') ?>
      </div>
    <?php endif; ?>

    <form action="/b0/login" method="post" class="space-y-4">
      <?= csrf_field() ?>

      <div>
        <label class="block text-sm font-medium text-gray-700">Username</label>
        <input type="text" name="username" required
          class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-blue-200">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" name="password" required
          class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-blue-200">
      </div>

      <button type="submit"
        class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
        Masuk
      </button>
    </form>

    <p class="text-center text-sm text-gray-500 mt-4">
      © <?= date('Y') ?> Uji KIR • Dinas Perhubungan
    </p>
  </div>

</body>
</html>
