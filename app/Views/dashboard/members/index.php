<?= $this->include('dashboard/layouts/header'); ?>
<?= $this->include('dashboard/layouts/sidebar'); ?>

<div class="content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold">📋 Daftar Members</h4>
        <a href="<?= site_url('members/create'); ?>" class="btn btn-primary d-flex align-items-center" style="border-radius:8px; padding:6px 16px; font-weight:600;">
            <i class='bx bx-plus' style="margin-right:6px; font-size:1.2rem;"></i> Tambah Member
        </a>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <?php if (empty($members)): ?>
        <div class="text-center text-muted mt-5">
            <i class='bx bx-folder-open' style="font-size: 48px;"></i>
            <p class="mt-2">Belum ada member.</p>
        </div>
    <?php else: ?>
        <div class="table-responsive shadow-sm rounded">
            <table class="table table-hover align-middle bg-white">
                <thead class="table-light">
                    <tr>
                        <th width="5%">#</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th width="20%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($members as $member): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                                <?php if (!empty($member['foto'])): ?>
                                    <img src="<?= base_url('uploads/members/' . $member['foto']); ?>" width="50" height="50" style="border-radius:8px; object-fit:cover;">
                                <?php endif; ?>
                            </td>
                            <td><?= esc($member['nama']); ?></td>
                            <td><?= esc(strlen($member['deskripsi']) > 50 ? substr($member['deskripsi'], 0, 50) . '...' : $member['deskripsi']); ?></td>
                            <td class="text-center">
                                <a href="<?= site_url('members/edit/' . $member['id']); ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="<?= site_url('members/delete/' . $member['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>

<?= $this->include('dashboard/layouts/footer'); ?>