<?= $this->extend('admin/layout/index') ?>
<?= $this->section('content') ?>
<h2 class="text-2xl font-semibold mb-4">Dashboard</h2>
<div class="grid grid-cols-2 md:grid-cols-4 gap-4">
  <div class="p-4 bg-blue-100 rounded">Total Tiket: <strong><?= $total_tickets ?></strong></div>
  <div class="p-4 bg-yellow-100 rounded">Menunggu: <strong><?= $waiting ?></strong></div>
  <div class="p-4 bg-green-100 rounded">Selesai: <strong><?= $finished ?></strong></div>
  <div class="p-4 bg-gray-100 rounded">Total User: <strong><?= $total_users ?></strong></div>
</div>
<?= $this->endSection() ?>
