<?php
$url = "https://dummyjson.com/products";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
$data = json_decode($response, true);
$products = $data['products'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Catalog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light py-4">

<div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">

        <?php foreach ($products as $product): ?>

        <div class="col">
            <div class="card h-100">
                <img src="<?= htmlspecialchars($product['thumbnail']) ?>"
                     alt="<?= htmlspecialchars($product['title']) ?>"
                     class="card-img-top"
                     style="height: 180px; object-fit: cover;">

                <div class="card-body">
                    <h6 class="card-title">
                         <a href="product.php?id=<?= $product['id'] ?>" class="text-decoration-none text-dark">
                            <?= htmlspecialchars($product['title']) ?>
                        </a>
                </h6>
                    <p class="card-text text-muted small"><?= htmlspecialchars($product['description']) ?></p>
                </div>

                <div class="card-footer d-flex justify-content-between align-items-center">
                    <span class="fw-bold text-success">$<?= number_format($product['price'], 2) ?></span>
                    <span class="badge bg-warning text-dark">
                        <?= htmlspecialchars($product['rating']) ?>
                    </span>
                </div>
            </div>
        </div>

        <?php endforeach; ?>

    </div>
</div>

</body>
</html>