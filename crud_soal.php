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
</head>
<body>
    <h2>CRUD Soal Regresi</h2>

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
    <h3>Daftar Soal</h3>
    <table border="1">
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
</body>
</html>
