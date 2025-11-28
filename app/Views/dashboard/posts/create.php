<?= $this->include('dashboard/layouts/header'); ?>
<?= $this->include('dashboard/layouts/sidebar'); ?>

<nav class="navbar-custom">
    <h5 class="mb-0">Tambah Post</h5>
    <img src="https://i.pravatar.cc/36" alt="User Avatar">
</nav>

<div class="content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold text-dark">📝 Tambah Post</h4>
        <a href="<?= site_url('posts') ?>" class="btn btn-secondary">
            <i class='bx bx-arrow-back'></i> Kembali
        </a>
    </div>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <div class="card shadow-sm rounded">
        <div class="card-body">
            <form action="<?= site_url('posts/store') ?>" method="post">
                <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan judul post" required>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Konten</label>
                    <textarea class="form-control" id="content" name="content" rows="6" placeholder="Tulis konten post" required></textarea>
                </div>
                <button type="submit" class="btn btn-outline-primary">
                    <i class='bx bx-save'></i> Simpan
                </button>
            </form>
        </div>
    </div>
</div>

<?= $this->include('dashboard/layouts/footer'); ?>