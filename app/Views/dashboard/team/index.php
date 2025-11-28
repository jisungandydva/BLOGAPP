<?= $this->include('dashboard/layouts/header'); ?>
<?= $this->include('dashboard/layouts/sidebar'); ?>

<style>
    /* Hanya memotong deskripsi */
    .col-deskripsi {
        max-width: 260px;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 3;   /* tampilkan 3 baris */
        -webkit-box-orient: vertical;
        white-space: normal;
    }

    /* Kolom lainnya biarkan normal */
    .table td {
        vertical-align: middle !important;
    }
</style>

<div class="content">
    <div class="card shadow-sm p-4 bg-white rounded">
        
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="fw-bold">👥 Daftar Team</h3>
            <a href="<?= base_url('dashboard/team/create'); ?>" class="btn btn-primary">
                + Tambah Anggota
            </a>
        </div>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
        <?php endif; ?>

        <table class="table table-bordered table-hover mt-3">
            <thead class="table-dark text-center">
                <tr>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Posisi</th>
                    <th>Deskripsi</th>
                    <th>Email</th>
                    <th>Instagram</th>
                    <th>TikTok</th>
                    <th width="160">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($team as $row): ?>
                <tr class="align-middle">

                    <!-- FOTO -->
                    <td class="text-center">
                        <?php if ($row['foto']): ?>
                            <img src="<?= base_url('uploads/team/' . $row['foto']) ?>" 
                                 width="70" height="70" class="rounded-circle">
                        <?php else: ?>
                            <span class="text-muted">Tidak ada foto</span>
                        <?php endif; ?>
                    </td>

                    <td><?= esc($row['nama']) ?></td>
                    <td><?= esc($row['posisi']) ?></td>

                    <!-- DESKRIPSI DIPENDEKKAN -->
                    <td class="col-deskripsi">
                        <?= esc($row['deskripsi']) ?>
                    </td>

                    <td><?= esc($row['email']) ?></td>

                    <td>
                        <?= $row['instagram_username'] ? '@'.esc($row['instagram_username']) : '<span class="text-muted">-</span>' ?>
                    </td>

                    <td>
                        <?= $row['tiktok_username'] ? '@'.esc($row['tiktok_username']) : '<span class="text-muted">-</span>' ?>
                    </td>

                    <td class="text-center">
                        <a href="<?= base_url('dashboard/team/edit/' . $row['id']); ?>"
                           class="btn btn-warning btn-sm">Edit</a>

                        <a href="<?= base_url('dashboard/team/delete/' . $row['id']); ?>"
                           onclick="return confirm('Hapus anggota ini?')"
                           class="btn btn-danger btn-sm">Delete</a>
                    </td>

                </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>
</div>

<?= $this->include('dashboard/layouts/footer'); ?>
