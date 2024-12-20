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
        header("Location: crud_soal.php"); // Redirect setelah update
        exit();
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

// CREATE: Menambahkan soal dan jawaban Poisson
if (isset($_POST['submit_poisson'])) {
    $id_soal = $_POST['id_soal'];
    $soal = $_POST['soal'];
    $jawaban = $_POST['jawaban'];

    $query = "INSERT INTO soal_poisson (id_soal, soal, jawaban) VALUES ('$id_soal', '$soal', '$jawaban')";
    if (mysqli_query($connect, $query)) {
        echo "Soal Poisson berhasil ditambahkan!";
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}

// UPDATE: Memperbarui soal dan jawaban Poisson
if (isset($_POST['update_poisson'])) {
    $id_soal = $_POST['id_soal'];
    $soal = $_POST['soal'];
    $jawaban = $_POST['jawaban'];

    $query = "UPDATE soal_poisson SET soal='$soal', jawaban='$jawaban' WHERE id_soal='$id_soal'";
    if (mysqli_query($connect, $query)) {
        header("Location: crud_soal.php"); // Redirect setelah update
        exit();
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}

// DELETE: Menghapus soal Poisson
if (isset($_GET['delete_poisson'])) {
    $id_soal = $_GET['delete_poisson'];
    $query = "DELETE FROM soal_poisson WHERE id_soal='$id_soal'";
    if (mysqli_query($connect, $query)) {
        echo "Soal Poisson berhasil dihapus!";
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}

// CREATE: Menambahkan soal dan jawaban Eksponensial
if (isset($_POST['submit_eksponensial'])) {
    $id_soal = $_POST['id_soal'];
    $soal = $_POST['soal'];
    $jawaban = $_POST['jawaban'];

    $query = "INSERT INTO soal_eksponensial (id_soal, soal, jawaban) VALUES ('$id_soal', '$soal', '$jawaban')";
    if (mysqli_query($connect, $query)) {
        echo "Soal Eksponensial berhasil ditambahkan!";
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}

// UPDATE: Memperbarui soal dan jawaban Eksponensial
if (isset($_POST['update_eksponensial'])) {
    $id_soal = $_POST['id_soal'];
    $soal = $_POST['soal'];
    $jawaban = $_POST['jawaban'];

    $query = "UPDATE soal_eksponensial SET soal='$soal', jawaban='$jawaban' WHERE id_soal='$id_soal'";
    if (mysqli_query($connect, $query)) {
        header("Location: crud_soal.php"); // Redirect setelah update
        exit();
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}

// DELETE: Menghapus soal Eksponensial
if (isset($_GET['delete_eksponensial'])) {
    $id_soal = $_GET['delete_eksponensial'];
    $query = "DELETE FROM soal_eksponensial WHERE id_soal='$id_soal'";
    if (mysqli_query($connect, $query)) {
        echo "Soal Eksponensial berhasil dihapus!";
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}

// Ambil data soal untuk edit Eksponensial
$row_eksponensial = null; // Inisialisasi variabel
if (isset($_GET['id_eksponensial'])) {
    $id_soal = $_GET['id_eksponensial'];
    $query = "SELECT * FROM soal_eksponensial WHERE id_soal='$id_soal'";
    $result = mysqli_query($connect, $query);
    $row_eksponensial = mysqli_fetch_assoc($result);
}

// CREATE: Menambahkan soal dan jawaban Square
if (isset($_POST['submit_square'])) {
    $id_soal = $_POST['id_soal'];
    $soal = $_POST['soal'];
    $jawaban = $_POST['jawaban'];

    $query = "INSERT INTO soal_square (id_soal, soal, jawaban) VALUES ('$id_soal', '$soal', '$jawaban')";
    if (mysqli_query($connect, $query)) {
        echo "Soal Square berhasil ditambahkan!";
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}

// UPDATE: Memperbarui soal dan jawaban Square
if (isset($_POST['update_square'])) {
    $id_soal = $_POST['id_soal'];
    $soal = $_POST['soal'];
    $jawaban = $_POST['jawaban'];

    $query = "UPDATE soal_square SET soal='$soal', jawaban='$jawaban' WHERE id_soal='$id_soal'";
    if (mysqli_query($connect, $query)) {
        header("Location: crud_soal.php"); // Redirect setelah update
        exit();
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}

// DELETE: Menghapus soal Square
if (isset($_GET['delete_square'])) {
    $id_soal = $_GET['delete_square'];
    $query = "DELETE FROM soal_square WHERE id_soal='$id_soal'";
    if (mysqli_query($connect, $query)) {
        echo "Soal Square berhasil dihapus!";
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}

// Ambil data soal untuk edit Square
$row_square = null; // Inisialisasi variabel
if (isset($_GET['id_square'])) {
    $id_soal = $_GET['id_square'];
    $query = "SELECT * FROM soal_square WHERE id_soal='$id_soal'";
    $result = mysqli_query($connect, $query);
    $row_square = mysqli_fetch_assoc($result);
}

// CREATE: Menambahkan soal dan jawaban Frekuensi
if (isset($_POST['submit_frekuensi'])) {
    $id_soal = $_POST['id_soal'];
    $soal = $_POST['soal'];
    $jawaban = $_POST['jawaban'];

    $query = "INSERT INTO soal_frekuensi (id_soal, soal, jawaban) VALUES ('$id_soal', '$soal', '$jawaban')";
    if (mysqli_query($connect, $query)) {
        echo "Soal Frekuensi berhasil ditambahkan!";
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}

// UPDATE: Memperbarui soal dan jawaban Frekuensi
if (isset($_POST['update_frekuensi'])) {
    $id_soal = $_POST['id_soal'];
    $soal = $_POST['soal'];
    $jawaban = $_POST['jawaban'];

    $query = "UPDATE soal_frekuensi SET soal='$soal', jawaban='$jawaban' WHERE id_soal='$id_soal'";
    if (mysqli_query($connect, $query)) {
        header("Location: crud_soal.php"); // Redirect setelah update
        exit();
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}

// DELETE: Menghapus soal Frekuensi
if (isset($_GET['delete_frekuensi'])) {
    $id_soal = $_GET['delete_frekuensi'];
    $query = "DELETE FROM soal_frekuensi WHERE id_soal='$id_soal'";
    if (mysqli_query($connect, $query)) {
        echo "Soal Frekuensi berhasil dihapus!";
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}

// Ambil data soal untuk edit Frekuensi
$row_frekuensi = null; // Inisialisasi variabel
if (isset($_GET['id_frekuensi'])) {
    $id_soal = $_GET['id_frekuensi'];
    $query = "SELECT * FROM soal_frekuensi WHERE id_soal='$id_soal'";
    $result = mysqli_query($connect, $query);
    $row_frekuensi = mysqli_fetch_assoc($result);
}

// Ambil data soal untuk edit
$row = null; // Inisialisasi variabel
if (isset($_GET['id'])) {
    $id_soal = $_GET['id'];
    $query = "SELECT * FROM soal_regresi WHERE id_soal='$id_soal'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
}

// Ambil data soal Poisson untuk edit
$row_poisson = null; // Inisialisasi variabel
if (isset($_GET['id_poisson'])) {
    $id_soal = $_GET['id_poisson'];
    $query = "SELECT * FROM soal_poisson WHERE id_soal='$id_soal'";
    $result = mysqli_query($connect, $query);
    $row_poisson = mysqli_fetch_assoc($result);
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
        .crud_topik {
            margin-bottom: 30px;
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
    <h1>CRUD Soal Admin</h1>
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
    <div class="crud_topik">
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
                        <a href='crud_soal.php?id={$row['id_soal']}'>Edit</a>
                    </td>
                  </tr>";
        }
        ?>
    </table>
    </div>
    <div class="crud_topik">
    <!-- Form Tambah Soal Poisson -->
    <form method="POST" action="">
        <label>ID Soal Poisson:</label><br>
        <input type="text" name="id_soal" required><br>
        <label>Soal Poisson:</label><br>
        <textarea name="soal" required></textarea><br>
        <label>Jawaban Poisson:</label><br>
        <textarea name="jawaban" required></textarea><br>
        <button type="submit" name="submit_poisson">Tambah Soal Poisson</button>
    </form>

    <hr>

    <!-- Tabel Soal Poisson -->
    <h3>Daftar Soal Poisson</h3>
    <table>
        <tr>
            <th>ID Soal Poisson</th>
            <th>Soal Poisson</th>
            <th>Jawaban Poisson</th>
            <th>Aksi</th>
        </tr>
        <?php
        // READ: Menampilkan semua soal Poisson
        $query = "SELECT * FROM soal_poisson";
        $result = mysqli_query($connect, $query);

        while ($row_poisson = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row_poisson['id_soal']}</td>
                    <td>{$row_poisson['soal']}</td>
                    <td>{$row_poisson['jawaban']}</td>
                    <td>
                        <a href='?delete_poisson={$row_poisson['id_soal']}'>Hapus</a> |
                        <a href='crud_soal.php?id_poisson={$row_poisson['id_soal']}'>Edit</a>
                    </td>
                  </tr>";
        }
        ?>
    </table>
    </div>
    <div class="crud_topik">
    <!-- Form Tambah Soal Eksponensial -->
    <form method="POST" action="">
        <label>ID Soal Eksponensial:</label><br>
        <input type="text" name="id_soal" required><br>
        <label>Soal Eksponensial:</label><br>
        <textarea name="soal" required></textarea><br>
        <label>Jawaban Eksponensial:</label><br>
        <textarea name="jawaban" required></textarea><br>
        <button type="submit" name="submit_eksponensial">Tambah Soal Eksponensial</button>
    </form>

    <hr>

    <!-- Tabel Soal Eksponensial -->
    <h3>Daftar Soal Eksponensial</h3>
    <table>
        <tr>
            <th>ID Soal Eksponensial</th>
            <th>Soal Eksponensial</th>
            <th>Jawaban Eksponensial</th>
            <th>Aksi</th>
        </tr>
        <?php
        // READ: Menampilkan semua soal Eksponensial
        $query = "SELECT * FROM soal_eksponensial";
        $result = mysqli_query($connect, $query);

        while ($row_eksponensial = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row_eksponensial['id_soal']}</td>
                    <td>{$row_eksponensial['soal']}</td>
                    <td>{$row_eksponensial['jawaban']}</td>
                    <td>
                        <a href='?delete_eksponensial={$row_eksponensial['id_soal']}'>Hapus</a> |
                        <a href='crud_soal.php?id_eksponensial={$row_eksponensial['id_soal']}'>Edit</a>
                    </td>
                  </tr>";
        }
        ?>
    </table>
    </div>
    <div class="crud_topik">
    <!-- Form Tambah Soal Square -->
    <form method="POST" action="">
        <label>ID Soal Square:</label><br>
        <input type="text" name="id_soal" required><br>
        <label>Soal Square:</label><br>
        <textarea name="soal" required></textarea><br>
        <label>Jawaban Square:</label><br>
        <textarea name="jawaban" required></textarea><br>
        <button type="submit" name="submit_square">Tambah Soal Square</button>
    </form>

    <hr>

    <!-- Tabel Soal Square -->
    <h3>Daftar Soal Square</h3>
    <table>
        <tr>
            <th>ID Soal Square</th>
            <th>Soal Square</th>
            <th>Jawaban Square</th>
            <th>Aksi</th>
        </tr>
        <?php
        // READ: Menampilkan semua soal Square
        $query = "SELECT * FROM soal_square";
        $result = mysqli_query($connect, $query);

        while ($row_square = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row_square['id_soal']}</td>
                    <td>{$row_square['soal']}</td>
                    <td>{$row_square['jawaban']}</td>
                    <td>
                        <a href='?delete_square={$row_square['id_soal']}'>Hapus</a> |
                        <a href='crud_soal.php?id_square={$row_square['id_soal']}'>Edit</a>
                    </td>
                  </tr>";
        }
        ?>
    </table>
    </div>
    <div class="crud_topik">
    <!-- Form Tambah Soal Frekuensi -->
    <form method="POST" action="">
        <label>ID Soal Frekuensi:</label><br>
        <input type="text" name="id_soal" required><br>
        <label>Soal Frekuensi:</label><br>
        <textarea name="soal" required></textarea><br>
        <label>Jawaban Frekuensi:</label><br>
        <textarea name="jawaban" required></textarea><br>
        <button type="submit" name="submit_frekuensi">Tambah Soal Frekuensi</button>
    </form>

    <hr>

    <!-- Tabel Soal Frekuensi -->
    <h3>Daftar Soal Frekuensi</h3>
    <table>
        <tr>
            <th>ID Soal Frekuensi</th>
            <th>Soal Frekuensi</th>
            <th>Jawaban Frekuensi</th>
            <th>Aksi</th>
        </tr>
        <?php
        // READ: Menampilkan semua soal Frekuensi
        $query = "SELECT * FROM soal_frekuensi";
        $result = mysqli_query($connect, $query);

        while ($row_frekuensi = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row_frekuensi['id_soal']}</td>
                    <td>{$row_frekuensi['soal']}</td>
                    <td>{$row_frekuensi['jawaban']}</td>
                    <td>
                        <a href='?delete_frekuensi={$row_frekuensi['id_soal']}'>Hapus</a> |
                        <a href='crud_soal.php?id_frekuensi={$row_frekuensi['id_soal']}'>Edit</a>
                    </td>
                  </tr>";
        }
        ?>
    </table>
    </div>
</div>

</body>
</html>
