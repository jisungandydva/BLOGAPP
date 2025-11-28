<?= $this->include('dashboard/layouts/header'); ?>
<?= $this->include('dashboard/layouts/sidebar'); ?>

<div class="content">
    <div class="card shadow-sm p-3 bg-white rounded">
        <h3 class="fw-bold mb-3">✏️ Edit User</h3>

        <form action="<?= base_url('users/update/' . $user['id']); ?>" method="post" enctype="multipart/form-data">

            <!-- Username & Email -->
            <div class="mb-2 d-flex gap-2">
                <div class="flex-fill">
                    <label class="form-label fw-semibold">Username</label>
                    <input type="text" name="username" class="form-control form-control-sm"
                           value="<?= esc($user['username']); ?>" required>
                </div>
                <div class="flex-fill">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" class="form-control form-control-sm"
                           value="<?= esc($user['email']); ?>" required>
                </div>
            </div>

            <!-- Password -->
            <div class="mb-2">
                <label class="form-label fw-semibold">
                    Password <small class="text-muted">(kosongkan jika tidak diubah)</small>
                </label>
                <input type="password" name="password" class="form-control form-control-sm">
            </div>

            <!-- Foto -->
            <div class="mb-2">
                <label class="form-label fw-semibold">Foto</label>

                <?php if (!empty($user['photo'])): ?>
                    <div class="mb-1">
                        <img src="<?= base_url('uploads/users/' . $user['photo']); ?>"
                             width="70" height="70"
                             style="border-radius: 6px; object-fit: cover;">
                    </div>
                <?php endif; ?>

                <input type="file" name="foto" class="form-control form-control-sm" accept="image/*">
                <small class="text-muted">Kosongkan jika tidak ingin mengganti foto</small>
            </div>

            <!-- Role & Status -->
            <div class="mb-2 d-flex gap-2">
                <div class="flex-fill">
                    <label class="form-label fw-semibold">Role</label>
                    <select name="role" class="form-select form-select-sm" required>
                        <option value="user" <?= $user['role']=='user'?'selected':''; ?>>User</option>
                        <option value="admin" <?= $user['role']=='admin'?'selected':''; ?>>Admin</option>
                    </select>
                </div>
                <div class="flex-fill">
                    <label class="form-label fw-semibold">Status</label>
                    <select name="status" class="form-select form-select-sm" required>
                        <option value="active" <?= $user['status']=='active'?'selected':''; ?>>Active</option>
                        <option value="inactive" <?= $user['status']=='inactive'?'selected':''; ?>>Inactive</option>
                    </select>
                </div>
            </div>

            <!-- Tombol -->
            <div class="d-flex justify-content-between mt-3">
                <a href="<?= base_url('users'); ?>" class="btn btn-secondary btn-sm" style="border-radius: 6px;">
                    Kembali
                </a>
                <button type="submit" class="btn btn-primary btn-sm" style="border-radius: 6px;">
                    Update
                </button>
            </div>

        </form>
    </div>
</div>

<?= $this->include('dashboard/layouts/footer'); ?>
