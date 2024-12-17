<?php
session_start();
include 'connect.php'; // Menghubungkan ke database

// CREATE: Menambahkan soal dan jawaban
if (isset($_POST['submit'])) {
    $id_soal = $_POST['id_soal'];
    $soal = $_POST['soal'];
    $jawaban = $_POST['jawaban'];

    $query = "INSERT INTO soal_regresi (id_soal, soal, jawaban) VALUES ('$id_soal', '$soal', '$jawaban')";
    if (mysqli_query($connect, $query)) {
        echo "Soal berhasil ditambahkan!";
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}

// UPDATE: Memperbarui soal dan jawaban
if (isset($_POST['update'])) {
    $id_soal = $_POST['id_soal'];
    $soal = $_POST['soal'];
    $jawaban = $_POST['jawaban'];

    $query = "UPDATE soal_regresi SET soal='$soal', jawaban='$jawaban' WHERE id_soal='$id_soal'";
    if (mysqli_query($connect, $query)) {
        echo "Soal berhasil diperbarui!";
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}

// DELETE: Menghapus soal
if (isset($_GET['delete'])) {
    $id_soal = $_GET['delete'];
    $query = "DELETE FROM soal_regresi WHERE id_soal='$id_soal'";
    if (mysqli_query($connect, $query)) {
        echo "Soal berhasil dihapus!";
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
    <title>CRUD Soal Regresi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
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
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        button {
            padding: 10px 15px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #575757;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>CRUD Soal Regresi</h1>
    <nav>
        <a href="home1.php">HOME</a>
        <a href="member.php">MEMBER</a>
        <a href="riwayat.php">RIWAYAT</a>
        <?php if (isset($_SESSION['admin'])): ?>
            <a href="logout.php">LOGOUT</a>
        <?php else: ?>
            <a href="login.php">LOGIN</a>
        <?php endif; ?>
    </nav>
</div>

<div class="container">
    <!-- Form Tambah Soal -->
    <form method="POST" action="">
        <label>ID Soal:</label><br>
        <input type="text" name="id_soal" required><br>
        <label>Soal:</label><br>
        <textarea name="soal" required></textarea><br>
        <label>Jawaban:</label><br>
        <textarea name="jawaban" required></textarea><br>
        <button type="submit" name="submit">Tambah Soal</button>
    </form>

    <hr>

    <!-- Tabel Soal -->
    <h3>Daftar Soal Regresi Linear Sederhana</h3>
    <table>
        <tr>
            <th>ID Soal</th>
            <th>Soal</th>
            <th>Jawaban</th>
            <th>Aksi</th>
        </tr>
        <?php
        // READ: Menampilkan semua soal
        $query = "SELECT * FROM soal_regresi";
        $result = mysqli_query($connect, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['id_soal']}</td>
                    <td>{$row['soal']}</td>
                    <td>{$row['jawaban']}</td>
                    <td>
                        <a href='?delete={$row['id_soal']}'>Hapus</a> |
                        <a href='edit_soal.php?id={$row['id_soal']}'>Edit</a>
                    </td>
                  </tr>";
        }
        ?>
    </table>
</div>

</body>
</html>
