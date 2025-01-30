<?php
session_start();
require_once "database/db.php"; // Panggil koneksi database


if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

$errors = [];
$calorie_result = null;
$time_to_goal = null; // Variabel untuk menyimpan prediksi waktu
$bmi = null; // Variabel untuk menyimpan hasil BMI
$bmi_category = null; // Variabel untuk kategori BMI
$calorie_result_saved = false; // Untuk menandai apakah hasil telah disimpan

// Ambil data perhitungan sebelumnya dari database
$db = new Database();
$conn = $db->conn;
$user_id = $_SESSION["user_id"];
$stmt = $conn->prepare("SELECT * FROM calorie_calculations WHERE user_id = :user_id ORDER BY created_at DESC LIMIT 1");
$stmt->bindParam(":user_id", $user_id);
$stmt->execute();
$existing_data = $stmt->fetch(PDO::FETCH_ASSOC);

// Proses perhitungan jika tidak ada data sebelumnya atau jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $age = trim($_POST["age"]);
    $weight = trim($_POST["weight"]);
    $height = trim($_POST["height"]);
    $gender = $_POST["gender"];
    $activity_level = $_POST["activity_level"];
    $target_weight = trim($_POST["target_weight"]);

    // Validasi input kosong
    if (empty($age) || empty($weight) || empty($height) || empty($gender) || empty($activity_level) || empty($target_weight)) {
        $errors[] = "Semua kolom harus diisi!";
    }

    if (empty($errors)) {
        // Menghitung BMR (Basal Metabolic Rate) menggunakan rumus Harris-Benedict
        if ($gender == "male") {
            $bmr = 66.5 + (13.75 * $weight) + (5.003 * $height) - (6.75 * $age); // untuk pria
        } else {
            $bmr = 655 + (9.563 * $weight) + (1.850 * $height) - (4.676 * $age); // untuk wanita
        }

        // Menghitung TDEE berdasarkan tingkat aktivitas
        switch ($activity_level) {
            case "sedentary":
                $tdee = $bmr * 1.2; // Aktivitas ringan
                break;
            case "light":
                $tdee = $bmr * 1.375; // Aktivitas sedang
                break;
            case "moderate":
                $tdee = $bmr * 1.55; // Aktivitas tinggi
                break;
            case "intense":
                $tdee = $bmr * 1.725; // Aktivitas sangat tinggi
                break;
            case "very_intense":
                $tdee = $bmr * 1.9; // Aktivitas sangat intens
                break;
            default:
                $tdee = $bmr * 1.2; // Default jika tidak ada pilihan
        }

        $calorie_result = round($tdee);

        // Menghitung defisit kalori per hari (misalnya 500 kalori per hari untuk penurunan berat badan)
        $deficit = 500; // Defisit kalori yang disarankan untuk penurunan berat badan per hari
        $calories_for_loss = $tdee - $deficit;

        // Menghitung waktu yang dibutuhkan untuk mencapai target berat badan
        $weight_to_lose = $weight - $target_weight;
        if ($weight_to_lose > 0) {
            $days_to_lose_weight = ($weight_to_lose * 7700) / $deficit; // 7700 kalori dibakar per kilogram berat badan
            $time_to_goal = ceil($days_to_lose_weight / 30); // Menghitung waktu dalam bulan
        }

        // Menghitung BMI
        $height_in_meters = $height / 100; // Mengubah tinggi badan dari cm ke meter
        $bmi = $weight / ($height_in_meters * $height_in_meters);

        // Menentukan kategori BMI
        if ($bmi < 18.5) {
            $bmi_category = "Underweight";
        } elseif ($bmi >= 18.5 && $bmi < 24.9) {
            $bmi_category = "Normal weight";
        } elseif ($bmi >= 25 && $bmi < 29.9) {
            $bmi_category = "Overweight";
        } else {
            $bmi_category = "Obese";
        }

        // Simpan hasil perhitungan ke database
        $stmt = $conn->prepare("INSERT INTO calorie_calculations (user_id, age, weight, height, gender, activity_level, tdee, target_weight, time_to_goal, bmi, bmi_category) VALUES (:user_id, :age, :weight, :height, :gender, :activity_level, :tdee, :target_weight, :time_to_goal, :bmi, :bmi_category)");
        $stmt->bindParam(":user_id", $user_id);
        $stmt->bindParam(":age", $age);
        $stmt->bindParam(":weight", $weight);
        $stmt->bindParam(":height", $height);
        $stmt->bindParam(":gender", $gender);
        $stmt->bindParam(":activity_level", $activity_level);
        $stmt->bindParam(":tdee", $calorie_result);
        $stmt->bindParam(":target_weight", $target_weight);
        $stmt->bindParam(":time_to_goal", $time_to_goal);
        $stmt->bindParam(":bmi", $bmi);
        $stmt->bindParam(":bmi_category", $bmi_category);

        if ($stmt->execute()) {
            $calorie_result_saved = true;
        } else {
            $errors[] = "Terjadi kesalahan saat menyimpan data. Coba lagi.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Kalori Harian - Fitkal</title>
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
    </script>
    <script>
        $(document).ready(function() {
            // Menampilkan hasil perhitungan dalam bentuk modal
            <?php if ($calorie_result !== null): ?>
                var message = 'Hasil perhitungan:\n\n' +
                              'Kalori Harian: <?php echo $calorie_result; ?> kalori\n' +
                              'Waktu untuk mencapai target: <?php echo $time_to_goal; ?> bulan\n' +
                              'BMI: <?php echo number_format($bmi, 2); ?>\n' +
                              'Kategori BMI: <?php echo $bmi_category; ?>\n\n' +
                              'Klik OK untuk menyimpan hasil.';
                alert(message);
                $('#result-container').show();
            <?php endif; ?>
        });
    </script>
</head>
<body>
    <div class="container">
        <h2 class="my-4">Hitung Kalori Harian</h2>

        <!-- Tampilkan jika ada error -->
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <?php if ($existing_data): ?>
    <div class="card my-4">
        <div class="card-header bg-warning text-white">
            <h4>Data Kesehatan Anda</h4>
        </div>
        <div class="card-body">
            <p><strong>Usia:</strong> <?php echo $existing_data['age']; ?> tahun</p>
            <p><strong>Berat:</strong> <?php echo $existing_data['weight']; ?> kg</p>
            <p><strong>Tinggi:</strong> <?php echo $existing_data['height']; ?> cm</p>
            <p><strong>Jenis Kelamin:</strong> <?php echo ucfirst($existing_data['gender']); ?></p>
            <p><strong>Tingkat Aktivitas:</strong> <?php echo ucfirst($existing_data['activity_level']); ?></p>
            <p><strong>Kalori Harian:</strong> <?php echo $existing_data['tdee']; ?> kalori</p>
            <p><strong>Target Berat Badan:</strong> <?php echo $existing_data['target_weight']; ?> kg</p>
            <p><strong>Waktu untuk mencapai target:</strong> <?php echo $existing_data['time_to_goal']; ?> bulan</p>
            <p><strong>BMI:</strong> <?php echo number_format($existing_data['bmi'], 2); ?></p>
            <p><strong>Kategori BMI:</strong> <?php echo $existing_data['bmi_category']; ?></p>
            <p><strong>Catatan:</strong> Jika Anda mengubah data ini, maka seluruh data kesehatan Anda akan diperbarui.</p>
            <a href="ubah_data.php" class="btn btn-warning">Ubah Data</a>
        </div>
    </div>
<?php endif; ?>


        <!-- Form untuk input data -->
        <form action="" method="POST">
            <div class="form-group">
                <label>Usia:</label>
                <input type="number" name="age" class="form-control" value="<?php echo isset($existing_data['age']) ? $existing_data['age'] : ''; ?>" required><br>
            </div>
            <div class="form-group">
                <label>Berat (kg):</label>
                <input type="number" name="weight" class="form-control" value="<?php echo isset($existing_data['weight']) ? $existing_data['weight'] : ''; ?>" required><br>
            </div>
            <div class="form-group">
                <label>Tinggi (cm):</label>
                <input type="number" name="height" class="form-control" value="<?php echo isset($existing_data['height']) ? $existing_data['height'] : ''; ?>" required><br>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin:</label><br>
                <input type="radio" name="gender" value="male" <?php echo (isset($existing_data['gender']) && $existing_data['gender'] == 'male') ? 'checked' : ''; ?> required> Pria
                <input type="radio" name="gender" value="female" <?php echo (isset($existing_data['gender']) && $existing_data['gender'] == 'female') ? 'checked' : ''; ?> required> Wanita<br><br>
            </div>
            <div class="form-group">
                <label>Tingkat Aktivitas:</label><br>
                <select name="activity_level" class="form-control" required>
                    <option value="sedentary" <?php echo (isset($existing_data['activity_level']) && $existing_data['activity_level'] == 'sedentary') ? 'selected' : ''; ?>>Sedentary (Tidak aktif)</option>
                    <option value="light" <?php echo (isset($existing_data['activity_level']) && $existing_data['activity_level'] == 'light') ? 'selected' : ''; ?>>Ringan (Olahraga ringan)</option>
                    <option value="moderate" <?php echo (isset($existing_data['activity_level']) && $existing_data['activity_level'] == 'moderate') ? 'selected' : ''; ?>>Sedang (Olahraga moderat)</option>
                    <option value="intense" <?php echo (isset($existing_data['activity_level']) && $existing_data['activity_level'] == 'intense') ? 'selected' : ''; ?>>Tinggi (Olahraga intens)</option>
                    <option value="very_intense" <?php echo (isset($existing_data['activity_level']) && $existing_data['activity_level'] == 'very_intense') ? 'selected' : ''; ?>>Sangat Tinggi (Latihan fisik berat)</option>
                </select>
            </div>
            <div class="form-group">
                <label>Target Berat Badan (kg):</label>
                <input type="number" name="target_weight" class="form-control" value="<?php echo isset($existing_data['target_weight']) ? $existing_data['target_weight'] : ''; ?>" required><br>
            </div>

            <button type="submit" class="btn btn-primary">Hitung Kalori</button>
        </form>

        <!-- Menampilkan hasil yang sudah disimpan di bawah -->
        <div id="result-container" style="display: none;">
            <h3>Hasil Perhitungan</h3>
            <p><strong>Kalori Harian:</strong> <?php echo $calorie_result; ?> kalori</p>
            <p><strong>Perkiraan Waktu untuk Mencapai Target:</strong> <?php echo $time_to_goal; ?> bulan</p>
            <p><strong>BMI:</strong> <?php echo number_format($bmi, 2); ?></p>
            <p><strong>Kategori BMI:</strong> <?php echo $bmi_category; ?></p>
        </div>
    </div>
</body>
<?php

require_once "sisipkan/footer.php";
?>
</html>
