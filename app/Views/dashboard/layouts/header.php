<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Dashboard'); ?></title>

    <!-- Sneat & Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6fb;
            font-family: 'Poppins', sans-serif;
        }

        .sidebar {
            width: 260px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            background: linear-gradient(180deg, #1e293b, #0f172a);
            color: white;
            transition: 0.3s;
            padding-top: 1rem;
        }

        .sidebar h4 {
            text-align: center;
            margin-bottom: 1rem;
            color: #38bdf8;
        }

        .sidebar a {
            color: #cbd5e1;
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 10px 20px;
            transition: 0.2s;
            font-size: 15px;
        }

        .sidebar a i {
            font-size: 20px;
            margin-right: 10px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: rgba(56, 189, 248, 0.15);
            color: #38bdf8;
        }

        .navbar-custom {
            margin-left: 260px;
            background: white;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 2rem;
        }

        .navbar-custom img {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
        }

        .content {
            margin-left: 260px;
            padding: 2rem;
        }

        .card {
            border: none;
            border-radius: 15px;
            transition: 0.2s;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
        }

        .card i {
            font-size: 32px;
            color: #38bdf8;
        }
    </style>
</head>

<body>