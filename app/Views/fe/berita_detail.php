<?= $this->extend('fe/layouts/index') ?>
<?= $this->section('content') ?>

<!-- Breadcrumb -->
<section class="bg-gray-50 border-b border-gray-200">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
    <nav class="flex items-center space-x-2 text-sm text-gray-600">
      <a href="<?= base_url() ?>" class="hover:text-primary transition-colors">Beranda</a>
      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
      </svg>
      <a href="<?= base_url('berita') ?>" class="hover:text-primary transition-colors">Berita</a>
      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
      </svg>
      <span class="text-primary font-medium"><?= esc($berita['judul']) ?></span>
    </nav>
  </div>
</section>

<!-- Article Section -->
<section class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
  <!-- Article Header -->
  <article class="bg-white rounded-xl shadow-sm p-8 mb-12">
    <!-- Title -->
    <h1 class="text-3xl lg:text-4xl font-bold text-primary mb-4 leading-tight">
      <?= esc($berita['judul']) ?>
    </h1>

    <!-- Meta Information -->
    <div class="flex flex-wrap items-center gap-4 text-sm text-gray-600 mb-6">
      <div class="flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
        </svg>
        <?= date('d F Y', strtotime($berita['created_at'])) ?>
      </div>
      <div class="flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <?= date('H:i', strtotime($berita['created_at'])) ?> WIB
      </div>
      <div class="flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
        </svg>
        Admin Dishub
      </div>
    </div>

    <!-- Featured Image -->
    <?php if (!empty($berita['gambar'])): ?>
      <div class="relative mb-8 rounded-xl overflow-hidden">
        <img src="<?= base_url('uploads/berita/' . $berita['gambar']) ?>" 
             alt="<?= esc($berita['judul']) ?>" 
             class="w-full h-80 lg:h-96 object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
      </div>
    <?php endif; ?>

    <!-- Article Content -->
    <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
      <div class="text-gray-600 text-lg leading-8">
        <?= $berita['isi'] ?>
      </div>
    </div>

    <!-- Article Footer -->
    <div class="mt-8 pt-6 border-t border-gray-200">
      <div class="flex flex-wrap items-center justify-between gap-4">
        <div class="flex items-center text-sm text-gray-600">
          <span class="bg-primary text-white px-3 py-1 rounded-full text-xs font-medium mr-3">
            Berita
          </span>
          Terakhir update: <?= date('d M Y', strtotime($berita['updated_at'] ?? $berita['created_at'])) ?>
        </div>
        <!-- Social Share -->
        <div class="flex items-center space-x-3">
          <span class="text-sm text-gray-600">Bagikan:</span>
          <button class="text-gray-400 hover:text-primary transition-colors">
            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
              <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
            </svg>
          </button>
          <button class="text-gray-400 hover:text-primary transition-colors">
            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
              <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/>
            </svg>
          </button>
        </div>
      </div>
    </div>
  </article>

  <!-- Related News -->
  <div class="border-t border-gray-200 pt-12">
    <div class="flex items-center justify-between mb-8">
      <h2 class="text-2xl font-bold text-primary">Berita Lainnya</h2>
      <a href="<?= base_url('berita') ?>" class="text-primary hover:text-purple-800 font-semibold flex items-center transition-colors">
        Lihat Semua
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
      </a>
    </div>

    <?php if (!empty($related)): ?>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach ($related as $r): ?>
          <article class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-all duration-300 border border-gray-100">
            <a href="<?= base_url('berita/' . $r['slug']) ?>">
              <img src="<?= base_url('uploads/berita/' . $r['gambar']) ?>" 
                   alt="<?= esc($r['judul']) ?>" 
                   class="w-full h-40 object-cover">
            </a>
            <div class="p-4">
              <div class="flex items-center text-xs text-gray-500 mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <?= date('d M Y', strtotime($r['created_at'])) ?>
              </div>
              <h3 class="font-semibold text-gray-900 mb-2 line-clamp-2 hover:text-primary transition-colors">
                <a href="<?= base_url('berita/' . $r['slug']) ?>">
                  <?= esc($r['judul']) ?>
                </a>
              </h3>
              <p class="text-sm text-gray-600 line-clamp-2">
                <?= character_limiter(strip_tags($r['isi']), 80) ?>
              </p>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <div class="text-center py-8">
        <p class="text-gray-500">Tidak ada berita terkait lainnya.</p>
      </div>
    <?php endif; ?>
  </div>
</section>

<style>
.line-clamp-2 {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.prose {
  color: #374151;
}

.prose h2 {
  color: #3f1871;
  font-weight: 700;
  margin-top: 2rem;
  margin-bottom: 1rem;
}

.prose h3 {
  color: #3f1871;
  font-weight: 600;
  margin-top: 1.5rem;
  margin-bottom: 0.75rem;
}

.prose p {
  margin-bottom: 1rem;
}

.prose img {
  border-radius: 0.5rem;
  margin: 1.5rem 0;
}
</style>

<?= $this->endSection() ?>