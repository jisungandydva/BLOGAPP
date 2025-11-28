<?= $this->extend('frontend/layout') ?>
<?= $this->section('content') ?>

<!-- Team Section -->
<section class="text-center py-5" style="background-color: #1F2731; border-radius: 16px; margin-top: 2rem;" data-aos="fade-up">
  <div class="container">
    <h2 class="fw-bold text-warning mb-3">Tim Kami</h2>
    <p class="text-light mb-5" style="max-width: 700px; margin: 0 auto;">
      Kami adalah tim kreatif yang berfokus pada teknologi, konten, dan desain.  
      Setiap anggota memiliki keahlian unik untuk menghadirkan karya digital yang inspiratif.
    </p>

    <div class="row justify-content-center">

      <?php foreach ($teams as $t): ?>
      <div class="col-md-4 mb-4 d-flex">
        <div class="card border-0 shadow-sm w-100 hover-card" style="background-color: #2C3542; border-radius: 16px;">

          <img 
            src="<?= base_url('uploads/team/' . $t['foto']) ?>" 
            class="card-img-top rounded-top-3"
            alt="<?= esc($t['nama']) ?>"
            style="height: 350px; object-fit: cover;"
          >

          <div class="card-body text-center">
            <h5 class="fw-bold text-warning"><?= esc($t['nama']) ?></h5>
            <p class="text-light mb-3"><?= esc($t['posisi']) ?></p>

            <a href="<?= base_url('team/detail/' . $t['id']) ?>" class="btn btn-outline-warning rounded-pill px-4">
              <i class="bi bi-person-circle me-1"></i> Profil Lengkap
            </a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>

    </div>

    <!-- Tombol Navigasi -->
    <div class="mt-4">
      <a href="<?= base_url('/') ?>" class="btn btn-warning rounded-pill px-4">
        <i class="bi bi-house-door-fill me-1"></i> Kembali ke Beranda
      </a>
    </div>

  </div>
</section>

<?= $this->endSection() ?>
