<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>WCash</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">


    <style>
        body {
            background: #f1f5f9;
            font-family: 'Inter', sans-serif;
        }

        .sidebar {
            min-height: 100vh;
            background: #0f172a;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 5px;
        }

        .sidebar a:hover {
            background: #1e293b;
        }

        .stat-card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .active-menu {
            background: #1e40af;
            color: white !important;
        }

        table {
            border-radius: 12px;
            overflow: hidden;
        }

        .table thead {
            background: #0f172a;
            color: white;
        }

        .btn {
            border-radius: 10px;
        }
    </style>

</head>

<body>