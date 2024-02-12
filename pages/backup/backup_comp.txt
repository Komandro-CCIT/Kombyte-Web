<?php
session_start();
include '../core/db.php';
$conn = getConnection();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
  echo '<script>window.location.href="../index.php";</script>';
  exit;
}

$teamName = $_SESSION['teamName'];
$member1 = $_SESSION['member1'];
$member2 = $_SESSION['member2'];
$class = $_SESSION['class'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>KomByte : Start!</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width" />
  <link href="https://fonts.googleapis.com/css?family=Pixelify+Sans:400,700&display=swap" rel="stylesheet">
  <link href="../css/page/comp.css" rel="stylesheet">
  <script src="../js/page/timer1.js"></script>
</head>

<body onload="countdown();">
  <section class="dash">
    <div class="container">
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
                      font-weight: bold; color: black;">
          <font size="5">
            <p>Second :</p>
          </font>
          <input id="seconds" type="text" style="width: 8%; border: none; font-size: 20px;
                      font-weight: bold; color: black;">
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


    <div class="container">
      <form action="../controller/controller.php" method="post" enctype="multipart/form-data" id="myForm">
        <div class="file-drop-area">
          <span class="fake-btn">Choose files</span>
          <span class="file-msg">or drop files here</span>
          <input class="file-input" type="file" name="file" multiple>
          <div class="item-delete"></div>
        </div>
        <button type="submit" name="submit" id="submit-button">submit</button>
      </form>
    </div>
  </section>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="../js/page/comp.js"></script>

</body>

</html>