<?php

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: sukses_login.php");
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: sukses_login.php");
    } else {
        echo "<script>alert('Email atau kata sandi Anda salah. Silahkan masuk lagi!')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>LOGIN - Lovebook</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="content/assets/img/LogoLovebook.png" rel="icon">
    <link href="content/assets/img/LogoLovebook.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="content/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="content/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="content/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="content/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="content/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Template Main CSS File -->
    <link href="main.css" rel="stylesheet">

</head>
<!-- <style>
body {
  background-image: url('bgimg/bg2.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
</style> -->

<body>

    <!-- ======= Header ======= -->


    <header id="header" class="header fixed-top d-flex align-items-center shadow-sm">
        <div class="container d-flex align-items-center justify-content-between">

            <a href="index.php" class="logo d-flex align-items-center me-auto me-lg-0">
                <img src="content/assets/img/logolovebookFIX.png" alt="">
                <h1>Lovebook<span>.</span></h1>
            </a>
        </div>
    </header><!-- End Header -->
    <div class="bg-image" style="background-image: url('bgimg/bg5.jpg');
            height: 100vh">
        <section>
            <div role="alert">
                <?php echo $_SESSION['error'] ?>
            </div>

            <div class="container mt-5">
                <div class="col-xl-7 rounded" style="margin: 0 auto;">
                    <div class="card mb-4 mb-xl-0 shadow rounded-4">
                        <div class="card-body">
                            <div class="container" style="padding: 15px;">
                                <form action="" method="POST">
                                    <img src="content/assets/img/logolovebookFIX.png" style="width:150px; height:150px;" class="rounded mx-auto d-block">
                                    <div class="section-header">
                                        <p>Login ke<span> Lovebook</span></p>
                                        <h2>Masuk untuk melanjutkan</h2>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Alamat Email</label>
                                        <input type="email" class="form-control rounded-3" aria-describedby="emailHelp" placeholder="Masukkan email Anda" name="email" value="<?php echo $email; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Kata Sandi</label>
                                        <input type="password" class="form-control rounded-3" placeholder="Masukkan kata sandi" name="password" value="<?php echo $_POST['password']; ?>" required>
                                    </div>
                                    <div class="section-header mt-4">
                                        <button name="submit" class="btn" style="font-weight: 500; font-size: 14px; letter-spacing: 1px; display: inline-block;
                                        padding: 12px 36px; border-radius: 50px; transition: 0.5s; background-color:#CE1212; color:white">MASUK</button>
                                    </div>
                                    <div style="text-align:center">
                                        <p class="login-register-text">Belum punya akun? <a href="register.php">Daftar sekarang</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
    </div>
    </section>
    
    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="content/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="content/assets/vendor/aos/aos.js"></script>
    <script src="content/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="content/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="content/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="content/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="content/assets/js/main.js"></script>

</body>

</html>