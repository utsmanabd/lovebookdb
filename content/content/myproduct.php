<?php

session_start();

if (!isset($_SESSION['username'])) {
    header('Location:../error.html');
}

?>
<?php

include "php/connect.php";

//Cek apakah ada nilai dari method GET dengan nama id_anggota
if (isset($_GET['id'])) {
  $id = htmlspecialchars($_GET["id"]);

  $sql = "delete from myproduct where id='$id' ";
  $hasil = mysqli_query($conn, $sql);

  //Kondisi apakah berhasil atau tidak
  if ($hasil) {
    header("Location:myproduct.php");
  } else {
    echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";
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
        <a class="nav-link ms-0 btn btn-outline-light rounded-pill" style="color:white; background-color:#CE1212">Produk Saya</a>
        <a class="nav-link" href="selling.php" style="color:#CE1212">Data Penjualan</a>
      </nav>
      <hr class="mt-0 mb-4">

      <h3 style="color:#CE1212">Daftar Buku Anda</h3>
      <p class="small text-muted">Lihat, hapus, dan ubah buku yang akan anda jual!</p>
      <table class="table table-responsive table-borderless table-hover shadow-sm">
        <br>
        <thead style="color:white; background-color:#CE1212">
          <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun</th>
            <th>Kategori</th>
            <th>Kondisi</th>
            <th>Stok</th>
            <th>Harga</th>
            <th colspan='2'>Aksi</th>

          </tr>
        </thead>
        <?php
        include "php/connect.php";
        $sql = "select * from myproduct order by id desc";

        $hasil = mysqli_query($conn, $sql);
        $no = 0;
        while ($data = mysqli_fetch_array($hasil)) {
          $no++;

        ?>
          <tbody>
            <tr>
              <td><?php echo '<p class="text-muted">' . $no . '</p>'; ?></td>
              <td><?php echo '<b style="color:#CE1212">' . ucwords($data["judul"]) . '</b>'; ?></td>
              <td><?php echo ucwords($data["penulis"]);   ?></td>
              <td><?php echo ucwords($data["penerbit"]);   ?></td>
              <td><?php echo $data["tahun"];   ?></td>
              <td><?php echo $data["kategori"];   ?></td>
              <td><?php echo $data["kondisi"] . "%";   ?></td>
              <td><?php echo $data["stok"];   ?></td>
              <td><?php echo "Rp" . $data["harga"];   ?></td>
              <td>
                <div class="container">
                  <a href="edit_product.php?id=<?php echo htmlspecialchars($data['id']); ?>" class="btn btn-outline-dark rounded-4 bi bi-pencil-square" role="button"></a>
                  <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?php echo $data['id']; ?>" class="btn btn-outline-danger rounded-4 mt-1 bi bi-trash" role="button"></a>
                </div>
              </td>
            </tr>
          </tbody>
        <?php
        }
        ?>
      </table>

      <div class="section-header mt-4">
        <a href="bookup.php" class="btn shadow" style="font-weight: 500; font-size: 14px; letter-spacing: 1px; display: inline-block;
                    padding: 12px 36px; border-radius: 50px; transition: 0.5s; background-color:#CE1212; color:white">Tambah Buku
        </a>
        <a href="spreadsheet/import.php" class="shadow ms-2 btn bi bi-file-earmark-excel-fill" style="
                        font-weight: 500; font-size: 14px; letter-spacing: 1px; display: inline-block; 
                        padding: 12px 36px; border-radius: 50px; transition: 0.5s; background-color:white; color:#CE1212"> Import Excel</a>
      </div>
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