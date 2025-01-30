<?php
require_once "database/db.php";

$errors = [];
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = trim($_POST["nama"]);
    $kategori = $_POST["kategori"];
    $status_ekonomi = $_POST["status_ekonomi"];
    
    // Ambil input yang memungkinkan koma
    $kalori = str_replace(',', '.', $_POST["kalori"]);
    $protein = str_replace(',', '.', $_POST["protein"]);
    $lemak = str_replace(',', '.', $_POST["lemak"]);
    $karbo = str_replace(',', '.', $_POST["karbo"]);
    
    // Validasi angka desimal
    if (!is_numeric($kalori)) {
        $errors[] = "Kalori harus berupa angka.";
    }
    if (!is_numeric($protein)) {
        $errors[] = "Protein harus berupa angka.";
    }
    if (!is_numeric($lemak)) {
        $errors[] = "Lemak harus berupa angka.";
    }
    if (!is_numeric($karbo)) {
        $errors[] = "Karbohidrat harus berupa angka.";
    }

    // Cek dan buat folder uploads jika belum ada
    $target_dir = __DIR__ . "/uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Upload gambar
    $gambar = "";
    if (!empty($_FILES["gambar"]["name"])) {
        $gambar = time() . "_" . basename($_FILES["gambar"]["name"]);
        $target_file = $target_dir . $gambar;

        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            // Simpan ke database
            $db = new Database();
            $conn = $db->conn;
            $stmt = $conn->prepare("INSERT INTO makanan (nama, kategori, status_ekonomi, kalori, protein, lemak, karbo, gambar) VALUES (:nama, :kategori, :status_ekonomi, :kalori, :protein, :lemak, :karbo, :gambar)");
            $stmt->bindParam(":nama", $nama);
            $stmt->bindParam(":kategori", $kategori);
            $stmt->bindParam(":status_ekonomi", $status_ekonomi);
            $stmt->bindParam(":kalori", $kalori);
            $stmt->bindParam(":protein", $protein);
            $stmt->bindParam(":lemak", $lemak);
            $stmt->bindParam(":karbo", $karbo);
            $stmt->bindParam(":gambar", $gambar);

            if ($stmt->execute()) {
                $success = "Data makanan berhasil ditambahkan!";
            } else {
                $errors[] = "Terjadi kesalahan saat menyimpan data.";
            }
        } else {
            $errors[] = "Gagal mengupload gambar.";
        }
    } else {
        $errors[] = "Gambar wajib diupload!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Makanan</title>
</head>
<body>
    <h2>Tambah Makanan</h2>
    
    <!-- Menampilkan pesan error -->
    <?php if (!empty($errors)): ?>
        <div style="color: red;">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <!-- Menampilkan pesan sukses -->
    <?php if (!empty($success)): ?>
        <div style="color: green;">
            <?php echo htmlspecialchars($success); ?>
        </div>
    <?php endif; ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <label for="nama">Nama Makanan:</label>
        <input type="text" name="nama" id="nama" required><br><br>
        
        <label for="kategori">Kategori:</label>
        <select name="kategori" id="kategori" required>
            <option value="sayur">Sayur</option>
            <option value="makanan_ringan">Makanan Ringan</option>
            <option value="makanan_berat">Makanan Berat</option>
            <option value="jus_buah">Jus Buah</option>
        </select><br><br>
        
        <label for="status_ekonomi">Status Ekonomi:</label>
        <select name="status_ekonomi" id="status_ekonomi" required>
            <option value="hemat">Mode Hemat</option>
            <option value="gajian">Mode Gajian</option>
            <option value="sultan">Mode Sultan</option>
            <option value="anak_kuliahan">Mode Anak Kuliahan</option>
            <option value="anak_sekolahan">Mode Anak Sekolahan</option>
        </select><br><br>
        
        <label for="kalori">Kalori:</label>
        <input type="text" name="kalori" id="kalori" required><br><br>
        
        <label for="protein">Protein (g):</label>
        <input type="text" name="protein" id="protein" required><br><br>
        
        <label for="lemak">Lemak (g):</label>
        <input type="text" name="lemak" id="lemak" required><br><br>
        
        <label for="karbo">Karbohidrat (g):</label>
        <input type="text" name="karbo" id="karbo" required><br><br>
        
        <label for="gambar">Upload Gambar:</label>
        <input type="file" name="gambar" id="gambar" required><br><br>
        
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
