<?php
session_start();
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROBSRTUDY || EKSPONENSIAL</title>
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lalezar&display=swap" rel="stylesheet">

    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>

    <link rel="stylesheet" href="css/materi.css">
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
            <img src="assets/eksponensial.png" alt="">
        </div>
        <!-- ahir logo -->

        <!-- mulai konten -->
        <div class="main">
            <!-- mulai isi konten -->
            <div class="main-main">

                <div class="pengertian" id="pengertian">
                    <h1>Pengertian Sebaran Peluang Distribusi Eksponensial</h1>
                    <p>Distribusi eksponensial adalah salah satu distribusi probabilitas yang digunakan memodelkan waktu tunggu kejadian-kejadian yang terjadi secara independen dan secara acak dalam suatuDistribusi eksponensial mempunyai banyak nilai praktis, terutama dalam hal berhubungan dengan waktu, waktu tunggu, waktu hidupnya suatu alat atau lamanya jangka waktu sampai suatu berhenti berfungsi, percakapan telepon, dan sebagainya.</p>
                    <div class="rumus">
                        <h2>Rumus PDF</h2>
                        <img src="assets/pdf_eksponensial.png" alt="">
                    </div>
                    <p>PDF (Probability Density Function) berperan untuk menentukan peluang densitas (kepadatan peluang) suatu nilai tertentu dari variabel acak kontinu. Artinya, rumus ini memberikan informasi tentang seberapa besar peluang relatif bahwa suatu nilai tertentu akan terjadi pada interval yang sangat kecil di sekitar nilai tersebut.</p>
                    <div class="rumus">
                        <h2>Rumus CDF</h2>
                        <img src="assets/cdf_eksponensial.jpg" alt="">
                        <ul>
                            <li>X = bla bla bla</li>
                            <li>X = bla bla bla</li>
                            <li>X = bla bla bla</li>
                        </ul>
                    </div>
                    <p>CDF (Cumulative Distribution Function) berperan untuk menghitung peluang kumulatif, yaitu peluang bahwa nilai dari suatu variabel acak X kurang dari atau sama dengan suatu nilai tertentu x.</p>
                </div>

                <div class="langkah" id="langkah">
                    <h1>Langkah-Langkah Mengerjakan Soal </h1>
                    <ol>
                        <li>Pertama bagi angka 1 dengan nilai rata-rata 1/rata-rata</li>
                        <li>Masukan kedalam rumus PDF</li>
                        <li>Masukan kedalam rumus CDF</li>
                        <li>Buat angka menjadi presentase</li>
                    </ol>
                    <div class="contoh">
                        <h1>Contoh pengerjaan Sebaran Peluang Distribusi Eksponensial</h1>
                        <div class="card">
                            <p><strong>Soal</strong></p>
                            <p></p>
                        </div>
                    </div>
                </div>

                <div class="contoh-soal" id="contoh-soal">
                    <h1>Contoh Soal dan Jawaban</h1>
                    <?php
                    // Query untuk mengambil data soal dan jawaban
                    $query = "SELECT * FROM soal_eksponensial";
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
                    <h1>Kalkulator Distribusi Eksponensial</h1>
                    <?php if (isset($_SESSION['username'])): ?>
                        <div class="card">

                            <label for="mean">Mean</label>
                            <input type="number" class="mean" id="mean">
                            <label for="m1">X1</label>
                            <input type="number" class="m1" id="m1">
                            <label for="m2">X2</label>
                            <input type="number" class="m2" id="m2">
                            <div class="button">
                                <button class="submit" onclick="klik()">Hasil</button>
                            </div>

                            <div class="hasil">
                                <div class="svg">
                                    <svg id="svg" width="1000" height="600" viewBox="0 0 1000 600" fill="none"
                                        xmlns="http://www.w3.org/2000/svg"></svg>
                                </div>
                                <div class="lainnya" id="bc">

                                </div>
                            </div>

                            <script>
                                // Konfigurasi MathJax
                                MathJax = {
                                    tex: {
                                        inlineMath: [
                                            ['$', '$'],
                                            ['\\(', '\\)']
                                        ]
                                    }
                                };

                                // Fungsi untuk memvalidasi input
                                function validateInput(x, y) {
                                    return !isNaN(x) && !isNaN(y) && x > 0 && y > 0;
                                }

                                // Fungsi untuk menghitung dan menampilkan hasil
                                function klik() {
                                    rumus();
                                    garis1();
                                    path();
                                    angka();
                                }

                                function rumus() {
                                    let x = parseFloat(document.getElementById('m1').value);
                                    let y = parseFloat(document.getElementById('m2').value);
                                    let z = parseFloat(document.getElementById('mean').value);

                                    if (!validateInput(x, y) || isNaN(z)) {
                                        alert("Input tidak valid!");
                                        return;
                                    }

                                    let mu = 1 / z; // lambda
                                    let pdfX = mu * Math.exp(-mu * x); // PDF untuk x1
                                    let pdfY = mu * Math.exp(-mu * y); // PDF untuk x2
                                    let hasil1 = 1 - Math.exp(-mu * x); // CDF untuk x1
                                    let hasil2 = Math.exp(-mu * y); // CDF untuk x2
                                    let hasil3 = Math.exp(-mu * x) - Math.exp(-mu * y); // CDF untuk selisih x1 dan x2

                                    // Konversi hasil ke persentase
                                    let hasil1Persen = (hasil1 * 100).toFixed(1) + '%';
                                    let hasil2Persen = (hasil2 * 100).toFixed(1) + '%';
                                    let hasil3Persen = (hasil3 * 100).toFixed(1) + '%';

                                    // Menampilkan jawaban dalam tampilan
                                    let div = document.getElementById('bc');
                                    div.innerHTML = ""; // Clear previous results

                                    // Menampilkan rate parameter
                                    let rateParameter = document.createElement('h4');
                                    rateParameter.innerHTML = ` \\( \\mu \\) = ${z} <br> \\( \\lambda \\) = \\( \\frac{1}{\\mu} \\) = ${mu.toFixed(3)} <br>`;
                                    div.appendChild(rateParameter);
                                    MathJax.typeset();

                                    // Menampilkan PDF x1
                                    let tampilanPdfX1 = document.createElement('h4');
                                    tampilanPdfX1.innerHTML = `<br><strong>PDF </strong> <br> 
                                f(x)=\\( \\lambda \\)e<sup>-\\( \\lambda \\)x</sup> = 
                                ${mu.toFixed(3)} x 2,71828<sup>${mu.toFixed(3)}.${x}</sup> = ${pdfX.toFixed(3)}`;
                                    div.appendChild(tampilanPdfX1);
                                    MathJax.typeset();

                                    // Menampilkan CDF x1
                                    let h3Baru1 = document.createElement('h4');
                                    h3Baru1.innerHTML = `<br><strong>CDF <br>P(X ≤ x<sub>1</sub>)</strong> <br>
                             1 - e<sup>-\\(\\lambda\\)x</sup> = ${hasil1.toFixed(3)} = ${hasil1Persen}`;
                                    div.appendChild(h3Baru1);
                                    MathJax.typeset();

                                    // Menampilkan PDF x2
                                    let tampilanPdfX2 = document.createElement('h4');
                                    tampilanPdfX2.innerHTML = `<br><strong>PDF x2</strong> <br> 
                                f(x)=\\( \\lambda \\)e<sup>-\\( \\lambda \\)x</sup> = 
                                ${mu.toFixed(3)} x 2,71828<sup>${mu.toFixed(3)}.${y}</sup> = ${pdfY.toFixed(3)}`;
                                    div.appendChild(tampilanPdfX2);
                                    MathJax.typeset();

                                    // Menampilkan CDF x2
                                    let h3Baru2 = document.createElement('h4');
                                    h3Baru2.innerHTML = `<br><strong>CDF <br>P(X > x<sub>2</sub>)</strong> <br>
                             e<sup>-\\(\\lambda\\)x</sup> = ${hasil2.toFixed(3)} =  ${hasil2Persen}`;
                                    div.appendChild(h3Baru2);
                                    MathJax.typeset();

                                    // Menampilkan selisih CDF x1 dan x2
                                    let h3Baru3 = document.createElement('h4');
                                    h3Baru3.innerHTML = `<br><strong>CDF SELISIH <br>P(x<sub>1</sub> < x<sub>2</sub>)</strong> <br> 
                        e<sup>-\\(\\lambda\\)x</sup> - e<sup>-\\(\\lambda\\)x</sup> = ${hasil3.toFixed(3)} =  ${hasil3Persen}`;
                                    div.appendChild(h3Baru3);
                                    MathJax.typeset();

                                    // Deskripsi simbol
                                    let deskripsiSimbol = document.createElement('h3');
                                    deskripsiSimbol.innerHTML = `<br><br>\\(\\mu\\) = Inputan \\(\\mu\\) <br>
                                \\(\\lambda\\) = \\( \\frac{1}{\\mu} \\) <br>
                                x<sub>1</sub> = Inputan x1 <br>
                                x<sub>2</sub > = inputan x2`;
                                    div.appendChild(deskripsiSimbol);
                                    MathJax.typeset();
                                }

                                function garis1() {
                                    let x = parseFloat(document.getElementById('m1').value);
                                    let y = parseFloat(document.getElementById('m2').value);
                                    let x1, p1, p2;
                                    let x2 = 746.5;

                                    if (!validateInput(x, y)) {
                                        return;
                                    }

                                    if (x <= 5) {
                                        x1 = 176.5;
                                        p1 = 'M141 125.5V457H176L175.158 194C161.158 173.031 149.355 150 .158 141 125 .5Z';
                                        p2 = 'M745.576  457H367H176.5V195.226C258.777 300.666 294.143 311.296 367 346.5C522.5 399 587.5 403.5 745.576 409V457Z';
                                    } else {
                                        x1 = 366.5;
                                        p1 = 'M365.5 345.585C306 324.5 182 246.5 141 125.5V457H365.5V345.585Z';
                                        p2 = 'M367 457V346.5C522.5 399 587.5 403.5 745.576 409V457H367Z';
                                    }

                                    let svg = document.getElementById('svg');

                                    let line1 = document.createElementNS('http://www.w3.org/2000/svg', 'line');
                                    line1.setAttribute('x1', x1);
                                    line1.setAttribute('y1', '90');
                                    line1.setAttribute('x2', x1);
                                    line1.setAttribute('y2', '460');
                                    line1.setAttribute('stroke', 'red');
                                    line1.setAttribute('stroke-width', '1');
                                    line1.setAttribute('stroke-dasharray', '2 4');
                                    svg.appendChild(line1);

                                    let line2 = document.createElementNS('http://www.w3.org/2000/svg', 'line');
                                    line2.setAttribute('x1', x2);
                                    line2.setAttribute('y1', '90');
                                    line2.setAttribute('x2', x2);
                                    line2.setAttribute('y2', '460');
                                    line2.setAttribute('stroke', 'blue');
                                    line2.setAttribute('stroke-width', '1');
                                    line2.setAttribute('stroke-dasharray', '2 4');
                                    svg.appendChild(line2);

                                    let arsirx1 = document.createElementNS('http://www.w3.org/2000/svg', 'path');
                                    arsirx1.setAttribute('d', p1);
                                    arsirx1.setAttribute('fill', '#F10707');
                                    arsirx1.setAttribute('fill-opacity', '0.2');
                                    svg.appendChild(arsirx1);

                                    let arsirx2 = document.createElementNS('http://www.w3.org/2000/svg', 'path');
                                    arsirx2.setAttribute('d', 'M908 409C844.747 409.805 809.385 409.814 746.5 409V457H908V409Z');
                                    arsirx2.setAttribute('fill', '#2914A8');
                                    arsirx2.setAttribute('fill-opacity', '0.2');
                                    svg.appendChild(arsirx2);

                                    let arsirSelisih = document.createElementNS('http://www.w3.org/2000/svg', 'path');
                                    arsirSelisih.setAttribute('d', p2);
                                    arsirSelisih.setAttribute('fill', '#D9D9D9');
                                    svg.appendChild(arsirSelisih);
                                }

                                function path() {
                                    let x = parseFloat(document.getElementById('m1').value);
                                    let y = parseFloat(document.getElementById('m2').value);
                                    if (!validateInput(x, y)) {
                                        return; // Jika input tidak valid, hentikan eksekusi fungsi angka
                                    }
                                    let svg = document.getElementById('svg');
                                    //garis lengkung
                                    const lengkung = document.createElementNS('http://www.w3.org/2000/svg', 'path');
                                    lengkung.setAttribute('d', 'M140 118C254.149 432.841 688.714 407.514 908 407.514');
                                    lengkung.setAttribute('stroke', '#00D1FF');
                                    lengkung.setAttribute('stroke-width', '3');
                                    svg.appendChild(lengkung);

                                    // Garis pertama
                                    const line1 = document.createElementNS('http://www.w3.org/2000/svg', 'line');
                                    line1.setAttribute('x1', '139.5');
                                    line1.setAttribute('y1', '90');
                                    line1.setAttribute('x2', '139.5');
                                    line1.setAttribute('y2', '460');
                                    line1.setAttribute('stroke', 'black');
                                    line1.setAttribute('stroke-width', '3');
                                    svg.appendChild(line1);

                                    // Garis kedua
                                    const line2 = document.createElementNS('http://www.w3.org/2000/svg', 'line');
                                    line2.setAttribute('x1', '139');
                                    line2.setAttribute('y1', '458.5');
                                    line2.setAttribute('x2', '909');
                                    line2.setAttribute('y2', '458.5');
                                    line2.setAttribute('stroke', 'black');
                                    line2.setAttribute('stroke-width', '3');
                                    svg.appendChild(line2);

                                    // Garis-garis lainnya
                                    for (i = 119.5; i <= 289.5; i += 170) {
                                        const newLine = document.createElementNS('http://www.w3.org/2000/svg', 'line');
                                        newLine.setAttribute('x1', '130');
                                        newLine.setAttribute('y1', i);
                                        newLine.setAttribute('x2', '138');
                                        newLine.setAttribute('y2', i);
                                        newLine.setAttribute('stroke', 'black');
                                        svg.appendChild(newLine);
                                    }

                                    for (i = 176.5; i <= 898.5; i += 38) {
                                        const newLine = document.createElementNS('http://www.w3.org/2000/svg', 'line');
                                        newLine.setAttribute('x1', i);
                                        newLine.setAttribute('y1', '460');
                                        newLine.setAttribute('x2', i);
                                        newLine.setAttribute('y2', '468');
                                        newLine.setAttribute('stroke', 'black');
                                        svg.appendChild(newLine);
                                        console.log(i)
                                    }
                                }

                                function angka() {
                                    let x = parseFloat(document.getElementById('m1').value);
                                    let y = parseFloat(document.getElementById('m2').value);
                                    if (!validateInput(x, y)) {
                                        return; // Jika input tidak valid, hentikan eksekusi fungsi angka
                                    }

                                    let urutan = [];
                                    let baca = 0

                                    // Mengisi nilai lebih dari 5
                                    if (x >= 1 && x <= 5) {
                                        let range = (y - x) / 15;
                                        for (i = 0; i <= 19; i++) {
                                            let q = x + i * range
                                            urutan.push(q.toFixed(0));
                                        }
                                    } else {
                                        let range = (y - x) / 10;
                                        let xy = x - range * 5
                                        if (xy <= 0) {
                                            for (i = 1; i <= 5; i++) {
                                                urutan.push(i);
                                            }
                                        } else {
                                            for (i = 0; i < 5; i++) {
                                                let q = xy + i * range
                                                urutan.push(q.toFixed(0));
                                            }
                                        }

                                        for (i = 0; i <= 19; i++) {
                                            let q = x + i * range
                                            urutan.push(q.toFixed(0));
                                        }
                                    }

                                    for (i = 170; i <= 892; i += 38) {
                                        const newText = document.createElementNS('http://www.w3.org/2000/svg', 'text');
                                        newText.setAttribute('x', i);
                                        newText.setAttribute('y', '490');
                                        newText.setAttribute('font-family', 'Inter');
                                        newText.setAttribute('font-size', '18');
                                        newText.setAttribute('font-style', 'normal');
                                        newText.setAttribute('fill', 'black');
                                        newText.textContent = `${urutan[baca]}`;
                                        svg.appendChild(newText);
                                        baca++;
                                    }
                                }
                            </script>
                        </div>
                    <?php else: ?>
                        <div class="login-message" style="text-align: center; margin: 20px; padding: 15px; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; border-radius: 5px;">
                            <p>Anda harus login untuk mengakses kalkulator Chi Square.</p>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
            <!-- ahir isi konten -->
            <!-- mulai href konten -->
            <div class="main-a">
                <div class="a-wrapper">
                    <a href="#pengertian">pengartian </a>
                    <a href="#langkah">Langkah langkah pengerjaan</a>
                    <a href="#contoh-soal">contoh soal</a>
                    <a href="#kalkulator">Kalkulator </a>
                </div>
            </div>
            <!-- ahir href konten -->
        </div>
        <!-- ahir konten -->
        <div class="footer">
            <div class="kanan">
                <img src="assets/logo.png" alt="ProbStudy Logo">
                <p>© 2024 ProbStudy. All rights reserved.</p>
            </div>
            <div class="kiri">
                <h6>By</h6>
                <div class="list">
                    <ul>
                        <li>Haniel</li>
                        <li>Renggo</li>
                        <li>Panca</li>
                        <li>Alfaen</li>
                        <li>Naufal</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</body>

</html>