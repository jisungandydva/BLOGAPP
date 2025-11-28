<?= $this->extend('frontend/layout') ?>
<?= $this->section('content') ?>


<!-- Hero Section -->
<section class="hero-section text-center text-white d-flex align-items-center justify-content-center" id="hero">
  <div class="container" data-aos="fade-up">
    <h1 class="fw-bold display-5 mb-3">Selamat Datang di <span class="text-warning">3 Bocah Anolima</span></h1>
    <p class="lead mb-4">
      Tiga sahabat yang berbagi cerita, karya, dan inspirasi dalam satu portofolio.
    </p>
    <a href="about" class="btn btn-warning btn-lg rounded-pill px-4">
      Kenali Kami
    </a>
  </div>
</section>

<!-- Tentang Kami -->
<section id="about" class="py-5 text-center rounded shadow-sm my-5" data-aos="fade-up"
         style="background-color: #2C3542; color: #e0e0e0;">
  <div class="container">
    <h2 class="fw-bold mb-4 text-warning">Tentang Kami</h2>
    <p class="mx-auto text-light" style="max-width: 700px;">
      Kami adalah tiga rekan yang bergerak di bidang digital dan kreativitas.
      Menggabungkan keahlian dalam pengembangan web, penulisan konten, dan desain antarmuka,
      kami berkolaborasi untuk menciptakan karya yang fungsional, menarik, dan bermakna.
    </p>
  </div>
</section>

<!-- Apa yang Kami Lakukan -->
<section class="py-5 text-center" data-aos="fade-up" style="background-color: #1F2731; color: #e0e0e0;">
  <div class="container">
    <h2 class="fw-bold text-warning mb-4">Apa yang Kami Lakukan?</h2>

    <div class="row justify-content-center">

      <div class="col-md-4 mb-4">
        <div class="service-card shadow-sm">
          <h4 class="text-warning">🔧 Web Development</h4>
          <p>Membangun website modern, cepat, responsif, dan mudah dikelola.</p>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="service-card shadow-sm">
          <h4 class="text-warning">✍️ Konten Kreatif</h4>
          <p>Membuat tulisan, visual, dan ide-ide yang mendukung brand atau project kamu.</p>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="service-card shadow-sm">
          <h4 class="text-warning">🎨 Desain UI/UX</h4>
          <p>Menciptakan tampilan antarmuka yang menarik dan pengalaman pengguna yang nyaman.</p>
        </div>
      </div>

    </div>
  </div>
</section>

<section class="py-5 text-center" data-aos="fade-up"
         style="background-color: #2C3542; color: #e0e0e0;">
  <div class="container">
    <h2 class="fw-bold text-warning mb-5">Keunggulan Kami</h2>

    <div class="row g-4">

      <div class="col-md-3 col-sm-6">
        <div class="advantage-box shadow-sm">
          <div class="advantage-icon">🚀</div>
          <h5 class="fw-bold mb-2">Cepat & Efisien</h5>
          <p class="mb-0">Tim kecil dengan eksekusi yang lincah dan responsif.</p>
        </div>
      </div>

      <div class="col-md-3 col-sm-6">
        <div class="advantage-box shadow-sm">
          <div class="advantage-icon">✨</div>
          <h5 class="fw-bold mb-2">Kreatif & Fresh</h5>
          <p class="mb-0">Ide-ide modern yang disesuaikan dengan kebutuhanmu.</p>
        </div>
      </div>

      <div class="col-md-3 col-sm-6">
        <div class="advantage-box shadow-sm">
          <div class="advantage-icon">📚</div>
          <h5 class="fw-bold mb-2">Berpengalaman</h5>
          <p class="mb-0">Mengerjakan project digital dengan kualitas optimal.</p>
        </div>
      </div>

      <div class="col-md-3 col-sm-6">
        <div class="advantage-box shadow-sm">
          <div class="advantage-icon">💬</div>
          <h5 class="fw-bold mb-2">Komunikatif</h5>
          <p class="mb-0">Proses kerja yang nyaman & transparan di setiap langkah.</p>
        </div>
      </div>

    </div>
  </div>
