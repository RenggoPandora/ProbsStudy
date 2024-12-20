<?php
session_start();
include 'connect.php'; // Connect to the database

// CRUD operations for questions (similar to crud_soal.php)
// CREATE, UPDATE, DELETE for soal_regresi
if (isset($_POST['submit_regresi'])) {
    $id_soal = $_POST['id_soal'];
    $soal = $_POST['soal'];
    $jawaban = $_POST['jawaban'];

    $query = "INSERT INTO soal_regresi (id_soal, soal, jawaban) VALUES ('$id_soal', '$soal', '$jawaban')";
    if (mysqli_query($connect, $query)) {
        echo "Soal Regresi berhasil ditambahkan!";
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}

// Similar CRUD operations for other question types (Poisson, Eksponensial, Square, Frekuensi)
// ...

// Fetch all questions for each type
$regresi_query = "SELECT * FROM soal_regresi";
$regresi_result = mysqli_query($connect, $regresi_query);

$poisson_query = "SELECT * FROM soal_poisson";
$poisson_result = mysqli_query($connect, $poisson_query);

$eksponensial_query = "SELECT * FROM soal_eksponensial";
$eksponensial_result = mysqli_query($connect, $eksponensial_query);

$square_query = "SELECT * FROM soal_square";
$square_result = mysqli_query($connect, $square_query);

$frekuensi_query = "SELECT * FROM soal_frekuensi";
$frekuensi_result = mysqli_query($connect, $frekuensi_query);

// Fetch feedback
$feedback_query = "SELECT * FROM umpanbalik";
$feedback_result = $connect->query($feedback_query);

// Fetch users
$user_query = "SELECT * FROM user";
$user_result = $connect->query($user_query);

// Function to delete a question
function deleteQuestion($connect, $id_soal, $type) {
    $delete_query = "DELETE FROM $type WHERE id_soal = '$id_soal'";
    if (mysqli_query($connect, $delete_query)) {
        echo "Soal berhasil dihapus dari $type!";
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}

// Logic to delete questions
if (isset($_GET['delete'])) {
    $id_soal = $_GET['delete'];
    deleteQuestion($connect, $id_soal, 'soal_regresi');
}

if (isset($_GET['delete_poisson'])) {
    $id_soal = $_GET['delete_poisson'];
    deleteQuestion($connect, $id_soal, 'soal_poisson');
}

if (isset($_GET['delete_eksponensial'])) {
    $id_soal = $_GET['delete_eksponensial'];
    deleteQuestion($connect, $id_soal, 'soal_eksponensial');
}

if (isset($_GET['delete_square'])) {
    $id_soal = $_GET['delete_square'];
    deleteQuestion($connect, $id_soal, 'soal_square');
}

if (isset($_GET['delete_frekuensi'])) {
    $id_soal = $_GET['delete_frekuensi'];
    deleteQuestion($connect, $id_soal, 'soal_frekuensi');
}

// Logic to delete user
if (isset($_GET['delete_user'])) {
    $username = $_GET['delete_user'];
    $delete_query = "DELETE FROM user WHERE username = '$username'";
    if (mysqli_query($connect, $delete_query)) {
        echo "User berhasil dihapus!";
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}

// Logic to update feedback status
if (isset($_GET['update_status']) && isset($_GET['status'])) {
    $id = $_GET['update_status'];
    $status = $_GET['status'];
    $update_query = "UPDATE umpanbalik SET status = '$status' WHERE id = '$id'";
    if (mysqli_query($connect, $update_query)) {
        header("Location: admin.php"); // Redirect after updating status
        exit();
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
    <title>Admin Panel</title>
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
    <h1>Admin Panel</h1>
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
    <!-- Form Tambah Soal Regresi -->
    <h3>Tambah Soal Regresi</h3>
    <form method="POST" action="">
        <label>ID Soal:</label><br>
        <input type="text" name="id_soal" required><br>
        <label>Soal:</label><br>
        <textarea name="soal" required></textarea><br>
        <label>Jawaban:</label><br>
        <textarea name="jawaban" required></textarea><br>
        <button type="submit" name="submit_regresi">Tambah Soal Regresi</button>
    </form>

    <hr>

    <!-- Tabel Soal Regresi -->
    <h3>Daftar Soal Regresi</h3>
    <table>
        <tr>
            <th>ID Soal</th>
            <th>Soal</th>
            <th>Jawaban</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($regresi_result)): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['id_soal']); ?></td>
            <td><?php echo htmlspecialchars($row['soal']); ?></td>
            <td><?php echo htmlspecialchars($row['jawaban']); ?></td>
            <td>
                <a href="?delete=<?php echo $row['id_soal']; ?>">Hapus</a> |
                <a href="admin.php?id=<?php echo $row['id_soal']; ?>">Edit</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <hr>

    <!-- Repeat for other question types (Poisson, Eksponensial, Square, Frekuensi) -->
    <!-- Form Tambah Soal Poisson -->
    <h3>Tambah Soal Poisson</h3>
    <form method="POST" action="">
        <label>ID Soal Poisson:</label><br>
        <input type="text" name="id_soal" required><br>
        <label>Soal Poisson:</label><br>
        <textarea name="soal" required></textarea><br>
        <label>Jawaban Poisson:</label><br>
        <textarea name="jawaban" required></textarea><br>
        <button type="submit" name="submit_poisson">Tambah Soal Poisson</button>
    </form>

    <h3>Daftar Soal Poisson</h3>
    <table>
        <tr>
            <th>ID Soal Poisson</th>
            <th>Soal Poisson</th>
            <th>Jawaban Poisson</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row_poisson = mysqli_fetch_assoc($poisson_result)): ?>
        <tr>
            <td><?php echo htmlspecialchars($row_poisson['id_soal']); ?></td>
            <td><?php echo htmlspecialchars($row_poisson['soal']); ?></td>
            <td><?php echo htmlspecialchars($row_poisson['jawaban']); ?></td>
            <td>
                <a href="?delete_poisson=<?php echo $row_poisson['id_soal']; ?>">Hapus</a> |
                <a href="admin.php?id_poisson=<?php echo $row_poisson['id_soal']; ?>">Edit</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <hr>

    <!-- Repeat for Eksponensial, Square, and Frekuensi -->
    <!-- Form Tambah Soal Eksponensial -->
    <h3>Tambah Soal Eksponensial</h3>
    <form method="POST" action="">
        <label>ID Soal Eksponensial:</label><br>
        <input type="text" name="id_soal" required><br>
        <label>Soal Eksponensial:</label><br>
        <textarea name="soal" required></textarea><br>
        <label>Jawaban Eksponensial:</label><br>
        <textarea name="jawaban" required></textarea><br>
        <button type="submit" name="submit_eksponensial">Tambah Soal Eksponensial</button>
    </form>

    <h3>Daftar Soal Eksponensial</h3>
    <table>
        <tr>
            <th>ID Soal Eksponensial</th>
            <th>Soal Eksponensial</th>
            <th>Jawaban Eksponensial</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row_eksponensial = mysqli_fetch_assoc($eksponensial_result)): ?>
        <tr>
            <td><?php echo htmlspecialchars($row_eksponensial['id_soal']); ?></td>
            <td><?php echo htmlspecialchars($row_eksponensial['soal']); ?></td>
            <td><?php echo htmlspecialchars($row_eksponensial['jawaban']); ?></td>
            <td>
                <a href="?delete_eksponensial=<?php echo $row_eksponensial['id_soal']; ?>">Hapus</a> |
                <a href="admin.php?id_eksponensial=<?php echo $row_eksponensial['id_soal']; ?>">Edit</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <hr>

    <!-- Form Tambah Soal Square -->
    <h3>Tambah Soal Square</h3>
    <form method="POST" action="">
        <label>ID Soal Square:</label><br>
        <input type="text" name="id_soal" required><br>
        <label>Soal Square:</label><br>
        <textarea name="soal" required></textarea><br>
        <label>Jawaban Square:</label><br>
        <textarea name="jawaban" required></textarea><br>
        <button type="submit" name="submit_square">Tambah Soal Square</button>
    </form>

    <h3>Daftar Soal Square</h3>
    <table>
        <tr>
            <th>ID Soal Square</th>
            <th>Soal Square</th>
            <th>Jawaban Square</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row_square = mysqli_fetch_assoc($square_result)): ?>
        <tr>
            <td><?php echo htmlspecialchars($row_square['id_soal']); ?></td>
            <td><?php echo htmlspecialchars($row_square['soal']); ?></td>
            <td><?php echo htmlspecialchars($row_square['jawaban']); ?></td>
            <td>
                <a href="?delete_square=<?php echo $row_square['id_soal']; ?>">Hapus</a> |
                <a href="admin.php?id_square=<?php echo $row_square['id_soal']; ?>">Edit</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <hr>

    <!-- Form Tambah Soal Frekuensi -->
    <h3>Tambah Soal Frekuensi</h3>
    <form method="POST" action="">
        <label>ID Soal Frekuensi:</label><br>
        <input type="text" name="id_soal" required><br>
        <label>Soal Frekuensi:</label><br>
        <textarea name="soal" required></textarea><br>
        <label>Jawaban Frekuensi:</label><br>
        <textarea name="jawaban" required></textarea><br>
        <button type="submit" name="submit_frekuensi">Tambah Soal Frekuensi</button>
    </form>

    <h3>Daftar Soal Frekuensi</h3>
    <table>
        <tr>
            <th>ID Soal Frekuensi</th>
            <th>Soal Frekuensi</th>
            <th>Jawaban Frekuensi</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row_frekuensi = mysqli_fetch_assoc($frekuensi_result)): ?>
        <tr>
            <td><?php echo htmlspecialchars($row_frekuensi['id_soal']); ?></td>
            <td><?php echo htmlspecialchars($row_frekuensi['soal']); ?></td>
            <td><?php echo htmlspecialchars($row_frekuensi['jawaban']); ?></td>
            <td>
                <a href="?delete_frekuensi=<?php echo $row_frekuensi['id_soal']; ?>">Hapus</a> |
                <a href="admin.php?id_frekuensi=<?php echo $row_frekuensi['id_soal']; ?>">Edit</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <hr>

    <!-- Umpan Balik -->
    <h3>Umpan Balik</h3>
    <table>
        <tr>
            <th>No</th>
            <th>Umpan Balik</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        <?php while ($feedback = $feedback_result->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($feedback['id']); ?></td>
            <td><?php echo htmlspecialchars($feedback['umpan_balik']); ?></td>
            <td><?php echo htmlspecialchars($feedback['status'] ?? "Belum Diproses"); ?></td>
            <td>
                <a href="?update_status=<?php echo $feedback['id']; ?>&status=processed">Update</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <hr>

    <!-- Daftar User -->
    <h3>Daftar User</h3>
    <table>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>Aksi</th>
        </tr>
        <?php while ($user = $user_result->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($user['username']); ?></td>
            <td><?php echo htmlspecialchars($user['email']); ?></td>
            <td><?php echo htmlspecialchars($user['password']); ?></td>
            <td><a href="?delete_user=<?php echo $user['username']; ?>">Delete</a></td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>

</body>
</html>
