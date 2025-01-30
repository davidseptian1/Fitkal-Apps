
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
<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">FitKal</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#features">Features</a></li>
          <li><a href="#services">Services</a></li>
          <!--<li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">Dropdown 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">Deep Dropdown 1</a></li>
                  <li><a href="#">Deep Dropdown 2</a></li>
                  <li><a href="#">Deep Dropdown 3</a></li>
                  <li><a href="#">Deep Dropdown 4</a></li>
                  <li><a href="#">Deep Dropdown 5</a></li>
                </ul>
              </li>
              <li><a href="#">Dropdown 2</a></li>
              <li><a href="#">Dropdown 3</a></li>
              <li><a href="#">Dropdown 4</a></li>
            </ul>
          </li>
        --> 
          <li><a href="#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="login.php">Login Sekarang</a>

    </div>
  </header>
  <br>
  <br>
  <br>
  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="hero-content" data-aos="fade-up" data-aos-delay="200">
              <div class="company-badge mb-4">
                <i class="bi bi-gear-fill me-2"></i>
                Ayo Coba Sekarang!
              </div>

              <h1 class="mb-4">
                <span style="color: orange;">CEK MAKANAN</span> <br>
                <span class="accent-text">SEHAT KALIAN!</span>
              </h1>
              

              <p class="mb-4 mb-md-5" style="text-align: justify;">
  Coba raih voucher gratismu di aplikasi FitKal sekarang juga! Dapatkan kesempatan istimewa ini untuk menikmati rekomendasi makanan sehat yang lezat dan sesuai kebutuhan tubuhmu. Segera cek kondisi berat badanmu dan temukan saran makanan sehat yang tepat dengan voucher gratis dari FitKal.
</p>


              <style>
                .btn-custom {
                  font-weight: bold;
                  padding: 12px 24px; /* Ukuran padding agar tombol lebih besar dan mudah diklik */
                  border-radius: 8px; /* Sudut melengkung agar lebih modern */
                  transition: all 0.3s ease-in-out;
                  text-align: center;
                }
              
                /* Tombol Daftar Sekarang (Biru) */
                .btn-primary-custom {
                  background-color: #007bff; /* Biru */
                  border-color: #007bff;
                  color: white;
                }
              
                .btn-primary-custom:hover {
                  background-color: #0056b3; /* Biru lebih gelap saat hover */
                  border-color: #0056b3;
                  box-shadow: 0 5px 15px rgba(0, 123, 255, 0.4);
                  transform: scale(1.05);
                }
              
                /* Tombol Cek Kalori Sekarang! (Oranye) */
                .btn-orange-custom {
                  background-color: #ff5722; /* Oranye */
                  border-color: #ff5722;
                  color: white;
                }
              
                .btn-orange-custom:hover {
                  background-color: #e64a19; /* Oranye lebih gelap saat hover */
                  border-color: #e64a19;
                  box-shadow: 0 5px 15px rgba(255, 87, 34, 0.4);
                  transform: scale(1.05);
                }
              </style>
              
              <div class="hero-buttons">
                <a href="register.php" class="btn btn-primary me-0 me-sm-2 mx-1 btn-custom btn-primary-custom">
                  <i class="bi bi-person-plus-fill me-1"></i> Daftar Sekarang
                </a>
                <!-- Tombol Cek Kalori yang akan scroll ke form pencarian -->
                <a href="#pencarian" class="btn me-0 me-sm-2 mx-1 btn-custom btn-orange-custom">
                  <i class="bi bi-fire me-1"></i> Cek Kalori Sekarang!
                </a>
              </div>
              
            </div>
          </div>

          <div class="col-lg-6">
            <div class="hero-image" data-aos="zoom-out" data-aos-delay="300">
              <img src="assets/img/fitkal.png" alt="Hero Image" class="img-fluid">

              <div class="customers-badge">
                <div class="customer-avatars">
                  <img src="assets/img/avatar-1.webp" alt="Customer 1" class="avatar">
                  <img src="assets/img/avatar-2.webp" alt="Customer 2" class="avatar">
                  <img src="assets/img/avatar-3.webp" alt="Customer 3" class="avatar">
                  <img src="assets/img/avatar-4.webp" alt="Customer 4" class="avatar">
                  <img src="assets/img/avatar-5.webp" alt="Customer 5" class="avatar">
                  <span class="avatar more">12+</span>
                </div>
                <p class="mb-0 mt-2">1000 Orang, telah menggunakan ini</p>
              </div>
            </div>
          </div>
        </div>

        <div class="row stats-row gy-4 mt-5" data-aos="fade-up" data-aos-delay="500">
          <div class="col-lg-3 col-md-6">
            <div class="stat-item">
              <div class="stat-icon">
                <i class="bi bi-trophy"></i>
              </div>
              <div class="stat-content">
                <h4>1x Juara 1  </h4>
                <p class="mb-0"> Nominasi Aplikasi Populer</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="stat-item">
              <div class="stat-icon">
                <i class="bi bi-briefcase"></i>
              </div>
              <div class="stat-content">
                <h4>1k Data Makanan</h4>
                <p class="mb-0">Berbagai Macam Makanan dan Minuman</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="stat-item">
              <div class="stat-icon">
                <i class="bi bi-graph-up"></i>
              </div>
              <div class="stat-content">
                <h4>1k Orang</h4>
                <p class="mb-0">Telah mempercayai aplikasi ini!</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="stat-item">
              <div class="stat-icon">
                <i class="bi bi-award"></i>
              </div>
              <div class="stat-content">
                <h4>3x Penghargaan</h4>
                <p class="mb-0">Telah Mendukung Program SDGs</p>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Hero Section -->
