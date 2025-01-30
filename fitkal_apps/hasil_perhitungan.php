<?php
session_start();
require_once "database/db.php"; // Panggil koneksi database

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION["user_id"];
$db = new Database();
$conn = $db->conn;

// Mengambil data hasil perhitungan berdasarkan user_id
$stmt = $conn->prepare("SELECT * FROM calorie_calculations WHERE user_id = :user_id ORDER BY calculation_date DESC LIMIT 1");
$stmt->bindParam(":user_id", $user_id);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$result) {
    echo "Tidak ada data perhitungan ditemukan.";
    exit;
}

// Menampilkan hasil perhitungan
$calorie_result = $result['tdee'];
$time_to_goal = $result['time_to_goal'];
$bmi = $result['bmi'];
$bmi_category = $result['bmi_category'];

// Menghitung progress berdasarkan waktu menuju target
$progress_percentage = min(100, ($time_to_goal * 10)); // Anggap 10 bulan adalah 100% progres
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Perhitungan - Fitkal</title>
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
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .result-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }
        .result-container h3 {
            color: #343a40;
        }
        .gif-container {
            text-align: center;
            margin-top: 20px;
        }
        .gif-container img {
            width: 200px;
        }
        .back-links {
            margin-top: 20px;
        }
        .back-links a {
            margin-right: 10px;
            text-decoration: none;
            color: #007bff;
        }
        .progress-container {
            margin-top: 30px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2 class="text-center mt-5">Hasil Perhitungan Kalori Harian dan BMI</h2>

        <div class="result-container">
            <h3>Kalori Harian yang Dibutuhkan: <?php echo $calorie_result; ?> kalori</h3>
            <h3>Perkiraan Waktu untuk Mencapai Target Berat Badan: <?php echo $time_to_goal; ?> bulan</h3>
            <h3>BMI: <?php echo number_format($bmi, 2); ?></h3>
            <h3>Kategori BMI: <?php echo $bmi_category; ?></h3>
        </div>

        <!-- Progress Bar -->
        <div class="progress-container">
            <h4>Progress Menuju Target:</h4>
            <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo $progress_percentage; ?>%;" aria-valuenow="<?php echo $progress_percentage; ?>" aria-valuemin="0" aria-valuemax="100">
                    <?php echo $progress_percentage; ?>%
                </div>
            </div>
        </div>

        <div class="gif-container">
            <img src="https://media.giphy.com/media/26gJzYsbA0T4bl3YO/giphy.gif" alt="Motivasi GIF">
        </div>

        <div class="back-links text-center">
            <a href="fitur_bmi.php" class="btn btn-primary">Kembali ke Halaman Perhitungan BMI</a>
            <a href="fitur_kalori.php" class="btn btn-secondary">Kembali ke Halaman Perhitungan Kalori</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
<?php

require_once "sisipkan/footer.php";
?>
</html>
