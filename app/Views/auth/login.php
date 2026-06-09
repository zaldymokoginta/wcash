<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>WCash Login</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #e0e7ff, #f1f5f9);
        }

        .card {
            width: 380px;
            background: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #1f2937;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 12px;
            border-radius: 10px;
            border: 1px solid #ddd;
            outline: none;
        }

        input:focus {
            border-color: #2563eb;
        }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 10px;
            background: #2563eb;
            color: white;
            font-weight: 600;
            cursor: pointer;
        }

        button:hover {
            background: #1d4ed8;
        }

        .link {
            text-align: center;
            margin-top: 12px;
            font-size: 14px;
        }

        .link a {
            color: #2563eb;
            text-decoration: none;
        }

        .link a:hover {
            text-decoration: underline;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 10px;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <div class="card">

        <h2>WCash Login</h2>

        <!-- FLASH ERROR -->
        <?php if (isset($_SESSION['error'])): ?>
            <div class="error"><?= $_SESSION['error'];
                                unset($_SESSION['error']); ?></div>
        <?php endif; ?>

        <!-- FLASH SUCCESS -->
        <?php if (isset($_SESSION['success'])): ?>
            <div class="success"><?= $_SESSION['success'];
                                    unset($_SESSION['success']); ?></div>
        <?php endif; ?>

        <form method="POST" action="/wcash/public/login">

            <input type="email" name="email" placeholder="Email" required>

            <input type="password" name="password" placeholder="Password" required>

            <button type="submit">Login</button>

        </form>

        <div class="link">
            Belum punya akun? <a href="/wcash/public/register">Register</a>
        </div>

    </div>

</body>

</html>