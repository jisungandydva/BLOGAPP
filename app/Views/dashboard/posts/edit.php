<?= $this->extend('dashboard/layouts/main') ?>
<?= $this->section('content') ?>

<div class="card p-4">
    <h3 class="fw-bold mb-3">Edit Skill</h3>

    <form action="/dashboard/skills/update/<?= $skill['id'] ?>" method="post">

        <div class="mb-3">
            <label>Team</label>
            <select name="team_id" class="form-control">
                <?php foreach ($teams as $t): ?>
                    <option value="<?= $t['id'] ?>" 
                        <?= ($t['id'] == $skill['team_id']) ? 'selected' : '' ?>>
                        <?= esc($t['name']) ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Nama Skill</label>
            <input type="text" name="skill_name" class="form-control" 
                   value="<?= esc($skill['skill_name']) ?>" required>
        </div>

        <div class="mb-3">
            <label>Level Skill</label>
            <select name="skill_level" class="form-control">
                <option value="Basic" <?= $skill['skill_level'] == 'Basic' ? 'selected' : '' ?>>Basic</option>
                <option value="Intermediate" <?= $skill['skill_level'] == 'Intermediate' ? 'selected' : '' ?>>Intermediate</option>
                <option value="Advanced" <?= $skill['skill_level'] == 'Advanced' ? 'selected' : '' ?>>Advanced</option>
            </select>
        </div>

        <button class="btn btn-success">Update</button>
    </form>

</div>

<?= $this->endSection() ?>
