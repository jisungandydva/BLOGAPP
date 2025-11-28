<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= esc($title ?? 'Dashboard') ?></title>
</head>

<body>

    <!-- Header (HANYA 1X) -->
    <?= $this->include('dashboard/layouts/header'); ?>

    <div class="d-flex">

        <!-- Sidebar (HANYA 1X) -->
        <?= $this->include('dashboard/layouts/sidebar'); ?>

        <!-- Konten Utama -->
        <main class="flex-grow-1 p-4">
            <?= $this->renderSection('content'); ?>
        </main>
    </div>

    <!-- Footer (HANYA 1X) -->
    <?= $this->include('dashboard/layouts/footer'); ?>

</body>

</html>
