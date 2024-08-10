<?php
session_start();

// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'pedia_clone');

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil ID produk dari URL
$id_produk = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Query untuk mengambil data produk berdasarkan ID
$sql = "SELECT * FROM tb_produk WHERE id_produk = $id_produk";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data produk
    $row = $result->fetch_assoc();
} else {
    echo "<p>Produk tidak ditemukan.</p>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // if (!isset($_SESSION['loggedin'])) {
    //     header('Location: login.php');
    //     exit;
    // }

    $item = [
        'id_produk' => $row['id_produk'],
        'nama_produk' => $row['nama_produk'],
        'harga' => $row['harga'],
        'foto_produk' => $row['foto_produk']
    ];

    if (!isset($_SESSION['keranjang'])) {
        $_SESSION['keranjang'] = [];
    }

    $_SESSION['keranjang'][] = $item;

    // Debug: Tampilkan session keranjang
    echo '<pre>';
    print_r($_SESSION['keranjang']);
    echo '</pre>';

    header('Location: keranjang.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .product-detail {
            display: flex;
            margin-top: 20px;
        }

        .product-image {
            width: 50%;
            text-align: center;
        }

        .product-image img {
            max-width: 100%;
            height: auto;
        }

        .product-info {
            width: 50%;
            padding: 20px;
        }

        .product-info h1 {
            font-size: 24px;
            font-weight: bold;
        }

        .product-info .price {
            font-size: 28px;
            color: #d9534f;
            font-weight: bold;
        }

        .product-info .original-price {
            text-decoration: line-through;
            color: #999;
        }

        .product-info .badge {
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="product-detail">
            <div class="product-image">
                <img src="images/<?php echo $row["foto_produk"]; ?>" alt="<?php echo $row["nama_produk"]; ?>">
            </div>
            <div class="product-info">
                <h1><?php echo $row["nama_produk"]; ?></h1>
                <p>Terjual 100+ • ⭐ 4.9 (123 rating) • Diskusi (7)</p>
                <p class="price">Rp <?php echo number_format($row["harga"], 0, ',', '.'); ?></p>
                <p class="original-price">Rp 1.507.000</p>
                <div class="badge badge-danger">Promo Guncang 8.8</div>
                <hr>
                <h4>Detail</h4>
                <p>Kondisi: Baru</p>
                <p>Min. Pemesanan: 1 Buah</p>
                <p>Etalase: LED Monitor</p>
                <p>Garansi Resmi 3 Tahun Xiaomi Indonesia by TAM / Datascript di seluruh Service Centre Xiaomi Se Indonesia</p>
                <hr>
                <form action="detail_produk.php?id=<?php echo $row['id_produk']; ?>" method="POST">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-secondary" type="button">-</button>
                        </div>
                        <input type="text" class="form-control" value="1" aria-label="Jumlah">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button">+</button>
                        </div>
                    </div>
                    <p>Stok Total: <span class="text-danger">Sisa 1</span></p>
                    <button type="submit" class="btn btn-success btn-block">+ Keranjang</button>
                </form>
                <a href="#" class="btn btn-primary btn-block">Beli</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>