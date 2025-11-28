<?= $this->extend('dashboard/layouts/main') ?>
<?= $this->section('content') ?>

<div class="content">
    <div class="container mt-5">
        <div class="card p-4 shadow-sm">

            <h3 class="fw-bold mb-4">Tambah Sosial Media</h3>

            <form action="<?= base_url('dashboard/sosmed/store') ?>" method="post">

                <!-- PILIH ANGGOTA TEAM -->
                <div class="mb-3">
                    <label class="fw-semibold">Nama Anggota</label>
                    <select name="team_id" class="form-control" required>
                        <option value="">-- Pilih Anggota --</option>
                        <?php foreach ($teams as $t): ?>
                            <option value="<?= $t['id'] ?>">
                                <?= esc($t['nama']) ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>

                <!-- EMAIL -->
                <div class="mb-3">
                    <label class="fw-semibold">Email</label>
                    <input 
                        type="email" 
                        name="email" 
                        class="form-control" 
                        placeholder="Email anggota"
                    >
                </div>

                <!-- INSTAGRAM -->
                <div class="mb-3">
                    <label class="fw-semibold">Instagram Username</label>
                    <input 
                        type="text" 
                        name="instagram_username" 
                        class="form-control" 
                        placeholder="Contoh: addndaacytra"
                    >
                </div>

                <!-- TIKTOK -->
                <div class="mb-3">
                    <label class="fw-semibold">TikTok Username</label>
                    <input 
                        type="text" 
                        name="tiktok_username" 
                        class="form-control" 
                        placeholder="Contoh: addndaacytra_"
                    >
                </div>

                <!-- BUTTON -->
                <button type="submit" class="btn btn-primary w-100 mb-2">Simpan</button>
                <a href="<?= base_url('/dashboard/sosmed') ?>" class="btn btn-secondary w-100">
                    Kembali
                </a>

            </form>

        </div>
    </div>
</div>

<?= $this->endSection() ?>
