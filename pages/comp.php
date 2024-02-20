<?php
session_start();
include '../core/db.php';
$conn = getConnection();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
  echo '<script>window.location.href="../index.php";</script>';
  exit;
}
if ($_SESSION['logged_in'] == true && $_SESSION['logged_as'] == "jury") {
  echo '<script>window.location.href="admin.php";</script>';
}


$teamName = $_SESSION['teamName'];
$member1 = $_SESSION['member1'];
$member2 = $_SESSION['member2'];
$class = $_SESSION['class'];
$round = $_SESSION['round'];
$role = $_SESSION['role'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>KomByte :
    <?= $role ?>
  </title>
  <!-- fevicon -->
  <link rel="icon" href="../images/LogoKom.png" type="image/gif" />
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width" />
  <link href="https://fonts.googleapis.com/css?family=Pixelify+Sans:400,700&display=swap" rel="stylesheet">
  <link href="../css/page/comp.css" rel="stylesheet">
  <script src="../js/page/timer.js"></script>

  <?php
  if ($round == "qr1") { ?>
    <script src="../js/page/timerQr1.js"></script>
    <?php
  } else { ?>
    <script src="../js/page/timerQr2.js"></script>
    <?php
  }
  ?>
</head>

<body>
  <section class="dash">
    <div class="container" id="timerduh">
      <div class="timer">
        <div style="display: flex; width:80%;
                justify-content:center; padding-top: 0%;">
          ::Time Left ::
        </div>
        <div style="display: flex; width:80%; 
                justify-content:center; padding-top: 0%;">
          <font size="5">
            <p>Minute :</p>
          </font>
          <input id="minutes" type="text" style="width: 8%; border: none; font-size: 20px;
                      font-weight: bold; color: black;" readonly>
          <font size="5">
            <p>Second :</p>
          </font>
          <input id="seconds" type="text" style="width: 8%; border: none; font-size: 20px;
                      font-weight: bold; color: black;" readonly>
        </div>
      </div>
    </div>

    <div class="container bio">
      <div class="card">
        <div class="card__data">
          <div class="card__right">
            <div class="item">
              <p>Team Name</p>
            </div>
            <div class="item">
              <p>Member 1</p>
            </div>
            <div class="item">
              <p>Member 2</p>
            </div>
            <div class="item">
              <p>Class</p>
            </div>
          </div>
          <div class="card__left">
            <div class="item">
              <p>
                <?= $teamName ?>
              </p>
            </div>
            <div class="item">
              <p>
                <?= $member1 ?>
              </p>
            </div>
            <div class="item">
              <p>
                <?= $member2 ?>
              </p>
            </div>
            <div class="item">
              <p>
                <?= $class ?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="container" id="submisi">
      <form action="../controller/controller.php" method="post" enctype="multipart/form-data" id="myForm">
        <div class="file-drop-area">
          <span class="fake-btn">Choose files</span>
          <span class="file-msg">or drop files here</span>
          <input class="file-input" type="file" name="file" multiple>
          <div class="item-delete"></div>
          <input id="status-input" type="text" name="status" value="On Time">
        </div>
        <div class="submit trans">
          <button class="button-start" type="submit" name="submit" id="submit-button" onclick="deleteTimerkombyte()"> ::
            SUBMIT ::
            <div class="star-1">
              <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" version="1.1"
                style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                viewBox="0 0 784.11 815.53" xmlns:xlink="http://www.w3.org/1999/xlink">
                <defs></defs>
                <g id="Layer_x0020_1">
                  <metadata id="CorelCorpID_0Corel-Layer"></metadata>
                  <path class="fil0"
                    d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z">
                  </path>
                </g>
              </svg>
            </div>
            <div class="star-2">
              <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" version="1.1"
                style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                viewBox="0 0 784.11 815.53" xmlns:xlink="http://www.w3.org/1999/xlink">
                <defs></defs>
                <g id="Layer_x0020_1">
                  <metadata id="CorelCorpID_0Corel-Layer"></metadata>
                  <path class="fil0"
                    d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z">
                  </path>
                </g>
              </svg>
            </div>
            <div class="star-3">
              <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" version="1.1"
                style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                viewBox="0 0 784.11 815.53" xmlns:xlink="http://www.w3.org/1999/xlink">
                <defs></defs>
                <g id="Layer_x0020_1">
                  <metadata id="CorelCorpID_0Corel-Layer"></metadata>
                  <path class="fil0"
                    d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z">
                  </path>
                </g>
              </svg>
            </div>
            <div class="star-4">
              <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" version="1.1"
                style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                viewBox="0 0 784.11 815.53" xmlns:xlink="http://www.w3.org/1999/xlink">
                <defs></defs>
                <g id="Layer_x0020_1">
                  <metadata id="CorelCorpID_0Corel-Layer"></metadata>
                  <path class="fil0"
                    d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z">
                  </path>
                </g>
              </svg>
            </div>
            <div class="star-5">
              <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" version="1.1"
                style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                viewBox="0 0 784.11 815.53" xmlns:xlink="http://www.w3.org/1999/xlink">
                <defs></defs>
                <g id="Layer_x0020_1">
                  <metadata id="CorelCorpID_0Corel-Layer"></metadata>
                  <path class="fil0"
                    d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z">
                  </path>
                </g>
              </svg>
            </div>
            <div class="star-6">
              <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" version="1.1"
                style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                viewBox="0 0 784.11 815.53" xmlns:xlink="http://www.w3.org/1999/xlink">
                <defs></defs>
                <g id="Layer_x0020_1">
                  <metadata id="CorelCorpID_0Corel-Layer"></metadata>
                  <path class="fil0"
                    d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z">
                  </path>
                </g>
              </svg>
            </div>
          </button>
        </div>
      </form>
    </div>

    <div class="container" id="start">
      <div class="start-btn">
        <button class="button-start" onclick="countdown()">
          :: Let's KomByte! ::
          <div class="star-1">
            <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" version="1.1"
              style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
              viewBox="0 0 784.11 815.53" xmlns:xlink="http://www.w3.org/1999/xlink">
              <defs></defs>
              <g id="Layer_x0020_1">
                <metadata id="CorelCorpID_0Corel-Layer"></metadata>
                <path class="fil0"
                  d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z">
                </path>
              </g>
            </svg>
          </div>
          <div class="star-2">
            <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" version="1.1"
              style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
              viewBox="0 0 784.11 815.53" xmlns:xlink="http://www.w3.org/1999/xlink">
              <defs></defs>
              <g id="Layer_x0020_1">
                <metadata id="CorelCorpID_0Corel-Layer"></metadata>
                <path class="fil0"
                  d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z">
                </path>
              </g>
            </svg>
          </div>
          <div class="star-3">
            <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" version="1.1"
              style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
              viewBox="0 0 784.11 815.53" xmlns:xlink="http://www.w3.org/1999/xlink">
              <defs></defs>
              <g id="Layer_x0020_1">
                <metadata id="CorelCorpID_0Corel-Layer"></metadata>
                <path class="fil0"
                  d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z">
                </path>
              </g>
            </svg>
          </div>
          <div class="star-4">
            <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" version="1.1"
              style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
              viewBox="0 0 784.11 815.53" xmlns:xlink="http://www.w3.org/1999/xlink">
              <defs></defs>
              <g id="Layer_x0020_1">
                <metadata id="CorelCorpID_0Corel-Layer"></metadata>
                <path class="fil0"
                  d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z">
                </path>
              </g>
            </svg>
          </div>
          <div class="star-5">
            <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" version="1.1"
              style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
              viewBox="0 0 784.11 815.53" xmlns:xlink="http://www.w3.org/1999/xlink">
              <defs></defs>
              <g id="Layer_x0020_1">
                <metadata id="CorelCorpID_0Corel-Layer"></metadata>
                <path class="fil0"
                  d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z">
                </path>
              </g>
            </svg>
          </div>
          <div class="star-6">
            <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" version="1.1"
              style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
              viewBox="0 0 784.11 815.53" xmlns:xlink="http://www.w3.org/1999/xlink">
              <defs></defs>
              <g id="Layer_x0020_1">
                <metadata id="CorelCorpID_0Corel-Layer"></metadata>
                <path class="fil0"
                  d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z">
                </path>
              </g>
            </svg>
          </div>
        </button>

      </div>
    </div>
  </section>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="../js/page/comp.js"></script>

</body>

</html>