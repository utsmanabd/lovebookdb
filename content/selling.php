<?php

session_start();

if (!isset($_SESSION['username'])) {
    header('Location:../error.html');
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
    <link href="assets/img/LogoLovebook.png" rel="icon">
    <link href="assets/img/LogoLovebook.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/fusioncharts.js"></script>
    <script type="text/javascript" src="js/themes/fusioncharts.theme.fusion.js"></script>

    <script type="text/javascript">
        FusionCharts.ready(function() {
            var visitChart = new FusionCharts({
                type: 'line',
                renderAt: 'chartPenjualan',
                width: '1100',
                height: '550',
                dataFormat: 'jsonurl',
                dataSource: 'selling/penjualan.json'
            });

            visitChart.render();
        });
    </script>
    <script type="text/javascript">
        FusionCharts.ready(function() {
            var cSatScoreChart = new FusionCharts({
                type: 'angulargauge',
                renderAt: 'chartKepuasan',
                width: '600',
                height: '375',
                dataFormat: 'jsonurl',
                dataSource: 'selling/kepuasan.json'
            }).render();
        });
    </script>

    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <a href="#" class="logo d-flex align-items-center me-auto me-lg-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="assets/img/logolovebookFIX.png" alt="">
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
                <a href="../logout.php" class="bi bi-box-arrow-right ms-2 fs-5"></a>
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
                    <h2>Data Penjualan</h2>
                    <ol>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Profil</a></li>
                        <li>Data Penjualan</li>
                    </ol>
                </div>

            </div>
        </div><!-- End Breadcrumbs -->
        <div class="container mt-4">
            <!-- Account page navigation-->
            <nav class="nav nav-borders shadow-none p-3 bg-light rounded">
                <a href="myproduct.php" class="nav-link" style="color:#CE1212">Produk Saya</a>
                <a class="nav-link ms-0 btn btn-outline-light rounded-pill" style="color:white; background-color:#CE1212">Data Penjualan</a>
            </nav>
            <hr class="mt-0 mb-4">

            <h3 style="color:#CE1212">Data Penjualan Anda</h3>
            <p class="small text-muted">Berikut disajikan laporan hasil penjualan anda dalam grafik</p> <br>
            <div data-aos="fade-up">
                <h4 class="mb-4">Pendapatan</h4>
                <div id="chartPenjualan" class="table table-responsive d-flex justify-content-center"></div>
            </div>
            <div data-aos="fade-up">
                <h4 class="mb-4 mt-5">Kepuasan Pembeli</h4>
                <div id="chartKepuasan" class="table table-responsive d-flex justify-content-center"></div>
            </div>
        </div>

    </main><!-- End #main -->
    <section></section>

    <!-- ======= Footer ======= -->
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
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>