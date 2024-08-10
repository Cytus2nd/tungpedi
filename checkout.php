<?php
session_start();

// Ambil keranjang dari session
$keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : [];

// Inisialisasi variabel
$total_harga = 0;
foreach ($keranjang as $item) {
    $total_harga += $item['harga'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];

    // Simpan pesanan ke database
    $conn = new mysqli('localhost', 'root', '', 'pedia_clone');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO tb_pesanan (nama, alamat, telepon, email, total_harga) VALUES ('$nama', '$alamat', '$telepon', '$email', '$total_harga')";
    if ($conn->query($sql) === TRUE) {
        $id_pesanan = $conn->insert_id;

        foreach ($keranjang as $item) {
            $id_produk = $item['id_produk'];
            $harga = $item['harga'];
            $sql = "INSERT INTO tb_detail_pesanan (id_pesanan, id_produk, harga) VALUES ('$id_pesanan', '$id_produk', '$harga')";
            $conn->query($sql);
        }

        // Kosongkan keranjang
        $_SESSION['keranjang'] = [];

        // Redirect ke halaman invoice
        header("Location: invoice.php?id_pesanan=$id_pesanan");
        exit;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Checkout</h2>
        <?php if (count($keranjang) > 0) : ?>
            <ul class="list-group mb-4">
                <?php foreach ($keranjang as $item) : ?>
                    <li class="list-group-item">
                        <?php echo $item['nama_produk']; ?> - Rp <?php echo number_format($item['harga'], 0, ',', '.'); ?>
                    </li>
                <?php endforeach; ?>
                <li class="list-group-item font-weight-bold">Total: Rp <?php echo number_format($total_harga, 0, ',', '.'); ?></li>
            </ul>
        <?php else : ?>
            <p>Keranjang Anda kosong.</p>
        <?php endif; ?>

        <form action="checkout.php" method="POST">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <textarea class="form-control" id="alamat" name="alamat" required></textarea>
            </div>
            <div class="form-group">
                <label for="telepon">Telepon:</label>
                <input type="text" class="form-control" id="telepon" name="telepon" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Konfirmasi Pesanan</button>
        </form>
    </div>
</body>

</html>