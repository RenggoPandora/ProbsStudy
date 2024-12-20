<?php
session_start();
include ("connect.php");
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
            background-color: #007bff;
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

.proyek .histo-scroll{
    /* scrollbar-width : none; */
    height: max-content;
    width: 100%;
    overflow: auto;
    white-space: nowrap;
    text-align: left;
}


.proyek .lambda-input,
.proyek .max-input{
    width: 35%;
    padding: 1.5rem;
    font-size: 1.6rem;
    color: #00000;
    background: var(--second-bg-color);
    border-radius: .8rem;
    margin: .7rem 0;
    text-align: center;
}

.proyek .max-input{
    margin-bottom: 35px;
}

.proyek .button-proyek{
    display: inline-block;
    padding: 1rem 2.8rem;
    background: var(--main-color);
    border-radius: 4rem;
    box-shadow: 0 0 1rem var(--main-color);
    font-size: 1.6rem;
    color: var(--second-bg-color);
    letter-spacing: .1rem;
    font-weight: 600;
    margin-bottom: 50px;
}

.proyek .lambda-text,
.proyek .max-text{
    font-size: medium;
}

.proyek  .judul-proyek{
    font-size: large;
}
.axis {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 2px;
    background: rgb(255, 255, 255);
}

.y-axis {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 2px;
    height: 100%;
    background: rgb(255, 255, 255);
}

.bar {
    position: relative;
    display: inline-block;
    margin: 0 2px;
    background: #49b1ac;
    vertical-align: bottom;
}

.bar-label {
    text-align: center;
    margin-top: 5px;
}

.probability-text {
    position: absolute;
    top: -10px;
    left: 50%;
    transform: translateX(-50%);
    font-size: 0.5em; /* Ukuran font relatif terhadap lebar bar */
    white-space: nowrap; /* Menjaga teks agar tidak mematahkan */
}
/* Add this CSS to your existing styles */
.proyek label {
    font-size: 1.6rem; /* Match font size with the theme */
    color: var(--text-color); /* Use the theme text color */
    margin-bottom: 0.5rem; /* Space between label and input */
}

.proyek input[type="number"] {
    width: 35%; /* Match width with existing inputs */
    padding: 1.5rem; /* Match padding with existing inputs */
    font-size: 1.6rem; /* Match font size with the theme */
    color: #000; /* Text color */
    background: var(--second-bg-color); /* Background color */
    border-radius: .8rem; /* Match border radius */
    margin: .7rem 0; /* Space between inputs */
    border: 1px solid #ccc; /* Add border for better visibility */
}

.proyek input[type="number"]:focus {
    border-color: var(--main-color); /* Change border color on focus */
    outline: none; /* Remove default outline */
}/* Add this CSS to your existing styles */
.proyek button {
    display: inline-block;
    padding: 1rem 2.8rem; /* Padding for the button */
    background: var(--main-color); /* Background color */
    border-radius: 4rem; /* Rounded corners */
    box-shadow: 0 0 1rem var(--main-color); /* Shadow effect */
    font-size: 1.6rem; /* Font size */
    color: var(--second-bg-color); /* Text color */
    letter-spacing: .1rem; /* Letter spacing */
    font-weight: 600; /* Font weight */
    margin-top: 20px; /* Space above the button */
    transition: background 0.3s, transform 0.3s; /* Transition effects */
}

.proyek button:hover {
    background: #575757; /* Darker background on hover */
    transform: scale(1.05); /* Slightly enlarge on hover */
}

.footer-title {
    font-size: 2.5rem; /* Increased font size */
}

.footer-navbar {
    font-size: 1.8rem; /* Increased font size */
}

.footer-link {
    color: #000000; /* Changed color to purple */
}

.footer-dropdown-content {
    font-size: 1.3rem; /* Font size for dropdown items */
}

