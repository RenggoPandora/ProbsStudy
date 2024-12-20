<?php
session_start();
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROBSTUDY || EKSPONENSIAL</title>
    <link rel="stylesheet" href="css/materi.css">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lalezar&display=swap" rel="stylesheet">

    <style>
        .kalkulator-regresi {
            margin-top: 20px;
            padding: 40px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        .kalkulator-regresi label {
            display: block;
            margin-bottom: 5px;
        }

        .kalkulator-regresi input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .kalkulator-regresi button {
            padding: 15px 25px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        .kalkulator-regresi button:hover {
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
    <div class="container">
        <!-- mulai navbar -->
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
        <!-- ahir navbar -->

        <!-- mulai logo -->
        <div class="logo">
            <img src="assets/regresi.png" alt="">
        </div>
        <!-- ahir logo -->

        <!-- mulai konten -->
        <div class="main">
            <!-- mulai isi konten -->
            <div class="main-main">

                <div class="pengertian" id="pengertian">
                    <h1>Pengertian Distribusi Eksponensial</h1>
                    <p>Analisis regresi sederhana bertujuan untuk mengetahui pengaruh dari suatu variabel terhadap variabel lainnya.
                        Pada analisis regresi suatu variabel yang mempengaruhi disebut variabel bebas atau independent variable, sedangkan variabel yang dipengaruhi disebut variabel terkait atau dependent variable.
                        Jika persamaan regresi hanya terdapat satu variabel bebas dengan satu variabel terkait, maka disebut dengan persamaan regresi sederhana.
                        Jika variabel bebasnya lebih dari satu, maka disebut dengan persamaan regresi berganda.
                        Pada regresi sederhana kita dapat mengetahui berapa besar perubahan dari variabel bebas dapat mempengaruhi suatu variabel terkait.</p>

                    <div class="rumus">
                        <h2>Rumus Regresi Linear Sederhana</h2>
                        <img src="assets/rumus_regresi.png" alt="">
                        <ul>
                            <li><strong>Y</strong> = Variabel dependen (variabel terikat)</li>
                            <li><strong>X</strong> = Variabel independent (variabel bebas)</li>
                            <li><strong>a</strong> = Konstanta (nilai dari Y apabila X = 0)</li>
                            <li><strong>b</strong> = Koefisien regresi (pengaruh positif atau negatif)</li>
                        </ul>
                    </div>
                    <p> Tujuan analisis regresi untuk mendapatkan pola hubungan secara matematis dari variabel X dan variabel Y, dan untuk mengetahui besarnya perubahan variabel X terhadap variabel Y, serta untuk memprediksi variabel Y jika nilai variabel X diketahui.
                        Prinsip dasar pada persamaan regresi sederhana adalah bahwa antara variabel dependen (Y) dengan variable independennya (Y) harus memiliki sifat hubungan sebab akibat atau hubungan kausalitas, berdasarkan teori, dari hasil penelitian sebelumnya, atau juga yang didasarkan dari penjelasan logis tertentu.
                    </p>
                </div>

                <div class="langkah" id="langkah">
                    <h1>Langkah-Langkah Mengerjakan Soal </h1>
                    <ol>
                        <li><strong>Identifikasi Variabel:</strong> Tentukan variabel independen (X) dan variabel dependen (Y) dari data yang diberikan.</li>
                        <li><strong>Kumpulkan Data:</strong> Siapkan data dalam bentuk tabel yang mencakup nilai X dan Y.</li>
                        <li><strong>Hitung Rata-rata:</strong> Hitung rata-rata dari variabel X dan Y menggunakan rumus:
                            <br> X̄ = (ΣX) / n
                            <br> Ȳ = (ΣY) / n
                        </li>
                        <li><strong>Hitung Koefisien Regresi:</strong> Hitung nilai b (koefisien regresi) dan a (intercept) menggunakan rumus:
                            <br> b = (Σ(X - X̄)(Y - Ȳ)) / (Σ(X - X̄)²)
                            <br> a = Ȳ - b * X̄
                        </li>
                        <li><strong>Persamaan Regresi:</strong> Tulis persamaan regresi dalam bentuk:
                            <br> Y = a + bX
                        </li>
                        <li><strong>Prediksi Nilai:</strong> Gunakan persamaan regresi untuk memprediksi nilai Y berdasarkan nilai X yang diketahui.</li>
                    </ol>
                    <div class="contoh">
                        <h1>Contoh pengerjaan Regresi Linear Sederhana </h1>

                        <table>
                            <thead>
                                <tr>
                                    <th>X (Jam Belajar)</th>
                                    <th>Y (Nilai Ujian)</th>
                                    <th>X - X̄</th>
                                    <th>Y - Ŷ</th>
                                    <th>(X - X̄)(Y - Ŷ)</th>
                                    <th>(X - X̄)²</th>
                                </tr>
                            </thead>
                            <tbody id="data-table">
                                <!-- Data akan diisi menggunakan JavaScript -->
                            </tbody>
                        </table>

                        <div class="card">
                            <div class="result">
                                <p><strong>Persamaan Regresi Linear:</strong></p>
                                <p><span id="equation"></span></p>
                                <p><strong>Prediksi Nilai untuk X = 6:</strong></p>
                                <p><span id="prediction"></span></p>
                            </div>

                            <h2>Langkah-Langkah Menghitung Rata-rata X dan Y</h2>
                            <ol>
                                <li><strong>Jumlahkan Semua Nilai X:</strong> Hitung total dari semua nilai X yang ada.</li>
                                <li><strong>Jumlahkan Semua Nilai Y:</strong> Hitung total dari semua nilai Y yang ada.</li>
                                <li><strong>Hitung Rata-rata:</strong> Bagi total nilai X dengan jumlah data (n) untuk mendapatkan rata-rata X (X̄), dan bagi total nilai Y dengan jumlah data (n) untuk mendapatkan rata-rata Y (Ȳ).</li>
                            </ol>
                        </div>

                        <script>
                            // Data X dan Y
                            const data = [{
                                    X: 1,
                                    Y: 60
                                },
                                {
                                    X: 2,
                                    Y: 65
                                },
                                {
                                    X: 3,
                                    Y: 70
                                },
                                {
                                    X: 4,
                                    Y: 75
                                },
                                {
                                    X: 5,
                                    Y: 80
                                }
                            ];

                            // Menghitung rata-rata X dan Y
                            const averageX = data.reduce((sum, item) => sum + item.X, 0) / data.length;
                            const averageY = data.reduce((sum, item) => sum + item.Y, 0) / data.length;

                            // Menghitung b dan a
                            let numerator = 0,
                                denominator = 0;
                            data.forEach(item => {
                                const diffX = item.X - averageX;
                                const diffY = item.Y - averageY;
                                numerator += diffX * diffY;
                                denominator += diffX * diffX;
                            });

                            const b = numerator / denominator;
                            const a = averageY - b * averageX;

                            // Menampilkan data di tabel
                            const dataTable = document.getElementById('data-table');
                            data.forEach(item => {
                                const diffX = item.X - averageX;
                                const diffY = item.Y - averageY;
                                const multiplyDiff = diffX * diffY;
                                const squareDiffX = diffX * diffX;

                                const row = document.createElement('tr');
                                row.innerHTML = `
                <td>${item.X}</td>
                <td>${item.Y}</td>
                <td>${diffX.toFixed(2)}</td>
                <td>${diffY.toFixed(2)}</td>
                <td>${multiplyDiff.toFixed(2)}</td>
                <td>${squareDiffX.toFixed(2)}</td>
            `;
                                dataTable.appendChild(row);
                            });

                            // Menampilkan persamaan regresi
                            const equationElement = document.getElementById('equation');
                            equationElement.innerText = `y = ${a.toFixed(2)} + ${b.toFixed(2)}X`;

                            // Menghitung dan menampilkan prediksi untuk X = 6
                            const predictedY = a + b * 6;
                            const predictionElement = document.getElementById('prediction');
                            predictionElement.innerText = `y = ${predictedY.toFixed(2)}`;
                        </script>
                    </div>
                </div>

                <div class="contoh-soal" id="contoh-soal">
                    <h1>Contoh Soal dan Jawaban</h1>
                    <?php
                    // Query untuk mengambil data soal dan jawaban
                    $query = "SELECT * FROM soal_regresi";
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
                </div>

                <div class="kalkulator" id="kalkulator">
                    <h1>Kalkulator Regresi Linear Sederhana</h1>
                    <div class="card">
                        <div class="kalkulator-regresi">
                            <?php if (isset($_SESSION['username'])): ?>
                                <label for="dataCount">Jumlah Data:</label>
                                <input type="number" id="dataCount" min="2" value="2">
                                <button id="generateInputs">Buat Input Data</button>

                                <div id="dataInputs" class="data-inputs"></div>
                                <div>
                                    <label for="predictedX">Nilai X yang diminta:</label>
                                    <input type="number" id="predictedX">
                                </div>
                                <button id="calculateRegression">Hitung Regresi</button>
                                <div id="equationResult">

                                    <canvas id="regressionChart" width="700" height="400"></canvas>
                                    <div id="predictionResult">

                                        <!-- Form untuk menyimpan hasil -->
                                        <form id="saveResultForm" method="POST" action="simpan_regresi.php">
                                            <input type="hidden" id="regressionEquation" name="regressionEquation">
                                            <input type="hidden" id="predictedValue" name="predictedValue">
                                            <input type="hidden" id="regressionChartImage" name="regressionChartImage">
                                            <button type="button" id="saveResultButton">Simpan Hasil</button>
                                        </form>

                                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                                        <script>
                                            document.getElementById('generateInputs').addEventListener('click', function() {
                                                const count = document.getElementById('dataCount').value;
                                                const dataInputs = document.getElementById('dataInputs');
                                                dataInputs.innerHTML = '';
                                                for (let i = 0; i < count; i++) {
                                                    dataInputs.innerHTML += `
                            <div>
                                <label for="x${i}">X${i + 1}:</label>
                                <input type="number" id="x${i}">
                                <label for="y${i}">Y${i + 1}:</label>
                                <input type="number" id="y${i}">
                            </div>
                        `;
                                                }
                                            });

                                            document.getElementById('calculateRegression').addEventListener('click', function() {
                                                const count = document.getElementById('dataCount').value;
                                                const data = [];
                                                for (let i = 0; i < count; i++) {
                                                    const x = parseFloat(document.getElementById(`x${i}`).value);
                                                    const y = parseFloat(document.getElementById(`y${i}`).value);
                                                    data.push({
                                                        X: x,
                                                        Y: y
                                                    });
                                                }

                                                // Menghitung rata-rata X dan Y
                                                const averageX = data.reduce((sum, item) => sum + item.X, 0) / data.length;
                                                const averageY = data.reduce((sum, item) => sum + item.Y, 0) / data.length;

                                                // Menghitung b dan a
                                                let numerator = 0,
                                                    denominator = 0;
                                                data.forEach(item => {
                                                    const diffX = item.X - averageX;
                                                    const diffY = item.Y - averageY;
                                                    numerator += diffX * diffY;
                                                    denominator += diffX * diffX;
                                                });

                                                const b = numerator / denominator;
                                                const a = averageY - b * averageX;

                                                // Menampilkan grafik regresi di canvas
                                                const canvas = document.getElementById('regressionChart');
                                                const ctx = canvas.getContext('2d');

                                                // Ambil nilai predictedX dari input
                                                const predictedX = parseFloat(document.getElementById('predictedX').value) || 0;
                                                const labels = data.map(item => item.X); // Menggunakan nilai X dari data input
                                                const predictedY = labels.map(x => a + b * x); // Menghitung nilai Y untuk setiap X

                                                const chart = new Chart(ctx, {
                                                    type: 'line',
                                                    data: {
                                                        labels: labels,
                                                        datasets: [{
                                                                label: 'Data Asli',
                                                                data: data.map(item => item.Y),
                                                                borderColor: 'blue',
                                                                borderWidth: 5,
                                                                fill: false,
                                                            },
                                                            {
                                                                label: 'Regresi Linear',
                                                                data: predictedY,
                                                                borderColor: 'red',
                                                                borderWidth: 5,
                                                                fill: false,
                                                            }
                                                        ]
                                                    },
                                                    options: {
                                                        responsive: true,
                                                        maintainAspectRatio: false,
                                                        scales: {
                                                            y: {
                                                                beginAtZero: true
                                                            }
                                                        }
                                                    }
                                                });

                                                // Set the size of the chart
                                                const chartContainer = document.getElementById('regressionChart').parentNode;
                                                chartContainer.style.width = '80%'; // Set desired width
                                                chartContainer.style.height = '400px'; // Set desired height
                                                // Ensure the chart is fully rendered before capturing
                                                chart.update(); // Ensure the chart is updated

                                                // Use a timeout to ensure the chart is rendered before capturing
                                                setTimeout(() => {
                                                    // Capture the chart as an image
                                                    const imageData = chart.toBase64Image('image/jpeg'); // Specify JPEG format
                                                    console.log(imageData); // Log the image data for debugging

                                                    // Store image data in a hidden input
                                                    document.getElementById('regressionChartImage').value = imageData;

                                                    // Kumpulkan nilai X dan Y untuk disimpan
                                                    const xValues = data.map(item => item.X).join(',');
                                                    const yValues = data.map(item => item.Y).join(',');

                                                    // Tambahkan nilai ke input tersembunyi
                                                    const saveResultForm = document.getElementById('saveResultForm');

                                                    // Create hidden input for x_values
                                                    const xInput = document.createElement('input');
                                                    xInput.type = 'hidden';
                                                    xInput.name = 'x_values';
                                                    xInput.value = xValues;
                                                    saveResultForm.appendChild(xInput);

                                                    // Create hidden input for y_values
                                                    const yInput = document.createElement('input');
                                                    yInput.type = 'hidden';
                                                    yInput.name = 'y_values';
                                                    yInput.value = yValues;
                                                    saveResultForm.appendChild(yInput);

                                                    // Do not submit the form here
                                                }, 100); // Adjust the timeout as necessary
                                            });

                                            // Add event listener for the "Simpan Hasil" button
                                            document.getElementById('saveResultButton').addEventListener('click', function() {
                                                // Submit the form when the "Simpan Hasil" button is clicked
                                                document.getElementById('saveResultForm').submit();
                                            });
                                        </script>
                                    <?php else: ?>
                                        <div class="login-message" style="text-align: center; margin: 20px; padding: 15px; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; border-radius: 5px;">
                                            <p>Anda harus login untuk mengakses kalkulator regresi linear.</p>
                                        </div>
                                    <?php endif; ?>
                                    </div>
                                </div>
                        </div>

                    </div>
                    <!-- ahir isi konten -->
                    <!-- mulai href konten -->

                    <!-- ahir href konten -->
                </div>
                <div class="main-a">
                    <div class="a-wrapper">
                        <a href="#pengertian">pengartian </a>
                        <a href="#langkah">Langkah langkah pengerjaan</a>
                        <a href="#contoh-soal">contoh soal</a>
                        <a href="#kalkulator">Kalkulator </a>
                    </div>
                </div>
            </div>


            <!-- ahir konten -->
        </div>
</body>

</html>