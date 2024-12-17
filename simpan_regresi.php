<?php
// Mulai session
session_start();

// Tambahkan navbar di sini
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROBSTUDY</title>
    <style>
        .header {
            display: flex;
            justify-content: space-between;
            background-color: #007bff;
            color: white;
            padding: 20px 40px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
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
            padding: 12px 20px;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.2s;
        }
        .header a:hover {
            background-color: #0056b3;
            transform: scale(1.05);
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
            box-shadow: 0px 8px 16px 0px rgba(131, 129, 129, 0.66);
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
            <?php if (isset($_SESSION['username'])): ?>
                <a href="logout.php">LOGOUT</a>
            <?php else: ?>
                <a href="login.php">LOGIN</a>
            <?php endif; ?>
        </nav>
    </div>
<?php

if (!isset($_SESSION['username'])) {
    echo "Silakan login terlebih dahulu.";
    exit;
}

// Cek apakah x_values dan y_values ada
if (!isset($_POST['x_values']) || !isset($_POST['y_values'])) {
    echo "Data X dan Y tidak ditemukan!";
    exit;
}

$x_values = array_map('floatval', explode(',', $_POST['x_values']));
$y_values = array_map('floatval', explode(',', $_POST['y_values']));

if (count($x_values) != count($y_values)) {
    echo "Jumlah X dan Y harus sama!";
    exit;
}

// Hitung regresi linear sederhana
$n = count($x_values);
$sum_x = array_sum($x_values);
$sum_y = array_sum($y_values);
$sum_xy = 0;
$sum_x2 = 0;

for ($i = 0; $i < $n; $i++) {
    $sum_xy += $x_values[$i] * $y_values[$i];
    $sum_x2 += $x_values[$i] * $x_values[$i];
}

// Cek untuk menghindari pembagian dengan nol
if (($n * $sum_x2 - $sum_x * $sum_x) == 0) {
    echo "Terjadi kesalahan dalam perhitungan regresi.";
    exit;
}

$slope = ($n * $sum_xy - $sum_x * $sum_y) / ($n * $sum_x2 - $sum_x * $sum_x);
$intercept = ($sum_y - $slope * $sum_x) / $n;

// Hasil persamaan regresi
$hasil_regresi = "y = " . round($slope, 2) . "x + " . round($intercept, 2);

// Simpan ke database
include 'connect.php'; // File koneksi dengan $connect

$username = $_SESSION['username'];
$tanggal = date("Y-m-d H:i:s");

// Generate the next id_laporan
$query = "SELECT MAX(id_laporan) AS max_id FROM laporan_regresi";
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($result);
$max_id = $row['max_id'];

// Generate the new id_laporan
if ($max_id) {
    $number = (int)substr($max_id, 3) + 1; // Extract the number and increment
    $new_id = 'LRG' . str_pad($number, 2, '0', STR_PAD_LEFT); // Format to LRG01, LRG02, etc.
} else {
    $new_id = 'LRG01'; // If no records exist, start with LRG01
}

// Get the image data
$imageData = $_POST['regressionChartImage'];

// Check if image data is valid
if (empty($imageData)) {
    echo "Image data is empty!";
    exit;
}

// Decode the image data
$imageData = str_replace('data:image/jpeg;base64,', '', $imageData);
$imageData = str_replace(' ', '+', $imageData);
$imageData = base64_decode($imageData);

// Check if decoding was successful
if ($imageData === false) {
    echo "Failed to decode image data!";
    exit;
}

// Save the image to a file
$imagePath = 'images/' . $new_id . '.jpg'; // Define the path to save the image
if (file_put_contents($imagePath, $imageData) === false) {
    echo "Failed to save image to file!";
    exit;
}

// Query SQL
$sql = "INSERT INTO laporan_regresi (id_laporan, username, hasil, tanggal, chart_image) 
        VALUES ('$new_id', '$username', '$hasil_regresi', '$tanggal', '$imagePath')";

if (mysqli_query($connect, $sql)) {
    echo "<p>Hasil: $hasil_regresi</p>";
    echo "<p>Data berhasil disimpan ke database.</p>";
    echo "<img src='$imagePath' alt='Grafik Regresi'>"; // Display the saved image
} else {
    echo "Gagal menyimpan data: " . mysqli_error($connect);
}

// Tutup koneksi
mysqli_close($connect);
?>
</body>
</html>
?>
