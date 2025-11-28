<?= $this->include('dashboard/layouts/header'); ?>
<?= $this->include('dashboard/layouts/sidebar'); ?>

<nav class="navbar-custom">
    <h5 class="mb-0">Settings</h5>
</nav>

<div class="content">

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <div class="card p-4 shadow-sm">
        <h5 class="fw-bold mb-3">Website Settings</h5>

        <form action="/settings/update" method="post">
            <div class="mb-3">
                <label class="form-label">Site Name</label>
                <input type="text" name="site_name" class="form-control"
                    value="<?= esc($settings['site_name'] ?? '') ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Site Description</label>
                <textarea name="site_description" class="form-control" rows="3"><?= esc($settings['site_description'] ?? '') ?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Admin Email</label>
                <input type="email" name="admin_email" class="form-control"
                    value="<?= esc($settings['admin_email'] ?? '') ?>">
            </div>

            <button class="btn btn-primary px-4">Save Changes</button>
        </form>
    </div>

</div>

<?= $this->include('dashboard/layouts/footer'); ?>