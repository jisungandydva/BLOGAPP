<?= $this->extend('frontend/layout') ?>
<?= $this->section('content') ?> 

<!-- Blog Section -->
<section class="py-5" style="background-color: #1F2731; border-radius: 16px; margin-top: 2rem;" data-aos="fade-up">
  <div class="container">
    
    <h2 class="fw-bold text-center text-warning mb-4">Blog & Artikel</h2>
    <p class="text-center text-light mb-5" style="max-width: 700px; margin: 0 auto;">
      Kumpulan tulisan dan cerita dari tim 3 Bocah Anolima — seputar teknologi, desain, dan pengalaman kreatif kami.
    </p>

    <div class="row justify-content-center">

      <!-- LOOPING BLOG DARI DATABASE -->
      <?php foreach ($posts as $post): ?>
      <div class="col-md-4 mb-4 d-flex">
        <div class="card blog-card border-0 shadow-sm w-100" style="background-color: #2C3542; border-radius: 16px;">

          <!-- GAMBAR BLOG -->
          <img 
            src="<?= base_url('uploads/blog/' . $post['image']) ?>" 
            class="card-img-top rounded-top-3"
            alt="<?= esc($post['title']) ?>"
          >

          <div class="card-body">
            <h5 class="fw-bold text-warning"><?= esc($post['title']) ?></h5>

            <p class="text-secondary">
              <?= esc($post['excerpt']) ?>
            </p>

            <a href="<?= base_url('blog/' . $post['slug']) ?>" class="btn btn-outline-warning rounded-pill px-4">
              Baca Selengkapnya
            </a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
      <!-- END LOOP -->

    </div>

    <!-- Tombol kembali -->
    <div class="text-center mt-4">
      <a href="<?= base_url('/') ?>" class="btn btn-warning rounded-pill px-4">
        <i class="bi bi-house-door-fill me-1"></i> Kembali ke Beranda
      </a>
    </div>
  </div>
</section>

<?= $this->endSection() ?>
