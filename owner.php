<?php
session_start();
include 'connect.php';

// Fungsi untuk menghapus user
function deleteUser($connect, $username)
{
    $delete_query = "DELETE FROM user WHERE username = ?";
    $stmt = $connect->prepare($delete_query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    header("Location: owner.php"); // Redirect setelah penghapusan
}

// Fungsi untuk menghapus admin
function deleteAdmin($connect, $username)
{
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

// Fetch feedback from the database
$feedback_query = "SELECT * FROM umpanbalik";
$feedback_result = $connect->query($feedback_query); // Ensure this line is added

// Logic to update feedback status
if (isset($_GET['update_status']) && isset($_GET['status'])) {
    $id = $_GET['update_status']; // Menggunakan 'id' alih-alih 'id_feedback'
    $status = $_GET['status'];
    $update_query = "UPDATE umpanbalik SET status = ? WHERE id = ?"; // Menggunakan 'id'
    $stmt = $connect->prepare($update_query);
    $stmt->bind_param("si", $status, $id); // Menggunakan 'id'
    $stmt->execute();
    header("Location: owner.php"); // Redirect after updating status
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/admin.css">

</head>

<body>
<div class="navbar">
        <img src="assets/logo.png" alt="">
        <div class="button">
                <?php if (isset($_SESSION['username'])): ?>
                    <a href="logout.php"><button>LOGout</button></a>
                <?php else: ?>
                    <a href="login.php"><button>LOGin</button></a>
                <?php endif; ?>
            </div>
    </div>
    <div class="container">
        <div class="wrapper-box">


            <!-- Daftar User -->
            <div class="box">
                <h2>Daftar User</h2>
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

            <!-- Daftar Admin -->
            <div class="box">
                <h2>Daftar Admin</h2>
                <table>
                    <tr>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Aksi</th>
                    </tr>
                    <?php while ($admin = $admin_result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($admin['username']); ?></td>
                            <td><?php echo htmlspecialchars($admin['password']); ?></td>
                            <td><a href="?delete_admin=<?php echo $admin['username']; ?>">Delete</a></td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>
        </div>


        <div class="wrapper-box">


            <!-- Umpan Balik -->
            <div class="box">
                <h2>Umpan Balik</h2>
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
                            <td><a href="?update_status=<?php echo $feedback['id']; ?>&status=processed">Update</a></td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>

            <!-- Soal & Jawaban -->
            <div class="box">
                <h2>Soal & Jawaban</h2>
                <table>
                    <tr>
                        <th>No</th>
                        <th>Soal</th>
                        <th>Aksi</th>
                    </tr>
                    <?php foreach ($results as $result): ?>
                        <?php while ($soal = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($soal['id_soal']); ?></td>
                                <td><?php echo htmlspecialchars($soal['soal']); ?></td>
                                <td><a href="?delete_soal=<?php echo $soal['id_soal']; ?>">Delete</a></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>