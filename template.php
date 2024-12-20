<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROBSRTUDY || EKSPONENSIAL</title>
    <link rel="stylesheet" href="css/materi.css">
</head>

<body>
    <div class="container">
        <!-- mulai navbar -->
        <div class="navbar">
            <img src="assets/logo.png" alt="">
            <div class="nav">
                <a href="">HOME</a>
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
                <a href="">RIWAYAT</a>
                <?php if (isset($_SESSION['username'])): ?>
                    <a href="logout.php">LOGOUT</a>
                <?php else: ?>
                    <a href="login.php">LOGIN</a>
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
                    <h1>Pengertian Distribusi Eksponensial</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum enim eum magnam. Doloribus consectetur minima ad, quibusdam aspernatur ducimus assumenda modi optio atque vitae porro ipsa, eaque incidunt corrupti sapiente! Aspernatur nobis ipsam officiis eius veritatis blanditiis vel velit, numquam repudiandae consequatur dolorum iste itaque aut quas pariatur cum. Ipsum nisi quod eum saepe accusamus qui incidunt exercitationem asperiores minima odio repellat quos vel voluptas temporibus vitae obcaecati atque, distinctio ea. Rem ad quod dignissimos! Quae eligendi ullam temporibus hic a asperiores consequatur vel, vitae pariatur fuga doloremque quas odio? Illo aliquam, inventore explicabo nisi ad necessitatibus molestiae eveniet voluptatem!</p>
                    <div class="rumus">
                        <h2>nama rumus</h2>
                        <img src="images/rumus.png" alt="">
                        <ul>
                            <li>X = bla bla bla</li>
                            <li>X = bla bla bla</li>
                            <li>X = bla bla bla</li>
                        </ul>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis aspernatur, laudantium praesentium nihil unde natus, officiis minus ullam accusamus excepturi doloremque doloribus cum, earum culpa exercitationem quisquam corrupti minima. Aliquam.</p>
                </div>

                <div class="langkah" id="langkah">
                    <h1>Langkah-Langkah Mengerjakan Soal </h1>
                    <ol>
                        <li>pertama</li>
                        <li>kedua</li>
                    </ol>
                    <div class="contoh">
                        <h1>Contoh pengerjaan ... </h1>

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
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="card">
                            <p><strong>blablabla</strong></p>
                            <p>bla</p>
                        </div>
                    </div>
                </div>

                <div class="contoh-soal" id="contoh-soal">
                    <h1>Contoh Soal dan Jawaban</h1>

                </div>

                <div class="kalkulator" id="kalkulator">
                    <h1>Kalkulator Distribusi Eksponensial</h1>
                    <div class="card">

                    </div>
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
    </div>
</body>

</html>