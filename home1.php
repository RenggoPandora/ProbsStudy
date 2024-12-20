<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROBSTUDY</title>
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
            box-shadow: 0px 8px 16px 0px rgba(131 129 129 / 66%);
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
        .content {
            text-align:justify;
            padding: 40px;
        }
        .image-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }
        .image-container img {
            width: 150px;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            margin-top: 150px;
        }
        .image-container img:hover {
            transform: scale(1.05);
        }
        .footer {
            text-align: center;
            padding: 20px;
            background-color: #fff;
            border-top: 2px solid #333;
        }
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

<div class="content">
    <h2>Apa itu ProbStudy?</h2>
    <p>ProbStudy adalah platform belajar interaktif yang membantu Anda memahami algoritma dan rumus dalam materi Probabilitas dan Statistika. Kami memastikan pengalaman belajar Anda menjadi lebih mudah dan menarik.</p>
    <p> Di ProbsStudy, Anda tidak hanya mempelajari teori, tetapi juga melihat hasil perhitungan dalam visual interaktif untuk pemahaman yang lebih mendalam. Dengan pendekatan yang sederhana dan efektif, kami mendampingi perjalanan belajar Anda agar Probabilitas dan Statistika menjadi lebih mudah dan menyenangkan. Mari eksplorasi bersama ProbsStudy!</p>
    
    <div class="image-container">
        <a href="regresi.php"><img src="assets/regresi.png" alt="Image 1"></a>
        <a href="eksponensial.php"><img src="assets/eksponensial.png" alt="Image 2"></a>
        <a href="poisson.php"><img src="assets/poisson.png" alt="Image 3"></a>
        <a href="square.php"><img src="assets/square.png" alt="Image 4"></a>
        <a href="frekuensi.php"><img src="assets/frekuensi.png" alt="Image 5"></a>
    </div>
</div>

<!-- Form untuk mengirimkan umpan balik -->
<form action="submit_feedback.php" method="POST" style="text-align: center; margin: 20px;">
    <textarea name="feedback" rows="4" cols="50" placeholder="Tulis umpan balik Anda di sini..." required></textarea><br>
    <button type="submit">Kirim</button>
</form>

<div class="footer">
    <p>© 2024 ProbStudy. All rights reserved.</p>
</div>

</body>
</html>
