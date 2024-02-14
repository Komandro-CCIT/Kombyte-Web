<?php
session_start();
include 'core/db.php'; // Include your database connection
getConnection();

// Check if the user is already logged in
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
  echo '<script>window.location.href="pages/comp.php";</script>';
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- basic -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- mobile metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">
  <!-- site metas -->
  <title>KomByte : Homepage</title>
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- bootstrap css -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- style css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- Responsive-->
  <link rel="stylesheet" href="css/responsive.css">
  <!-- fevicon -->
  <link rel="icon" href="images/fevicon.png" type="image/gif" />
  <!-- Tweaks for older IEs-->
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
    media="screen">
  <link href="https://fonts.googleapis.com/css?family=Pixelify+Sans:400,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Press+Start+2p:400,700&display=swap" rel="stylesheet">
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

  <link rel="stylesheet" href="css/page/index.css">
</head>
<!-- body -->

<body class="main-layout">

  <!-- loader  -->
  <div class="loader_bg">
    <div class="loader"><img src="images/loading.gif" alt="#" /></div>
  </div>
  <!-- end loader -->

  <!-- header -->
  <header>
    <!-- header inner -->
    <div class="header_bg">
      <div class="header">
        <div class="container">
          <div class="row">

          </div>
        </div>
      </div>
      <!-- end header inner -->
      <!-- end header -->
      <!-- banner -->
      <section class="banner_main">
        <div class="container-fluid">
          <div class="row d_flex">
            <div class="col-md-5">

              <div class="text-bg">
                <div>
                  <img src="https://psb.ccit-ftui.com/theme/images/ccit-logo.png"></img>
                  <img src="images/LogoKom.png"></img>
                </div>
                <h1>Komandro <span></span></h1>
                <p>KomByte atau Komandro Briliiant Youthful Tech-savvy Enthusiastic adalah perlombaan yang diadakan
                  dengan
                  kerjasama CCIT-FTUI dengan Komandro dengan tujuan untuk menguji dan meningkatkan skill para mahasiswa
                  CCIT-FTUI dalam bidang keahlian masing-masing</p>
                <a class="login-trigger" href="#" data-target="#login" data-toggle="modal">Login</a>
              </div>
            </div>
            <div class="col-md-7">
              <div class="text-img">
                <figure><img src="images/present.svg" /></figure>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </header>
  <!-- end banner -->

  <div id="login" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <div class="modal-content">
        <div class="modal-body">
          <div class="card border-0 shadow rounded-3 my-5">
            <div class="card-body p-4 p-sm-5 retro">
              <h1 class="card-title text-center mb-1 fw-bold fs-5"><strong>Login</strong></h1>

              <form action="controller/controller.php" method="POST">
                <div class="form-floating mb-3">
                  <label for="floatingInput">Team Name</label>
                  <input type="text" class="form-control" id="floatingInput" placeholder="Insert Your Team Name"
                    name="teamName">
                </div>
                <div class="form-floating mb-3">
                  <label for="floatingPassword">Token</label>
                  <input type="text" class="form-control" id="floatingPassword" placeholder="Insert Your Token"
                    name="token">
                </div>
                <div class="d-grid">
                  <button class="loginbtnpop" type="submit" name="login">Login</button>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--  footer -->
  <footer>
    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <p>© 2024 <a href="https://github.com/Komandro-CCIT">Komandro CCIT</a></p>
            <p style="font-size: 15px;"><a href="https://github.com/Ifarra">Muhammad Fauzan Arrafi</a> & <a
                href="https://github.com/sir-anthesis">Raditya Ihza Wibowo</a></p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- end footer -->
  <!-- Javascript files-->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery-3.0.0.min.js"></script>
  <script src="js/plugin.js"></script>
  <script src="js/custom.js"></script>
  <script src="js/page/index.js"></script>
</body>

</html>