<?php
require_once "database/db.php"; // Panggil koneksi database

session_start();

// Inisialisasi keranjang dan total kalori jika belum ada
if (!isset($_SESSION['keranjang'])) {
    $_SESSION['keranjang'] = [];
    $_SESSION['total_kalori'] = 0;
}

$errors = [];
$kategori = $status_ekonomi = '';  // Inisialisasi kategori dan status_ekonomi jika belum ada

// Ambil nilai TDEE dari database untuk user saat ini
$db = new Database();
$conn = $db->conn;
$stmt = $conn->prepare("SELECT tdee FROM calorie_calculations WHERE user_id = :user_id");
$stmt->bindParam(":user_id", $_SESSION['user_id']);
$stmt->execute();
$tdee = $stmt->fetch(PDO::FETCH_ASSOC)['tdee'];  // Ambil nilai tdee

if (!$tdee) {
    $errors[] = "Gagal mengambil data TDEE dari database.";
}

// Jika form disubmit untuk memilih makanan
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pilih'])) {
    if (isset($_POST['makanan_id'])) {
        $makanan_id = $_POST['makanan_id'];
        // Cek jika 'kategori' dan 'status_ekonomi' ada di POST
        $kategori = isset($_POST['kategori']) ? $_POST['kategori'] : '';
        $status_ekonomi = isset($_POST['status_ekonomi']) ? $_POST['status_ekonomi'] : '';

        // Ambil data makanan dari database
        $stmt = $conn->prepare("SELECT * FROM makanan WHERE id = :id");
        $stmt->bindParam(":id", $makanan_id);
        $stmt->execute();
        $makanan = $stmt->fetch(PDO::FETCH_ASSOC); // Ambil satu baris data

        // Menambahkan makanan ke keranjang jika ditemukan
        if ($makanan) {
            // Cek jika kalori melebihi batas (tdee user)
            if ($_SESSION['total_kalori'] + $makanan['kalori'] <= $tdee) {
                $_SESSION['keranjang'][] = $makanan;
                $_SESSION['total_kalori'] += $makanan['kalori'];
            } else {
                $errors[] = "Kalori sudah melebihi batas harian kamu (TDEE: $tdee Kcal)!";
            }
        } else {
            $errors[] = "Makanan tidak ditemukan.";
        }
    } else {
        $errors[] = "Makanan ID tidak ditemukan.";
    }
}

// Simpan makanan ke dalam record_makanan ketika tombol "Simpan Makanan Hari Ini" diklik
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['simpan'])) {
    if (isset($_POST['selected_items']) && !empty($_POST['selected_items'])) {
        $selected_items = $_POST['selected_items'];  // Mengambil item yang dicentang untuk disimpan

        // Cek apakah ada makanan yang dipilih
        foreach ($selected_items as $makanan_id) {
            // Simpan record makanan dengan tanggal sekarang
            $stmt = $conn->prepare("INSERT INTO record_makanan (user_id, makanan_id, tanggal) VALUES (:user_id, :makanan_id, :tanggal)");
            $stmt->bindParam(":user_id", $_SESSION['user_id']);
            $stmt->bindParam(":makanan_id", $makanan_id);
            $stmt->bindParam(":tanggal", date('Y-m-d'));
            $stmt->execute();
        }

        // Redirect ke halaman cek record makanan setelah berhasil disimpan
        header("Location: cek_recordmakanan.php"); // Ganti dengan halaman cek record makanan
        exit;
    } else {
        $errors[] = "Tidak ada makanan yang dipilih untuk disimpan.";
    }
}

// Hapus makanan dari keranjang
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['hapus'])) {
    if (isset($_POST['makanan_id'])) {
        $makanan_id = $_POST['makanan_id'];
        
        // Hapus makanan dari keranjang
        foreach ($_SESSION['keranjang'] as $index => $item) {
            if ($item['id'] == $makanan_id) {
                $_SESSION['total_kalori'] -= $item['kalori'];
                unset($_SESSION['keranjang'][$index]);
                break;
            }
        }
        // Reindex array setelah dihapus
        $_SESSION['keranjang'] = array_values($_SESSION['keranjang']);
    }
}

// Hapus semua makanan dari keranjang
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['hapus_semua'])) {
    $_SESSION['keranjang'] = [];
    $_SESSION['total_kalori'] = 0;
}

