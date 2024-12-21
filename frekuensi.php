<?php
session_start();
include ("connect.php");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROBSTUDY</title>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
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
            justify-content: center;   /* Tambahkan margin jika diperlukan */
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
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
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
        .input-container {
            margin-bottom: 20px;
            text-align: center;
        }

        textarea {
            width: 80%;
            padding: 10px;
            margin-top: 10px;
            font-size: 16px;
        }

        button {
            padding: 10px 20px;
            margin-top: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background-color: #218838;
        }

        .histogram-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        canvas {
            font-family: 'Roboto', sans-serif;
        aspect-ratio: 1 / 1;
        display: block;
        box-sizing: border-box;
        height: 500px;
        width: 500px;
        margin-top: 20px;
            border: 1px solid #ddd;
        }
        .hover-rumus {
            font-size: 1.1em;
            transition: all 0.3s ease-in-out; /* Transisi halus untuk semua perubahan */
            cursor: pointer; /* Menambahkan kursor pointer untuk interaksi */
        }

        .hover-rumus:hover {
            background-color: #f0f8ff; /* Latar belakang yang berubah */
            color: #0077cc; /* Warna teks berubah menjadi biru */
            transform: scale(1.05); /* Efek pembesaran lebih kecil */
            box-shadow: 0 0 8px rgba(0, 119, 204, 0.3); /* Bayangan halus di sekitar rumus */
            letter-spacing: 1px; /* Menambahkan jarak antar huruf */
        }
        .hover-table-dataurut {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        .hover-table-dataurut th, .hover-table-dataurut td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        .hover-table-dataurut tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .hover-table-dataurut tr:hover {
            background-color: #ddd; /* Warna latar belakang saat hover */
            cursor: pointer; /* Menambahkan kursor pointer */
            transform: scale(1.05); /* Efek perbesaran saat hover */
            transition: background-color 0.3s ease, transform 0.3s ease; /* Transisi yang halus */
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

<div class="photo_materi">
    <img src="assets/frekuensi.png" alt="Distribusi Frekuensi">
</div>

<div class="materi">

    <p><strong>Distribusi Frekuensi</strong> adalah penyusunan data dalam bentuk kelompok mulai dari data yang terkecil sampai data yang terbesar berdasarkan kelas-kelas interval dan kategori tertentu (Hasibuan, dkk. 2009). Manfaat penyajian data dalam bentuk distribusi frekuensi adalah untuk menyederhanakan penyajian data sehingga menjadi lebih mudah untuk dibaca dan dipahami sebagai bahan informasi. Tabel distribusi frekuensi disusun bila jumlah data yang akan disajikan cukup banyak, sehingga apabila disajikan dengan menggunakan tabel biasa menjadi tidak efektif dan efisien serta kurang komunikatif.</p>

    <p>Beberapa bagian yang harus diperhatikan dalam distribusi frekuensi antara lain:</p>
    
    <ol>
        <li><strong>Kelas Interval / Jumlah Kelas Interval</strong><br>
            Kelas merupakan kelompok-kelompok nilai atau variabel. Jumlah kelas menunjukkan jumlah kelompok nilai/variabel dari data yang diobservasi. Dalam menentukan jumlah kelas, caranya yaitu menggunakan rumus Sturgess:
            <p class="hover-rumus">
                $$ K = 1 + 3.322 \log_{10} n $$
            </p>
            <ul>
                <li><strong>K</strong> = Jumlah kelas</li>
                <li><strong>n</strong> = Banyaknya data</li>
                <li><strong>Log</strong> = Logaritma</li>
            </ul>
        </li>
    
        <li><strong>Batas Kelas</strong><br>
            Batas kelas merupakan nilai-nilai yang membatasi antara kelas yang satu dengan kelas berikutnya. Terdiri dari dua macam, yaitu:
            <ol type="a">
                <li><strong>Batas Kelas Bawah</strong>: Yaitu nilai atau angka yang terdapat pada bagian sebelah kiri dari setiap kelas.</li>
                <li><strong>Batas Kelas Atas</strong>: Yaitu nilai atau angka yang terdapat pada bagian sebelah kanan dari setiap kelas.</li>
            </ol>
        </li>
    
        <li><strong>Rentang Data</strong> (<i>Range</i>)<br>
            Rentang data adalah selisih antara data tertinggi dan data terendah.
            <p class="hover-rumus">
                $$ \text{Rentang Data} = x_{\text{max}} - x_{\text{min}} $$
            </p>
            <ul>
                <li><strong>Xmax</strong> = Data tertinggi</li>
                <li><strong>Xmin</strong> = Data terendah</li>
            </ul>
        </li>
    
        <li><strong>Panjang Interval Kelas / Panjang Kelas</strong> (<i>Interval Size</i>)<br>
            Panjang kelas adalah jarak antara tepi kelas atas dengan tepi kelas bawah. Dapat dihitung dengan cara:
            <p class="hover-rumus">
                $$ \text{Panjang Kelas} = \frac{\text{Rentang Data}}{\text{Banyaknya Data}} $$
            </p>
        </li>
    
        <li><strong>Frekuensi Kelas</strong> (<i>Class Frequency</i>)<br>
            Frekuensi kelas merupakan banyaknya jumlah data yang terdapat pada kelas tertentu.</li>
    </ol>
    

 
    <p>Langkah-langkah membuat tabel distribusi frekuensi kelompok:</p>
    <ol>
        <li><strong>Mengurutkan data</strong><br>
            Langkah pertama adalah mengurutkan data dari yang terkecil hingga yang terbesar. Ini membantu memudahkan analisis dan pembuatan kelas interval.
        </li>
        <li><strong>Menentukan banyak kelas</strong><br>
            Langkah kedua adalah menentukan banyak kelas. Banyak kelas ini bisa dihitung menggunakan rumus Sturgess, yaitu:
            <p class="hover-rumus">
                $$ K = 1 + 3.322 \log_{10} n $$
            </p>
        </li>
        <li><strong>Menentukan panjang kelas</strong><br>
            Langkah ketiga adalah menentukan panjang kelas. Panjang kelas dihitung dengan rumus:
            <p class="hover-rumus">
                $$ \text{Panjang Kelas} = \frac{\text{Rentang Data}}{\text{Banyaknya Data}} $$
            </p>
            <p class="hover-rumus">
                $$ \text{Rentang Data} = x_{\text{max}} - x_{\text{min}} $$
            </p>
        </li>
        <li><strong>Menghitung banyak frekuensi setiap kelas, gunakan turus</strong><br>
            Langkah keempat adalah menghitung banyak frekuensi setiap kelas interval. Frekuensi ini menunjukkan jumlah data yang berada dalam setiap kelas interval. Untuk menghitung frekuensi, data dibagi ke dalam kelas-kelas yang telah ditentukan.
        </li>
        <li><strong>Menyajikan tabel distribusi frekuensi</strong><br>
            Langkah terakhir adalah menyajikan data dalam bentuk tabel distribusi frekuensi. Tabel ini akan menunjukkan kelas-kelas interval yang telah ditentukan, batas kelas, panjang kelas, dan frekuensi untuk masing-masing kelas.
        </li>
    </ol>
    
    
    
    
    <div id="penjelasan_metode">
        <h1>Contoh Pengerjaan Distribusi Frekuensi</h1>
        <p>Berikut adalah data tinggi badan sejumlah siswa.</p>
        <table border="1">
            <tr>
              <td>164</td>
              <td>154</td>
              <td>148</td>
              <td>145</td>
              <td>180</td>
            </tr>
            <tr>
              <td>175</td>
              <td>172</td>
              <td>160</td>
              <td>152</td>
              <td>155</td>
            </tr>
            <tr>
              <td>153</td>
              <td>158</td>
              <td>162</td>
              <td>165</td>
              <td>167</td>
            </tr>
            <tr>
              <td>165</td>
              <td>161</td>
              <td>157</td>
              <td>170</td>
              <td>166</td>
            </tr>
            <tr>
              <td>150</td>
              <td>153</td>
              <td>158</td>
              <td>160</td>
              <td>162</td>
            </tr>
            <tr>
              <td>178</td>
              <td>174</td>
              <td>165</td>
              <td>167</td>
              <td>170</td>
            </tr>
            <tr>
              <td>155</td>
              <td>172</td>
              <td>155</td>
              <td>164</td>
              <td>165</td>
            </tr>
            <tr>
              <td>158</td>
              <td>160</td>
              <td>167</td>
              <td>158</td>
              <td>161</td>
            </tr>
          </table>
          

        <ol>
            <li><strong>Mengurutkan data</strong><br>
                Langkah pertama adalah mengurutkan data yang akan disajikan. Dari langkah ini akan bergunak untuk mendapatkan nilai terbesar dan terkecil. Selain itu juga berguna untuk menentukan frekuensi data dari setiap kelas.
            </li>
            <table border="1" class="hover-table-dataurut">
                <tr>
                  <td>145</td>
                  <td>148</td>
                  <td>150</td>
                  <td>152</td>
                  <td>153</td>
                </tr>
                <tr>
                  <td>153</td>
                  <td>154</td>
                  <td>155</td>
                  <td>155</td>
                  <td>155</td>
                </tr>
                <tr>
                  <td>157</td>
                  <td>158</td>
                  <td>158</td>
                  <td>158</td>
                  <td>158</td>
                </tr>
                <tr>
                  <td>160</td>
                  <td>160</td>
                  <td>160</td>
                  <td>161</td>
                  <td>161</td>
                </tr>
                <tr>
                  <td>162</td>
                  <td>162</td>
                  <td>164</td>
                  <td>164</td>
                  <td>165</td>
                </tr>
                <tr>
                  <td>165</td>
                  <td>165</td>
                  <td>165</td>
                  <td>166</td>
                  <td>167</td>
                </tr>
                <tr>
                  <td>167</td>
                  <td>167</td>
                  <td>170</td>
                  <td>170</td>
                  <td>172</td>
                </tr>
                <tr>
                  <td>172</td>
                  <td>174</td>
                  <td>175</td>
                  <td>178</td>
                  <td>180</td>
                </tr>
              </table>
              
              
            <li><strong>Menentukan banyak kelas</strong><br>
                Selanjunya adalah menentukan banyak kelas dengan Aturan Sturges. Rumus yang digunakan adalah k = 1 + 3,3 ⋅  log n (diketahui nilai log 40 = 1,602).
                <p class="hover-rumus">
                    $$ K = 1 + 3.322 \log_{10} n $$ <br>
                    $$ K = 1 + 3,3 \times \log(40) = 1 + 3,3 \times 1,602 $$<br>
                    $$ K = 1 + 4,806 = 5,806 \approx 6 $$
                </p>
            </li>


            <li><strong>Menentukan panjang kelas</strong><br>
                Langkah berikutnya adalah menentukan panjang kelas. Dari data diketahui Xmax = 180, Xmin = 145, dan K = 6.
                <p class="hover-rumus">
                    $$ \text{Panjang Kelas} = \frac{\text{Rentang Data}}{\text{Banyaknya Kelas}} $$<br>
                    $$ \text{Panjang Kelas} = \frac{x_{\text{max}} - x_{\text{min}}}{\text{Banyaknya Kelas}} $$<br>
                    $$ \text{Panjang Kelas} = \frac{180 - 145}{6} = \frac{35}{6} = 5,833 \approx 6 $$
                </p>
                
            </li>
            <li><strong>Menghitung banyak frekuensi setiap kelas</strong><br>
                <p>Menentukan Kelas-Kelas Interval</p>

                <p>Dari perhitungan sebelumnya, diperoleh panjang kelas ℓ = 6. Batas bawah kelas pertama sama dengan data terkecil. Sedangkan batas atas kelas pertama dapat dihitung dengan rumus:</p>
                
                <p class="hover-rumus">
                    \[
                    \text{Batas Atas Kelas Pertama} = \text{Batas Bawah Kelas Pertama} + (\ell - 1)
                    \]
                </p>
                
                <p>Dengan data terkecil = 145, maka batas bawah dan batas atas kelas pertama adalah sebagai berikut:</p>
                
                <p class="hover-rumus">
                    \[
                    \text{Batas Bawah Kelas Pertama} = 145
                    \]
                  </p>
                  
                <p class="hover-rumus">
                    \[
                    \text{Batas Atas Kelas Pertama} = 145 + (6 - 1) = 145 + 5 = 150
                    \]
                </p>
                
                <p>Dengan demikian, kelas pertama memiliki batas bawah 145 dan batas atas 150.</p>
                
            </li>
            <li><strong>Menyajikan tabel distribusi frekuensi</strong><br>
                Data dapat disajikan dalam bentuk tabel seperti dibawah ini. Bisa juga menggunakan histogram yang dapat di akses di fitur dibawah.
                <table border="1">
                    <tr>
                      <th>Kelas</th>
                      <th>Frekuensi</th>
                    </tr>
                    <tr>
                      <td>145 ‒ 150</td>
                      <td>3</td>
                    </tr>
                    <tr>
                      <td>151 ‒ 156</td>
                      <td>7</td>
                    </tr>
                    <tr>
                      <td>157 ‒ 162</td>
                      <td>12</td>
                    </tr>
                    <tr>
                      <td>163 ‒ 168</td>
                      <td>10</td>
                    </tr>
                    <tr>
                      <td>169 ‒ 174</td>
                      <td>5</td>
                    </tr>
                    <tr>
                      <td>175 ‒ 180</td>
                      <td>3</td>
                    </tr>
                  </table> 
            </li>
        </ol>



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

    <h2>Histogram Data Kelompok Generator</h2>
    <label for="data">Masukkan Data Angka (pisahkan dengan spasi):</label><br>
    <div class="input-container">
        <?php if (isset($_SESSION['username'])): ?>
        <label for="data">Masukkan Data Angka (pisahkan dengan spasi):</label><br>
        <textarea id="data" rows="5" cols="50" placeholder="Contoh: 10 20 30 40 50 60 70"></textarea><br>
        <button id="generateBtn">Generate Histogram</button>
        <button id="saveBtn" style="display:none;">Save Histogram</button>
    </div>
    <div class="histogram-container">
        <h3>Histogram:</h3>
        <canvas id="histogramCanvas" width="900" height="700"></canvas>
    </div>

    <script>
        const canvas = document.getElementById('histogramCanvas');
        const ctx = canvas.getContext('2d');

        document.getElementById('generateBtn').addEventListener('click', function() {
            var dataInput = document.getElementById('data').value;
            var data = dataInput.split(' ').map(Number).filter(num => !isNaN(num) && num > 0);
            if (data.length === 0) {
                alert("Mohon masukkan angka yang valid.");
                return;
            }

            generateHistogram(data);
            document.getElementById('saveBtn').style.display = 'inline-block'; // Show save button after generation
        });

        document.getElementById('saveBtn').addEventListener('click', function() {
            // Convert canvas to base64 string
            var imageData = canvas.toDataURL("image/png");

            // Save the image data (this can be sent to a server or saved locally)
            saveHistogramImage(imageData);
        });

        function generateHistogram(data) {
            ctx.clearRect(0, 0, canvas.width, canvas.height); // Clear previous histogram

            // Calculate bin count using Sturges' formula
            const binCount = Math.round(1 + 3.3 * Math.log10(data.length));
            const min = Math.min(...data);
            const max = Math.max(...data);
            const range = max - min;
            const binWidth = Math.ceil(range / binCount);

            // Initialize bins
            const bins = Array(binCount).fill(0);
            data.forEach(value => {
                let index = Math.floor((value - min) / binWidth);
                if (index >= binCount) index = binCount - 1;
                bins[index]++;
            });

            // Determine maximum frequency for scaling
            const maxFrequency = Math.max(...bins);
            const barWidth = canvas.width / binCount; // Width of each bar
            const containerHeight = canvas.height;

            // Draw histogram bars
            bins.forEach((frequency, i) => {
                const barHeight = (frequency / maxFrequency) * containerHeight;
                const binStart = min + i * binWidth;
                const binEnd = binStart + binWidth - 1;

                // Draw bars
                ctx.fillStyle = 'lightpink';
                ctx.fillRect(i * barWidth, containerHeight - barHeight, barWidth - 1, barHeight);

                // Draw frequency label at the top inside the bar
                ctx.fillStyle = 'black';
                ctx.font = '12px Arial';
                const textXPosition = i * barWidth + barWidth - 20;
                const textYPosition = containerHeight - barHeight + 15;
                ctx.fillText(frequency, textXPosition, textYPosition);

                // Draw bin range label below the bar
                ctx.fillText(`${binStart} - ${binEnd}`, i * barWidth + barWidth / 2 - 10, containerHeight - 5);
            });
        }

        function saveHistogramImage(imageData) {
            // Create an anchor element to trigger a download
            const a = document.createElement('a');
            a.href = imageData;
            a.download = 'histogram.png'; // Set the file name for download
            a.click(); // Trigger the download
        }
    </script>

        <?php else: ?>
            <div class="login-message" style="text-align: center; margin: 20px; padding: 15px; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; border-radius: 5px;">
    <p>Anda harus login untuk mengakses Histogram.</p>
</div>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
