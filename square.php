<?php
session_start();
include("connect.php");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROBSTUDY - Chi Square</title>
    <link rel="stylesheet" href="css/materi.css">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lalezar&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #eaeaea;
        }

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
            box-shadow: 0px 8px 16px 0px rgba(131 129 129 / 66%);
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

        .photo_materi {
            display: flex;
            justify-content: center;
            /* Tambahkan margin jika diperlukan */
        }

        .materi {
            padding: 40px;
            background-color: #ffffff;
            border-radius: 10px;
            margin: 30px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        .materi h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .materi p {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .materi ul {
            list-style-type: disc;
            padding-left: 20px;
            margin-bottom: 10px;
        }

        .materi li {
            font-size: 16px;
            margin-bottom: 5px;
        }

        #penjelasan_metode {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            margin: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        table,
        th,
        td {
            border: 1px solid #ccc;
        }

        th,
        td {
            padding: 15px;
            text-align: center;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        .result {
            margin-top: 20px;
            padding: 15px;
            background-color: #e9ecef;
            border: 1px solid #ced4da;
        }

        .kalkulator-chisquare {
            margin-top: 20px;
            padding: 40px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        .kalkulator-chisquare label {
            display: block;
            margin-bottom: 5px;
        }

        .kalkulator-chisquare input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .kalkulator-chisquare button {
            padding: 15px 25px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        .kalkulator-chisquare button:hover {
            background-color: #218838;
            transform: scale(1.05);
        }

        .data-inputs {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        canvas {
            font-family: 'Roboto', sans-serif;
            aspect-ratio: 1 / 1;
            display: block;
            box-sizing: border-box;
            height: 500px;
            width: 500px;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <img src="assets/logo.png" alt="">
        <div class="nav">
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
        </div>
        <div class="button">
            <a href="profil.php"><button>PROFil</button></a>
            <?php if (isset($_SESSION['username'])): ?>
                <a href="logout.php"><button>LOGout</button></a>
            <?php else: ?>
                <a href="login.php"><button>LOGin</button></a>
            <?php endif; ?>
        </div>
    </div>

    <div class="photo_materi">
        <img src="assets/chi_square.png" alt="Chi Square">
    </div>

    <div class="materi">
        <h2>Chi Square</h2>
        <p>Uji Chi-Square adalah uji statistik non-parametrik yang digunakan untuk menguji hubungan atau perbedaan antara dua variabel kategorikal. Uji ini membandingkan frekuensi observasi (data yang diamati) dengan frekuensi harapan (data yang diharapkan jika tidak ada hubungan antara variabel).</p>

        <div style="text-align: center;">
            <img src="assets/rumus_chi_square.png" alt="Rumus Chi Square">
        </div>

        <ul>
            <li><strong>χ²</strong> = Nilai Chi-Square</li>
            <li><strong>O<sub>i</sub></strong> = Frekuensi Observasi (Observed Frequency)</li>
            <li><strong>E<sub>i</sub></strong> = Frekuensi Harapan (Expected Frequency)</li>
        </ul>

        <p>Langkah-langkah Uji Chi-Square:</p>
        <ol>
            <li>Susun data dalam tabel kontingensi.</li>
            <li>Hitung frekuensi harapan (E) untuk setiap sel: E = (Total Baris * Total Kolom) / Total Keseluruhan.</li>
            <li>Hitung nilai Chi-Square (χ²) menggunakan rumus di atas.</li>
            <li>Tentukan derajat kebebasan (df): df = (Jumlah Baris - 1) * (Jumlah Kolom - 1).</li>
            <li>Bandingkan nilai χ² hitung dengan nilai χ² tabel pada tingkat signifikansi tertentu (misalnya α = 0.05) dengan derajat kebebasan yang telah dihitung.</li>
        </ol>

        <div id="penjelasan_metode">
            <h1>Contoh Pengerjaan Chi Square</h1>
            <p>Misalkan kita ingin menguji apakah ada hubungan antara jenis kelamin (Laki-laki dan Perempuan) dengan preferensi warna (Merah dan Biru). Data yang terkumpul adalah sebagai berikut:</p>
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Merah</th>
                        <th>Biru</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Laki-laki</td>
                        <td id="oLakiMerah"></td>
                        <td id="oLakiBiru"></td>
                        <td id="totalLaki"></td>
                    </tr>
                    <tr>
                        <td>Perempuan</td>
                        <td id="oPerempuanMerah"></td>
                        <td id="oPerempuanBiru"></td>
                        <td id="totalPerempuan"></td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td id="totalMerah"></td>
                        <td id="totalBiru"></td>
                        <td id="totalKeseluruhan"></td>
                    </tr>
                </tbody>
            </table>
            <div class="result">
                <p><strong>Nilai Chi-Square (χ²):</strong> <span id="chiSquareResult"></span></p>
                <p><strong>Derajat Kebebasan (df):</strong> <span id="dfResult"></span></p>
                <p><strong>Kesimpulan:</strong> <span id="conclusion"></span></p>
            </div>
        </div>
        <h2>Daftar Soal dan Jawaban</h2>
        <?php
        // Query untuk mengambil data soal dan jawaban
        $query = "SELECT * FROM soal_frekuensi";
        $result = mysqli_query($connect, $query);

        // Cek apakah data tersedia
        if (mysqli_num_rows($result) > 0) {
            echo "<table border='1' cellspacing='0' cellpadding='10'>";
            echo "<tr>
                <th>No</th>
                <th>Soal</th>
                <th>Jawaban</th>
              </tr>";

            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $no++ . "</td>";
                echo "<td>" . htmlspecialchars($row['soal']) . "</td>";
                echo "<td>" . htmlspecialchars($row['jawaban']) . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Tidak ada data soal yang tersedia.</p>";
        }
        ?>
        <h2>Kalkulator Chi Square</h2>
        <div class="kalkulator-chisquare">
            <?php if (isset($_SESSION['username'])): ?>
                <label for="rows">Jumlah Baris:</label>
                <input type="number" id="rows" min="2" value="2">
                <label for="cols">Jumlah Kolom:</label>
                <input type="number" id="cols" min="2" value="2">
                <button id="generateTable">Buat Tabel</button>
                <div id="chiSquareTableContainer"></div>
                <button id="calculateChiSquare">Hitung Chi Square</button>
                <div id="chiSquareCalculation"></div>
                <form id="saveChiSquareForm" method="POST" action="simpan_chi_square.php">
                    <input type="hidden" id="chiSquareValue" name="chiSquareValue">
                    <input type="hidden" id="dfValue" name="dfValue">
                    <input type="hidden" id="observedValues" name="observedValues">
                    <button type="button" id="saveChiSquareButton">Simpan Hasil</button>
                </form>
                <script>
                    const tableContainer = document.getElementById('tableContainer');
                    const calculateButton = document.getElementById('calculate');
                    const chiSquareValue = document.getElementById('chiSquareValue');
                    const dfValue = document.getElementById('dfValue');
                    const alphaValue = document.getElementById('alphaValue');
                    const criticalValue = document.getElementById('criticalValue');
                    const conclusion = document.getElementById('conclusion');
                    const chiSquareChart = document.getElementById('chiSquareChart');

                    function generateTable() {
                        const rows = parseInt(document.getElementById('rows').value);
                        const cols = parseInt(document.getElementById('cols').value);

                        let tableHTML = '<table><thead><tr>';
                        for (let i = 0; i < cols; i++) {
                            tableHTML += `<th>Kolom ${i+1}</th>`;
                        }
                        tableHTML += '</tr></thead><tbody>';

                        for (let i = 0; i < rows; i++) {
                            tableHTML += `<tr>`;
                            for (let j = 0; j < cols; j++) {
                                tableHTML += `<td><input type="number" class="observed"></td>`;
                            }
                            tableHTML += `</tr>`;
                        }

                        tableHTML += '</tbody></table>';
                        tableContainer.innerHTML = tableHTML;
                    }

                    function calculateChiSquare() {
                        const table = document.querySelector('table');
                        const rows = table.rows;
                        const cols = table.rows[0].cells.length;
                        let observed = [];

                        for (let i = 1; i < rows.length; i++) {
                            let row = [];
                            for (let j = 0; j < cols; j++) {
                                row.push(parseFloat(rows[i].cells[j].querySelector('input').value));
                            }
                            observed.push(row);
                        }

                        let rowTotals = [];
                        let colTotals = [];
                        let grandTotal = 0;

                        for (let i = 0; i < rows.length - 1; i++) {
                            let rowTotal = 0;
                            for (let j = 0; j < cols; j++) {
                                rowTotal += observed[i][j];
                                grandTotal += observed[i][j];
                            }
                            rowTotals.push(rowTotal);
                        }

                        for (let j = 0; j < cols; j++) {
                            let colTotal = 0;
                            for (let i = 0; i < rows - 1; i++) {
                                colTotal += observed[i][j];
                            }
                            colTotals.push(colTotal);
                        }

                        let expected = [];
                        for (let i = 0; i < rows - 1; i++) {
                            expected.push([]);
                            for (let j = 0; j < cols; j++) {
                                expected[i][j] = (rowTotals[i] * colTotals[j]) / grandTotal;
                            }
                        }

                        let chiSquare = 0;
                        for (let i = 0; i < rows - 1; i++) {
                            for (let j = 0; j < cols; j++) {
                                chiSquare += Math.pow(observed[i][j] - expected[i][j], 2) / expected[i][j];
                            }
                        }

                        const df = (rows - 1) * (cols - 1);

                        chiSquareValue.textContent = chiSquare.toFixed(2);
                        dfValue.textContent = df;

                    }
                    if (chiSquare > criticalValue) {
                        conclusion.textContent = 'Tolak H0: Ada perbedaan signifikan.';
                    } else {
                        conclusion.textContent = 'Gagal tolak H0: Tidak ada perbedaan signifikan.';
                    }

                    document.getElementById('generateTable').addEventListener('click', generateTable);
                    calculateButton.addEventListener('click', calculateChiSquare);
                </script>
            <?php else: ?>
                <div class="login-message" style="text-align: center; margin: 20px; padding: 15px; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; border-radius: 5px;">
                    <p>Anda harus login untuk mengakses kalkulator Chi Square.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>