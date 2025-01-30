<?php
// Fungsi untuk mengambil data makanan dari API FatSecret berdasarkan nama
function searchFoodByName($food_name) {
    $consumer_key = '38460f18da7e4565a778737442cedaec'; // Ganti dengan Consumer Key Anda
    $consumer_secret = '3e58667c48a54de39cde2bc3869a0051'; // Ganti dengan Consumer Secret Anda
    $base_url = 'https://platform.fatsecret.com/rest/server.api';

    $oauth_params = [
        'oauth_consumer_key' => $consumer_key,
        'oauth_nonce' => bin2hex(random_bytes(16)),
        'oauth_signature_method' => 'HMAC-SHA1',
        'oauth_timestamp' => time(),
        'oauth_version' => '1.0',
        'method' => 'foods.search',
        'search_expression' => $food_name,
        'format' => 'json'
    ];

    ksort($oauth_params);
    $base_string = 'GET&' . rawurlencode($base_url) . '&' . rawurlencode(http_build_query($oauth_params));
    $signing_key = rawurlencode($consumer_secret) . '&';
    $oauth_signature = base64_encode(hash_hmac('sha1', $base_string, $signing_key, true));
    $oauth_params['oauth_signature'] = $oauth_signature;

    $full_url = $base_url . '?' . http_build_query($oauth_params);
    $ch = curl_init($full_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}

// Fungsi untuk mengambil detail makanan berdasarkan ID
function getFoodDetails($food_id) {
    $consumer_key = '38460f18da7e4565a778737442cedaec'; // Ganti dengan Consumer Key Anda
    $consumer_secret = '3e58667c48a54de39cde2bc3869a0051'; // Ganti dengan Consumer Secret Anda
    $base_url = 'https://platform.fatsecret.com/rest/server.api';

    $oauth_params = [
        'oauth_consumer_key' => $consumer_key,
        'oauth_nonce' => bin2hex(random_bytes(16)),
        'oauth_signature_method' => 'HMAC-SHA1',
        'oauth_timestamp' => time(),
        'oauth_version' => '1.0',
        'method' => 'food.get',
        'food_id' => $food_id,
        'format' => 'json'
    ];

    ksort($oauth_params);
    $base_string = 'GET&' . rawurlencode($base_url) . '&' . rawurlencode(http_build_query($oauth_params));
    $signing_key = rawurlencode($consumer_secret) . '&';
    $oauth_signature = base64_encode(hash_hmac('sha1', $base_string, $signing_key, true));
    $oauth_params['oauth_signature'] = $oauth_signature;

    $full_url = $base_url . '?' . http_build_query($oauth_params);
    $ch = curl_init($full_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}

if (isset($_POST['search'])) {
    $food_name = $_POST['food_name'];
    $food_search_results = searchFoodByName($food_name);
}

if (isset($_GET['food_id'])) {
    $food_id = $_GET['food_id'];
    $food_details = getFoodDetails($food_id);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FatSecret Food Search</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { 
            font-family: Arial, sans-serif; 
            margin: 20px; 
            background-image: url('background.jpg'); /* Gambar latar belakang */
            background-size: cover;
            background-position: center;
            color: #fff;
        }

        .container {
            background-color: rgba(0, 0, 0, 0.6); /* Membuat container lebih gelap agar teks lebih terbaca */
            padding: 30px;
            border-radius: 10px;
        }

        .food-data, .food-details { 
            margin-top: 20px; 
        }

        .nutrition-table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 10px; 
        }

        .nutrition-table th, .nutrition-table td {
            text-align: center;
        }

        .food-icon {
            width: 30px;
            height: 30px;
            margin-right: 5px;
        }

        .food-description {
            margin-bottom: 20px;
        }

        .nutrition-table th {
            background-color: #007BFF;
            color: white;
        }

        .nutrition-table td {
            background-color:rgb(199, 217, 235);
        }

        h1, h2, h3 {
            text-align: center;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1 class="my-4">Fitkal Pencarian Makanan & Minumanan </h1>

        <!-- Search Form -->
        <div class="search-container mb-4">
            <form method="POST" class="d-flex justify-content-center">
                <div class="form-group me-2">
                    <label for="food_name" class="form-label">Food Name:</label>
                    <input type="text" id="food_name" name="food_name" class="form-control" value="<?php echo isset($food_name) ? htmlspecialchars($food_name) : ''; ?>" required>
                </div>
                <button type="submit" name="search" class="btn btn-primary">Search</button>
            </form>
        </div>

        <!-- Search Results -->
        <?php if (isset($food_search_results) && isset($food_search_results['foods'])): ?>
            <div class="food-data">
                <h3>Search Results:</h3>
                <div class="list-group">
                    <?php foreach ($food_search_results['foods']['food'] as $food): ?>
                        <a href="?food_id=<?php echo htmlspecialchars($food['food_id']); ?>" class="list-group-item list-group-item-action">
                            <strong><?php echo htmlspecialchars($food['food_name']); ?></strong> 
                            <span class="badge bg-primary float-end">View Details</span>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php elseif (isset($food_name)): ?>
            <p class="alert alert-warning">No results found for "<?php echo htmlspecialchars($food_name); ?>".</p>
        <?php endif; ?>

        <!-- Food Details -->
        <?php if (isset($food_details['food']['food_name'])): ?>
            <div class="food-details">
                <h2><?php echo htmlspecialchars($food_details['food']['food_name']); ?></h2>
                <p class="food-description"><strong>Description:</strong> 
                    <?php 
                        // Cek apakah 'food_description' ada sebelum menampilkannya
                        echo isset($food_details['food']['food_description']) ? htmlspecialchars($food_details['food']['food_description']) : 'No description available.';
                    ?>
                </p>

                <h3>Nutritional Information</h3>
                <table class="nutrition-table table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Serving</th>
                            <th>Calories <img src="icons/calories.png" class="food-icon" alt="Calories"></th>
                            <th>Carbohydrate (g) <img src="icons/carbohydrates.png" class="food-icon" alt="Carbohydrates"></th>
                            <th>Protein (g) <img src="icons/protein.png" class="food-icon" alt="Protein"></th>
                            <th>Fat (g) <img src="icons/fat.png" class="food-icon" alt="Fat"></th>
                            <th>Fiber (g) <img src="icons/fiber.png" class="food-icon" alt="Fiber"></th>
                            <th>Sugar (g) <img src="icons/sugar.png" class="food-icon" alt="Sugar"></th>
                            <th>Sodium (mg) <img src="icons/sodium.png" class="food-icon" alt="Sodium"></th>
                            <th>Cholesterol (mg) <img src="icons/cholesterol.png" class="food-icon" alt="Cholesterol"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($food_details['food']['servings']['serving'] as $serving): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($serving['serving_description']); ?></td>
                                <td><?php echo htmlspecialchars($serving['calories']); ?></td>
                                <td><?php echo htmlspecialchars($serving['carbohydrate']); ?></td>
                                <td><?php echo htmlspecialchars($serving['protein']); ?></td>
                                <td><?php echo htmlspecialchars($serving['fat']); ?></td>
                                <td><?php echo htmlspecialchars($serving['fiber']); ?></td>
                                <td><?php echo htmlspecialchars($serving['sugar']); ?></td>
                                <td><?php echo isset($serving['sodium']) ? htmlspecialchars($serving['sodium']) : 'N/A'; ?></td>
                                <td><?php echo isset($serving['cholesterol']) ? htmlspecialchars($serving['cholesterol']) : 'N/A'; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
