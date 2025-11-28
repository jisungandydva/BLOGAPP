<?= $this->include('dashboard/layouts/header'); ?>
<?= $this->include('dashboard/layouts/sidebar'); ?>

<div class="content">
    <div class="card shadow-sm p-4 bg-white rounded">
        <h3 class="fw-bold mb-4">➕ Tambah Anggota Team</h3>

        <form action="<?= base_url('dashboard/team/store'); ?>" 
              method="post" enctype="multipart/form-data">

            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Posisi</label>
                <input type="text" name="posisi" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" required></textarea>
            </div>

            <!-- FOTO -->
            <div class="mb-3">
                <label class="form-label">Foto</label>
                <input type="file" name="foto" class="form-control" required>
            </div>

            <hr class="my-4">

            <h4 class="fw-bold mb-3">🔗 Sosial Media</h4>

            <div class="mb-3">
                <label class="form-label">Instagram</label>
                <input type="text" name="instagram" class="form-control" placeholder="@username / link">
            </div>

            <div class="mb-3">
                <label class="form-label">Facebook</label>
                <input type="text" name="facebook" class="form-control" placeholder="Link Facebook">
            </div>

            <div class="mb-3">
                <label class="form-label">WhatsApp</label>
                <input type="text" name="whatsapp" class="form-control" placeholder="Nomor WA">
            </div>

            <div class="mb-3">
                <label class="form-label">LinkedIn</label>
                <input type="text" name="linkedin" class="form-control" placeholder="Link LinkedIn">
            </div>

            <div class="mb-3">
                <label class="form-label">TikTok</label>
                <input type="text" name="tiktok" class="form-control" placeholder="@username / link">
            </div>

            <div class="mb-3">
                <label class="form-label">GitHub</label>
                <input type="text" name="github" class="form-control" placeholder="username / link">
            </div>

            <button class="btn btn-success">Simpan</button>
            <a href="<?= base_url('dashboard/team'); ?>" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

<?= $this->include('dashboard/layouts/footer'); ?>
