<?= $this->include('dashboard/layouts/header'); ?>
<?= $this->include('dashboard/layouts/sidebar'); ?>

<div class="content">
    <div class="card shadow-sm p-4 bg-white rounded">

        <h3 class="fw-bold mb-4">✏️ Edit Blog</h3>

        <form action="<?= base_url('dashboard/blog/update/' . $blog['id']); ?>" 
              method="post" enctype="multipart/form-data">

            <?= csrf_field() ?>

            <!-- TITLE -->
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" 
                       class="form-control" 
                       value="<?= esc($blog['title']); ?>" required>
            </div>

            <!-- SLUG -->
            <div class="mb-3">
                <label class="form-label">Slug</label>
                <input type="text" name="slug" 
                       class="form-control" 
                       value="<?= esc($blog['slug']); ?>">
            </div>

            <!-- CONTENT -->
            <div class="mb-3">
                <label class="form-label">Content</label>
                <textarea name="content" rows="6" class="form-control" required><?= esc($blog['content']); ?></textarea>
            </div>

            <!-- UPLOAD_AT -->
            <div class="mb-3">
                <label class="form-label">Upload At</label>
                <input type="datetime-local" name="upload_at" 
                       value="<?= isset($blog['upload_at']) ? date('Y-m-d\TH:i', strtotime($blog['upload_at'])) : date('Y-m-d\TH:i') ?>" 
                       class="form-control" required>
            </div>

            <!-- CURRENT IMAGE -->
            <div class="mb-3">
                <label class="form-label">Thumbnail</label><br>

                <?php if (!empty($blog['image'])): ?>
                    <img src="<?= base_url('uploads/blog/' . $blog['image']); ?>" 
                         width="150" class="rounded mb-3" 
                         style="object-fit: cover;">
                <?php else: ?>
                    <p class="text-muted">No image uploaded.</p>
                <?php endif; ?>

               <input type="file" name="image" class="form-control mt-2">
                <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
            </div>

            <!-- BUTTONS -->
            <button class="btn btn-warning">Update Blog</button>
            <a href="<?= base_url('dashboard/blog'); ?>" class="btn btn-secondary">Kembali</a>

        </form>

    </div>
</div>

<?= $this->include('dashboard/layouts/footer'); ?>
