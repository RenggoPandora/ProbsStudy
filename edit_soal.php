<?php
include 'connect.php';

// Ambil data soal berdasarkan ID
if (isset($_GET['id'])) {
    $id_soal = $_GET['id'];
    $query = "SELECT * FROM soal_regresi WHERE id_soal='$id_soal'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
}

if (isset($_POST['update'])) {
    $id_soal = $_POST['id_soal'];
    $soal = $_POST['soal'];
    $jawaban = $_POST['jawaban'];

    $query = "UPDATE soal_regresi SET soal='$soal', jawaban='$jawaban' WHERE id_soal='$id_soal'";
    if (mysqli_query($connect, $query)) {
        header("Location: crud_soal.php"); // Redirect setelah update
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Soal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h2 {
            color: #333;
        }
        form {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], textarea {
            width: 100%;
            height: 100px;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #5cb85c;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>
    <h2>Edit Soal</h2>
    <form method="POST" action="">
        <label>ID Soal:</label><br>
        <input type="text" name="id_soal" value="<?php echo $row['id_soal']; ?>" readonly><br>
        <label>Soal:</label><br>
        <textarea name="soal" required><?php echo $row['soal']; ?></textarea><br>
        <label>Jawaban:</label><br>
        <textarea name="jawaban" required><?php echo $row['jawaban']; ?></textarea><br>
        <button type="submit" name="update">Update Soal</button>
    </form>
</body>
</html>