<!-- About Section -->
<section id="about" class="about section">

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-4 align-items-center justify-content-between">

      <div class="col-xl-5" data-aos="fade-up" data-aos-delay="200">
        <span class="about-meta">TENTANG FITKAL</span>

        <h2 class="about-title">Meningkatkan Kesehatan Anda, Mengatur Makanan Sesuai Ekonomi</h2>
        <p class="about-description" style="text-align: justify; line-height: 1.6; margin: 0 auto; max-width: 800px;">
  Fitkal adalah aplikasi kesehatan yang membantu Anda mengatur asupan makanan dengan bijak, menyesuaikan kebutuhan nutrisi Anda sesuai dengan kemampuan ekonomi. Dengan Fitkal, Anda dapat melacak kalori dan membuat rencana makan yang terjangkau tanpa mengorbankan kualitas nutrisi. Tidak hanya itu, kami menyediakan saran makan yang dipersonalisasi untuk membantu Anda mencapai tujuan kebugaran dan menjaga kesehatan.
</p>

<style>
  .feature-list {
  list-style-type: none;
  padding-left: 0;
  margin: 0;
  text-align: justify; /* Meratakan teks kiri-kanan */
}

.feature-list li {
  margin-bottom: 10px; /* Memberikan jarak antar item list */
  font-size: 16px; /* Ukuran font yang nyaman dibaca */
  line-height: 1.6; /* Jarak antar baris lebih nyaman */
}

.feature-list i {
  color: #28a745; /* Memberikan warna hijau pada icon */
  margin-right: 10px; /* Memberikan jarak antara icon dan teks */
}

@media (max-width: 768px) {
  .feature-list li {
    font-size: 14px; /* Ukuran font yang sedikit lebih kecil pada perangkat kecil */
  }
}

</style>
<div class="row feature-list-wrapper">
  <div class="col-md-6">
    <ul class="feature-list">
      <li><i class="bi bi-check-circle-fill"></i> Menyesuaikan rencana makan dengan anggaran Anda</li>
      <li><i class="bi bi-check-circle-fill"></i> Memantau asupan kalori harian dengan biaya terjangkau</li>
      <li><i class="bi bi-check-circle-fill"></i> Rencana makan yang seimbang sesuai dengan kebutuhan tubuh</li>
    </ul>
  </div>
  <div class="col-md-6">
    <ul class="feature-list">
      <li><i class="bi bi-check-circle-fill"></i> Menetapkan dan mencapai tujuan kesehatan dengan anggaran yang efektif</li>
      <li><i class="bi bi-check-circle-fill"></i> Tips dan saran makanan sehat dengan harga terjangkau</li>
      <li><i class="bi bi-check-circle-fill"></i> Mengoptimalkan penggunaan bahan makanan lokal dan murah</li>
    </ul>
  </div>
</div>

        <div class="info-wrapper">
          <div class="row gy-4">
            <div class="col-lg-5">
              <div class="profile d-flex align-items-center gap-3">
                <img src="assets/img/avatar-1.webp" alt="Pengembang Aplikasi" class="profile-image">
                <div>
                  <h4 class="profile-name">Defit Septian F</h4>
                  <p class="profile-position">Penemu Ide</p>
                </div>
              </div>
            </div>
            <div class="col-lg-7">
              <div class="contact-info d-flex align-items-center gap-2">
                <i class="bi bi-telephone-fill"></i>
                <div>
                  <p class="contact-label">Butuh bantuan?</p>
                  <p class="contact-number">+62 111 2222 4444</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-6" data-aos="fade-up" data-aos-delay="300">
        <div class="image-wrapper">
          <div class="images position-relative" data-aos="zoom-out" data-aos-delay="400">
            <img src="assets/img/logofitkal.png" alt="Rencana Makan Sehat" class="img-fluid main-image rounded-4">
            <img src="assets/img/logofitkal.png" alt="Pelacakan Kebugaran" class="img-fluid small-image rounded-4">
          </div>
          <div class="experience-badge floating">
            <h3>1+ <span>Tahun</span></h3>
            <p>Pengalaman dalam teknologi kesehatan dan kebugaran</p>
          </div>
        </div>
      </div>
    </div>

  </div>

  <style>
    /* Tab Navigation Styling */
