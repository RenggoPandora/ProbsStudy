<?php
include("connect.php");
session_start();

$isLogin = !isset($_GET['signup']); // Tentukan apakah login atau signup

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $inputUsername = trim($_POST['username']);
    $inputPassword = trim($_POST['password']);

    if ($isLogin) {
        // Login logic
        if (!empty($inputUsername) && !empty($inputPassword)) {
            // Check in user table
            $stmt = $connect->prepare("SELECT password FROM user WHERE username = ?");
            $stmt->bind_param("s", $inputUsername);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if (password_verify($inputPassword, $row['password'])) {
                    $_SESSION['username'] = $inputUsername;
                    header("Location: home1.php");
                    exit();
                }
            }

            // Check in admin table
            $stmt = $connect->prepare("SELECT password FROM admin WHERE username = ?");
            $stmt->bind_param("s", $inputUsername);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if (password_verify($inputPassword, $row['password'])) {
                    $_SESSION['admin'] = $inputUsername;
                    header("Location: crud_soal.php");
                    exit();
                }
            }

            // Check in owner table
            $stmt = $connect->prepare("SELECT password FROM owner WHERE username = ?");
            $stmt->bind_param("s", $inputUsername);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if (password_verify($inputPassword, $row['password'])) {
                    $_SESSION['admin'] = $inputUsername;
                    header("Location: owner.php");
                    exit();
                }
            }

            echo "<script>alert('Login gagal. Periksa username atau password Anda.');</script>";
        } else {
            echo "<script>alert('Harap isi semua field.');</script>";
        }
    } else {
        // Signup logic
        $email = trim($_POST['email']);
        $password = password_hash($inputPassword, PASSWORD_BCRYPT);

        if (!empty($inputUsername) && !empty($email) && !empty($password)) {
            $stmt = $connect->prepare("INSERT INTO user (username, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $inputUsername, $email, $password);

            if ($stmt->execute()) {
                echo "<script>alert('Pendaftaran berhasil! Silakan login.'); window.location.href='login.php';</script>";
            } else {
                echo "<script>alert('Pendaftaran gagal. Username mungkin sudah digunakan.');</script>";
            }
        } else {
            echo "<script>alert('Harap isi semua field.');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Signup</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            width: 350px;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        label {
            display: block;
            text-align: left;
            margin: 10px 0 5px;
            font-size: 14px;
            color: #555;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
        a {
            display: block;
            margin-top: 10px;
            color: #007BFF;
            text-decoration: none;
            font-size: 14px;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2><?= $isLogin ? 'Login' : 'Signup' ?></h2>
        <form method="post" action="">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>

            <?php if (!$isLogin): ?>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            <?php endif; ?>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>

            <button type="submit"><?= $isLogin ? 'Login' : 'Signup' ?></button>
        </form>
        <a href="login.php<?= $isLogin ? '?signup=true' : '' ?>">
            <?= $isLogin ? 'Belum punya akun? Signup di sini.' : 'Sudah punya akun? Login di sini.' ?>
        </a>
    </div>
</body>
</html>
