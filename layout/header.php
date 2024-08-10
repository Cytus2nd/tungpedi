<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- bootstrap 3 and affix -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- end  -->
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Tokopedia</title>
</head>

<body>

    <div id="overlay"></div>

    <div class="header">
        <div class="item-header-1 d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <img class="mr-2" src="assets/img/1.png" alt="">
                <span>Download Tokopedia App</span>
            </div>

            <div class="d-flex">
                <span class="mr-4">Tentang Tokopedia</span>
                <span class="mr-4">Mitra Tokopedia</span>
                <span class="mr-4">Mulai Berjualan</span>
                <span class="mr-4">Promo</span>
                <span class="mr-4">Tokopedia Care</span>
            </div>
        </div>

        <div class="item-header-2 d-flex flex-column">
            <div class="d-flex justify-content-between align-items-center">
                <img class="img-tokopedia" src="assets/img/2.png" alt="">
                <span class="mx-2 text-kategory" onclick="kategoryOn()">Kategory</span>
                <div class="wrap-search">
                    <input type="text" class="form-control" placeholder="Cari barang" data-toggle="modal" data-target="#exampleModal">
                    <div class=" wrap-icon-search">
                        <img class="img-search" src="assets/img/3.png" alt="">
                    </div>
                </div>

                <div class="wrap-img-shop mx-3" onclick="on()">
                    <img class="img-shop" src="assets/img/4.png" alt="">
                </div>

                <span class="mr-3 line">|</span>

                <div class="d-flex">
                    <button class="btn font-weight-bold mr-3">Masuk</button>
                    <button class="btn font-weight-bold text-white">Daftar</button>
                </div>
            </div>
            <div class="text-under-search d-flex mt-2">
                <span class="mr-3">Jersey Sepeda</span>
                <span class="mr-3">Jersey Sepeda</span>
                <span class="mr-3">Jersey Sepeda</span>
                <span class="mr-3">Jersey Sepeda</span>
                <span class="mr-3">Jersey Sepeda</span>
            </div>
        </div>

        <div class="menu-bar flex-column justify-content-between align-items-center" id="menuBar">
            <img src="assets/img/5.png" alt="">
            <h4 class="mt-2">Wah keranjang belanjaanmu kosong</h4>
            <p class="text-center">Daripada dianggurin, mending diisi dengan barang barang </br>impianmu. Yuk cek
                sekarang!</p>
            <button class="btn">Lihat Rekomendasi</button>
        </div>
    </div>

    <div class="kategory" id="kategory">
        <div class="head-kategory d-flex w-100">
            <span>Belanja</span>
            <span>Featured</span>
            <span>Featured</span>
            <span>Brand&nbsp;Unggulan</span>
            <span>Halal&nbsp;Corner</span>
            <span>Investasi&nbsp;Asuransi&nbsp;&&nbsp;Pinjaman</span>
            <span>Pajak</span>
        </div>