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
        <a href="materi.php">Materi</a>
    </nav>
</body>
</html>
