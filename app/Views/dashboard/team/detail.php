<?= $this->include('dashboard/layouts/header'); ?>
<?= $this->include('dashboard/layouts/sidebar'); ?>

<div class="content">
    <div class="card shadow-sm p-4 bg-white rounded">
        <h3 class="fw-bold mb-4">👤 Profil Lengkap</h3>

        <div class="row">
            <!-- FOTO -->
            <div class="col-md-4 text-center">
                <img src="<?= base_url('uploads/team/' . $team['foto']); ?>" 
                     class="img-fluid rounded mb-3 shadow" 
                     style="max-height: 250px; object-fit: cover;">
            </div>

            <!-- DATA -->
            <div class="col-md-8">
                <h4 class="fw-bold"><?= esc($team['nama']); ?></h4>
                <p class="text-muted"><?= esc($team['posisi']); ?></p>

                <!-- DESKRIPSI -->
                <h5 class="mt-4 fw-bold">Deskripsi</h5>
                <p><?= esc($team['deskripsi']); ?></p>

                <!-- SOSIAL MEDIA -->
                <h5 class="mt-4 fw-bold">Sosial Media</h5>

                <ul class="list-group">
                    <li class="list-group-item">
                        <strong>Email:</strong> <?= esc($team['email'] ?? '-') ?>
                    </li>
                    <li class="list-group-item">
                        <strong>Instagram:</strong> 
                        <?php if (!empty($team['instagram_username'])): ?>
                            <a href="https://instagram.com/<?= esc($team['instagram_username']); ?>" 
                               target="_blank">
                                @<?= esc($team['instagram_username']); ?>
                            </a>
                        <?php else: ?>
                            -
                        <?php endif; ?>
                    </li>
                    <li class="list-group-item">
                        <strong>TikTok:</strong> 
                        <?php if (!empty($team['tiktok_username'])): ?>
                            <a href="https://tiktok.com/@<?= esc($team['tiktok_username']); ?>" 
                               target="_blank">
                               @<?= esc($team['tiktok_username']); ?>
                            </a>
                        <?php else: ?>
                            -
                        <?php endif; ?>
                    </li>
                </ul>

                <a href="<?= base_url('/dashboard/team'); ?>" class="btn btn-secondary mt-4">
                    Kembali
                </a>
            </div>
        </div>
    </div>
</div>

<?= $this->include('dashboard/layouts/footer'); ?>
