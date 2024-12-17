<?php
session_start();
include("connect.php"); // Menyertakan file koneksi

// Mendapatkan data JSON dari permintaan
$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['lambda'], $data['maxX'], $data['probabilities'])) {
    $lambda = $data['lambda'];
    $maxX = $data['maxX'];
    $probabilities = json_encode($data['probabilities']); // Mengonversi array probabilities ke JSON

    // Menyiapkan pernyataan SQL
    $stmt = $conn->prepare("INSERT INTO laporan_poisson (lambda, max_x, probabilities) VALUES (?, ?, ?)");
    $stmt->bind_param("dis", $lambda, $maxX, $probabilities); // d untuk double, i untuk integer, s untuk string

    // Menjalankan pernyataan
    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Hasil berhasil disimpan."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Gagal menyimpan hasil."]);
    }

    $stmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "Input tidak valid."]);
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project||Probstat</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
            border: none;
            outline: none;
            scroll-behavior: smooth;
            font-family: 'Poppins', sans-serif;
        }

        :root {
            --bg-color: #000; /* Black background */
            --second-bg-color: #fff; /* White background */
            --text-color: #fff; /* White text */
            --main-color: #ccc; /* Light gray for accents */
        }

        html {
            font-size: 62.5%;
            overflow-x: hidden;
        }

        body {
            background: var(--bg-color);
            color: var(--text-color);
        }

        section {
            min-height: 100vh;
            padding: 10rem 9% 2rem;
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
            justify-content: space-around;
            padding: 10px 20px;
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
        .home {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .home-img img {
            width: 33vw;
            animation: floatimage 4s ease-in-out infinite;
        }

        @keyframes floatimage {
            0% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-2.4rem);
            }
            100% {
                transform: translateY(0);
            }
        }

        .home-content h3 {
            font-size: 3.2rem;
            font-weight: 700;
        }

        .home-content h3:nth-of-type(2) {
            margin-bottom: 2rem;
        }

        span {
            color: var(--main-color);
        }

        .home-content h1 {
            font-size: 5.6rem;
            font-weight: 700;
            line-height: 1.3;
        }

        .home-content p {
            font-size: 1.6rem;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 1rem 2.8rem;
            background: var(--main-color);
            border-radius: 4rem;
            box-shadow: 0 0 1rem var(--main-color);
            font-size: 1.6rem;
            color: var(--bg-color);
            letter-spacing: .1rem;
            font-weight: 600;
        }

        .btn:hover {
            box-shadow: none;
        }

        

        .materi h2 {
            margin-bottom: 5rem;
        }

        .materi-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 2rem;
            padding-bottom: 20px;
        }

        .materi-container p {
            font-size: large;
        }

        .contoh {
            
            padding-bottom: 60px;
        }

        .contoh h2 {
            margin-bottom: 4rem;
        }

        .conso-container img {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 80%;
        }

        .proyek {
            text-align: center;
            margin-bottom: 50px;
        }

        .proyek h2 {
            margin-bottom: 3rem;
        }

        .footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            padding: 2rem 9%;
            background: var(--second-bg-color);
        }

        .footer-text p {
            font-size: 1.6rem;
            color: var(--bg-color);
        }

        .footer-iconTop a {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            padding: .8rem;
            background: var(--main-color);
            border-radius: .8rem;
        }

        .footer a:hover {
            box-shadow: 0 0 1rem var(--main-color);
        }

        .footer-iconTop a i {
            font-size: 2.4rem;
            color: var(--bg-color);
        }

        /* Breakpoint */
        @media (max-width: 1200px) {
            html {
                font-size: 55%;
            }
        }

        @media (max-width: 991px) {
            header {
                padding: 2rem 3%;
            }

            section {
                padding: 10rem 3% 2rem;
            }

            .materi {
                padding-bottom: 7rem;
            }

            .contoh {
                padding-bottom: 7rem;
            }

            .proyek {
                min-height: auto;
            }

            .footer {
                padding: 2rem 3%;
            }
        }

        @media (max-width: 768px) {
            .navbar {
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                padding: 1rem 3%;
                background: var(--bg-color);
                border-top: .1rem solid rgba(255, 255, 255, .2);
                box-shadow: 0 .5rem 1rem rgba(255, 255, 255, .2);
                display: none;
            }

            .navbar.active {
                display: block;
            }

            .navbar a {
                display: block;
                font-size: 2rem;
                margin: 3rem 0;
            }

            .home {
                flex-direction: column;
            }

            .home-content h3 {
                font-size: 2.6rem;
            }

            .home-content h1 {
                font-size: 5rem;
            }

            .home-img img {
                width: 70vw;
                margin-top: 4rem;
            }
        }

        .chart-container {
            position: relative;
            height: 300px;
            width: 100%;
            margin-top: 20px;
        }

        .proyek .lambda-input,
        .proyek .max-input {
            width: 35%;
            padding: 1.5rem;
            font-size: 1.6rem;
            color: var(--text-color);
            background: var(--second-bg-color);
            border-radius: .8rem;
            margin: .7rem 0;
            text-align: center;
        }

        .proyek .max-input {
            margin-bottom: 35px;
        }

        .proyek .button-proyek {
            display: inline-block;
            padding: 1rem 2.8rem;
            background: var(--main-color);
            border-radius: 4rem;
            box-shadow: 0 0 1rem var(--main-color);
            font-size: 1.6rem;
            color: var(--bg-color);
            letter-spacing: .1rem;
            font-weight: 600;
            margin-bottom: 50px;
        }
        .bar {
            background-color: white; /* Change the bar color to white */
        }
        .probability-text {
                color: #40E0D0; /* Turquoise color */
                font-weight: bold;
            }

        .footer {
            flex-direction: column-reverse;
        }

        .footer p {
            text-align: center;
            margin-top: 2rem;
        }
    </style>
