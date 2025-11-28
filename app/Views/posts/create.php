<!DOCTYPE html>
<html>

<head>
    <title>Tambah Post</title>
</head>

<body>
    <h1>Tambah Post</h1>
    <form action="/posts/store" method="post">
        <?= csrf_field() ?>
        <p>Judul: <input type="text" name="title"></p>
        <p>Konten: <textarea name="content"></textarea></p>
        <button type="submit">Simpan</button>
    </form>
</body>

</html>