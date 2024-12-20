<?php
session_start();
include('connect.php'); // Koneksi database

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

// Ambil username yang sedang login
$username = $_SESSION['username'];

// Query untuk mengambil data laporan milik user dari tabel lain
$queries = [
    "SELECT hasil, tanggal, chart_image FROM laporan_regresi WHERE username = ?",
    "SELECT hasil, tanggal, chart_image FROM laporan_poisson WHERE username = ?",
    "SELECT hasil, tanggal, chart_image FROM laporan_eksponensial WHERE username = ?",
    "SELECT hasil, tanggal, chart_image FROM laporan_frekuensi WHERE username = ?",
    "SELECT hasil, tanggal, chart_image FROM laporan_square WHERE username = ?"
];

foreach ($queries as $query) {
    $stmt = $connect->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $no++ . "</td>";
            echo "<td>" . htmlspecialchars($row['hasil']) . "</td>";
            echo "<td>" . htmlspecialchars($row['tanggal']) . "</td>";
            echo "<td><img src='" . htmlspecialchars($row['chart_image']) . "' alt='Chart Image' class='chart-image' data-full='" . htmlspecialchars($row['chart_image']) . "'></td>";
            echo "</tr>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Laporan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .container {
            width: 90%;
            margin: 20px auto;
            background: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 8px;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        img {
            max-width: 100px;
            height: auto;
        }
        .modal {
            display: none; 
            position: fixed; 
            z-index: 1000; 
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%; 
            overflow: auto; 
            background-color: rgb(0,0,0); 
            background-color: rgba(0,0,0,0.9); 
        }
        .modal-content {
            margin: auto;
            display: block;
            width: 80%; 
            max-width: 700px; 
        }
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #fff;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }
        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Riwayat Laporan</h1>
        <table>
            <tr>
                <th>No</th>
                <th>Hasil</th>
                <th>Tanggal</th>
                <th>Chart Image</th>
            </tr>
            <?php
            $no = 1;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . htmlspecialchars($row['hasil']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['tanggal']) . "</td>";
                    echo "<td><img src='" . htmlspecialchars($row['chart_image']) . "' alt='Chart Image' class='chart-image' data-full='" . htmlspecialchars($row['chart_image']) . "'></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Belum ada laporan yang tersedia.</td></tr>";
            }
            ?>
        </table>
    </div>
    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
    </div>
    <script>
        var modal = document.getElementById("myModal");
        var img = document.getElementsByClassName("chart-image");
        var modalImg = document.getElementById("img01");
        var span = document.getElementsByClassName("close")[0];

        for (let i = 0; i < img.length; i++) {
            img[i].onclick = function(){
                modal.style.display = "block";
                modalImg.src = this.dataset.full;
            }
        }

        span.onclick = function() { 
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>
