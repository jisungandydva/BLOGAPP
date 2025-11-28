<?= $this->include('dashboard/layouts/header'); ?>
<?= $this->include('dashboard/layouts/sidebar'); ?>

<div class="content">
    <div class="card shadow-sm p-3 bg-white rounded">
        <h3 class="fw-bold mb-3">➕ Tambah User Baru</h3>

        <!-- =======================
             Blok error flashdata
             ======================= -->
        <?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?php foreach(session()->getFlashdata('error') as $err): ?>
                    <div><?= $err ?></div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('users/store') ?>" method="post" enctype="multipart/form-data">

            <!-- Username & Email -->
            <div class="mb-2 d-flex gap-2">
                <div class="flex-fill">
                    <label class="form-label fw-semibold">Username</label>
                    <input type="text" name="username" class="form-control form-control-sm"
                           value="<?= old('username') ?>"
                           placeholder="Masukkan username" required>
                </div>
                <div class="flex-fill">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" class="form-control form-control-sm"
                           value="<?= old('email') ?>"
                           placeholder="Masukkan email" required>
                </div>
            </div>

            <!-- Password -->
            <div class="mb-2">
                <label class="form-label fw-semibold">Password</label>
                <input type="password" name="password" class="form-control form-control-sm"
                       placeholder="Masukkan password" required>
            </div>

            <!-- Foto -->
            <div class="mb-2">
                <label class="form-label fw-semibold">Foto</label>
                <input type="file" name="photo" class="form-control form-control-sm" accept="image/*">
                <small class="text-muted">Opsional, bisa kosong</small>
            </div>

            <!-- Role & Status -->
            <div class="mb-2 d-flex gap-2">
                <div class="flex-fill">
                    <label class="form-label fw-semibold">Role</label>
                    <select name="role" class="form-select form-select-sm" required>
                        <option value="user" <?= old('role')=='user'?'selected':''; ?>>User</option>
                        <option value="admin" <?= old('role')=='admin'?'selected':''; ?>>Admin</option>
                    </select>
                </div>
                <div class="flex-fill">
                    <label class="form-label fw-semibold">Status</label>
                    <select name="status" class="form-select form-select-sm" required>
                        <option value="active" <?= old('status')=='active'?'selected':''; ?>>Active</option>
                        <option value="inactive" <?= old('status')=='inactive'?'selected':''; ?>>Inactive</option>
                    </select>
                </div>
            </div>

            <!-- Tombol -->
            <div class="d-flex justify-content-between mt-3">
                <a href="<?= site_url('users') ?>" class="btn btn-secondary btn-sm" style="border-radius: 6px;">
                    Batal
                </a>
                <button type="submit" class="btn btn-primary btn-sm" style="border-radius: 6px;">
                    Simpan
                </button>
            </div>

        </form>
    </div>
</div>

<?= $this->include('dashboard/layouts/footer'); ?>
