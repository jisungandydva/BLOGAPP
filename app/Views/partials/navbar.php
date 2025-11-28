<nav class="navbar navbar-expand-lg navbar-dark shadow-sm fixed-top" style="background-color: #0B141B !important;">
  <div class="container">
    <a class="navbar-brand fw-bold fs-4 text-warning" href="<?= base_url('/') ?>">
      <i class="bi bi-stars me-2"></i>3 Bocah Anolima
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTeam" aria-controls="navbarTeam" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTeam">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?= (uri_string() == '') ? 'active text-warning' : '' ?>" href="<?= base_url('/') ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= (uri_string() == 'about') ? 'active text-warning' : '' ?>" href="<?= base_url('about') ?>">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= (uri_string() == 'team') ? 'active text-warning' : '' ?>" href="<?= base_url('team') ?>">Team</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= (uri_string() == 'blog') ? 'active text-warning' : '' ?>" href="<?= base_url('blog') ?>">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= (uri_string() == 'contact') ? 'active text-warning' : '' ?>" href="<?= base_url('contact') ?>">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