.footer {
    flex-direction: column-reverse; /* Maintain existing layout */
    text-align: center; /* Center align footer text */
    padding: 2rem 9%; /* Maintain existing padding */
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
            <img src="images/aku.png" alt="">
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

            <img src="images/rumus.png" alt="">

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
    <h2>Daftar Soal dan Jawaban</h2>
    <style>
       /* Add this CSS for table styling */
       table {
           width: 100%; /* Full width */
           border-collapse: collapse; /* Merge borders */
           margin: 20px auto; /* Center the table with top margin */
           max-width: 800px; /* Set a maximum width for the table */
       }
        th, td {
           padding: 12px; /* Padding inside cells */
           text-align: left; /* Align text to the left */
           border: 1px solid #ccc; /* Light gray border */
           color: black; /* Set font color to black */
       }
        th {
           background-color: #007bff; /* Header background color */
           color: white; /* Header text color */
       }
        tr:nth-child(even) {
           background-color: #f2f2f2; /* Zebra striping for even rows */
       }
        tr:hover {
           background-color: #ddd; /* Highlight row on hover */
       }
   </style>
    <?php
    // Query untuk mengambil data soal dan jawaban
    $query = "SELECT * FROM soal_poisson";
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
    <!-- Bagian contoh -->

    <!-- Bagian proyek -->
    <section class="proyek" id="proyek">
        <h2 class="heading">Proyek <span>Probstat</span></h2>

        <h2 class="judul-proyek">Sebaran Peluang Diskrit (Poisson)</h2>

        <label class="lambda-text" for="lambda">Nilai λ (rata-rata kejadian):</label> <br>
        <input class="lambda-input" type="number" id="lambda" step="0.1"> <br>
        
        <label class="max-text" for="maxX">Nilai x:</label> <br>
        <input class="max-input"type="number" id="maxX"> <br>
        
        <button class="button-proyek" onclick="drawChart()">Buat Histogram</button>
        
        <div class="histo-scroll">
        <div id="chart" class="chart-container"></div>
        </div>

        <h2 class="judul-hitung" style="font-size: 4rem; text-align: center;">Hitung Peluang</h2>

        <label for="xValue">Nilai x:</label>
        <input type="number" id="xValue">

        <label for="aValue">Nilai a:</label>
        <input type="number" id="aValue">

        <br>

        <label for="bValue">Nilai b:</label>
        <input type="number" id="bValue">

        <br>

        <button onclick="calculateProbabilities()" >Hitung Peluang</button>

        <div id="result_eq_x"></div>
        <div id="result_leq_x"></div>
        <div id="result_geq_x"></div>
        <div id="result_interval"></div>
    </section>    
    <!-- Bagian proyek -->

    <!-- Footer -->
    <footer class="footer">
      <nav class="navbar footer-navbar"> <!-- Increased font size -->
          <a href="home1.php" class="footer-link">HOME</a> <!-- Changed color to purple -->
          <div class="dropdown">
              <a class="dropbtn footer-link">MATERI</a> <!-- Changed color to purple -->
              <div class="dropdown-content footer-dropdown-content">
                  <a href="regresi.php" class="footer-link">Regresi Linear Sederhana</a> <!-- Changed color to purple -->
                  <a href="eksponensial.php" class="footer-link">Sebaran Peluang Distribusi Eksponensial</a> <!-- Changed color to purple -->
                  <a href="poisson.php" class="footer-link">⁠Sebaran Peluang Diskrit (Poisson)</a> <!-- Changed color to purple -->
                  <a href="square.php" class="footer-link">Chi Square</a> <!-- Changed color to purple -->
                  <a href="frekuensi.php" class="footer-link">Distribusi Frekuensi</a> <!-- Changed color to purple -->
              </div>
              <a href="riwayat.php" class="footer-link" style="color: black;">RIWAYAT</a>
          </div>
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

    //Hapus toggle icon dan navbar ketika di klik navbar link(scroll)
    menuIcon.classList.remove('bx-x');
    navbar.classList.remove('active');

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
// Fungsi untuk menghitung peluang Poisson kumulatif p(X <= x)
function cumulativePoisson(lam, x) {
    let cumulative = 0;
    for (let i = 0; i <= x; i++) {
        cumulative += poissonProbability(lam, i);
    }
    return cumulative;
}

// Fungsi untuk menghitung peluang Poisson kumulatif p(X >= x)
function upperCumulativePoisson(lam, x) {
    return 1 - cumulativePoisson(lam, x - 1);
}

// Fungsi untuk menggambar grafik distribusi Poisson
// Mengambil nilai lambda dan maxX dari input pengguna, menghitung peluang, dan menampilkan grafik
function drawChart() {
    let lam = parseFloat(document.getElementById('lambda').value);
    let probabilities = [];
    let maxX = parseInt(document.getElementById('maxX').value); // Mengambil nilai maksimum x dari input pengguna
    let maxProbability = 0; // Untuk menemukan probabilitas maksimum

    // Loop untuk menghitung probabilitas hingga mencapai 0
    for (let x = 0; ; x++) {
        let prob = poissonProbability(lam, x);
        if (prob <= 0) {
            break; // Keluar dari loop ketika probabilitas menjadi 0
        }
        probabilities.push(prob);
        if (prob > maxProbability) {
            maxProbability = prob;
        }
    }

    let chart = document.getElementById('chart');
    chart.innerHTML = '';

    let sumbuY = document.createElement('div');
    sumbuY.className = 'y-axis';
    chart.appendChild(sumbuY);

    let sumbuX = document.createElement('div');
    sumbuX.className = 'axis';
    sumbuX.style.bottom = '-2px';
    chart.appendChild(sumbuX);

    let scaleFactor = 300 / maxProbability;

    // Menggambar histogram berdasarkan probabilitas yang dihitung
    for (let i = 0; i < probabilities.length; i++) {
        let barContainer = document.createElement('div');
        barContainer.style.display = 'inline-block';
        barContainer.style.width = '30px';

        let bar = document.createElement('div');
        bar.className = 'bar';
        bar.style.height = (probabilities[i] * scaleFactor) + 'px';
        bar.style.width = '80%';
        bar.style.marginBottom = '0';
        
        // Tambahkan warna merah untuk bar dengan nilai maksimum x
        if (i === maxX) {
            bar.style.backgroundColor = 'red';
        }
        
        barContainer.appendChild(bar);

        let label = document.createElement('div');
        label.className = 'bar-label';
        label.innerText = i;
        barContainer.appendChild(label);

        let textProbability = document.createElement('div');
        textProbability.className = 'probability-text';
        textProbability.innerText = probabilities[i].toFixed(4);
        bar.appendChild(textProbability);

        chart.appendChild(barContainer);
    }
}
function calculateProbabilities() {
       let lam = parseFloat(document.getElementById('lambda').value);
       let x = parseInt(document.getElementById('xValue').value);
       let a = parseInt(document.getElementById('aValue').value);
       let b = parseInt(document.getElementById('bValue').value);
       
       let p_x_eq_x = poissonProbability(lam, x);
       let p_x_leq_x = cumulativePoisson(lam, x);
       let p_x_geq_x = upperCumulativePoisson(lam, x);
       let p_interval = cumulativePoisson(lam, b) - cumulativePoisson(lam, a - 1);
       
       document.getElementById('result_eq_x').innerText = 'p(X = ' + x + ') = ' + p_x_eq_x.toFixed(4);
       document.getElementById('result_leq_x').innerText = 'p(X <= ' + x + ') = ' + p_x_leq_x.toFixed(4);
       document.getElementById('result_geq_x').innerText = 'p(X >= ' + x + ') = ' + p_x_geq_x.toFixed(4);
       document.getElementById('result_interval').innerText = 'p(' + a + ' <= X <= ' + b + ') = ' + p_interval.toFixed(4);
        // New code to insert results into the database
       let username = '<?php echo $_SESSION['username']; ?>'; // Get the username from the session
       let hasil = JSON.stringify({
           p_x_eq_x: p_x_eq_x.toFixed(4),
           p_x_leq_x: p_x_leq_x.toFixed(4),
           p_x_geq_x: p_x_geq_x.toFixed(4),
           p_interval: p_interval.toFixed(4)
       });
       let tanggal = new Date().toISOString().slice(0, 10); // Get current date in YYYY-MM-DD format
        // AJAX request to insert data into the database
       let xhr = new XMLHttpRequest();
       xhr.open("POST", "insert_laporan.php", true);
       xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
       xhr.onreadystatechange = function () {
           if (xhr.readyState === 4 && xhr.status === 200) {
               console.log(xhr.responseText); // Handle response if needed
           }
       };
       xhr.send("username=" + encodeURIComponent(username) + "&hasil=" + encodeURIComponent(hasil) + "&tanggal=" + encodeURIComponent(tanggal));
   }
</script>
</body>
</html>