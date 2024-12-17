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
            display: flex;
            justify-content: space-between;
            background-color: #333;
            color: white;
            padding: 10px 20px;
        }
        .header nav {
            display: flex;
            gap: 10px;
            justify-content: space-around;
            padding: 10px 20px;
            align-items: center;
        }
        .header a {
            color: white;
            text-decoration: none;
            padding: 10px;
        }
        .header a:hover {
            background-color: #575757;
        }
        .content {
            background-color: #bdbdbd;
            width: 100%;
            padding: 20px;
            box-sizing: border-box;
            text-align: center;
        }
        .image-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 50px;
        }
        .image-container img {
            width: 200px; /* Adjust size as needed */
            height: auto;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            transition: transform 0.2s ease-in-out;
            animation: slide-in 0.5s ease-in-out;
            background-color: #f4f4f4;
        }
        .image-container img:hover {
            transform: scale(1.05);
        }
        .logo-container {
            display: flex;
            justify-content: center;   /* Tambahkan margin jika diperlukan */
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
    </style>
</head>
<body>

<div class="header">
    <h1>PROBSTUDY</h1>
    <nav>
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
    </nav>
</div>

<div class="logo-container">
    <img src="assets/logo.png" alt="Single Image">
</div>

<div class="content">
    <p> Kami adalah platform belajar interaktif yang dirancang khusus untuk membantu Anda memahami algoritma dan rumus dalam materi Probabilitas dan Statistika. Melalui kombinasi materi yang jelas, latihan soal lengkap dengan jawaban, dan fitur unggulan seperti kalkulator grafik, kami memastikan pengalaman belajar Anda menjadi lebih mudah dan menarik <br> <br>
     Di ProbsStudy, Anda tidak hanya belajar teori, tetapi juga dapat langsung melihat hasil perhitungan dalam bentuk visual yang interaktif. Dengan begitu, Anda dapat memahami konsep lebih mendalam dan aplikatif.  Kami percaya bahwa setiap orang bisa menguasai probabilitas dan statistika dengan pendekatan yang tepat. 
     ProbsStudy hadir untuk mendampingi perjalanan belajar Anda dengan cara yang sederhana, efektif, dan menyenangkan. Mari mulai eksplorasi dan tingkatkan pemahaman Anda bersama kami! 
    
    <div class="image-container">
        <a href="regresi.php"><img src="assets/regresi.png" alt="Image 1"></a>
        <a href="eksponensial.php"><img src="assets/eksponensial.png" alt="Image 2"></a>
        <a href="poisson.php"><img src="assets/poisson.png" alt="Image 3"></a>
        <a href="square.php"><img src="assets/square.png" alt="Image 4"></a>
        <a href="frekuensi.php"><img src="assets/frekuensi.png" alt="Image 5"></a>
    </div>


</body>
</html>