.nav-tabs {
  border-bottom: 2px solid #ddd;
  margin-bottom: 30px;
}

.nav-tabs .nav-link {
  border: none;
  font-weight: bold;
  color: #333;
  text-transform: uppercase;
  font-size: 16px;
}

.nav-tabs .nav-link.active {
  background-color: #007bff;
  color: white;
}

.nav-tabs .nav-link:hover {
  background-color: #f0f0f0;
}

/* Tab Content Styling */
.tab-pane {
  margin-top: 30px;
}

.tab-pane .row {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}

.tab-pane .col-lg-6 {
  margin-bottom: 30px;
}

.tab-pane img {
  max-width: 100%;
  border-radius: 10px;
}

/* Feature Box Styling */
.feature-box {
  padding: 20px;
  border-radius: 8px;
  text-align: center;
  transition: all 0.3s ease;
}

.feature-box i {
  font-size: 30px;
  color: white;
  margin-bottom: 20px;
}

.feature-box h4 {
  font-size: 18px;
  font-weight: bold;
  margin-bottom: 15px;
}

.feature-box p {
  font-size: 14px;
}

.feature-box.orange {
  background-color: #fd7e14;
}

.feature-box.blue {
  background-color: #007bff;
}

.feature-box.green {
  background-color: #28a745;
}

.feature-box.red {
  background-color: #dc3545;
}

.feature-box:hover {
  transform: translateY(-10px);
}

/* Responsiveness */
@media (max-width: 768px) {
  .nav-tabs {
    flex-direction: column;
  }

  .nav-tabs .nav-link {
    margin-bottom: 10px;
  }

  .tab-pane .col-lg-6 {
    flex: 0 0 100%;
    max-width: 100%;
  }
}

  </style>
<!-- Features Section -->
<section id="features" class="features section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Fitur Aplikasi Fitkal</h2>
    <p>Dengan aplikasi Fitkal, Anda dapat melacak kondisi kesehatan tubuh dan menerima rekomendasi yang sesuai dengan kebutuhan kesehatan Anda, disesuaikan dengan anggaran yang tersedia.</p>
  </div><!-- End Section Title -->

  <div class="container">
    <div class="d-flex justify-content-center">
      <ul class="nav nav-tabs" data-aos="fade-up" data-aos-delay="100">
        <li class="nav-item">
          <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1">
            <h4>Modul Pemantauan Kesehatan</h4>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2">
            <h4>Rekomendasi Nutrisi</h4>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-3">
            <h4>Rekomendasi Diet untuk Pertumbuhan atau Menaikkan Berat Badan</h4>
          </a>
        </li>
      </ul>
    </div>

    <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
      <!-- Tab Content -->
      <div class="tab-pane fade active show" id="features-tab-1">
        <div class="row">
          <div class="col-lg-6 d-flex flex-column justify-content-center">
            <h3>Melacak Kondisi Kesehatan Anda</h3>
            <p class="fst-italic">
              Aplikasi Fitkal memungkinkan Anda untuk memantau berbagai parameter kesehatan tubuh seperti berat badan, tekanan darah, dan kadar gula darah secara berkala, sambil memberi saran makanan sehat yang sesuai dengan anggaran Anda.
            </p>
            <ul>
              <li><i class="bi bi-check2-all"></i> Mencatat data kesehatan tubuh Anda dengan mudah.</li>
              <li><i class="bi bi-check2-all"></i> Melihat tren kesehatan Anda dalam grafik yang mudah dipahami.</li>
              <li><i class="bi bi-check2-all"></i> Memberikan rekomendasi kesehatan berdasarkan data yang tercatat dan anggaran Anda.</li>
            </ul>
          </div>
          <div class="col-lg-6 text-center">
            <img src="assets/img/features-illustration-1.webp" alt="Pemantauan Kesehatan" class="img-fluid">
          </div>
        </div>
      </div>

      <div class="tab-pane fade" id="features-tab-2">
        <div class="row">
          <div class="col-lg-6 d-flex flex-column justify-content-center">
            <h3>Rekomendasi Nutrisi Sesuai Kebutuhan</h3>
            <p class="fst-italic">
              Aplikasi Fitkal memberikan saran nutrisi berdasarkan hasil pantauan kesehatan dan tujuan kebugaran Anda, serta menyesuaikan dengan anggaran yang tersedia.
            </p>
            <ul>
              <li><i class="bi bi-check2-all"></i> Rekomendasi makanan sehat sesuai dengan data tubuh Anda dan anggaran.</li>
              <li><i class="bi bi-check2-all"></i> Mendapatkan saran diet yang sesuai dengan kondisi kesehatan Anda dan kapasitas ekonomi.</li>
              <li><i class="bi bi-check2-all"></i> Fitur perencanaan makan yang mudah dan praktis, disesuaikan dengan anggaran Anda.</li>
            </ul>
          </div>
          <div class="col-lg-6 text-center">
            <img src="assets/img/about.png" alt="Nutrisi" class="img-fluid">
          </div>
        </div>
      </div>

      <div class="tab-pane fade" id="features-tab-3">
        <div class="row">
          <div class="col-lg-6 d-flex flex-column justify-content-center">
            <h3>Rekomendasi Diet untuk Pertumbuhan atau Menaikkan Berat Badan</h3>
            <ul>
              <li><i class="bi bi-check2-all"></i> Diet tinggi kalori dan protein untuk meningkatkan massa otot.</li>
              <li><i class="bi bi-check2-all"></i> Makanan bergizi untuk mendukung pertumbuhan tubuh atau menaikkan berat badan secara sehat.</li>
              <li><i class="bi bi-check2-all"></i> Porsi makan yang tepat sesuai kebutuhan kalori harian.</li>
            </ul>
            <p class="fst-italic">
              Fitkal menyediakan rencana diet yang sehat dan dapat membantu Anda menaikkan berat badan dengan cara yang aman, disertai dengan rekomendasi makanan bergizi terjangkau.
            </p>
          </div>
          <div class="col-lg-6 text-center">
            <img src="assets/img/features-illustration-3.webp" alt="Diet untuk Pertumbuhan" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
  </div>

