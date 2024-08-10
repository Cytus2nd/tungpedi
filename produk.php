<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Tambah Produk Baru</h2>
        <form action="produk.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama_produk">Nama Produk:</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
            </div>
            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="number" class="form-control" id="harga" name="harga" required>
            </div>
            <div class="form-group">
                <label for="berat_produk">Berat Produk (gram):</label>
                <input type="number" class="form-control" id="berat_produk" name="berat_produk" required>
            </div>
            <div class="form-group">
                <label for="id_penjual">ID Penjual:</label>
                <input type="number" class="form-control" id="id_penjual" name="id_penjual" required>
            </div>
            <div class="form-group">
                <label for="foto_produk">Foto Produk:</label>
                <input type="file" class="form-control" id="foto_produk" name="foto_produk" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Produk</button>
        </form>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nama_produk = $_POST['nama_produk'];
        $harga = $_POST['harga'];
        $berat_produk = $_POST['berat_produk'];
        $id_penjual = $_POST['id_penjual'];
        $foto_produk = $_FILES['foto_produk']['name'];
        $target_dir = "images/";
        $target_file = $target_dir . basename($foto_produk);

        // Buat direktori jika belum ada
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        // Upload file
        if (move_uploaded_file($_FILES['foto_produk']['tmp_name'], $target_file)) {
            // Koneksi ke database
            $conn = new mysqli('localhost', 'root', '', 'pedia_clone');

            // Periksa koneksi
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Simpan data produk ke database
            $sql = "INSERT INTO tb_produk (nama_produk, harga, berat_produk, id_penjual, foto_produk) VALUES ('$nama_produk', '$harga', '$berat_produk', '$id_penjual', '$foto_produk')";

            if ($conn->query($sql) === TRUE) {
                echo "Produk baru berhasil ditambahkan.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        } else {
            echo "Maaf, terjadi kesalahan saat mengunggah file.";
        }
    }
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>