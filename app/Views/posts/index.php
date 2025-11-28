<?= $this->include('layout/header'); ?>
<?= $this->include('layout/sidebar'); ?>

<nav class="navbar-custom">
    <h5 class="mb-0">Posts</h5>
</nav>

<div class="content">
    <h3>Daftar Postingan</h3>

    <a href="/posts/create" class="btn btn-primary mb-3">+ Tambah Post</a>

    <ul>
        <?php if (!empty($posts)): ?>
            <?php foreach ($posts as $post): ?>
                <li>
                    <strong><?= esc($post['title']); ?></strong>
                    <a href="/posts/edit/<?= $post['id']; ?>">Edit</a>
                    <form action="/posts/delete/<?= $post['id']; ?>" method="post" style="display:inline;">
                        <?= csrf_field(); ?>
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Belum ada post.</p>
        <?php endif; ?>
    </ul>
</div>

<?= $this->include('layout/footer'); ?>