// Menampilkan kategori dan status_ekonomi jika belum dipilih
if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST['pilih']) && !isset($_POST['simpan'])) {
    // Cek apakah 'kategori' dan 'status_ekonomi' ada di POST
    if (isset($_POST['kategori']) && isset($_POST['status_ekonomi'])) {
        $kategori = $_POST['kategori'];
        $status_ekonomi = $_POST['status_ekonomi'];

        $db = new Database();
        $conn = $db->conn;

        // Query untuk mengambil makanan berdasarkan kategori dan status ekonomi
        $stmt = $conn->prepare("SELECT * FROM makanan WHERE kategori = :kategori AND status_ekonomi = :status_ekonomi");
        $stmt->bindParam(":kategori", $kategori);
        $stmt->bindParam(":status_ekonomi", $status_ekonomi);
        $stmt->execute();

        $makanan = $stmt->fetchAll(PDO::FETCH_ASSOC); // Ambil semua data dalam bentuk array
    } else {
        // Jika kategori atau status_ekonomi belum dipilih, tampilkan pesan atau tangani dengan cara lain
        $errors[] = "Pilih kategori dan status ekonomi terlebih dahulu.";
    }
}// Proses pemilihan makanan
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['carikan_otomatis'])) {
    $makanan_terpilih = [];
    $total_kalori_terpilih = 0;

    // Ambil semua makanan dari database
    $stmt = $conn->prepare("SELECT * FROM makanan");
    $stmt->execute();
    $makanan_all = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Cek jika ada makanan dalam database
    if ($makanan_all) {
        // Proses untuk memilih makanan secara acak
        shuffle($makanan_all); // Mengacak array makanan

        foreach ($makanan_all as $makanan) {
            // Cek jika kalori makanan tidak melebihi TDEE user
            if ($total_kalori_terpilih + $makanan['kalori'] <= $tdee) {
                $makanan_terpilih[] = $makanan;
                $total_kalori_terpilih += $makanan['kalori'];
            }

            // Jika kalori sudah mendekati TDEE, berhenti memilih makanan
            if ($total_kalori_terpilih >= $tdee) {
                break;
            }
        }

        // Cek apakah ada makanan yang berhasil dipilih
        if (count($makanan_terpilih) > 0) {
            $_SESSION['keranjang'] = $makanan_terpilih;
            $_SESSION['total_kalori'] = $total_kalori_terpilih;
        } else {
            $errors[] = "Tidak ada makanan yang dapat dipilih tanpa melebihi TDEE.";
        }
    } else {
        $errors[] = "Tidak ada data makanan dalam database.";
    }
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekomendasi Makanan - Fitkal</title>
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
        /* Gaya umum untuk kontainer makanan */
.makanan-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: space-around; /* Rata tengah atau rata kiri, tergantung kebutuhan */
    padding: 20px;
}

/* Gaya untuk setiap item makanan */
.makanan-item {
    background-color: #f8f9fa;
    border: 1px solid #ddd;
    border-radius: 10px;
    width: calc(33.33% - 20px); /* Membagi ruang 3 kolom, sesuaikan jika perlu */
    box-sizing: border-box;
    padding: 20px;
    text-align: center;
    transition: transform 0.3s ease;
}

/* Menambahkan efek hover pada item makanan */
.makanan-item:hover {
    transform: scale(1.05);
}

/* Responsif: Mengubah tampilan menjadi 2 kolom pada ukuran layar lebih kecil */
@media (max-width: 768px) {
    .makanan-item {
        width: calc(50% - 20px); /* 2 kolom pada layar kecil */
    }
}

/* Responsif: Mengubah tampilan menjadi 1 kolom pada ukuran layar lebih kecil */
@media (max-width: 480px) {
    .makanan-item {
        width: 100%; /* 1 kolom pada layar lebih kecil */
    }
}

        
    </style>
</head>
<body>
    
    <div class="container mt-4">
        <h2>Rekomendasi Makanan Sehat</h2>
        
        <form action="fitur_makanan.php" method="POST" class="mb-4">
            <div class="mb-3">
                <label for="kategori" class="form-label">Pilih Kategori Makanan:</label>
                <select name="kategori" id="kategori" class="form-select" required>
                    <option value="sayur">Sayur</option>
                    <option value="makanan_ringan">Makanan Ringan</option>
                    <option value="makanan_berat">Makanan Berat</option>
                    <option value="jus_buah">Jus Buah</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="status_ekonomi" class="form-label">Pilih Status Ekonomi:</label>
                <select name="status_ekonomi" id="status_ekonomi" class="form-select" required>
                    <option value="hemat">Mode Hemat</option>
                    <option value="gajian">Mode Gajian</option>
                    <option value="sultan">Mode Sultan</option>
                    <option value="anak_kuliahan">Mode Anak Kuliahan</option>
                    <option value="anak_sekolahan">Mode Anak Sekolah</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Dapatkan Rekomendasi</button>
                    <button type="submit" class="btn btn-secondary" name="carikan_otomatis">Carikan Otomatis</button>

        </form>
        <h3>Keranjang (Total Kalori: <?php echo $_SESSION['total_kalori']; ?> Kcal)</h3>
        <?php if ($errors): ?>
            <div class="alert alert-danger">
                <?php echo implode('<br>', $errors); ?>
            </div>
        <?php endif; ?>

        <!-- Tombol Hapus Semua Keranjang -->
        <form action="fitur_makanan.php" method="POST" class="mb-4">
            <button type="submit" name="hapus_semua" class="btn btn-warning">Hapus Semua Makanan di Keranjang</button>
        </form>
        
        <!-- Menampilkan makanan otomatis yang dipilih -->