</section>

<section class="py-5" data-aos="fade-up" 
         style="background-color: #2C3542; color: #e0e0e0;">
  <div class="container">

    <div class="row align-items-center">

      <!-- KIRI: TEKS -->
<div class="col-md-6 mb-4 mb-md-0" data-aos="fade-right">
  <h2 class="fw-bold text-warning mb-3">Kenal Lebih Dekat</h2>
  <p class="fs-5 mb-4" style="line-height: 1.7;">
    Kami percaya setiap karya punya cerita.  
    Melalui perjalanan panjang sebagai tim, kami terus belajar, berkembang, 
    dan menciptakan sesuatu yang bermakna.  
    Ayo kenal lebih dekat siapa yang ada di balik project kreatif ini.
  </p>

  <a href="<?= base_url('team') ?>" 
     class="btn btn-warning text-dark fw-bold rounded-pill px-4 py-2">
    <i class="bi bi-people-fill me-1"></i> Lihat Tim Kami
  </a>
</div>

<!-- KANAN: 3 FOTO (1 BESAR + 2 KECIL) -->
<div class="col-md-6 text-center" data-aos="fade-left">

  <div class="d-flex justify-content-center align-items-center gap-3">
<!-- FOTO KECIL KIRI -->
    <div class="photo-small">
      <img src="<?= base_url('assets/img/team1.png') ?>" 
           style="width:100%; height:100%; object-fit:cover;">
    </div>

    <!-- FOTO BESAR TENGAH -->
    <div class="photo-large">
      <img src="<?= base_url('assets/img/team2.png') ?>" 
           style="width:100%; height:100%; object-fit:cover;">
    </div>

    <!-- FOTO KECIL KANAN -->
    <div class="photo-small">
      <img src="<?= base_url('assets/img/team3.png') ?>" 
           style="width:100%; height:100%; object-fit:cover;">
    </div>
    </div> <!-- row -->
  </div>
</section>

<!-- Blog Section -->
<section class="py-5" style="background-color: #1F2731; border-radius: 16px; margin-top: 2rem;" data-aos="fade-up">
  <div class="container">
    <h2 class="fw-bold text-center text-warning mb-4">Blog & Artikel</h2>
    <p class="text-center text-light mb-5" style="max-width: 700px; margin: 0 auto;">
      Kumpulan tulisan dan cerita dari tim 3 Bocah Anolima — seputar teknologi, desain, dan pengalaman kreatif kami.
    </p>

    <div class="row justify-content-center">

    <?php if (!empty($latestPosts)): ?>
        <?php foreach ($latestPosts as $post): ?>
            <div class="col-md-4 mb-4 d-flex">
                <div class="card blog-card border-0 shadow-sm w-100"
                     style="background-color: #2C3542; border-radius: 16px;">

                    <img src="<?= base_url('uploads/blog/' . $post['image']) ?>"
                         class="card-img-top rounded-top-3"
                         style="height: 220px; object-fit: cover;"
                         alt="<?= $post['title'] ?>">

                    <div class="card-body">
                        <h5 class="fw-bold text-warning">
                            <?= esc($post['title']) ?>
                        </h5>

                        <p class="text-secondary">
                            <?= esc($post['excerpt']) ?>
                        </p>

                        <a href="<?= base_url('blog/' . $post['slug']) ?>"
                           class="btn btn-outline-warning rounded-pill px-4">
                            Baca Selengkapnya
                        </a>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>

        <p class="text-light text-center">Belum ada artikel.</p>

    <?php endif; ?>

</div>

        <!-- Tombol selengkapnya -->
<div class="text-center mt-4">
  <a href="blog" class="btn btn-warning rounded-pill px-4">
    Lihat Selengkapnya <i class="bi bi-arrow-right ms-2"></i>
  </a>
</div>

</section>

<?= $this->endSection() ?>
