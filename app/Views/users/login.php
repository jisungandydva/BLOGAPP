<?= $this->extend('dashboard/layouts/auth_main') ?>
<?= $this->section('content') ?>

<style>
body {
  background: #0f172a;
  color: #e2e8f0;
  font-family: 'Poppins', sans-serif;
  overflow-x: hidden;
}
.card-neon {
  background: #1e293b;
  border: 1px solid #334155;
  border-radius: 15px;
  box-shadow: 0 0 25px rgba(59,130,246,0.25);
  width: 380px;
  opacity: 0;
  transform: translateY(40px);
  animation: fadeSlideIn 1s ease-out forwards;
}
@keyframes fadeSlideIn {
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
input {
  background: #334155 !important;
  color: #f1f5f9 !important;
  border: none !important;
  transition: all 0.3s ease;
}
input:focus {
  box-shadow: 0 0 8px rgba(59,130,246,0.6);
}
.btn-neon {
  background: linear-gradient(90deg, #3b82f6, #9333ea);
  border: none;
  font-weight: 600;
  color: #fff;
  transition: 0.3s ease;
}
.btn-neon:hover {
  transform: scale(1.03);
  opacity: 0.9;
}
a {
  color: #60a5fa;
  transition: 0.3s ease;
}
a:hover {
  color: #93c5fd;
}
</style>

<div class="d-flex justify-content-center align-items-start" style="min-height:100vh; padding-top:80px;">
  <div class="card-neon p-4">

    <h4 class="text-center fw-bold mb-3 text-white">Login to Dashboard ⚡</h4>
    <p class="text-center text-gray-400 mb-4" style="font-size: 14px;">
      Silakan masukkan email dan password untuk melanjutkan.
    </p>

    <!-- ALERT ERROR / SUCCESS -->
    <?php if (session()->getFlashdata('error')) : ?>
      <div class="alert py-2 mb-3" 
           style="background:#dc2626; color:white; border-radius:6px; font-size:13px;">
          <?= session()->getFlashdata('error'); ?>
      </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')) : ?>
      <div class="alert py-2 mb-3" 
           style="background:#16a34a; color:white; border-radius:6px; font-size:13px;">
          <?= session()->getFlashdata('success'); ?>
      </div>
    <?php endif; ?>
    <!-- END ALERT -->

    <form action="<?= site_url('login/process') ?>" method="post">
      <?= csrf_field() ?>

      <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control form-control-sm" required placeholder="Masukkan email">
      </div>

      <div class="mb-4">
        <label>Password</label>
        <input type="password" name="password" class="form-control form-control-sm" required placeholder="Masukkan password">
      </div>

      <button type="submit" class="btn btn-neon w-100 py-2">Login</button>
    </form>

    <p class="text-center mt-3">
      Belum punya akun? <a href="<?= site_url('register') ?>">Register</a>
    </p>
  </div>
</div>

<?= $this->endSection() ?>
