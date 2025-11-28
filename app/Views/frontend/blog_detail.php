<?= $this->extend('frontend/layout'); ?>
<?= $this->section('content'); ?>

<section class="py-5">
    <div class="container">

        <!-- Judul -->
        <h1 class="mb-3 fw-bold"><?= esc($blog['title']); ?></h1>

        <!-- Info -->
        <div class="text-muted mb-4">
            <small>
                <i class="bi bi-person-circle"></i> <?= esc($blog['author']); ?>  
                | <i class="bi bi-calendar-event"></i> <?= date('d M Y', strtotime($blog['created_at'])); ?>
            </small>
        </div>

        <!-- Gambar & Konten dalam grid -->
        <div class="row g-4 align-items-start">

            <!-- Foto di sebelah kiri -->
            <div class="col-lg-4 col-md-5">
                <?php if (!empty($blog['image'])) : ?>
                    <img src="<?= base_url('uploads/blog/' . $blog['image']); ?>"
                         class="img-fluid rounded shadow-sm blog-img"
                         alt="<?= esc($blog['title']); ?>">
                <?php endif; ?>
            </div>

            <!-- Konten di sebelah kanan -->
            <div class="col-lg-8 col-md-7">
                <div class="content" style="line-height: 1.8; font-size: 1.1rem;">
                    <?= $blog['content']; ?>
                </div>
            </div>

        </div>

        <hr class="my-5">

        <!-- Tombol kembali -->
        <a href="/blog" class="btn btn-secondary">
            ← Kembali ke Blog
        </a>
    </div>
</section>

<?= $this->endSection(); ?>
