<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROBSTUDY</title>
    <link rel="stylesheet" href="css/materi.css">
    <link rel="stylesheet" href="css/home.css">

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lalezar&display=swap" rel="stylesheet">
</head>

<body>

    <div class="header">
        <h1>PROBSTUDY</h1>
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

        <div class="container-logo">
            <div class="logo">
                PROBSS<span>tudy.</span>
            </div>
        </div>

        <div class="content">
            <h2>Apa itu ProbStudy?</h2>
            <div class="teks">
                <p>ProbStudy adalah platform belajar interaktif yang membantu Anda memahami algoritma dan rumus dalam materi Probabilitas dan Statistika. Kami memastikan pengalaman belajar Anda menjadi lebih mudah dan menarik.</p>
                <p> Di ProbsStudy, Anda tidak hanya mempelajari teori, tetapi juga melihat hasil perhitungan dalam visual interaktif untuk pemahaman yang lebih mendalam. Dengan pendekatan yang sederhana dan efektif, kami mendampingi perjalanan belajar Anda agar Probabilitas dan Statistika menjadi lebih mudah dan menyenangkan. Mari eksplorasi bersama ProbsStudy!</p>
            </div>
            <h3>Materi</h3>
            <div class="card-a">
                <a href="regresi.php">Regresi Linear Sederhana</a>
                <a href="eksponensial.php">Sebaran Peluang Distribusi Eksponensial</a>
                <a href="poisson.php">⁠Sebaran Peluang Diskrit (Poisson)</a>
                <a href="square.php">Chi Square</a>
                <a href="frekuensi.php">Distribusi Frekuensi</a>
            </div>
        </div>

        <div class="wrapper">
            <div class="form">
                <h2>Feedback</h2>
                <form action="submit_feedback.php" method="POST">
                    <textarea name="feedback"  placeholder="Tulis umpan balik Anda di sini..." required></textarea><br>
                    <div class="form-button">
                        <button type="submit">Kirim</button>
                    </div>
                </form>
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