</section><!-- End Features Section -->

<!-- Features Cards Section -->
<section id="features-cards" class="features-cards section">

  <div class="container">
    <div class="row gy-4">
      <!-- Feature Box 1 -->
      <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
        <div class="feature-box orange">
          <i class="bi bi-award"></i>
          <h4>Keakuratan Data</h4>
          <p>Menyediakan data kesehatan yang akurat dan dapat dipercaya untuk pengambilan keputusan yang lebih baik, tanpa biaya mahal.</p>
        </div>
      </div>

      <!-- Feature Box 2 -->
      <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
        <div class="feature-box blue">
          <i class="bi bi-patch-check"></i>
          <h4>Rekomendasi Makanan Sehat</h4>
          <p>Memberikan rekomendasi yang disesuaikan dengan kebutuhan kesehatan tubuh Anda, terjangkau untuk berbagai anggaran.</p>
        </div>
      </div>

      <!-- Feature Box 3 -->
      <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
        <div class="feature-box green">
          <i class="bi bi-sunrise"></i>
          <h4>Diet untuk Pertumbuhan</h4>
          <p>Menawarkan diet sehat untuk mendukung pertumbuhan tubuh atau menaikkan berat badan dengan cara yang aman dan efektif.</p>
        </div>
      </div>

      <!-- Feature Box 4 -->
      <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="400">
        <div class="feature-box red">
          <i class="bi bi-shield-check"></i>
          <h4>Kesehatan Terjaga</h4>
          <p>Menjaga kesehatan tubuh dengan memberikan panduan diet dan latihan yang seimbang, sesuai dengan anggaran yang tersedia.</p>
        </div>
      </div>

    </div>
  </div>

</section><!-- End Features Cards Section -->




   <!-- Search Section -->
