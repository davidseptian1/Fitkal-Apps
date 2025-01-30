<?php
session_start();
require_once "database/db.php"; // Panggil koneksi database

$errors = [];
$success = false;
$bmi = 0;
$kategori_bmi = "";

// Memastikan user_id ada dalam session sebelum lanjut
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id']; // Mendapatkan user_id dari session

// Jika form disubmit untuk memasukkan berat badan dan tinggi badan
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_bmi'])) {
    $berat_badan = $_POST['berat_badan'];
    $tinggi_badan = $_POST['tinggi_badan'];

    // Validasi input
    if (empty($berat_badan) || empty($tinggi_badan)) {
        $errors[] = "Berat badan dan tinggi badan harus diisi!";
    }

    if (count($errors) == 0) {
        // Hitung BMI
        $tinggi_badan_m = $tinggi_badan / 100;  // Ubah tinggi badan ke meter
        $bmi = $berat_badan / ($tinggi_badan_m * $tinggi_badan_m);

        // Menentukan kategori BMI
        if ($bmi < 18.5) {
            $kategori_bmi = "Kurang Berat Badan";
        } elseif ($bmi >= 18.5 && $bmi <= 24.9) {
            $kategori_bmi = "Normal";
        } elseif ($bmi >= 25 && $bmi <= 29.9) {
            $kategori_bmi = "Kelebihan Berat Badan";
        } else {
            $kategori_bmi = "Obesitas";
        }

        // Simpan data BMI ke database
        $db = new Database();
        $conn = $db->conn;
        $stmt = $conn->prepare("INSERT INTO bmi (user_id, berat_badan, tinggi_badan, bmi, kategori_bmi, tanggal) 
                        VALUES (:user_id, :berat_badan, :tinggi_badan, :bmi, :kategori_bmi, :tanggal)");

        $stmt->bindParam(":user_id", $user_id);
        $stmt->bindParam(":berat_badan", $berat_badan);
        $stmt->bindParam(":tinggi_badan", $tinggi_badan);
        $stmt->bindParam(":bmi", $bmi);
        $stmt->bindParam(":kategori_bmi", $kategori_bmi);
        $stmt->bindParam(":tanggal", date('Y-m-d'));
        $stmt->execute();

        $success = true;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek BMI - Fitkal</title>
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
    <link href="assets/img/logofitkal.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
            margin-top: 50px;
        }
        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-container label {
            font-weight: bold;
        }
        .success-message, .error-message {
            font-weight: bold;
            text-align: center;
        }
        .success-message {
            color: green;
        }
        .error-message {
            color: red;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
        .result-card {
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="form-container">
            <h3 class="text-center mb-4">Cek BMI (Indeks Massa Tubuh)</h3>

            <?php if ($success): ?>
                <div class="alert alert-success text-center" role="alert">
                    BMI berhasil dihitung dan disimpan!
                </div>
            <?php endif; ?>

            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger text-center" role="alert">
                    <?php 
                    // Menampilkan pesan error
                    echo implode('<br>', $errors); 
                    ?>
                </div>
            <?php endif; ?>

            <form action="fitur_bmi.php" method="POST">
                <div class="mb-3">
                    <label for="berat_badan" class="form-label">Berat Badan (kg):</label>
                    <input type="number" step="0.1" name="berat_badan" id="berat_badan" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="tinggi_badan" class="form-label">Tinggi Badan (cm):</label>
                    <input type="number" name="tinggi_badan" id="tinggi_badan" class="form-control" required>
                </div>
                <button type="submit" name="submit_bmi" class="btn btn-custom w-100">Hitung BMI</button>
            </form>

            <?php if ($bmi > 0): ?>
                <div class="result-card card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Hasil BMI</h5>
                        <p class="card-text">BMI Anda: <strong><?php echo number_format($bmi, 2); ?></strong></p>
                        <p class="card-text">Kategori: <strong><?php echo $kategori_bmi; ?></strong></p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
<?php

require_once "sisipkan/footer.php";
?>
</html>
