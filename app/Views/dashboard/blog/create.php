<?= $this->include('dashboard/layouts/header'); ?>
<?= $this->include('dashboard/layouts/sidebar'); ?>

<div class="content">

    <h4 class="mb-4">Add New Blog</h4>

    <!-- FLASH MESSAGE -->
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <div class="card">
        <div class="card-body">

            <!-- Form POST ke route dashboard/blog/store -->
            <form action="<?= base_url('dashboard/blog/store') ?>" method="post" enctype="multipart/form-data">

                <?= csrf_field() ?>

                <div class="mb-3">
                    <label class="fw-semibold">Title</label>
                    <input type="text" name="title" value="<?= old('title') ?>" 
                           class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="fw-semibold">Slug</label>
                    <input type="text" name="slug" value="<?= old('slug') ?>" 
                           class="form-control">
                    <small class="text-muted">Optional, will auto-generate if left blank.</small>
                </div>

                <div class="mb-3">
                    <label class="fw-semibold">Thumbnail (Image)</label>
                    <input type="file" name="image" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="fw-semibold">Content</label>
                    <textarea name="content" class="form-control" rows="8"><?= old('content') ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="fw-semibold">Upload At</label>
                    <input type="datetime-local" name="upload_at" 
                           value="<?= old('upload_at') ?: date('Y-m-d\TH:i') ?>" 
                           class="form-control" required>
                </div>

                <!-- BUTTONS -->
                <div class="d-flex justify-content-end mt-3">
                    <a href="<?= base_url('dashboard/blog') ?>" class="btn btn-secondary me-2">Kembali</a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>

            </form>

        </div>
    </div>

</div>

<?= $this->include('dashboard/layouts/footer'); ?>
