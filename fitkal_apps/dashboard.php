<?php
session_start();

require_once "database/db.php"; // Panggil koneksi database
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Fitkal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Favicons -->
    <link href="assets/img/logofitkal.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            padding-top: 20px;
        }
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-bottom: 15px; /* Mengurangi jarak antar card */
            overflow: hidden; /* Menjamin gambar tidak keluar dari card */
            padding: 10px; /* Memberikan padding agar lebih rapi */
        }
        .card-body {
            text-align: center;
        }
        .card-body h5 {
            font-size: 18px;
            color: #343a40;
            margin-bottom: 10px;
        }
        .card-body a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
            font-size: 16px;
        }
        .card-body a:hover {
            color: #0056b3;
        }
        .welcome-message {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            margin-bottom: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .welcome-message h2 {
            color: #007bff;
        }
        .card-img-top {
            width: 100%;
            height: 150px; /* Mengurangi ukuran gambar */
            object-fit: cover;
            border-radius: 10px 10px 0 0; /* Sudut melengkung pada gambar */
        }
        .logout-btn {
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="welcome-message">
            <h2>Selamat datang, <?php echo htmlspecialchars($username); ?>!</h2>
            <p>Selamat datang di aplikasi Fitkal, platform untuk menghitung kalori, BMI, dan mendapatkan rekomendasi makanan sehat. Silakan pilih fitur yang ingin kamu gunakan.</p>
        </div>
   <!-- Search Section -->
<section id="pencarian" class="call-to-action section">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row content justify-content-center align-items-center position-relative">
      <div class="col-lg-8 mx-auto text-center">
        <h2 class="display-4 mb-4">Cari Kalori Makanan</h2>
        <p class="mb-4">Masukkan nama makanan yang ingin Anda cari untuk mengetahui kandungan kalori dalam makanan tersebut.</p>

        <!-- Search Form -->
        <form action="cek_api.php" method="get">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="food_name" placeholder="Contoh: Nasi Goreng" required>
            <button class="btn btn-cta" type="submit">Cari Kalori</button>
          </div>
        </form>
      </div>
    </section>
    
        <div class="row">
            <!-- Card 1: Hitung Kalori Harian -->
            <div class="col-md-4 col-sm-6">
                <div class="card">
                    <img src="images/kalori.png" alt="Kalori Harian" class="card-img-top">
                    <div class="card-body">
                        <h5>Hitung Kalori Harian</h5>
                        <a href="fitur_kalori.php">Mulai</a>
                    </div>
                </div>
            </div>

            <!-- Card 2: Rekomendasi Makanan Sehat -->
            <div class="col-md-4 col-sm-6">
                <div class="card">
                    <img src="images/makanan.png" alt="Makanan Sehat" class="card-img-top">
                    <div class="card-body">
                        <h5>Rekomendasi Makanan Sehat</h5>
                        <a href="fitur_makanan.php">Mulai</a>
                    </div>
                </div>
            </div>

            <!-- Card 3: Cek Proses Berat Badan -->
            <div class="col-md-4 col-sm-6">
                <div class="card">
                    <img src="images/progres.png" alt="Proses Berat Badan" class="card-img-top">
                    <div class="card-body">
                        <h5>Cek Proses Berat Badan</h5>
                        <a href="fitur_progress.php">Mulai</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Card 4: Cek BMI -->
            <div class="col-md-4 col-sm-6">
                <div class="card">
                    <img src="images/bmi.png" alt="Cek BMI" class="card-img-top">
                    <div class="card-body">
                        <h5>Cek BMI</h5>
                        <a href="fitur_bmi.php">Mulai</a>
                    </div>
                </div>
            </div>

            <!-- Card 5: Cek Record Makanan Harianmu -->
            <div class="col-md-4 col-sm-6">
                <div class="card">
                    <img src="images/record.png" alt="Record Makanan" class="card-img-top">
                    <div class="card-body">
                        <h5>Cek Record Makanan Harianmu</h5>
                        <a href="cek_recordmakanan.php">Mulai</a>
                    </div>
                </div>
            </div>

            <!-- Card 6: Cek Hasil Perhitunganmu -->
            <div class="col-md-4 col-sm-6">
                <div class="card">
                    <img src="images/hasil.png" alt="Hasil Perhitungan" class="card-img-top">
                    <div class="card-body">
                        <h5>Cek Hasil Perhitunganmu</h5>
                        <a href="hasil_perhitungan.php">Mulai</a>
                    </div>
                </div>
            </div>
        </div>
<!-- Chatbot Button -->
<div id="chatbot-button" class="chatbot-button">
    <img src="https://via.placeholder.com/50" alt="Chatbot" class="img-fluid">
    <span>Chat with us</span>
</div>

<!-- Chatbot Container -->
<div id="chatbot-container" class="chatbot-container" style="display: none;">
    <div class="chatbot-header">
        <h5>Chatbot</h5>
        <button id="close-chatbot" class="btn btn-danger btn-sm">X</button>
    </div>
    <div class="chatbot-body">
        <!-- Konten chatbot bisa ditambahkan di sini -->
        <p>Halo, bagaimana saya bisa membantu Anda?</p>
    </div>
    <div class="chatbot-footer">
        <input type="text" class="form-control" placeholder="Ketik pesan..." id="chat-input">
        <button id="send-message" class="btn btn-primary">Kirim</button>
    </div>
</div>

<style>
    /* Styling untuk chatbot button (persegi panjang) */
    .chatbot-button {
        position: fixed;
        bottom: 20px;
        right: 20px;
        cursor: pointer;
        background-color: #007bff;
        border-radius: 5px; /* Sudut lebih melengkung, tetapi tidak bulat */
        padding: 12px 20px; /* Lebar dan tinggi tombol lebih besar */
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .chatbot-button img {
        width: 30px;
        height: 30px;
    }

    .chatbot-button span {
        color: #fff;
        font-size: 16px;
        font-weight: bold;
    }

    /* Styling untuk chatbot container */
    .chatbot-container {
        position: fixed;
        bottom: 80px;
        right: 20px;
        width: 300px;
        height: 400px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        overflow: hidden;
        display: none;
    }

    .chatbot-header {
        background-color: #007bff;
        color: #fff;
        padding: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .chatbot-body {
        padding: 10px;
        overflow-y: auto;
        height: 270px;
    }

    .chatbot-footer {
        padding: 10px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .chatbot-footer input {
        width: 70%;
    }
</style>

<script>
    // Menampilkan chatbot ketika tombol diklik
    document.getElementById('chatbot-button').addEventListener('click', function() {
        var chatbot = document.getElementById('chatbot-container');
        chatbot.style.display = 'block';
    });

    // Menutup chatbot ketika tombol X diklik
    document.getElementById('close-chatbot').addEventListener('click', function() {
        var chatbot = document.getElementById('chatbot-container');
        chatbot.style.display = 'none';
    });
</script>

<style>
/* Styling untuk artikel */
.articles-section {
    display: grid;
    grid-template-columns: repeat(3, 1fr); /* 3 kolom */
    gap: 20px; /* Mengurangi gap untuk keteraturan */
    margin: 20px 0; /* Mengatur margin lebih baik */
}

.article {
    background-color: #fff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    height: auto;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.article:hover {
    transform: translateY(-8px); /* Efek hover lebih halus */
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
}

.article img {
    width: 100%;
    height: 200px; /* Membuat gambar lebih besar untuk responsif */
    object-fit: cover;
}

.article-content {
    padding: 15px;
    text-align: center;
}

.article h3 {
    font-size: 18px; /* Ukuran judul yang proporsional */
    margin-top: 12px;
    color: #333;
}

.article p {
    font-size: 14px; /* Ukuran teks deskripsi sedikit lebih besar */
    color: #666;
    margin-bottom: 10px;
}

.article .category {
    font-size: 12px;
    color: #007bff;
    background-color: #e0f7fa;
    padding: 4px 8px;
    border-radius: 12px;
    display: inline-block;
}

.article a {
    text-decoration: none;
    color: inherit;
}

/* Responsive Layout */
@media (max-width: 1200px) {
    .articles-section {
        grid-template-columns: repeat(2, 1fr); /* 2 kolom pada layar sedang */
    }
}

@media (max-width: 768px) {
    .articles-section {
        grid-template-columns: 1fr; /* 1 kolom pada layar kecil */
    }
}


</style>
<br>

<!-- Section Artikel -->
<div class="container section-title" data-aos="fade-up">
    <h2>Artikel Kesehatan</h2>
    <p>Temukan berbagai tips kesehatan yang bermanfaat bagi hidup sehat Anda</p>
</div>

<section class="articles-section">
    <!-- Artikel 1 -->
    <div class="article" data-aos="fade-up" data-aos-delay="100">
        <a href="https://www.mitrakeluarga.com/artikel/tips-diet-sehat" target="_blank">
            <img src="https://www.mitrakeluarga.com/_next/image?url=https%3A%2F%2Fd3uhejzrzvtlac.cloudfront.net%2Fcompro%2FarticleDesktop%2F649e648a-9c3b-4b8f-b59e-c4acf31af4eb.jpeg&w=1920&q=100" alt="Tips Diet Sehat" loading="lazy">
            <div class="article-content">
                <h3>Gerakan Berputar dengan Bertumpu pada Satu Kaki di Permainan Basket</h3>
                <p>Gerakan berputar dengan bertumpu pada salah satu kaki dalam permainan bola basket...</p>
                <span class="category">Olahraga</span>
            </div>
        </a>
    </div>
    
    <!-- Artikel 2 -->
    <div class="article" data-aos="fade-up" data-aos-delay="200">
        <a href="https://www.alodokter.com/tips-diet-sehat-melalui-makanan-dan-olahraga" target="_blank">
            <img src="https://res.cloudinary.com/dk0z4ums3/image/upload/v1621835634/attached_image/tips-diet-sehat-melalui-makanan-dan-olahraga-0-alodokter.jpg" alt="Diet untuk Menurunkan Berat Badan" loading="lazy">
            <div class="article-content">
                <h3>Ini Penyebab Munculnya Flek Coklat Sebelum Haid</h3>
                <p>Munculnya flek coklat sebelum haid bisa mengindikasikan perubahan hormonal atau...</p>
                <span class="category">Diet</span>
            </div>
        </a>
    </div>

    <!-- Artikel 3 -->
    <div class="article" data-aos="fade-up" data-aos-delay="300">
        <a href="https://rs.ui.ac.id/umum/berita-artikel/artikel-populer/tips-diet-untuk-menurunkan-berat-badan" target="_blank">
            <img src="https://rs.ui.ac.id/umum/files/artikel-populer/20210525101432-1.jpg" alt="Tips Diet untuk Menurunkan Berat Badan" loading="lazy">
            <div class="article-content">
                <h3>Mengenal Refleksi Diri: Pengertian, Manfaat, dan Cara Menerapkannya</h3>
                <p>Refleksi diri bisa dengan berdialog dengan diri sendiri, melakukan meditasi, atau...</p>
                <span class="category">Psikologi</span>
            </div>
        </a>
    </div>

    <!-- Artikel 4 -->
    <div class="article" data-aos="fade-up" data-aos-delay="400">
        <a href="https://krakataumedika.com/info-media/artikel/cara-diet-yang-aman-untuk-turunkan-berat-badan-tanpa-bahayakan-kesehatan" target="_blank">
            <img src="https://krakataumedika.com/images/2020/02/05/diet-aman.jpg" alt="Diet yang Aman Turunkan Berat Badan" loading="lazy">
            <div class="article-content">
                <h3>Apakah Penyakit Hipertiroid Bisa Disembuhkan? Ini Faktanya</h3>
                <p>Penyakit hipertiroid terjadi ketika kelenjar tiroid seseorang memproduksi hormon lebih...</p>
                <span class="category">Hipertiroidisme</span>
            </div>
        </a>
    </div>

    <!-- Artikel 5 -->
    <div class="article" data-aos="fade-up" data-aos-delay="500">
        <a href="https://www.halodoc.com/kesehatan/diet-dan-nutrisi?srsltid=AfmBOopA6FKGcNDzvlyoI7gZ543UJASred4e0cRBMGleWRd6MsiOEbp2" target="_blank">
            <img src="https://res.cloudinary.com/dk0z4ums3/image/upload/v1633998083/attached_image/jangan-lupakan-3-nutrisi-ini-ketika-diet-0-alodokter.jpg" alt="Diet dan Nutrisi" loading="lazy">
            <div class="article-content">
                <h3>Diet dan Nutrisi: Panduan Sehat untuk Berat Badan Ideal</h3>
                <p>Temukan tips diet yang sesuai untuk menurunkan berat badan tanpa membahayakan tubuh...</p>
                <span class="category">Diet dan Nutrisi</span>
            </div>
        </a>
    </div>
</section>



        <div class="logout-btn">
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
<?php

require_once "sisipkan/footer.php";
?>

</html>
