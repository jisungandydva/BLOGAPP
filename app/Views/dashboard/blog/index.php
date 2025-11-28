<?= $this->include('dashboard/layouts/header'); ?>
<?= $this->include('dashboard/layouts/sidebar'); ?>

<div class="content">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Blog List</h4>
        <a href="<?= base_url('dashboard/blog/create') ?>" class="btn btn-primary">+ Add New Blog</a>
    </div>

    <!-- FLASH MESSAGE -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <div class="card">
        <div class="card-body">
            
            <table class="table table-bordered table-striped align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Content</th>
                        <th>Author</th>
                        <th>Upload At</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if (empty($blogs)) : ?>
                        <tr>
                            <td colspan="8" class="text-center">No data.</td>
                        </tr>
                    <?php else : ?>
                        <?php $no = 1; foreach ($blogs as $row) : ?>
                            <tr>
                                <td><?= $no++ ?></td>

                                <td>
                                    <?php if (!empty($row['image']) && file_exists('uploads/blog/' . $row['image'])) : ?>
                                        <img src="<?= base_url('uploads/blog/' . $row['image']) ?>"
                                             width="70" height="70"
                                             class="rounded"
                                             style="object-fit: cover;">
                                    <?php else : ?>
                                        <span class="text-muted">No Image</span>
                                    <?php endif; ?>
                                </td>

                                <td><?= esc($row['title']) ?></td>
                                <td><?= esc($row['slug']) ?></td>

                                <!-- CONTENT (dipotong 100 karakter) -->
                                <td>
                                    <?php 
                                        $content = strip_tags($row['content']);
                                        echo strlen($content) > 100 
                                            ? substr($content, 0, 100) . '...' 
                                            : $content;
                                    ?>
                                </td>

                                <td><?= esc($row['author']) ?></td>

                                <!-- UPLOAD AT -->
                                <td><?= date('d M Y H:i', strtotime($row['upload_at'])) ?></td>

                                <!-- ACTIONS -->
                                <td class="d-flex gap-1">
                                    <a href="<?= base_url('dashboard/blog/edit/' . $row['id']) ?>" 
                                       class="btn btn-warning btn-sm">Edit</a>

                                    <form action="<?= base_url('dashboard/blog/delete/' . $row['id']) ?>" 
                                          method="post" 
                                          onsubmit="return confirm('Delete this blog?')">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>

            <!-- PAGINATION -->
            <div class="mt-3">
                <?= $pager->links('blogs', 'default_full') ?>
            </div>

        </div>
    </div>

</div>

<?= $this->include('dashboard/layouts/footer'); ?>
