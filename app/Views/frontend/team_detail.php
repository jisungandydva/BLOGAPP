<?= $this->extend('frontend/layout') ?>
<?= $this->section('content') ?>

<section class="py-5" style="background-color:#1F2731; border-radius:16px; margin-top:2rem;">
    <div class="container text-center">

        <img src="<?= base_url('uploads/team/' . $team['foto']); ?>"
             class="rounded-circle mb-4"
             width="200" height="200"
             style="object-fit: cover;">

        <h2 class="fw-bold text-warning"><?= esc($team['nama']); ?></h2>
        <p class="text-light mb-3"><?= esc($team['posisi']); ?></p>

        <div class="text-light" style="max-width:700px; margin:0 auto; line-height:1.8;">
            <?= nl2br(esc($team['deskripsi'])); ?>
        </div>

        <!-- TOMBOL MASUK PROFIL LENGKAP -->
<a href="<?= $profileLink ?>" class="btn btn-warning rounded-pill px-4 mt-4">
    Lihat Profil Lengkap →
</a>


        <!-- BACK -->
        <a href="<?= base_url('/team') ?>" class="btn btn-secondary rounded-pill px-4 mt-3">
            ← Kembali ke Team
        </a>

    </div>
</section>

<?= $this->endSection() ?>
