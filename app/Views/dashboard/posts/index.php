<?= $this->include('dashboard/layouts/header'); ?>
<?= $this->include('dashboard/layouts/sidebar'); ?>

<?php
$userPhoto = session()->get('photo');
$photoPath = 'uploads/users/' . $userPhoto;
$defaultPhoto = 'uploads/users/default.jpg';
$photo = (!empty($userPhoto) && file_exists(FCPATH.$photoPath)) ? base_url($photoPath) : base_url($defaultPhoto);
?>

<div class="navbar-custom">
    <h6>Posts Management</h6>
    <img src="<?= $photo ?>" alt="User Photo">
</div>

<div class="content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold text-dark">📚 Daftar Postingan</h4>
        <a href="<?= site_url('posts/create') ?>" class="btn btn-primary d-flex align-items-center" style="border-radius:8px; padding:6px 16px;">
            <i class='bx bx-plus' style="margin-right:6px;"></i> Tambah Post
        </a>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <?php if (empty($posts)): ?>
        <div class="text-center text-muted mt-5">
            <i class='bx bx-folder-open' style="font-size: 48px;"></i>
            <p class="mt-2">Belum ada postingan.</p>
        </div>
    <?php else: ?>
        <div class="table-responsive shadow-sm rounded">
            <table class="table table-hover align-middle bg-white">
                <thead class="table-light">
                    <tr>
                        <th width="5%">#</th>
                        <th>Judul</th>
                        <th>Konten</th>
                        <th width="20%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($posts as $post): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td class="fw-semibold"><?= esc($post['title']) ?></td>
                            <td><?= esc(strlen($post['content']) > 70 ? substr($post['content'], 0, 70) . '...' : $post['content']) ?></td>
                            <td class="text-center">
                                <a href="<?= site_url('posts/edit/' . $post['id']) ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                                <form action="<?= site_url('posts/delete/' . $post['id']) ?>" method="post" style="display:inline;">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin ingin menghapus post ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>

<?= $this->include('dashboard/layouts/footer'); ?>