<?= $this->include('dashboard/layouts/header'); ?>
<?= $this->include('dashboard/layouts/sidebar'); ?>

<div class="content">

    <h4 class="mb-3">Add New Skill</h4>

    <form action="<?= base_url('dashboard/skills/store') ?>" method="post">

        <div class="mb-3">
            <label>Team</label>
            <select name="team_id" class="form-control" required>
                <option value="">-- Select Team --</option>
                <?php foreach ($teams as $t): ?>
                    <option value="<?= $t['id'] ?>"><?= esc($t['nama']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Skill Name</label>
            <input type="text" name="skill_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Skill Level</label>
            <select name="skill_level" class="form-control">
                <option value="Basic">Basic</option>
                <option value="Intermediate">Intermediate</option>
                <option value="Advanced">Advanced</option>
            </select>
        </div>

        <button class="btn btn-primary">Save</button>
        <a href="<?= base_url('dashboard/skills') ?>" class="btn btn-secondary">Back</a>
    </form>

</div>

<?= $this->include('dashboard/layouts/footer'); ?>
