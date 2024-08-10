<?php
session_start();
// if (!isset($_SESSION['loggedin'])) {
//     header('Location: login.php');
//     exit;
// }

$keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : [];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Keranjang Belanja</h2>
        <?php if (count($keranjang) > 0) : ?>
            <ul class="list-group mb-4">
                <?php foreach ($keranjang as $item) : ?>
                    <li class="list-group-item">
                        <?php echo $item['nama_produk']; ?> - Rp <?php echo number_format($item['harga'], 0, ',', '.'); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
            <a href="checkout.php" class="btn btn-primary btn-block">Checkout</a>
        <?php else : ?>
            <p>Keranjang Anda kosong.</p>
        <?php endif; ?>
        <a href="index.php" class="btn btn-secondary mt-3">Lanjut Belanja</a>
    </div>
</body>

</html>