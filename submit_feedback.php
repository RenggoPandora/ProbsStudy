<?php
session_start();

include ("connect.php");


// Memeriksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil dan menyanitasi umpan balik
    $feedback = $connect->real_escape_string(trim($_POST['feedback']));

    // Memeriksa apakah umpan balik tidak kosong
    if (!empty($feedback)) {
        // Menyimpan umpan balik ke dalam tabel
        $sql = "INSERT INTO umpanbalik (umpan_balik) VALUES ('$feedback')";

        if ($connect->query($sql) === TRUE) {
            echo "Umpan balik berhasil dikirim!";
            header("Location : home1.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $connect->error;
        }
    } else {
        echo "Umpan balik tidak boleh kosong.";
    }
}

// Menutup koneksi
$connect->close();
?>
