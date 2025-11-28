<?= $this->include('dashboard/layouts/header'); ?>
<?= $this->include('dashboard/layouts/sidebar'); ?>

<div class="content">
    <div class="card shadow-sm p-4 bg-white rounded">

        <h3 class="fw-bold mb-4">✏️ Edit Anggota Team</h3>

        <form 
            action="<?= base_url('dashboard/team/update/' . $team['id']); ?>" 
            method="post" 
            enctype="multipart/form-data"
        >

            <!-- NAMA -->
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input 
                    type="text" 
                    name="nama" 
                    class="form-control" 
                    value="<?= esc($team['nama']); ?>" 
                    required
                >
            </div>

            <!-- POSISI -->
            <div class="mb-3">
                <label class="form-label">Posisi</label>
                <input 
                    type="text" 
                    name="posisi" 
                    class="form-control" 
                    value="<?= esc($team['posisi']); ?>" 
                    required
                >
            </div>

            <!-- DESKRIPSI -->
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea 
                    name="deskripsi" 
                    class="form-control" 
                    required
                ><?= esc($team['deskripsi']); ?></textarea>
            </div>

            <!-- EMAIL -->
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    class="form-control"
                    value="<?= esc($team['email']); ?>"
                    placeholder="Masukkan email"
                >
            </div>

            <!-- INSTAGRAM -->
            <div class="mb-3">
                <label class="form-label">Instagram Username</label>
                <input 
                    type="text" 
                    name="instagram_username" 
                    class="form-control"
                    value="<?= esc($team['instagram_username']); ?>"
                    placeholder="Contoh: adindaacytra"
                >
            </div>

            <!-- TIKTOK -->
            <div class="mb-3">
                <label class="form-label">TikTok Username</label>
                <input 
                    type="text" 
                    name="tiktok_username" 
                    class="form-control"
                    value="<?= esc($team['tiktok_username']); ?>"
                    placeholder="Contoh: adindaacytra_"
                >
            </div>

            <!-- FOTO -->
            <div class="mb-3">
                <label class="form-label">Foto</label><br>

                <img 
                    src="<?= base_url('uploads/team/' . $team['foto']); ?>" 
                    width="120" 
                    class="rounded mb-3"
                ><br>

                <input type="file" name="foto" class="form-control">
                <small class="text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
            </div>

            <!-- BUTTON -->
            <button class="btn btn-warning">Update</button>
            <a href="<?= base_url('dashboard/team'); ?>" class="btn btn-secondary">Kembali</a>

        </form>
    </div>
</div>

<?= $this->include('dashboard/layouts/footer'); ?>
