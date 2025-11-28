<?= $this->include('dashboard/layouts/header'); ?>
<?= $this->include('dashboard/layouts/sidebar'); ?>

<div class="content">
    <div class="card shadow-sm p-4 bg-white rounded">
        <h3 class="fw-bold mb-4">➕ Tambah Member Baru</h3>

        <form action="<?= site_url('members/store'); ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label class="form-label fw-semibold">Nama</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="4" placeholder="Tulis deskripsi singkat..." required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Foto</label>
                <input type="file" name="foto" class="form-control" accept="image/*">
                <small class="text-muted">Disarankan ukuran foto persegi (1:1)</small>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="<?= site_url('members'); ?>" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary" style="border-radius: 8px;">Simpan</button>
            </div>
        </form>
    </div>
</div>

<?= $this->include('dashboard/layouts/footer'); ?>