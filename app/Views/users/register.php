<?= $this->extend('dashboard/layouts/auth_main') ?>
<?= $this->section('content') ?>

<style>
body {
  background: #0f172a;
  color: #e2e8f0;
  font-family: 'Poppins', sans-serif;
}
.card-neon {
  background: #1e293b;
  border: 1px solid #334155;
  border-radius: 15px;
  box-shadow: 0 0 20px rgba(59,130,246,0.2);
  width: 400px;
}
input {
  background: #334155 !important;
  color: #f1f5f9 !important;
  border: none !important;
}
.btn-neon {
  background: linear-gradient(90deg, #3b82f6, #9333ea);
  border: none;
  font-weight: 600;
  color: #fff;
}
.btn-neon:hover {
  opacity: 0.85;
}
a {
  color: #60a5fa;
}
</style>

<div class="d-flex justify-content-center align-items-center" style="height:90vh;">
  <div class="card-neon p-4">
    <h4 class="text-center fw-bold mb-3 text-white">Create Account 🚀</h4>
    <p class="text-center text-gray-400 mb-4" style="font-size: 14px;">Join us and explore the dashboard</p>

    <form action="<?= site_url('register/process') ?>" method="post">
      <?= csrf_field() ?>
      <div class="mb-3">
        <label>Username</label>
        <input type="text" name="username" class="form-control form-control-sm" required>
      </div>
      <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control form-control-sm" required>
      </div>
      <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control form-control-sm" required>
      </div>
      <div class="mb-4">
        <label>Konfirmasi Password</label>
        <input type="password" name="password_confirm" class="form-control form-control-sm" required>
      </div>
      <button class="btn btn-neon w-100 py-2">Register</button>
    </form>

    <p class="text-center mt-3">
      Sudah punya akun? <a href="<?= site_url('login') ?>">Login</a>
    </p>
  </div>
</div>

<?= $this->endSection() ?>
