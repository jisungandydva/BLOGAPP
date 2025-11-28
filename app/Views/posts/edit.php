<!DOCTYPE html>
<html>

<head>
    <title>Edit Post</title>
</head>

<body>
    <h1>Edit Post</h1>
    <form action="/posts/update/<?= $post['id'] ?>" method="post">
        <?= csrf_field() ?>
        <p>Judul: <input type="text" name="title" value="<?= esc($post['title']) ?>"></p>
        <p>Konten: <textarea name="content"><?= esc($post['content']) ?></textarea></p>
        <button type="submit">Update</button>
    </form>
</body>

</html>