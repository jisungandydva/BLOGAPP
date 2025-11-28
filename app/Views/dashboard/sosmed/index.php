<?= $this->include('dashboard/layouts/header'); ?>
<?= $this->include('dashboard/layouts/sidebar'); ?>

<div class="content">
    <div class="card shadow-sm p-4 bg-white rounded">

        <h3 class="fw-bold mb-4">Sosial Media Team</h3>

        <a href="/dashboard/sosmed/create" class="btn btn-primary mb-3 w-100">
            Tambah Sosmed
        </a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Instagram</th>
                    <th>TikTok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($team as $t): ?>
                <tr>
                    <td><?= esc($t['nama']) ?></td>
                    <td><?= esc($t['email']) ?></td>
                    <td>@<?= esc($t['instagram_username']) ?></td>
                    <td>@<?= esc($t['tiktok_username']) ?></td>
                    <td>

                        <!-- EDIT -->
                        <a href="/dashboard/sosmed/edit/<?= $t['id'] ?>" 
                           class="btn btn-warning btn-sm">
                           Edit
                        </a>

                        <!-- DELETE -->
                        <a href="/dashboard/sosmed/delete/<?= $t['id'] ?>"
                           onclick="return confirm('Yakin ingin menghapus data sosmed ini?')"
                           class="btn btn-danger btn-sm">
                           Delete
                        </a>

                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>

<?= $this->include('dashboard/layouts/footer'); ?>
