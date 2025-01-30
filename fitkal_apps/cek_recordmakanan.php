<?php
require_once "database/db.php"; // Panggil koneksi database

session_start();

if (!isset($_SESSION['user_id'])) {
    // Jika pengguna tidak login, arahkan ke halaman login
    header("Location: login.php");
    exit;
}

$errors = [];
$filter_date = "";

// Periksa apakah ada filter tanggal
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['filter_tanggal'])) {
    $filter_date = $_POST['tanggal'];
}

// Ambil data record makanan untuk pengguna yang login dan sesuai tanggal yang dipilih
$db = new Database();
$conn = $db->conn;

// Query untuk mengambil data makanan berdasarkan tanggal tertentu
$query = "SELECT rm.*, m.nama, m.kalori, m.protein, m.lemak, m.karbo, m.gambar
          FROM record_makanan rm 
          JOIN makanan m ON rm.makanan_id = m.id 
          WHERE rm.user_id = :user_id";

// Menambahkan kondisi filter jika tanggal dipilih
if ($filter_date) {
    $query .= " AND rm.tanggal = :tanggal";
}

$query .= " ORDER BY rm.tanggal DESC";

$stmt = $conn->prepare($query);
$stmt->bindParam(":user_id", $_SESSION['user_id']);
if ($filter_date) {
    $stmt->bindParam(":tanggal", $filter_date);
}
$stmt->execute();

$records = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Menampilkan pesan jika tidak ada record makanan
if (empty($records)) {
    $errors[] = "Belum ada makanan yang disimpan.";
}

// Menghitung total kalori per tanggal
$total_kalori_per_tanggal = [];
foreach ($records as $record) {
    $total_kalori_per_tanggal[$record['tanggal']][] = $record['kalori'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Record Makanan - Fitkal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Favicons -->
    <link href="assets/img/logofitkal.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
    <style>
        .record-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }

        .record-item {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease-in-out;
        }

        .record-item:hover {
            transform: scale(1.05);
        }

        .record-item img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .record-item h5 {
            margin-top: 10px;
            font-size: 1.1rem;
        }

        .record-item p {
            font-size: 0.9rem;
        }

        .alert {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h2>Cek Record Makanan</h2>

        <!-- Form untuk filter berdasarkan tanggal -->
        <form action="cek_recordmakanan.php" method="POST" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <input type="date" name="tanggal" class="form-control" value="<?php echo htmlspecialchars($filter_date); ?>">
                </div>
                <div class="col-md-2">
                    <button type="submit" name="filter_tanggal" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>

        <?php if ($errors): ?>
            <div class="alert alert-danger">
                <?php echo implode('<br>', $errors); ?>
            </div>
        <?php endif; ?>

        <h3>Record Makanan yang Disimpan:</h3>

        <?php if ($records): ?>
            <div class="record-container">
                <?php 
                $current_date = '';
                foreach ($records as $record): 
                    // Kelompokkan makanan berdasarkan tanggal
                    if ($current_date !== $record['tanggal']) {
                        // Tampilkan total kalori untuk tanggal sebelumnya jika ada
                        if ($current_date !== '') {
                            echo "<div class='col-12 mb-3'><strong>Total Kalori pada {$current_date}: " . array_sum($total_kalori_per_tanggal[$current_date]) . " Kcal</strong></div>";
                        }
                        // Set tanggal yang baru
                        $current_date = $record['tanggal'];
                    }
                    // Menampilkan gambar jika ada
                    $image_path = 'uploads/' . ($record['gambar'] ?: 'default-image.jpg');
                ?>
                    <div class="record-item">
                        <img src="<?php echo $image_path; ?>" alt="<?php echo htmlspecialchars($record['nama']); ?>">
                        <h5><?php echo htmlspecialchars($record['nama']); ?></h5>
                        <p>Tanggal: <?php echo htmlspecialchars($record['tanggal']); ?></p>
                        <p>Kalori: <?php echo $record['kalori']; ?> Kcal</p>
                        <p>Protein: <?php echo $record['protein']; ?>g</p>
                        <p>Lemak: <?php echo $record['lemak']; ?>g</p>
                        <p>Karbohidrat: <?php echo $record['karbo']; ?>g</p>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Menampilkan total kalori untuk tanggal terakhir -->
            <div class="col-12 mb-3">
                <strong>Total Kalori pada <?php echo $current_date; ?>: <?php echo array_sum($total_kalori_per_tanggal[$current_date]); ?> Kcal</strong>
            </div>
        <?php endif; ?>

        <br>
        <a href="dashboard.php" class="btn btn-secondary">Kembali ke Dashboard</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