<section id="pencarian" class="call-to-action section">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row content justify-content-center align-items-center position-relative">
      <div class="col-lg-8 mx-auto text-center">
        <h2 class="display-4 mb-4">Cari Kalori Makanan</h2>
        <p class="mb-4">Masukkan nama makanan yang ingin Anda cari untuk mengetahui kandungan kalori dalam makanan tersebut.</p>

        <!-- Search Form -->
        <form action="cekkaloriapi.php" method="get">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="food_name" placeholder="Contoh: Nasi Goreng" required>
            <button class="btn btn-cta" type="submit">Cari Kalori</button>
          </div>
        </form>
      </div>

      <!-- Abstract Background Elements -->
      <div class="shape shape-1">
        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
          <path d="M47.1,-57.1C59.9,-45.6,68.5,-28.9,71.4,-10.9C74.2,7.1,71.3,26.3,61.5,41.1C51.7,55.9,35,66.2,16.9,69.2C-1.3,72.2,-21,67.8,-36.9,57.9C-52.8,48,-64.9,32.6,-69.1,15.1C-73.3,-2.4,-69.5,-22,-59.4,-37.1C-49.3,-52.2,-32.8,-62.9,-15.7,-64.9C1.5,-67,34.3,-68.5,47.1,-57.1Z" transform="translate(100 100)"></path>
        </svg>
      </div>

      <div class="shape shape-2">
        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
          <path d="M41.3,-49.1C54.4,-39.3,66.6,-27.2,71.1,-12.1C75.6,3,72.4,20.9,63.3,34.4C54.2,47.9,39.2,56.9,23.2,62.3C7.1,67.7,-10,69.4,-24.8,64.1C-39.7,58.8,-52.3,46.5,-60.1,31.5C-67.9,16.4,-70.9,-1.4,-66.3,-16.6C-61.8,-31.8,-49.7,-44.3,-36.3,-54C-22.9,-63.7,-8.2,-70.6,3.6,-75.1C15.4,-79.6,28.2,-58.9,41.3,-49.1Z" transform="translate(100 100)"></path>
        </svg>
      </div>

      <div class="dots dots-1">
        <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
          <pattern id="dot-pattern" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
            <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
          </pattern>
          <rect width="100" height="100" fill="url(#dot-pattern)"></rect>
        </svg>
      </div>

      <div class="dots dots-2">
        <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
          <pattern id="dot-pattern-2" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
            <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
          </pattern>
          <rect width="100" height="100" fill="url(#dot-pattern-2)"></rect>
        </svg>
      </div>

      <div class="shape shape-3">
        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
          <path d="M43.3,-57.1C57.4,-46.5,71.1,-32.6,75.3,-16.2C79.5,0.2,74.2,19.1,65.1,35.3C56,51.5,43.1,65,27.4,71.7C11.7,78.4,-6.8,78.3,-23.9,72.4C-41,66.5,-56.7,54.8,-65.4,39.2C-74.1,23.6,-75.8,4,-71.7,-13.2C-67.6,-30.4,-57.7,-45.2,-44.3,-56.1C-30.9,-67,-15.5,-74,0.7,-74.9C16.8,-75.8,33.7,-70.7,43.3,-57.1Z" transform="translate(100 100)"></path>
        </svg>
      </div>
    </div>
  </div>
</section><!-- /Search Section -->


    <!-- Clients Section -->
    <section id="clients" class="clients section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 2,
                  "spaceBetween": 40
                },
                "480": {
                  "slidesPerView": 3,
                  "spaceBetween": 60
                },
                "640": {
                  "slidesPerView": 4,
                  "spaceBetween": 80
                },
                "992": {
                  "slidesPerView": 6,
                  "spaceBetween": 120
                }
              }
            }
          </script>
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><img src="assets/img/clients/client-1.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-2.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-3.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-4.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-5.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-6.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-7.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-8.png" class="img-fluid" alt=""></div>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Clients Section -->

    <!-- Testimonials Section -->
