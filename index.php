<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProbsStudy</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        header {
            display: flex;
            justify-content: flex-end;
            padding: 10px;
        }
        header a {
            margin-left: 10px;
            text-decoration: none;
            color: black;
            padding: 5px 10px;
            border: 1px solid black;
            border-radius: 5px;
        }
        h1 {
            font-size: 3em;
            margin-top: 50px;
        }
        button {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 1.2em;
            background-color: white;
            border: 1px solid black;
            border-radius: 5px;
            cursor: pointer;
        }
        nav {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #f0f0f0;
            padding: 10px;
            display: flex;
            justify-content: space-around;
        }
        nav a {
            text-decoration: none;
            color: black;
            font-size: 1em;
        }
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            bottom: 100%;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px -8px 16px 0px rgba(131, 129, 129, 0.66);
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
    <header>
        <a href="login.php">Login</a>
        <a href="login.php">Sign Up</a>
    </header>
    <h1><span style="font-weight: normal;">PROBS</span><span style="font-weight: bold;">STUDY</span></h1>
    <button onclick="location.href='login.php'">Start</button>
    <nav>
        <a href="home1.php">Home</a>
        <div class="dropdown">
        <a class="dropbtn">Materi</a>
        <div class="dropdown-content">
            <a href="regresi.php">Regresi Linear Sederhana</a>
            <a href="eksponensial.php">Sebaran Peluang Distribusi Eksponensial</a>
            <a href="poisson.php">⁠Sebaran Peluang Diskrit (Poisson)</a>
            <a href="square.php">Chi Square</a>
            <a href="frekuensi.php">Distribusi Frekuensi</a>
        </div>
    </div>
        <a href="riwayat.php">Riwayat</a>
    </nav>
</body>
</html>