</head>

<body>
    <!-- header karo navbar-->
    <div class="header" style="font-size: 2rem;"> <!-- Increased font size -->
        <h1 style="font-size: 2.5rem;">PROBSTUDY</h1> <!-- Increased font size -->
        <nav class="navbar" style="font-size: 1.8rem;"> <!-- Increased font size -->
            <a href="home1.php">HOME</a>
            <div class="dropdown">
                <a class="dropbtn">MATERI</a>
                <div class="dropdown-content" style="font-size: 1.3rem;">
                    <a href="regresi.php">Regresi Linear Sederhana</a>
                    <a href="eksponensial.php">Sebaran Peluang Distribusi Eksponensial</a>
                    <a href="poisson.php">⁠Sebaran Peluang Diskrit (Poisson)</a>
                    <a href="square.php">Chi Square</a>
                    <a href="frekuensi.php">Distribusi Frekuensi</a>
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
    <!-- header karo navbar -->

    <!-- Bagian Home -->
    <section class="home" id="home" style="margin-top: -50px;"> <!-- Adjusted margin to move section up -->
        <div class="home-content">
            <h3>ProbStudy</h3>
            <h1>Sebaran Peluang Diskrit (Poisson)</h1>
            <h3>Kelompok <span>Tiga</span></h3>
            <p>Dalam teori probabilitas dan statistika, distribusi Poisson adalah distribusi probabilitas diskret yang menyatakan peluang jumlah peristiwa yang terjadi pada periode waktu tertentu apabila rata-rata kejadian tersebut diketahui dan dalam waktu yang saling bebas sejak kejadian terakhir.</p>

            <a href="refut.pdf" download="refut.pdf" class="btn">Refrensi Utama</a>
        </div>

        <div class="home-img">
            <img src="imagesp/aku.png" alt="">
        </div>
    </section>
    <!-- Bagian Home -->

    <!-- Bagian materi -->
    <section class="materi" id="materi">
    <h2 class="heading" style="font-size: 4rem; text-align: center;">Materi<span> Proyek</span></h2>

        <div class="materi-container"> 
            <p>Dalam teori probabilitas dan statistika, distribusi Poisson adalah distribusi probabilitas diskret yang menyatakan peluang jumlah peristiwa yang terjadi pada periode waktu tertentu apabila rata-rata kejadian tersebut diketahui dan dalam waktu yang saling bebas sejak kejadian terakhir.</p>

            <p>Jika suatu percobaan menghasilkan variabel random X yang
                menyatakan banyak-nya sukses dalam daerah tertentu atau
                selama interval waktu tertentu, percobaan itu disebut
                percobaan Poisson.</p>

            <p>
                1. Banyaknya percobaan yang terjadi dalam suatu interval waktu atau suatu
                daerah tertentu tidak tergantung pada banyaknya hasil percobaan yang
                terjadi pada interval waktu atau daerah lain yang terpisah
            </p>
                
            <p> 
                2. Probabilitas hasil percobaan yang terjadi selama suatu interval waktu
                yang singkat atau daerah yang kecil, sebanding dengan panjangnya
                waktu atau besarnya daerah tersebut dan tidak tergantung pada 
                banyaknya hasil percobaan yang terjadi diluar waktu atau daerah tersebut
            </p>
            <p>
                3. Probabilitas lebih dari satu hasil percobaan yang terjadi dalam interval
                waktu yang singkat atau dalam daerah yang kecil dapat diabaikan.
            </p>

            <p>
                - Jumlah X dari keluaran yang terjadi selama satu percobaan Poisson
                disebut Variabel random Poisson, dan distribusi probabilitasnya disebut
                distribusi Poisson.
            </p>

            <p>
                - Bila x menyatakan banyaknya sukses yang terjadi , λ adalah rata-rata
                banyaknya sukses yang terjadi dalam interval waktu atau daerah tertentu,
                dan e = 2,718 , maka rumus distribusi Poisson adalah :
            </p>

            <img src="imagesp/rumus.png" alt="">

            <p class="jelas">
                Dimana: P(x) = probabilitas kelas sukses <br>
                μ / λ = rata-rata keberhasilan = n . p <br>
                x = Banyaknya unsur berhasil dalam sampel
                atau variable random diskrit <br>
                e = Konstanta= 2,7182 <br>
                n = jumlah/ukuran populasi <br>
                t = banyaknya <br>
            </p>
        </div>
    </section>
    <!-- Bagian materi -->

    <!-- Bagian contoh -->
    <section class="contoh" id="contoh">
    <h2 class="heading" style="font-size: 4rem; text-align: center;">Contoh<span> Soal</span></h2>

        <div class="conso-container">
            <img src="imagesp/conso1.jpg" alt=""> <br>
            <img src="imagesp/conso2.jpg" alt="">
        </div>
    </section>
    <!-- Bagian contoh -->

    <!-- Bagian proyek -->
    <section class="proyek" id="proyek">
    <h2 class="heading" style="font-size: 4rem; text-align: center;">ProbStudy<span> Proyek</span></h2>

        <h2 class="judul-proyek">Sebaran Peluang Diskrit (Poisson)</h2>

        <label class="lambda-text" for="lambda">Nilai λ (rata-rata kejadian):</label> <br>
        <input class="lambda-input" type="number" id="lambda" step="0.1" style="background-color: white; color: black;"> <br>
        
        <label class="max-text" for="maxX">Nilai maksimum x:</label> <br>
        <input class="max-input" type="number" id="maxX" style="background-color: white; color: black;"> <br>
        <button class="button-proyek" onclick="drawChart()">Buat Histogram</button>
        
        <div id="chart" class="chart-container"></div>
    </section>    
    <!-- Bagian proyek -->

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-text">
            <p>Copyright &copy; Kelompok Tiga || ProbStudy</p>
        </div>
    </footer>
    <!-- Footer -->

    <!-- java script -->
    <script src="https://unpkg.com/scrollreveal"></script>
    <script>
        // scroll section active link / Pindah Fungsi Class Pas di Scroll atau pindah slide
        let sections = document.querySelectorAll('section');
        let navLinks = document.querySelectorAll('header nav a');

        window.onscroll = () => {
            sections.forEach(sec => {
                let top = window.scrollY;
                let offset = sec.offsetTop - 150;
                let height = sec.offsetHeight;
                let id = sec.getAttribute('id');

                if(top >= offset && top < offset + height) {
                    navLinks.forEach(links => {
                        links.classList.remove('active');
                        document.querySelector('header nav a[href*=' + id +']').classList.add('active');
                    });
                };
            });
            // Sticky Navbar
            let header = document.querySelector('header');

            header.classList.toggle('sticky', window.scrollY > 100);
        };

        //proyek probabilitas dan statistika

        // Fungsi untuk eksponensial
        function exp(x) {
            let sum = 1.0; // inisialisasi dengan 1
            let term = 1.0;
            for (let i = 1; i < 100; i++) {
                term *= x / i;
                sum += term;
            }
            return sum;
        }

        // Fungsi untuk pangkat
        function pangkat(base, exponent) {
            let result = 1;
            for (let i = 0; i < exponent; i++) {
                result *= base;
            }
            return result;
        }

        // Parameter:
        // lam - rata-rata kejadian dalam interval waktu tertentu
        // x - jumlah kejadian yang terjadi
        function poissonProbability(lam, x) {
            return pangkat(lam, x) * exp(-lam) / factorial(x);
        }

        // Fungsi untuk menghitung faktorial dari sebuah bilangan
        // Parameter:
        // n - bilangan yang akan dihitung faktorialnya
        function factorial(n) {
            let result = 1;
            for (let i = 2; i <= n; i++) {
                result *= i;
            }
            return result;
        }

        // Fungsi untuk menggambar grafik distribusi Poisson
        // Mengambil nilai lambda dan maxX dari input pengguna, menghitung peluang, dan menampilkan grafik
        php:ProbsStudy-main/poisson.php
