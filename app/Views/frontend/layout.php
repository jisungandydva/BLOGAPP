<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= esc($title ?? '3 Bocah Anolima - Portofolio') ?></title>
  <meta name="description" content="Portofolio tiga sahabat kreatif: Adinda, Merri, dan Fierdhiva. Kami berbagi karya, cerita, dan inspirasi.">

  <link rel="icon" href="<?= base_url('assets/img/favicon.png') ?>" type="image/png">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <!-- AOS Animation -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>

<body class="bg-dark text-light" style="background-color: #0d0d0d !important;">

  <!-- Navbar -->
  <?= $this->include('partials/navbar') ?>

  <!-- Main Content -->
  <main class="m-0 p-0 w-100" style="background: transparent !important;">
    <?= $this->renderSection('content') ?>
  </main>

  <!-- Footer -->
  <?= $this->include('partials/footer') ?>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- AOS JS -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init({ once: true, duration: 800 });
  </script>

</body>
</html>