<section id="testimonials" class="testimonials section light-background">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Testimoni Pengguna</h2>
    <p>Berikut adalah beberapa pengalaman dari pengguna aplikasi Fitkal yang telah merasakan manfaatnya.</p>
  </div><!-- End Section Title -->

  <div class="container">

    <div class="row g-5">

      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
        <div class="testimonial-item">
          <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
          <h3>Defit Septian F</h3>
          <h4>Mahasiswa</h4>
          <div class="stars">
            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
          </div>
          <p>
            <i class="bi bi-quote quote-icon-left"></i>
            <span>Aplikasi Fitkal sangat membantu saya dalam merencanakan program diet dan olahraga yang sesuai dengan tujuan kesehatan saya. Yang lebih menguntungkan, aplikasi ini memberikan rekomendasi makanan sehat yang ramah di kantong saya sebagai mahasiswa. Ini sangat memudahkan saya dalam menjaga pola makan tanpa menguras uang saku.</span>
            <i class="bi bi-quote quote-icon-right"></i>
          </p>
        </div>
      </div><!-- End testimonial item -->

      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
        <div class="testimonial-item">
          <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
          <h3>Mamih</h3>
          <h4>Ibu Rumah Tangga</h4>
          <div class="stars">
            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
          </div>
          <p>
            <i class="bi bi-quote quote-icon-left"></i>
            <span>Fitkal memberikan rekomendasi diet yang sangat personal dan cocok dengan gaya hidup saya. Selain itu, rekomendasi makanan sehat yang diberikan sangat memperhatikan budget keluarga kami, sehingga saya bisa menjaga kesehatan dengan biaya yang terjangkau. Saya berhasil meningkatkan berat badan saya secara sehat dengan mengikuti panduan yang diberikan.</span>
            <i class="bi bi-quote quote-icon-right"></i>
          </p>
        </div>
      </div><!-- End testimonial item -->

      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
        <div class="testimonial-item">
          <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
          <h3>Kumara Daffa</h3>
          <h4>Freelancer</h4>
          <div class="stars">
            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
          </div>
          <p>
            <i class="bi bi-quote quote-icon-left"></i>
            <span>Saya merasa lebih sehat dan bertenaga setelah mengikuti panduan olahraga dan diet dari aplikasi Fitkal. Yang paling saya suka adalah, aplikasi ini memberikan rekomendasi makanan sehat yang sangat sesuai dengan kemampuan ekonomi saya sebagai freelancer. Saya tidak perlu khawatir dengan biaya yang tinggi untuk menjaga pola makan sehat.</span>
            <i class="bi bi-quote quote-icon-right"></i>
          </p>
        </div>
      </div><!-- End testimonial item -->

      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
        <div class="testimonial-item">
          <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
          <h3>Muhamad Rizky</h3>
          <h4>Freelancer</h4>
          <div class="stars">
            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
          </div>
          <p>
            <i class="bi bi-quote quote-icon-left"></i>
            <span>Setelah menggunakan Fitkal, saya berhasil menaikkan berat badan saya dengan cara yang sehat dan aman. Rekomendasi makanan sehat yang diberikan aplikasi ini sangat sesuai dengan budget saya sebagai freelancer, jadi saya bisa menjaga kesehatan tanpa khawatir soal biaya.</span>
            <i class="bi bi-quote quote-icon-right"></i>
          </p>
        </div>
      </div><!-- End testimonial item -->

    </div>

  </div>

</section><!-- /Testimonials Section -->


    <!-- Services Section -->
<section id="services" class="services section light-background">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Layanan</h2>
    <p>Aplikasi Fitkal memberikan berbagai layanan yang mendukung Anda dalam mencapai tujuan kesehatan dengan pendekatan yang sesuai dengan anggaran dan kebutuhan Anda.</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row g-4">

      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
        <div class="service-card d-flex">
          <div class="icon flex-shrink-0">
            <i class="bi bi-activity"></i>
          </div>
          <div>
            <h3>Perencanaan Makanan Sehat</h3>
            <p>Aplikasi Fitkal membantu Anda merencanakan makanan sehat yang sesuai dengan kebutuhan gizi tubuh Anda. Dengan panduan yang mudah diikuti, Anda bisa tetap menjaga pola makan sehat tanpa khawatir melampaui anggaran.</p>
            <!--<a href="service-details.html" class="read-more">Selengkapnya <i class="bi bi-arrow-right"></i></a> -->
          </div>
        </div>
      </div><!-- End Service Card -->

      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
        <div class="service-card d-flex">
          <div class="icon flex-shrink-0">
            <i class="bi bi-cash-coin"></i>
          </div>
          <div>
            <h3>Rekomendasi Makanan Sehat Sesuai Ekonomi</h3>
            <p>Fitkal memberikan rekomendasi makanan sehat yang dapat disesuaikan dengan anggaran Anda. Anda dapat menjaga pola makan yang bergizi tanpa harus mengeluarkan biaya yang tinggi.</p>
           <!-- <a href="service-details.html" class="read-more">Selengkapnya <i class="bi bi-arrow-right"></i></a>-->
          </div>
        </div>
      </div><!-- End Service Card -->

      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
        <div class="service-card d-flex">
          <div class="icon flex-shrink-0">
            <i class="bi bi-clipboard-data"></i>
          </div>
          <div>
            <h3>Monitor Pola Makan</h3>
            <p>Fitkal memungkinkan Anda untuk memonitor konsumsi makanan sehari-hari dan memastikan bahwa Anda tetap mengikuti pola makan yang sehat dan sesuai dengan anggaran Anda.</p>
            <!--<a href="service-details.html" class="read-more">Selengkapnya <i class="bi bi-arrow-right"></i></a>-->
          </div>
        </div>
      </div><!-- End Service Card -->

      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
        <div class="service-card d-flex">
          <div class="icon flex-shrink-0">
            <i class="bi bi-patch-check"></i>
          </div>
          <div>
            <h3>Tips Hemat & Sehat</h3>
            <p>Fitkal memberikan tips hemat dan sehat untuk memilih bahan makanan yang bergizi namun tetap terjangkau. Anda bisa menjaga pola makan yang baik tanpa membebani anggaran keluarga.</p>
           <!-- <a href="service-details.html" class="read-more">Selengkapnya <i class="bi bi-arrow-right"></i></a>-->
          </div>
        </div>
      </div><!-- End Service Card -->

    </div>

  </div>

