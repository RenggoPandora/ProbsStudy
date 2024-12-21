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
    <link rel="stylesheet" href="css/materi.css">
    <link rel="stylesheet" href="css/profil.css">

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lalezar&display=swap" rel="stylesheet">

</head>

<body>

    <div class="navbar">
        <img src="assets/logo.png" alt="">
        <div class="nav">
            <a href="home1.php">HOME</a>
            <div class="dropdown">
                <a class="dropbtn">MATERI</a>
                <div class="dropdown-content">
                    <a href="regresi.php">Regresi Linear Sederhana</a>
                    <a href="eksponensial.php">Sebaran Peluang Distribusi Eksponensial</a>
                    <a href="poisson.php">⁠Sebaran Peluang Diskrit (Poisson)</a>
                    <a href="square.php">Chi Square</a>
                    <a href="frekuensi.php">Distribusi Frekuensi</a>
                </div>
            </div>
            <a href="riwayat.php">RIWAYAT</a>
        </div>
        <div class="button">
            <a href="profil.php"><button>PROFil</button></a>
            <?php if (isset($_SESSION['username'])): ?>
                <a href="logout.php"><button>LOGout</button></a>
            <?php else: ?>
                <a href="login.php"><button>LOGin</button></a>
            <?php endif; ?>
        </div>
    </div>

    <div class="profil-wrapper">
        <img src="assets/eksponensial.png" alt="">
        <div class="main-profil">
            <div class="atas">
                <h1>Hallo, <?= htmlspecialchars($username) ?> !!!</h1>
                <p><?= htmlspecialchars($userData['email']) ?></p>
            </div>
            <div class="tengah">

                <label for="password" id="passwordLabel">Ubah Password</label>
                <input type="text" class="password" id="passwordInput">
                <button id="passwordButton">Ubah</button>

                <button id="togglePassword">Ubah Password</button>

                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        const toggleButton = document.getElementById("togglePassword");
                        const passwordLabel = document.getElementById("passwordLabel");
                        const passwordInput = document.getElementById("passwordInput");
                        const passwordButton = document.getElementById("passwordButton");

                        toggleButton.addEventListener("click", () => {
                            const isHidden = passwordLabel.style.display === "none";
                            passwordLabel.style.display = isHidden ? "block" : "none";
                            passwordInput.style.display = isHidden ? "block" : "none";
                            passwordButton.style.display = isHidden ? "block" : "none";
                        });

                        passwordButton.addEventListener("click", () => {
                            passwordLabel.style.display = "none";
                            passwordInput.style.display = "none";
                            passwordButton.style.display = "none";
                        })
                    });
                </script>


            </div>
            <div class="bawah">
                <form method="post">
                    <button type="submit" name="logout">Logout</button>
                </form>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="kanan">
            <img src="assets/logo.png" alt="ProbStudy Logo">
            <p>© 2024 ProbStudy. All rights reserved.</p>
        </div>
        <div class="kiri">
            <h6>By</h6>
            <div class="list">
                <ul>
                    <li>Haniel</li>
                    <li>Renggo</li>
                    <li>Panca</li>
                    <li>Alfaen</li>
                    <li>Naufal</li>
                </ul>
            </div>
        </div>
    </div>

</body>

</html>