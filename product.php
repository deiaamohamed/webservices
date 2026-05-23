<?php
$id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

$url = "https://dummyjson.com/products/$id";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
$product = json_decode($response, true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($product['title']) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light py-4">

<div class="container">
    <a href="curl.php" class="btn btn-outline-secondary btn-sm mb-4">← Back</a>

    <div class="card">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="<?= htmlspecialchars($product['thumbnail']) ?>"
                     alt="<?= htmlspecialchars($product['title']) ?>"
                     class="img-fluid rounded-start"
                     style="height: 100%; object-fit: cover;">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h4 class="card-title"><?= htmlspecialchars($product['title']) ?></h4>
                    <p class="text-muted"><?= htmlspecialchars($product['category']) ?></p>
                    <p class="card-text"><?= htmlspecialchars($product['description']) ?></p>
                    <h5 class="text-success">$<?= number_format($product['price'], 2) ?></h5>
                    <span class="badge bg-warning text-dark"><?= $product['rating'] ?></span>
                    <span class="badge bg-secondary ms-2">Stock: <?= $product['stock'] ?></span>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>