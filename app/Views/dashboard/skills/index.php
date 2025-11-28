<?= $this->include('dashboard/layouts/header'); ?>
<?= $this->include('dashboard/layouts/sidebar'); ?>

<div class="content">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Skills List</h4>
        <a href="<?= base_url('dashboard/skills/create') ?>" class="btn btn-primary">+ Add New Skill</a>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <div class="card">
        <div class="card-body">
            
            <table class="table table-bordered table-striped align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Team</th>
                        <th>Skill</th>
                        <th>Level</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 1; foreach ($skills as $row): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= esc($row['team_name']) ?></td>
                            <td><?= esc($row['skill_name']) ?></td>
                            <td><?= esc($row['skill_level']) ?></td>

                            <td class="d-flex gap-1">
                                <a href="<?= base_url('dashboard/skills/edit/' . $row['id']) ?>" 
                                   class="btn btn-warning btn-sm">Edit</a>

                                <a href="<?= base_url('dashboard/skills/delete/' . $row['id']) ?>"
                                   onclick="return confirm('Hapus skill ini?')"
                                   class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>

        </div>
    </div>

</div>

<?= $this->include('dashboard/layouts/footer'); ?>
