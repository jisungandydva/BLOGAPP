<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="row justify-content-center">
  <div class="col-md-5">
    <div class="card shadow-lg border-0 rounded-4">
      <div class="card-body p-4">
        <h3 class="text-center mb-4 fw-bold text-primary">Login ke MyBlog</h3>
        <form action="#" method="post">
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email kamu" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Kata Sandi</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan kata sandi" required>
          </div>
          <button type="submit" class="btn btn-primary w-100">Masuk</button>
        </form>
        <p class="text-center mt-3 mb-0">Belum punya akun? <a href="#">Daftar</a></p>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
