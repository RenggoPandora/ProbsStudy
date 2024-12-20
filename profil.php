<?php
session_start();
include("connect.php");

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Fetch user data from the database
$username = $_SESSION['username'];
$stmt = $connect->prepare("SELECT email FROM user WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $userData = $result->fetch_assoc();
} else {
    echo "User data not found.";
    exit();
}

// Logout logic
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: logout.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .header {
            text-align: center;
            padding: 100px;
            background-color: #fff;
            border-bottom: 2px solid #333;
        }
        .header h1 {
            font-size: 48px;
            font-weight: bold;
            color: #333;
        }
        .nav {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 20px 0;
        }
        .nav a {
            color: #333;
            text-decoration: none;
            font-weight: bold;
        }
        .nav a:hover {
            text-decoration: underline;
        }
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(131, 129, 129, 0.66);
            z-index: 1;
        }
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: center;
        }
        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        /* Add any additional styles specific to profil.php here */
    </style>
</head>
<body>
    <div class="header">
        <h1>PROBSTUDY</h1>
        <div class="nav">
            <a href="home1.php">HOME</a>
            <div class="dropdown">
                <a class="dropbtn">MATERI</a>
                <div class="dropdown-content">
                    <a href="regresi.php">Regresi Linear Sederhana</a>
                    <a href="eksponensial.php">Sebaran Peluang Distribusi Eksponensial</a>
                    <a href="poisson.php">Sebaran Peluang Diskrit (Poisson)</a>
                    <a href="square.php">Chi Square</a>
                    <a href="frekuensi.php">Distribusi Frekuensi</a>
                </div>
            </div>
            <a href="riwayat.php">RIWAYAT</a>
            <?php if (isset($_SESSION['username'])): ?>
                <a href="profil.php">PROFIL</a>
                <a href="logout.php">LOGOUT</a>
            <?php else: ?>
                <a href="login.php">LOGIN</a>
            <?php endif; ?>
        </div>
    </div>
    <h1>Welcome, <?= htmlspecialchars($username) ?></h1>
    <p>Email: <?= htmlspecialchars($userData['email']) ?></p>
    <form method="post">
        <button type="submit" name="logout">Logout</button>
    </form>
</body>
</html>