// ... existing code ...
function drawChart() {
    let lam = parseFloat(document.getElementById('lambda').value); // Mengambil nilai lambda dari input pengguna
    let maxX = parseInt(document.getElementById('maxX').value); // Mengambil nilai maxX dari input pengguna

    // Validasi input
    if (isNaN(lam) || isNaN(maxX) || maxX < 0) {
        alert("Silakan masukkan nilai yang valid untuk λ dan maksimum x.");
        return; // Keluar dari fungsi jika input tidak valid
    }

    let probabilities = [];
    for (let x = 0; x <= maxX; x++) {
        probabilities.push(poissonProbability(lam, x)); // Menghitung peluang untuk setiap x dan menyimpannya dalam array
    }

    let chart = document.getElementById('chart');
    chart.innerHTML = ''; // Mengosongkan konten chart sebelumnya

    // Menentukan tinggi maksimum untuk skala bar
    let maxProbability = Math.max(...probabilities);
    if (maxProbability === 0) {
        alert("Tidak ada probabilitas yang dihitung. Silakan periksa input Anda.");
        return; // Keluar jika tidak ada probabilitas yang dihitung
    }
    let scaleFactor = 300 / maxProbability; // Tinggi maksimum container dibagi dengan peluang maksimum

    // Create X and Y axes
    let xAxis = document.createElement('div');
    xAxis.style.borderTop = '2px solid #40E0D0'; // Set color to turquoise
    xAxis.style.width = '100%';
    xAxis.style.position = 'absolute';
    xAxis.style.bottom = '0';
    chart.appendChild(xAxis);

    let yAxis = document.createElement('div');
    yAxis.style.borderLeft = '2px solid #40E0D0'; // Set color to turquoise
    yAxis.style.height = '100%';
    yAxis.style.position = 'absolute';
    yAxis.style.left = '0';
    chart.appendChild(yAxis);

    for (let i = 0; i < probabilities.length; i++) {
        let barContainer = document.createElement('div');
        barContainer.style.display = 'inline-block';
        barContainer.style.width = '30px';
        barContainer.style.position = 'relative'; // Set position to relative for absolute positioning of text

        let bar = document.createElement('div');
        bar.className = 'bar';
        bar.style.height = (probabilities[i] * scaleFactor) + 'px'; // Skala tinggi bar sesuai dengan faktor skala
        bar.style.width = '80%';
        bar.style.marginBottom = '0'; // Menghilangkan margin bawah
        barContainer.appendChild(bar);

        // Create a text element to display the probability
        let probabilityText = document.createElement('div');
        probabilityText.className = 'probability-text'; // Add class for styling
        probabilityText.style.position = 'absolute'; // Position it absolutely
        probabilityText.style.bottom = '100%'; // Position it above the bar
        probabilityText.style.left = '50%'; // Center it horizontally
        probabilityText.style.transform = 'translateX(-50%)'; // Adjust for centering
        probabilityText.innerText = probabilities[i].toFixed(4); // Display the probability with 4 decimal places
        barContainer.appendChild(probabilityText); // Append the text to the bar container

        chart.appendChild(barContainer); // Append the barContainer to the chart
    }

    // Kirim data ke server
    fetch('save_results.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ lambda: lam, maxX: maxX, probabilities: probabilities }),
    })
    .then(response => response.json())
    .then(data => {
        console.log('Sukses:', data);
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}
// ... existing code ...
</script>
</body>
</html>