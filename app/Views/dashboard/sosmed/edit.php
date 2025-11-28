<?= $this->extend('dashboard/layouts/main') ?>
<?= $this->section('content') ?>

<div class="content">
    <div class="container mt-5">
        <div class="card p-4">

        <h3 class="fw-bold mb-3">Edit Sosial Media – <?= esc($team['nama']) ?></h3>

        <form action="<?= base_url('dashboard/sosmed/update/' . $team['id']) ?>" method="post">

            <div class="mb-3">
                <label>Email</label>
                <input type="text" name="email" class="form-control" 
                       value="<?= esc($team['email']) ?>">
            </div>

            <div class="mb-3">
                <label>Instagram</label>
                <input type="text" name="instagram" class="form-control"
                       value="<?= esc($team['instagram_username']) ?>">
            </div>

            <div class="mb-3">
                <label>TikTok</label>
                <input type="text" name="tiktok" class="form-control"
                       value="<?= esc($team['tiktok_username']) ?>">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="<?= base_url('/dashboard/sosmed') ?>" class="btn btn-secondary">Kembali</a>

        </form>
    </div>
</div>

<?= $this->endSection() ?>
