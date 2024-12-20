<?php
include("connect.php");

// Fungsi untuk menghapus user
function deleteUser($connect, $username) {
    $delete_query = "DELETE FROM user WHERE username = ?";
    $stmt = $connect->prepare($delete_query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    header("Location: owner.php"); // Redirect setelah penghapusan
}

// Fungsi untuk menghapus admin
function deleteAdmin($connect, $username) {
    $delete_query = "DELETE FROM admin WHERE username = ?";
    $stmt = $connect->prepare($delete_query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    header("Location: owner.php"); // Redirect setelah penghapusan
}

// Logika untuk menghapus user
if (isset($_GET['delete_user'])) {
    $username = $_GET['delete_user'];
    deleteUser($connect, $username);
}

// Logika untuk menghapus admin
if (isset($_GET['delete_admin'])) {
    $username = $_GET['delete_admin'];
    deleteAdmin($connect, $username);
}

// Fetch users from the database
$user_query = "SELECT * FROM user";
$user_result = $connect->query($user_query); // Ensure this line is added

// Fetch admins from the database
$admin_query = "SELECT * FROM admin";
$admin_result = $connect->query($admin_query); // Ensure this line is added

// Fetch questions from all tables
$queries = [
    "SELECT * FROM soal_regresi",
    "SELECT * FROM soal_poisson",
    "SELECT * FROM soal_eksponensial",
    "SELECT * FROM soal_square",
    "SELECT * FROM soal_frekuensi"
];

$results = [];
foreach ($queries as $query) {
    $results[] = $connect->query($query);
}

// Logic to delete questions
if (isset($_GET['delete_soal'])) {
    $id_soal = $_GET['delete_soal'];
    $query = "DELETE FROM soal_regresi WHERE id_soal='$id_soal' 
              UNION 
              SELECT * FROM soal_poisson WHERE id_soal='$id_soal' 
              UNION 
              SELECT * FROM soal_eksponensial WHERE id_soal='$id_soal' 
              UNION 
              SELECT * FROM soal_square WHERE id_soal='$id_soal' 
              UNION 
              SELECT * FROM soal_frekuensi WHERE id_soal='$id_soal'";
    if (mysqli_query($connect, $query)) {
        echo "Soal berhasil dihapus!";
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    halo owner

    <!-- Menampilkan tabel user -->
    <h2>User Table</h2>
    <table border="1">
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>Action</th>
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

    <!-- Menampilkan tabel admin -->
    <h2>Admin Table</h2>
    <table border="1">
        <tr>
            <th>Username</th>
            <th>Password</th>
            <th>Action</th>
        </tr>
        <?php while ($admin = $admin_result->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($admin['username']); ?></td>
            <td><?php echo htmlspecialchars($admin['password']); ?></td>
            <td><a href="?delete_admin=<?php echo $admin['username']; ?>">Delete</a></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <!-- Menampilkan tabel semua soal -->
    <h2>All Questions</h2>
    <table border="1">
        <tr>
            <th>ID Soal</th>
            <th>Soal</th>
            <th>Jawaban</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($results as $result): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['id_soal']); ?></td>
                <td><?php echo htmlspecialchars($row['soal']); ?></td>
                <td><?php echo htmlspecialchars($row['jawaban']); ?></td>
                <td><a href="?delete_soal=<?php echo $row['id_soal']; ?>">Delete</a></td>
            </tr>
            <?php endwhile; ?>
        <?php endforeach; ?>
    </table>
</body>
</html>