</section><!-- /Services Section -->

<style>
  /* Artikel Section */
.articles-section {
    display: grid;
    grid-template-columns: repeat(3, 1fr); /* 3 kolom */
    gap: 10px; /* Jarak antar artikel */
    margin: 20px;
}

.article {
    background-color: #fff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    height: auto;
}

.article:hover {
    transform: translateY(-8px); /* Efek hover lebih halus */
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
}

.article img {
    width: 100%;
    height: 200px; /* Meningkatkan tinggi gambar */
    object-fit: cover;
}

.article-content {
    padding: 15px; /* Menambahkan padding sedikit lebih banyak */
}

.article h3 {
    font-size: 16px; /* Ukuran judul tetap proporsional */
    margin-top: 12px;
    color: #333;
    line-height: 1.4;
}

.article p {
    font-size: 14px; /* Ukuran teks deskripsi sedikit lebih besar */
    color: #666;
    margin-bottom: 10px; /* Memberi jarak sedikit lebih besar */
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

/* Style untuk Tombol Lihat Semua Artikel */
.view-all-button {
    text-align: center;
    margin-top: 20px;
}

.view-all-button .btn {
    background-color: #007bff;
    color: white;
    padding: 12px 30px;
    font-size: 16px;
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.view-all-button .btn:hover {
    background-color: #0056b3;
}


</style>
<!-- Section Artikel -->
<div class="container section-title" data-aos="fade-up">
  <h2>Artikel Kesehatan</h2>
  <p>Temukan berbagai tips kesehatan yang bermanfaat bagi hidup sehat Anda</p>
</div>

<section class="articles-section">
  <!-- Artikel 1 -->
<div class="article" data-aos="fade-up" data-aos-delay="100">
  <a href="https://www.mitrakeluarga.com/artikel/tips-diet-sehat" target="_blank">
      <img src="https://www.mitrakeluarga.com/_next/image?url=https%3A%2F%2Fd3uhejzrzvtlac.cloudfront.net%2Fcompro%2FarticleDesktop%2F649e648a-9c3b-4b8f-b59e-c4acf31af4eb.jpeg&w=1920&q=100" alt="Tips Diet Sehat">
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
          <img src="https://res.cloudinary.com/dk0z4ums3/image/upload/v1621835634/attached_image/tips-diet-sehat-melalui-makanan-dan-olahraga-0-alodokter.jpg" alt="Diet untuk Menurunkan Berat Badan">
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
          <img src="https://rs.ui.ac.id/umum/files/artikel-populer/20210525101432-1.jpg" alt="Tips Diet untuk Menurunkan Berat Badan">
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
          <img src="https://krakataumedika.com/images/2020/02/05/diet-aman.jpg  " alt="Diet yang Aman Turunkan Berat Badan">
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
          <img src="https://res.cloudinary.com/dk0z4ums3/image/upload/v1633998083/attached_image/jangan-lupakan-3-nutrisi-ini-ketika-diet-0-alodokter.jpg" alt="Diet dan Nutrisi">
          <div class="article-content">
              <h3>Diet dan Nutrisi: Panduan Sehat untuk Berat Badan Ideal</h3>
              <p>Temukan tips diet yang sesuai untuk menurunkan berat badan tanpa membahayakan tubuh...</p>
              <span class="category">Diet dan Nutrisi</span>
          </div>
      </a>
  </div>
</section>

<!-- Tombol Lihat Semua Artikel -->
<div class="view-all-button">
  <a href="link-ke-halaman-artikel" class="btn">Lihat Semua Artikel</a>
</div>


   <!-- Contact Section -->
<section id="contact" class="contact section light-background">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Kontak</h2>
    <p>Hubungi kami untuk informasi lebih lanjut atau pertanyaan lainnya.</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row g-4 g-lg-5">
      <div class="col-lg-5">
        <div class="info-box" data-aos="fade-up" data-aos-delay="200">
          <h3>Informasi Kontak</h3>
          <p>Jika Anda memiliki pertanyaan atau membutuhkan informasi lebih lanjut, jangan ragu untuk menghubungi kami.</p>

          <div class="info-item" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box">
              <i class="bi bi-geo-alt"></i>
            </div>
            <div class="content">
              <h4>Lokasi Kami</h4>
              <p>Universitas Pertamina</p>
              <p>Jl. Letjen. Soeprapto No. 9, Jakarta</p>
            </div>
          </div>

          <div class="info-item" data-aos="fade-up" data-aos-delay="400">
            <div class="icon-box">
              <i class="bi bi-telephone"></i>
            </div>
            <div class="content">
              <h4>Nomor Telepon</h4>
              <p>+62 111 2222 345</p>
            </div>
          </div>

          <div class="info-item" data-aos="fade-up" data-aos-delay="500">
            <div class="icon-box">
              <i class="bi bi-envelope"></i>
            </div>
            <div class="content">
              <h4>Alamat Email</h4>
              <p>info@fitkal.com</p>
              <p>contact@fitkal.com</p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-7">
        <div class="contact-form" data-aos="fade-up" data-aos-delay="300">
          <h3>Hubungi Kami</h3>
          <p>Isi formulir di bawah ini untuk mengirim pesan atau pertanyaan kepada kami. Kami akan segera merespons.</p>

          <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
            <div class="row gy-4">

              <div class="col-md-6">
                <input type="text" name="name" class="form-control" placeholder="Nama Anda" required="">
              </div>

              <div class="col-md-6">
                <input type="email" class="form-control" name="email" placeholder="Email Anda" required="">
              </div>

              <div class="col-12">
                <input type="text" class="form-control" name="subject" placeholder="Subjek" required="">
              </div>

              <div class="col-12">
                <textarea class="form-control" name="message" rows="6" placeholder="Pesan" required=""></textarea>
              </div>

              <div class="col-12 text-center">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Pesan Anda telah terkirim. Terima kasih!</div>

                <button type="submit" class="btn">Kirim Pesan</button>
              </div>

            </div>
          </form>

        </div>
      </div>

    </div>

  </div>

</section><!-- /Contact Section -->


</main>

<footer id="footer" class="footer">

  <div class="container footer-top">
    <div class="row gy-4">
      <div class="col-lg-4 col-md-6 footer-about">
        <a href="index.html" class="logo d-flex align-items-center">
          <span class="sitename">Fitkal</span>
        </a>
        <div class="footer-contact pt-3">
          <p>Universitas Pertamina</p>
          <p>Jl. Simprug, Jakarta Selatan</p>
          <p class="mt-3"><strong>Telepon:</strong> <span>+62 111 2222 345</span></p>
          <p><strong>Email:</strong> <span>info@fitkal.com</span></p>
        </div>
        <div class="social-links d-flex mt-4">
          <a href=""><i class="bi bi-twitter-x"></i></a>
          <a href=""><i class="bi bi-facebook"></i></a>
          <a href=""><i class="bi bi-instagram"></i></a>
          <a href=""><i class="bi bi-linkedin"></i></a>
        </div>
      </div>

      <div class="col-lg-2 col-md-3 footer-links">
        <h4>Tautan Berguna</h4>
        <ul>
          <li><a href="#">Beranda</a></li>
          <li><a href="#">Tentang Kami</a></li>
          <li><a href="#">Layanan Kami</a></li>
          <li><a href="#">Syarat & Ketentuan</a></li>
          <li><a href="#">Kebijakan Privasi</a></li>
        </ul>
      </div>

      <div class="col-lg-2 col-md-3 footer-links">
        <h4>Layanan Kami</h4>
        <ul>
          <li><a href="#">Desain Web</a></li>
          <li><a href="#">Pengembangan Web</a></li>
          <li><a href="#">Manajemen Produk</a></li>
          <li><a href="#">Pemasaran</a></li>
          <li><a href="#">Desain Grafis</a></li>
        </ul>
      </div>

      <div class="col-lg-2 col-md-3 footer-links">
        <h4>Solusi Kami</h4>
        <ul>
          <li><a href="#">Layanan Kesehatan</a></li>
          <li><a href="#">Konsultasi Gizi</a></li>
          <li><a href="#">Pemantauan Kondisi Tubuh</a></li>
          <li><a href="#">Rekomendasi Pola Hidup Sehat</a></li>
          <li><a href="#">Program Kebugaran</a></li>
        </ul>
      </div>
      
      <div class="col-lg-2 col-md-3 footer-links">
        <h4>Hubungi Kami</h4>
        <ul>
          <li><a href="mailto:info@fitkal.com">Email: info@fitkal.com</a></li>
          <li><a href="mailto:contact@fitkal.com">Email: contact@fitkal.com</a></li>
          <li><a href="tel:+621112223453">Telepon: +62 111 2222 345</a></li>
          <li><a href="https://wa.me/+621112223453" target="_blank">Whatsapp: +62 111 2222 345</a></li>
          <li><a href="#">Formulir Kontak</a></li>
        </ul>
      </div>
      

    </div>
  </div>

</footer>


    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Tim Fitkal</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        <!--Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>