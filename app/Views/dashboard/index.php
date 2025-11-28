<?= $this->include('dashboard/layouts/header'); ?>
<?= $this->include('dashboard/layouts/sidebar'); ?>

<?php
$userPhoto = session()->get('photo');
$photoPath = 'uploads/users/' . $userPhoto;
$defaultPhoto = 'uploads/users/default.jpg';
$photo = (!empty($userPhoto) && file_exists(FCPATH.$photoPath)) ? base_url($photoPath) : base_url($defaultPhoto);
?>

<div class="navbar-custom">
    <h6>Dashboard</h6>
    <img src="<?= $photo ?>" alt="User Photo">
</div>

<div class="content">

    <!-- Top Stats -->
    <div class="row g-4 mb-4">
        
        <!-- BLOG -->
        <div class="col-md-4">
            <div class="card p-4 shadow-sm">
                <div class="d-flex align-items-center">
                    <i class='bx bx-news fs-1 me-3'></i>
                    <div>
                        <h6 class="fw-bold">Total Blog</h6>
                        <p class="text-muted mb-1">Artikel yang dipublish</p>
                        <h4 class="fw-bold"><?= $total_blog ?></h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- Users -->
        <div class="col-md-4">
            <div class="card p-4 shadow-sm">
                <div class="d-flex align-items-center">
                    <i class='bx bx-user fs-1 me-3'></i>
                    <div>
                        <h6 class="fw-bold">Users</h6>
                        <p class="text-muted mb-1">Total terdaftar</p>
                        <h4 class="fw-bold"><?= $total_users ?></h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dummy Traffic -->
        <div class="col-md-4">
            <div class="card p-4 shadow-sm">
                <div class="d-flex align-items-center">
                    <i class='bx bx-trending-up fs-1 me-3'></i>
                    <div>
                        <h6 class="fw-bold">Traffic</h6>
                        <p class="text-muted mb-1">Pengunjung bulan ini</p>
                        <h4 class="fw-bold"><?= rand(240, 900) ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Blog -->
    <div class="row g-4">
        <div class="col-md-8">
            <div class="card p-4 shadow-sm">
                <h5 class="fw-bold mb-3">Blog Terbaru</h5>

                <table class="table table-hover">
    <thead>
        <tr>
            <th>Judul</th>
            <th>Upload</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($recent_blog as $post): ?>
            <tr>
                <td><?= esc($post['title']) ?></td>
                <td><?= date('d M Y', strtotime($post['upload_at'])) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


                <?php if (empty($recent_blog)): ?>
                    <p class="text-muted">Belum ada blog. Mulai buat sekarang!</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Activity Log -->
        <div class="col-md-4">
            <div class="card p-4 shadow-sm">
                <h5 class="fw-bold mb-3">Aktivitas Terakhir</h5>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item">✔ Blog baru ditambahkan</li>
                    <li class="list-group-item">✔ User baru mendaftar</li>
                    <li class="list-group-item">✔ Admin mengupdate artikel</li>
                    <li class="list-group-item">✔ Backup otomatis berhasil</li>
                </ul>
            </div>
        </div>
    </div>

</div>

<?= $this->include('dashboard/layouts/footer'); ?>
