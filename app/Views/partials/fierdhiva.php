<?php
use App\Models\TeamModel;
use App\Models\SkillsModel;

// ===========================
// Ambil data team ID = 3
// ===========================
$teamModel = new TeamModel();
$team = $teamModel->find(3);

// Bila tidak ada team dengan ID = 3
if (!$team) {
    $team = [
        'id' => 3,
        'nama' => '',
        'posisi' => '',
        'deskripsi' => '',
        'foto' => '',
        'instagram_username' => '',
        'tiktok_username' => '',
        'email' => ''
    ];
}

// ===========================
// Ambil data skills sesuai team_id 3
// ===========================
$skillsModel = new SkillsModel();
$skills = $skillsModel->where('team_id', 3)->findAll();
?>
<?= $this->extend('frontend/layout') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/home_adinda.css') ?>">

<!-- ================= HERO SECTION ================= -->
<section class="hero-section">
    <div class="container py-5">
        <div class="row align-items-center">

            <!-- TEXT -->
            <div class="col-lg-6 col-12 hero-text mb-5 mb-lg-0">
                <h1 class="hero-title">
                    <?= esc($team['nama']) ?>
                </h1>

                <h2 class="hero-name mt-2"><?= esc($team['posisi']) ?></h2>

                <p class="hero-role mt-2">Crafting clean, modern & intuitive web experiences.</p>

                <p class="hero-desc mt-3">
                    <?= esc($team['deskripsi']) ?>
                </p>

            </div>

            <!-- IMAGE -->
            <div class="col-lg-6 col-12 text-center position-relative">
                <div class="image-glow"></div>
                <div class="tilt-wrapper">
                    <img src="<?= base_url('uploads/team/' . $team['foto']) ?>" class="profile-img tilt-img">
                </div>
            </div>

        </div>
    </div>
</section>


<!-- ================= PROFILE SECTION ================= -->
<section class="profile-section py-5">
    <div class="container">
        <div class="row g-4 align-items-start">

            <!-- LEFT PROFILE -->
            <div class="col-lg-4">
                <div class="profile-card">
                    <div class="profile-img-wrapper">
                        <img src="<?= base_url('uploads/team/' . $team['foto']) ?>" class="profile-img-round">
                    </div>

                    <h3 class="profile-name mt-3"><?= esc($team['nama']) ?></h3>
                    <p class="profile-role"><?= esc($team['posisi']) ?></p>

                </div>
            </div>

            <!-- RIGHT BIO -->
            <div class="col-lg-8">

                <h2 class="bio-title">About Me</h2>

                <p class="bio-desc mt-3">
                    Sebagai seorang UI/UX Designer sekaligus Creative Thinker, saya berfokus pada pembuatan desain antarmuka yang intuitif, 
                    modern, dan berpusat pada kebutuhan pengguna. Dalam setiap proyek, saya mengutamakan riset, pemahaman perilaku pengguna, 
                    dan proses desain yang terstruktur agar hasil yang dibuat tidak hanya menarik secara visual, tetapi juga efektif dan mudah digunakan.
                    Saya memiliki pengalaman dalam menyusun user flow, wireframe, hingga high-fidelity design, serta memastikan setiap elemen visual 
                    selaras dengan tujuan produk. Dengan pemikiran kreatif, saya mampu mengembangkan konsep desain yang segar dan solutif, sekaligus 
                    mempertimbangkan konsistensi, hierarki visual, dan aksesibilitas.
                    Saya selalu mengikuti tren UI/UX terbaru, teknik desain modern, serta tools yang mendukung 
                    proses kreatif agar setiap karya yang dihasilkan dapat memberikan pengalaman pengguna yang optimal. Tujuan saya 
                    adalah menciptakan desain yang tidak hanya indah, tetapi juga bekerja dengan baik dan memberikan nilai nyata bagi pengguna maupun bisnis.
                </p>

                <!-- SOCIAL MEDIA -->
                <div class="container mt-5">
                    <div class="row g-4 justify-content-center">

                        <!-- Email -->
                        <div class="col-md-3 col-6">
                            <div class="stats-card">
                                <i class="bi bi-envelope"></i>
                                <a href="mailto:<?= esc($team['email']) ?>" 
                                   class="stats-link">
                                    <?= esc($team['email']) ?>
                                </a>
                            </div>
                        </div>

                        <!-- Instagram -->
                        <div class="col-md-3 col-6">
                            <div class="stats-card">
                                <i class="bi bi-instagram"></i>
                                <a href="https://instagram.com/<?= esc($team['instagram_username']) ?>"
                                   target="_blank"
                                   class="stats-link">
                                    @<?= esc($team['instagram_username']) ?>
                                </a>
                            </div>
                        </div>

                        <!-- TikTok -->
                        <div class="col-md-3 col-6">
                            <div class="stats-card">
                                <i class="bi bi-tiktok"></i>
                                <a href="https://www.tiktok.com/@<?= esc($team['tiktok_username']) ?>"
                                   target="_blank"
                                   class="stats-link">
                                    @<?= esc($team['tiktok_username']) ?>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
</section>



<!-- ================= SKILL SECTION (DINAMIS DARI DATABASE ID=3) ================= -->
<section class="skill-section py-5">
    <div class="container">
        <h2 class="fw-bold text-center text-warning mb-4">Skills & Expertise</h2>

        <p class="text-center text-secondary mb-5" style="max-width: 700px; margin: 0 auto;">
            Keahlian utama dari dashboard.
        </p>

        <div class="row g-4 justify-content-center">

            <?php if (!empty($skills)): ?>
                <?php foreach ($skills as $skill): ?>
                    <div class="col-md-3 col-6">
                        <div class="skill-card">
                            <h4><?= esc($skill['skill_name']) ?></h4>
                            <p><?= esc($skill['skill_level']) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center text-secondary">Belum ada data skill.</p>
            <?php endif; ?>

        </div>
    </div>
</section>

<?= $this->endSection() ?>