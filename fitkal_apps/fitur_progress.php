<?php
session_start();
require_once "database/db.php"; // Panggil koneksi database

$errors = [];
$success = false;

// Memastikan user_id ada dalam session sebelum lanjut
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id']; // Mendapatkan user_id dari session

// Jika form disubmit untuk memasukkan berat badan, tanggal, dan catatan
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_progress'])) {
    $berat_badan = $_POST['berat_badan'];
    $tanggal = $_POST['tanggal']; // Ambil tanggal dari form input
    $noted_progress = $_POST['noted_progress']; // Ambil catatan motivasi

    // Validasi input
    if (empty($berat_badan) || empty($tanggal)) {
        $errors[] = "Berat badan dan tanggal harus diisi!";
    }

    if (count($errors) == 0) {
        // Simpan data progress ke database
        $db = new Database();
        $conn = $db->conn;
        $stmt = $conn->prepare("INSERT INTO progress (user_id, berat_badan, tanggal, noted_progress) 
                                VALUES (:user_id, :berat_badan, :tanggal, :noted_progress)");
        $stmt->bindParam(":user_id", $user_id);  // Menggunakan user_id dari session
        $stmt->bindParam(":berat_badan", $berat_badan);
        $stmt->bindParam(":tanggal", $tanggal); // Menyimpan tanggal yang dipilih
        $stmt->bindParam(":noted_progress", $noted_progress); // Menyimpan catatan motivasi
        $stmt->execute();

        $success = true;
    }
}

// Ambil data progress untuk grafik
$db = new Database();
$conn = $db->conn;
$stmt = $conn->prepare("SELECT * FROM progress WHERE user_id = :user_id ORDER BY tanggal DESC");
$stmt->bindParam(":user_id", $user_id);
$stmt->execute();
$progress = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Jika data progress kosong, tampilkan pesan
if (empty($progress)) {
    $errors[] = "Tidak ada data progress untuk ditampilkan.";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Progress - Fitkal</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js">
        
    </script>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .form-container {
            margin-top: 30px;
        }
        .form-container label {
            font-weight: bold;
        }
        .form-container textarea {
            width: 100%;
            height: 100px;
            margin-top: 5px;
        }
        .success-message {
            color: green;
            font-weight: bold;
        }
        .error-message {
            color: red;
            font-weight: bold;
        }
        .chart-container {
            max-width: 600px;
            margin: 0 auto;
        }
        .btn-primary {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center my-4">Cek Progress Berat Badan dan Kalori</h2>

        <!-- Tampilkan pesan sukses jika berhasil menyimpan data -->
        <?php if ($success): ?>
            <div class="toast align-items-center text-white bg-success border-0 position-fixed bottom-0 end-0 m-3" style="z-index: 1050;" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        <img src="https://media.giphy.com/media/JtV5jId1zE2kXFxXtD/giphy.gif" alt="Success" style="width: 50px; height: 50px; margin-right: 10px;">
                        Wah Kamu Hebat! Ayo lakukan progress harianmu!
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
            <script>
                var toast = new bootstrap.Toast(document.querySelector('.toast'));
                toast.show();
            </script>
        <?php endif; ?>

        <!-- Tampilkan pesan error jika ada -->
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger"><?php echo implode('<br>', $errors); ?></div>
        <?php endif; ?>

        <!-- Form untuk memasukkan data progress -->
        <div class="form-container">
            <form action="fitur_progress.php" method="POST">
                <div class="mb-3">
                    <label for="berat_badan" class="form-label">Berat Badan (kg):</label>
                    <input type="number" step="0.1" name="berat_badan" id="berat_badan" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal:</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="noted_progress" class="form-label">Noted Progress (Catatan Motivasi):</label>
                    <textarea name="noted_progress" id="noted_progress" class="form-control" placeholder="Tulis catatan motivasi atau semangat untuk diri sendiri!"></textarea>
                </div>
                <button type="submit" name="submit_progress" class="btn btn-primary">Cek Progres</button>
            </form>
        </div>

        <h3 class="my-4">Grafik Progres Berat Badan</h3>

        <?php if (!empty($progress)): ?>
            <div class="chart-container">
                <canvas id="progressChart" width="400" height="200"></canvas>
            </div>

            <script>
                const progressData = <?php echo json_encode($progress); ?>;
                
                // Data untuk grafik
                const labels = progressData.map(item => item.tanggal);
                const beratBadanData = progressData.map(item => item.berat_badan);

                // Membuat grafik
                const ctx = document.getElementById('progressChart').getContext('2d');
                const progressChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Berat Badan (kg)',
                            data: beratBadanData,
                            borderColor: 'rgba(75, 192, 192, 1)',
                            fill: false,
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            x: {
                                title: {
                                    display: true,
                                    text: 'Tanggal'
                                }
                            },
                            y: {
                                title: {
                                    display: true,
                                    text: 'Berat Badan (kg)'
                                }
                            }
                        }
                    }
                });
            </script>
        <?php else: ?>
            <p>Data progress tidak tersedia untuk ditampilkan.</p>
        <?php endif; ?>

        <h3 class="my-4">Catatan Motivasi:</h3>
        <ul>
            <?php foreach ($progress as $record): ?>
                <li>
                    <strong><?php echo htmlspecialchars($record['tanggal']); ?>:</strong>
                    <p><?php echo htmlspecialchars($record['noted_progress']); ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
<?php

require_once "sisipkan/footer.php";
?>
</html>
