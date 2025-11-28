<?= $this->extend('frontend/layout') ?>
<?= $this->section('content') ?>>

<!-- Contact Section -->
<section class="py-5" style="background-color: #1F2731; border-radius: 16px; margin-top: 2rem;" data-aos="fade-up">
  <div class="container">
    <h2 class="fw-bold text-center text-warning mb-4">Hubungi Kami</h2>
    <p class="text-center text-light mb-5" style="max-width: 700px; margin: 0 auto;">
      Punya pertanyaan, ide kolaborasi, atau sekadar ingin menyapa?  
      Kami senang mendengar kabar dari kamu! Isi formulir di bawah atau hubungi kami lewat media sosial.
    </p>

    <div class="row g-4 justify-content-center">

<!-- Instagram -->
<div class="col-md-4 col-6" data-aos="fade-up">
  <div class="p-4 text-center rounded-3 shadow-sm h-100 d-flex flex-column" style="background-color: #2C3542;">
    <div class="fs-1 text-light mb-3"><i class="bi bi-instagram"></i></div>

    <div class="flex-grow-1">
      <h6 class="text-warning fw-bold">Instagram</h6>
      <p class="text-secondary small mb-3">DM kami untuk kerja sama atau pertanyaan.</p>
    </div>

    <a href="https://www.instagram.com/3_bocah.anolima?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" 
       target="_blank"
       class="btn btn-warning rounded-pill px-3 py-1 fw-bold mt-auto">
       DM Instagram
    </a>
  </div>
</div>

<!-- TikTok -->
<div class="col-md-4 col-6" data-aos="fade-up" data-aos-delay="100">
  <div class="p-4 text-center rounded-3 shadow-sm h-100 d-flex flex-column" style="background-color: #2C3542;">
    <div class="fs-1 text-light mb-3"><i class="bi bi-tiktok"></i></div>

    <div class="flex-grow-1">
      <h6 class="text-warning fw-bold">TikTok</h6>
      <p class="text-secondary small mb-3">Hubungi kami lewat DM TikTok.</p>
    </div>

    <a href="https://www.tiktok.com/@3_bocah_anolima?is_from_webapp=1&sender_device=pc"
       target="_blank"
       class="btn btn-warning rounded-pill px-3 py-1 fw-bold mt-auto">
       DM TikTok
    </a>
  </div>
</div>

<!-- WhatsApp -->
<div class="col-md-4 col-6" data-aos="fade-up" data-aos-delay="200">
  <div class="p-4 text-center rounded-3 shadow-sm h-100 d-flex flex-column" style="background-color: #2C3542;">
    <div class="fs-1 text-light mb-3"><i class="bi bi-whatsapp"></i></div>

    <div class="flex-grow-1">
      <h6 class="text-warning fw-bold">WhatsApp</h6>
      <p class="text-secondary small mb-3">Chat langsung untuk cepat respon.</p>
    </div>

    <a href="https://wa.me/6285847547142"
       target="_blank"
       class="btn btn-warning rounded-pill px-3 py-1 fw-bold mt-auto">
       Chat WhatsApp
    </a>
  </div>
</div>

<!-- Email -->
<div class="col-md-4 col-6" data-aos="fade-up" data-aos-delay="300">
  <div class="p-4 text-center rounded-3 shadow-sm h-100 d-flex flex-column" style="background-color: #2C3542;">
    <div class="fs-1 text-light mb-3"><i class="bi bi-envelope-fill"></i></div>

    <div class="flex-grow-1">
      <h6 class="text-warning fw-bold">Email</h6>
      <p class="text-secondary small mb-3">Kirim email untuk kebutuhan resmi.</p>
    </div>

    <a href="mailto:jisungandydva@gmail.com"
       class="btn btn-warning rounded-pill px-3 py-1 fw-bold mt-auto">
       Kirim Email
    </a>
  </div>
</div>

<!-- GitHub -->
<div class="col-md-4 col-6" data-aos="fade-up" data-aos-delay="500">
  <div class="p-4 text-center rounded-3 shadow-sm h-100 d-flex flex-column" style="background-color: #2C3542;">
    <div class="fs-1 text-light mb-3"><i class="bi bi-github"></i></div>

    <div class="flex-grow-1">
      <h6 class="text-warning fw-bold">GitHub</h6>
      <p class="text-secondary small mb-3">Lihat project dan repo kami.</p>
    </div>

    <a href="https://github.com/jisungandydva"
       target="_blank"
       class="btn btn-warning rounded-pill px-3 py-1 fw-bold mt-auto">
       Lihat Repo
    </a>
  </div>
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
