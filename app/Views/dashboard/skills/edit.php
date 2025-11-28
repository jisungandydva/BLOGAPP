<?= $this->include('dashboard/layouts/header'); ?>
<?= $this->include('dashboard/layouts/sidebar'); ?>

<div class="content">

    <h4 class="mb-3">Edit Skill</h4>

    <form action="<?= base_url('dashboard/skills/update/' . $skill['id']) ?>" method="post">

        <div class="mb-3">
            <label>Team</label>
            <select name="team_id" class="form-control" required>
                <?php foreach ($teams as $t): ?>
                    <option value="<?= $t['id'] ?>"
                        <?= ($t['id'] == $skill['team_id']) ? 'selected' : '' ?>>
                        <?= esc($t['nama']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Skill Name</label>
            <input type="text" name="skill_name" class="form-control" value="<?= esc($skill['skill_name']) ?>" required>
        </div>

        <div class="mb-3">
            <label>Skill Level</label>
            <select name="skill_level" class="form-control">
                <option value="Basic" <?= ($skill['skill_level'] == 'Basic') ? 'selected' : '' ?>>Basic</option>
                <option value="Intermediate" <?= ($skill['skill_level'] == 'Intermediate') ? 'selected' : '' ?>>Intermediate</option>
                <option value="Advanced" <?= ($skill['skill_level'] == 'Advanced') ? 'selected' : '' ?>>Advanced</option>
            </select>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="<?= base_url('dashboard/skills') ?>" class="btn btn-secondary">Back</a>
    </form>

</div>

<?= $this->include('dashboard/layouts/footer'); ?>
