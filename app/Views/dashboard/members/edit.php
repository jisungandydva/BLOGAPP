<?= $this->include('dashboard/layouts/header'); ?>
<?= $this->include('dashboard/layouts/sidebar'); ?>

<div class="content">
    <div class="card shadow-sm p-4 bg-white rounded">
        <h3 class="fw-bold mb-4">✏️ Edit Member</h3>

        <form action="<?= site_url('members/update/' . $member['id']); ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label class="form-label fw-semibold">Nama</label>
                <input type="text" name="nama" class="form-control" value="<?= esc($member['nama']); ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="4" required><?= esc($member['deskripsi']); ?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Foto</label>
                <?php if (!empty($member['foto'])): ?>
                    <div class="mb-2">
                        <img src="<?= base_url('uploads/members/' . $member['foto']); ?>" width="90" height="90" style="border-radius: 8px; object-fit: cover;">
                    </div>
                <?php endif; ?>
                <input type="file" name="foto" class="form-control" accept="image/*">
                <small class="text-muted">Kosongkan jika tidak ingin mengganti foto</small>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="<?= site_url('members'); ?>" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary" style="border-radius: 8px;">Update</button>
            </div>
        </form>
    </div>
</div>

<?= $this->include('dashboard/layouts/footer'); ?>