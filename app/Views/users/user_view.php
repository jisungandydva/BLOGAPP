<?= $this->include('dashboard/layouts/header'); ?>
<?= $this->include('dashboard/layouts/sidebar'); ?>

<div class="content">

    <!-- ALERT SUCCESS -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show mx-3 mt-2" role="alert">
            <?= session()->getFlashdata('success'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold mb-0">👤 Daftar Users</h4>
        <a href="<?= base_url('users/create'); ?>" class="btn btn-primary shadow-sm btn-sm">
            + Tambah User
        </a>
    </div>

    <div class="card shadow-sm rounded">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-primary">
                    <tr>
                        <th class="text-center" style="width: 50px;">No</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th style="width: 80px;">Foto</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th class="text-center" style="width: 150px;">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php if (!empty($users) && is_array($users)) : ?>
                    <?php $no = 1; foreach ($users as $user): ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td class="fw-semibold"><?= esc($user['username']); ?></td>
                            <td><?= esc($user['email']); ?></td>

                            <!-- FOTO USER (OTOMATIS DEFAULT JIKA KOSONG) -->
                            <td>
                                <?php
                                    $userPhoto = 'uploads/users/' . $user['photo'];
                                    $defaultPhoto = 'uploads/users/default.jpg';

                                    if (!empty($user['photo']) && file_exists(FCPATH . $userPhoto)) {
                                        $photo = base_url($userPhoto);
                                    } else {
                                        $photo = base_url($defaultPhoto);
                                    }
                                ?>
                                <img src="<?= $photo; ?>" class="user-photo">
                            </td>

                            <td>
                                <span class="badge bg-primary"><?= esc($user['role']); ?></span>
                            </td>

                            <td>
                                <?php if ($user['status'] === 'active'): ?>
                                    <span class="badge bg-success">Active</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary">Inactive</span>
                                <?php endif; ?>
                            </td>

                            <td class="text-center">
                                <a href="<?= base_url('users/edit/' . $user['id']); ?>"
                                   class="btn btn-warning btn-sm me-1">Edit</a>
                                <a href="<?= base_url('users/delete/' . $user['id']); ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Yakin ingin menghapus user ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center text-muted py-3">
                            Belum ada data user 🙁
                        </td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->include('dashboard/layouts/footer'); ?>

<style>
/* ======================
   Compact User View
   ====================== */
.content {
    padding: 15px 20px;
}

.card {
    border-radius: 8px;
    padding: 10px;
}

.table th {
    background-color: #2563eb !important;
    color: white !important;
    font-weight: 600;
    text-align: center;
    padding: 6px 8px;
    font-size: 0.8rem;
}

.table td {
    padding: 6px 8px;
    font-size: 0.8rem;
}

.btn {
    font-size: 0.75rem;
    padding: 4px 10px;
}

.user-photo {
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 50%;
    border: 1.5px solid #ddd;
}
</style>
