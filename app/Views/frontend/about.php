<?= $this->extend('frontend/layout') ?>
<?= $this->section('content') ?>>

<!-- HERO -->
<section class="text-center py-5 section-dark">
  <div class="container" data-aos="fade-up">
    <img src="<?= base_url('assets/img/pp.png') ?>" 
         class="shadow-soft mb-4"
         style="width: 220px; height: 220px; object-fit: cover; border-radius: 50%;">

    <h1 class="fw-bold text-warning">Tentang Kami</h1>
    <p class="text-secondary-custom mt-3" style="max-width:720px; margin:auto;">
      Tiga kepala, tiga keahlian, satu tujuan — menciptakan karya digital yang penuh makna dan berdampak.
    </p>
  </div>
</section>


<!-- TENTANG KAMI -->
<section class="py-5 section-semidark">
  <div class="container">
    <div class="row align-items-center g-4">

      <div class="col-md-6" data-aos="fade-right">
        <div class="rounded-xl shadow-soft overflow-hidden">
          <img src="<?= base_url('assets/img/about-1.png') ?>" 
               class="img-fluid"
               style="height:350px; width:100%; object-fit:cover;">
        </div>
      </div>

      <div class="col-md-6 text-light" data-aos="fade-left">
        <h2 class="fw-bold text-warning mb-3">Siapa Kami?</h2>
        <p class="text-secondary-custom fs-5">
          Kami adalah tim kecil yang bekerja di bidang digital creative. 
          Dengan latar belakang Web Developer, UI/UX Designer, dan Content Creator, 
          kami bersatu untuk menghadirkan karya yang estetis, fungsional, dan penuh cerita.
        </p>

        <p class="text-secondary-custom">
          Kami percaya bahwa desain bukan hanya visual, tapi bagaimana sebuah karya dapat 
          memberikan pengalaman dan menyampaikan pesan yang kuat.
        </p>
      </div>
    </div>
  </div>
</section>


<!-- VISI MISI -->
<section class="py-5 section-dark">
  <div class="container">
    <h3 class="fw-bold text-warning text-center mb-4" data-aos="fade-up">Visi & Misi</h3>

    <div class="row align-items-center g-4">

      <div class="col-md-6">

        <div class="p-4 rounded-xl shadow-soft mb-4 section-semidark" data-aos="fade-up" data-aos-delay="100">
          <h5 class="fw-bold text-warning mb-2">Visi</h5>
          <p class="text-secondary-custom mb-0">
            Menjadi tim digital kreatif yang menghasilkan karya unik, inovatif, dan bermanfaat.
          </p>
        </div>

        <div class="p-4 rounded-xl shadow-soft section-semidark" data-aos="fade-up" data-aos-delay="200">
          <h5 class="fw-bold text-warning mb-2">Misi</h5>
          <p class="text-secondary-custom mb-0">
            Mengembangkan kemampuan, membangun project kolaboratif, 
            dan menciptakan pengalaman digital yang menyenangkan bagi pengguna.
          </p>
        </div>

      </div>

      <div class="col-md-6 text-center" data-aos="fade-left">
        <div class="rounded-xl shadow-soft overflow-hidden">
          <img src="<?= base_url('assets/img/about-2.png') ?>" 
               class="img-fluid"
               style="height:350px; width:100%; object-fit:cover;">
        </div>
      </div>

    </div>
  </div>
</section>


<!-- NILAI TIM -->
<section class="py-5 section-semidark">
  <div class="container text-center">
    <h3 class="fw-bold text-warning mb-4" data-aos="fade-up">Nilai yang Kami Pegang</h3>

    <div class="row g-4">

      <?php 
        $items = [
          ['bi-people-fill','Kolaborasi','Bekerja bersama untuk hasil maksimal.'],
          ['bi-check-circle-fill','Konsistensi','Menjaga kualitas dalam setiap detail.'],
          ['bi-chat-dots-fill','Komunikasi','Berinteraksi dengan nyaman dan terbuka.'],
          ['bi-stars','Kreativitas','Selalu mencari ide segar dan berbeda.']
        ];

        $delay = 0;
        foreach ($items as $item): 
          $delay += 100; // delay animasi bertahap
      ?>

      <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="<?= $delay ?>">
        <div class="p-4 rounded-xl shadow-soft h-100 section-dark">

          <!-- ICON -->
          <div 
            class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3"
            style="
              width:70px;
              height:70px;
              background: rgba(255,255,255,0.06);
              border:1px solid rgba(255,255,255,0.15);
            ">
            <i class="bi <?= $item[0] ?>" style="font-size:1.8rem; color:#f1c84c;"></i>
          </div>

          <!-- TEXT -->
          <h6 class="fw-bold text-light"><?= $item[1] ?></h6>
          <p class="small text-secondary-custom m-0"><?= $item[2] ?></p>
        </div>
      </div>

      <?php endforeach; ?>

    </div>
  </div>
</section>


<!-- CTA -->
<section class="py-5 text-center section-dark" data-aos="fade-up">
  <div class="container">
    <h3 class="fw-bold text-warning mb-3">Ingin Kenal Lebih Dekat?</h3>
    <p class="text-secondary-custom mb-4">Lihat siapa saja di balik project kami.</p>

    <a href="<?= base_url('team') ?>" 
       class="btn btn-warning text-dark fw-bold rounded-pill px-5 py-2 shadow-soft">
       <i class="bi bi-people-fill me-2"></i> Lihat Tim Kami
    </a>
  </div>
</section>

<?= $this->endSection() ?>
