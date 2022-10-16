<?php

session_start();

if (!isset($_SESSION['username'])) {
    header('Location:../error.html');
}

?>
<?php
//Include file koneksi, untuk koneksikan ke database
include "php/connect.php";

//Fungsi untuk mencegah inputan karakter yang tidak sesuai
function input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
//Cek apakah ada kiriman form dari method post
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = input($_POST['id']);
    $judul = input($_POST['judul']);
    $penulis = input($_POST['penulis']);
    $penerbit = input($_POST['penerbit']);
    $tahun = input($_POST['tahun']);
    $deskripsi = input($_POST['deskripsi']);
    $kategori = input($_POST['kategori']);
    $kondisi = input($_POST['kondisi']);
    $stok = input($_POST['stok']);
    $harga = input($_POST['harga']);

    //Query input menginput data kedalam tabel anggota
    $sql = "insert into myproduct (id,judul,penulis,penerbit,tahun,deskripsi,kategori,kondisi,stok,harga) values
		('$id','$judul','$penulis','$penerbit','$tahun','$deskripsi','$kategori','$kondisi','$stok','$harga')";

    //Mengeksekusi/menjalankan query diatas
    $hasil = mysqli_query($conn, $sql);

    //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
    if ($hasil) {
        header("Location:myproduct.php");
    } else {
        echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
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
                    <h2>Input Buku</h2>
                    <ol>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Profil</a></li>
                        <li>Input Buku</li>
                    </ol>
                </div>

            </div>
        </div><!-- End Breadcrumbs -->

        <div class="container mt-4">
            <nav class="nav nav-borders shadow-none p-3 bg-light rounded">
                <a href="myproduct.php" class="nav-link ms-0 btn btn-outline-light rounded-pill" style="color:white; background-color:#CE1212">Produk Saya</a>
                <a class="nav-link" href="selling.php" style="color:#CE1212">Data Penjualan</a>
            </nav>
            <hr class="mt-0 mb-4">
            <h2 style="color:#CE1212">Input Buku</h2>
            <p class="small text-muted">Jual buku bekas anda dengan melengkapi formulir berikut!</p>

            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                <label for="basic-url">
                    <h5>Detail Buku</h5>
                </label>

                <!-- <div class="input-group mb-3">
                        <input type="number" class="form-control" placeholder="ID" name="id">
                    </div> -->

                <div class="input-group mb-3">
                    <input type="text" class="form-control text-capitalize" placeholder="Judul" name="judul" autocapitalize="word" required>
                </div>

                <div class="input-group mb-3">
                    <input type="text" class="form-control text-capitalize" placeholder="Penulis" name="penulis" autocapitalize="word" required>
                </div>

                <div class="input-group mb-3">
                    <input type="text" class="form-control text-capitalize" placeholder="Penerbit" name="penerbit" autocapitalize="word" required>
                    <input type="text" class="form-control ms-2" placeholder="Tahun Terbit" name="tahun" required>
                </div>

                <div class="input-group mb-3">
                    <textarea class="form-control" placeholder="Deskripsi (Optional)" name="deskripsi"></textarea>
                </div>

                <label for="basic-url" class="mt-2">
                    <h5>Spesifikasi</h5>
                </label>

                <div class="form-floating mb-3">
                    <select class="form-select" name="kategori" id="floatingSelect">
                        <option selected>Fiksi</option>
                        <option value="Nonfiksi">Nonfiksi</option>
                    </select>
                    <label for="floatingSelect">Kategori</label>
                </div>

                <div class="input-group mb-3">
                    <input type="number" min="25" max="100" class="form-control" placeholder="Kondisi" name="kondisi" required>
                    <span class="input-group-text">%</span>
                </div>

                <div class="input-group mb-3">
                    <input type="number" min="1" max="100" class="form-control" placeholder="Stok" name="stok" required>
                </div>

                <label for="basic-url" class="mt-2">
                    <h5>Sampul Buku (Optional)</h5>
                </label>

                <div class="input-group mb-2">
                    <input type="file" class="form-control" id="inputGroupFile02">
                    <label for="inputGroupFile02"></label>
                </div>
                <small>
                    <p class="text-muted">JPG atau PNG kurang dari 10mb</p>
                </small>

                <label for="basic-url" class="mt-2">
                    <h5>Harga</h5>
                </label>

                <div class="input-group mb-3">
                    <span class="input-group-text">Rp</span>
                    <input type="number" class="form-control" name="harga" required>
                    <span class="input-group-text">.00</span>
                </div>

                <div class="section-header mt-4">
                    <button type="submit" name="sumbit" class="btn shadow" style="font-weight: 500; font-size: 14px; letter-spacing: 1px; display: inline-block;
                    padding: 12px 36px; border-radius: 50px; transition: 0.5s; background-color:#CE1212; color:white">Masukkan produk</button>
                    <a href="myproduct.php" class="shadow-sm ms-2 btn" style="
                        font-weight: 500; font-size: 14px; letter-spacing: 1px; display: inline-block; 
                        padding: 12px 36px; border-radius: 50px; transition: 0.5s; background-color:white; color:#CE1212">Batal</a>
                </div>

            </form>
        </div>

    </main><!-- End #main -->

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