<div class="makanan-container">
    <?php if (isset($_SESSION['keranjang']) && count($_SESSION['keranjang']) > 0): ?>
        <?php foreach ($_SESSION['keranjang'] as $item): ?>
            <div class="makanan-item">
                <img src="uploads/<?php echo htmlspecialchars($item['gambar']); ?>" alt="<?php echo htmlspecialchars($item['nama']); ?>" class="img-fluid">
                <h5><?php echo htmlspecialchars($item['nama']); ?></h5>
                <p>Kalori: <?php echo $item['kalori']; ?> Kcal</p>
                <p>Protein: <?php echo $item['protein']; ?>g</p>
                <p>Lemak: <?php echo $item['lemak']; ?>g</p>
                <p>Karbohidrat: <?php echo $item['karbo']; ?>g</p>
                <form action="fitur_makanan.php" method="POST">
                    <input type="hidden" name="makanan_id" value="<?php echo $item['id']; ?>">
                    <button type="submit" name="pilih" class="btn btn-primary btn-sm">Pilih</button>
                </form>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Belum ada makanan yang dipilih secara otomatis.</p>
    <?php endif; ?>
</div> <!-- Menutup div makanan-container -->


        

        <!-- Simpan Makanan yang Ingin Disimpan -->
<form action="fitur_makanan.php" method="POST" class="mb-4">
    <label>Pilih Makanan yang Ingin Disimpan:</label><br>

    <!-- Checkbox untuk memilih semua makanan -->
    <div class="form-check">
        <input type="checkbox" id="checkAll" class="form-check-input">
        <label class="form-check-label">
            <strong>Centang Semua</strong>
        </label>
    </div>

    <?php foreach ($_SESSION['keranjang'] as $item): ?>
        <div class="form-check">
            <input type="checkbox" name="selected_items[]" value="<?php echo $item['id']; ?>" class="form-check-input food-checkbox">
            <label class="form-check-label">
                <strong><?php echo $item['nama']; ?></strong> (Kalori: <?php echo $item['kalori']; ?>)
            </label>
        </div>
    <?php endforeach; ?>
    
    <br>
    <button type="submit" name="simpan" class="btn btn-success">Simpan Makanan Hari Ini</button>
</form>
<script>
    document.getElementById('checkAll').addEventListener('click', function() {
        const checkboxes = document.querySelectorAll('.food-checkbox');
        checkboxes.forEach(function(checkbox) {
            checkbox.checked = document.getElementById('checkAll').checked;
        });
    });
</script>


        <?php if (isset($makanan) && !empty($makanan)): ?>
    <h3>Rekomendasi Makanan untuk Kategori "<?php echo htmlspecialchars($kategori); ?>" dengan Status Ekonomi "<?php echo htmlspecialchars($status_ekonomi); ?>"</h3>
    <div class="makanan-container">
        <?php foreach ($makanan as $item): ?>
            <div class="makanan-item">
                <img src="uploads/<?php echo htmlspecialchars($item['gambar']); ?>" alt="<?php echo htmlspecialchars($item['nama']); ?>" class="img-fluid">
                <h5><?php echo htmlspecialchars($item['nama']); ?></h5>
                <p>Kalori: <?php echo $item['kalori']; ?> Kcal</p>
                <p>Protein: <?php echo $item['protein']; ?>g</p>
                <p>Lemak: <?php echo $item['lemak']; ?>g</p>
                <p>Karbohidrat: <?php echo $item['karbo']; ?>g</p>
                <form action="fitur_makanan.php" method="POST">
                    <input type="hidden" name="makanan_id" value="<?php echo $item['id']; ?>">
                    <button type="submit" name="pilih" class="btn btn-primary btn-sm">Pilih</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
<?php

require_once "sisipkan/footer.php";
?>
</html>
