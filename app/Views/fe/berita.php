<?= $this->extend('fe/layouts/index') ?>
<?= $this->section('content') ?>

<!-- Header Section -->
<section class="gradient-primary text-white py-16">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
    <h1 class="text-4xl font-bold mb-4">Berita & Informasi</h1>
    <p class="text-xl text-purple-100 max-w-3xl mx-auto">
      Dapatkan informasi terbaru seputar Uji KIR dan layanan Dinas Perhubungan
    </p>
  </div>
</section>

<!-- Content Section -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
  <!-- Stats -->
  <div class="flex items-center justify-between mb-8">
    <div>
      <h2 class="text-2xl font-bold text-primary">Berita Terbaru</h2>
      <p class="text-gray-600 mt-1">Informasi terkini seputar layanan Uji KIR</p>
    </div>
    <div class="bg-primary text-white px-4 py-2 rounded-full text-sm font-medium">
      <?= count($berita) ?> Berita
    </div>
  </div>

  <?php if (empty($berita)): ?>
    <!-- Empty State -->
    <div class="bg-white rounded-xl shadow-sm p-12 text-center">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
      </svg>
      <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum ada berita</h3>
      <p class="text-gray-500 max-w-md mx-auto">
        Saat ini belum ada berita yang tersedia. Silakan kembali lagi nanti untuk informasi terbaru.
      </p>
    </div>
  <?php else: ?>
    <!-- News Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <?php foreach ($berita as $b): ?>
        <article class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-lg transition-all duration-300 border border-gray-100">
          <!-- Image -->
          <div class="relative overflow-hidden">
            <img src="<?= base_url('uploads/berita/' . $b['gambar']) ?>" 
                 alt="<?= esc($b['judul']) ?>" 
                 class="w-full h-48 object-cover transition-transform duration-300 hover:scale-105">
            <div class="absolute top-4 left-4">
              <span class="bg-primary text-white px-3 py-1 rounded-full text-xs font-medium">
                Berita
              </span>
            </div>
          </div>

          <!-- Content -->
          <div class="p-6">
            <!-- Date -->
            <div class="flex items-center text-sm text-gray-500 mb-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
              </svg>
              <?= date('d M Y', strtotime($b['created_at'])) ?>
            </div>

            <!-- Title -->
            <h3 class="text-xl font-bold text-gray-900 mb-3 leading-tight hover:text-primary transition-colors">
              <a href="<?= base_url('berita/' . $b['slug']) ?>">
                <?= esc($b['judul']) ?>
              </a>
            </h3>

            <!-- Excerpt -->
            <p class="text-gray-600 text-sm leading-relaxed mb-4 line-clamp-3">
              <?= character_limiter(strip_tags($b['isi']), 120) ?>
            </p>

            <!-- Read More -->
            <a href="<?= base_url('berita/' . $b['slug']) ?>" 
               class="inline-flex items-center text-primary font-semibold hover:text-purple-800 transition-colors group">
              Baca Selengkapnya
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
            </a>
          </div>
        </article>
      <?php endforeach; ?>
    </div>

    <!-- Load More Button (Optional) -->
    <div class="text-center mt-12">
      <button class="bg-white border border-primary text-primary px-8 py-3 rounded-lg font-semibold hover:bg-primary hover:text-white transition-all duration-300">
        Muat Lebih Banyak
      </button>
    </div>
  <?php endif; ?>
</section>

<!-- CTA Section -->
<section class="bg-gray-50 py-16">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
    <div class="max-w-3xl mx-auto">
      <h2 class="text-3xl font-bold text-primary mb-4">Butuh Informasi Lebih Lanjut?</h2>
      <p class="text-gray-600 text-lg mb-8">
        Hubungi kami untuk pertanyaan seputar layanan Uji KIR dan informasi lainnya
      </p>
      <div class="flex flex-col sm:flex-row gap-4 justify-center">
        <a href="/informasi" class="btn-primary px-8 py-3 rounded-lg font-semibold hover:bg-purple-800 transition-colors">
          Informasi Layanan
        </a>
        <a href="/pengaduan" class="bg-white border border-primary text-primary px-8 py-3 rounded-lg font-semibold hover:bg-primary hover:text-white transition-all duration-300">
          Hubungi Kami
        </a>
      </div>
    </div>
  </div>
</section>

<style>
.line-clamp-3 {
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.gradient-primary {
  background: linear-gradient(135deg, var(--primary-color) 0%, #5e2a9c 100%);
}

.btn-primary {
  background-color: var(--primary-color);
  color: white;
}

.btn-primary:hover {
  background-color: #321256;
}
</style>

<?= $this->endSection() ?>