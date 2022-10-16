<?php

session_start();

if (!isset($_SESSION['username'])) {
    header('Location:../error.html');
}

?>
<?php
include('../php/connect.php');
require 'vendor/autoload.php';
error_reporting(0);

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

if (isset($_POST['import'])) {
    $file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

    if (isset($_FILES['berkas_excel']['name']) && in_array($_FILES['berkas_excel']['type'], $file_mimes)) {

        $arr_file = explode('.', $_FILES['berkas_excel']['name']);
        $extension = end($arr_file);

        if ('csv' == $extension) {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        } else {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }
        $spreadsheet = $reader->load($_FILES['berkas_excel']['tmp_name']);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();
        for ($i = 1; $i < count($sheetData); $i++) {
            $judul     = $sheetData[$i]['1'];
            $penulis    = $sheetData[$i]['2'];
            $penerbit     = $sheetData[$i]['3'];
            $tahun = $sheetData[$i]['4'];
            $deskripsi = $sheetData[$i]['5'];
            $kategori = $sheetData[$i]['6'];
            $kondisi = $sheetData[$i]['7'];
            $stok = $sheetData[$i]['8'];
            $harga = $sheetData[$i]['9'];
            mysqli_query($conn, "insert into myproduct (judul,penulis,penerbit,tahun,deskripsi,kategori,kondisi,stok,harga) values
                        ('$judul','$penulis','$penerbit','$tahun','$deskripsi','$kategori','$kondisi','$stok','$harga')");
        }
        // function goBack(){
        //     header("Location:../myproduct.php");
        // }
        // @goBack();
        header('Location: ../myproduct.php');
        echo "<div class='alert alert-success'> Data Berhasil diupdate.</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Lovebook</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/img/LogoLovebook.png" rel="icon">
    <link href="../assets/img/LogoLovebook.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Template Main CSS File -->
    <link href="../assets/css/main.css" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <a href="#" class="logo d-flex align-items-center me-auto me-lg-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="../assets/img/logolovebookFIX.png" alt="">
                <h1 class="navbar">Lovebook<span>.</span></h1>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="#">Beranda</a></li>
                    <li class="dropdown"><a href="#"><span>Kategori</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            <li><a href="#">Fiksi</a></li>
                            <li><a href="#">Non-Fiksi</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Tentang Kami</a></li>
                </ul>
            </nav><!-- .navbar -->
            <nav>
                <a href="#"><i class="bi bi-cart4 position-relative fs-5"><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">2 <span class="visually-hidden">unread messages</span></span></i></a>
                <a class="btn-book-a-table bi bi-person-circle fs-5" href="#"></a>
                <a href="../../logout.php" class="bi bi-box-arrow-right ms-2 fs-5"></a>
            </nav>
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
        </div>
    </header><!-- End Header -->
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Produk Saya</h2>
                    <ol>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Profil</a></li>
                        <li>Produk Saya</li>
                    </ol>
                </div>

            </div>
        </div><!-- End Breadcrumbs -->
        <div class="container mt-4">
            <!-- Account page navigation-->
            <nav class="nav nav-borders shadow-none p-3 bg-light rounded">
                <a class="nav-link ms-0 btn btn-outline-light rounded-pill" href="../myproduct.php" style="color:white; background-color:#CE1212">Produk Saya</a>
                <a class="nav-link" href="../selling.php" style="color:#CE1212">Data Penjualan</a>
            </nav>
            <hr class="mt-0 mb-4">

            <h3 style="color:#CE1212">Import Dari Excel</h3>
            <p class="small text-muted">Import data buku dari file excel anda</p>
            <br>
            <form method="post" enctype="multipart/form-data" action="">
                <div class="form-group">
                    <label for="exampleInputFile">File Upload</label>
                    <input type="file" name="berkas_excel" class="form-control" id="exampleInputFile">
                    <label class="small text-muted"><i>* .xlsx atau .csv</i></label>
                </div>
                <div class="section-header mb-4">
                    <input type="submit" class="btn shadow-" value="Import" name="import" style="font-weight: 500; font-size: 14px; letter-spacing: 1px; display: inline-block;
                    padding: 12px 36px; border-radius: 50px; transition: 0.5s; background-color:#CE1212; color:white" />
                    <a href="../myproduct.php" class="shadow ms-2 btn" style="
                        font-weight: 500; font-size: 14px; letter-spacing: 1px; display: inline-block; 
                        padding: 12px 36px; border-radius: 50px; transition: 0.5s; background-color:white; color:#CE1212">Batal</a>
                </div>

            </form>
    </main>

    <footer id="footer" class="footer">

        <div class="container">
            <div class="row gy-3">
                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-geo-alt icon"></i>
                    <div>
                        <h4>Alamat</h4>
                        <p>
                            KAMPUS BOGOR - Jl. Raya Pajajaran, Kota Bogor,<br>
                            Jawa Barat 16128 <br>
                        </p>
                    </div>

                </div>

                <div class="col-lg-3 col-md-6 footer-links d-flex">
                    <i class="bi bi-telephone icon"></i>
                    <div>
                        <h4>Hubungi kami</h4>
                        <p>
                            <strong>Phone:</strong> +1 5589 55488 55<br>
                            <strong>Email:</strong> love@book.com<br>
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Temukan kami</h4>
                    <div class="social-links d-flex">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Lovebook</span></strong>. All Rights Reserved
            </div>
        </div>

    </footer><!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/aos/aos.js"></script>
    <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>
</body>

</html>