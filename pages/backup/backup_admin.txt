<?php

session_start();
include '../core/db.php';
$conn = getConnection();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    echo '<script>window.location.href="../index.php";</script>';
    exit;
}
if ($_SESSION['logged_in'] == true && $_SESSION['logged_as'] == "user") {
    echo '<script>window.location.href="comp.php";</script>';
}

$role = $_SESSION['juryRole'];
$i = 1;

if ($role == "Excel") {
    $excelQuery = "SELECT * FROM submission_details where role = 'Excel'";
    $results = $conn->query($excelQuery);
    $datas = $results->fetchAll();
} else {
    $dbQuery = "SELECT * FROM submission_details where role = 'Database'";
    $results = $conn->query($dbQuery);
    $datas = $results->fetchAll();
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>KomByte : Admin</title>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../css/page/admin.css" />
</head>

<body>
    <div class="container text-center text-white">
        <div class="row pt-3">
            <div class="col-lg-8 mx-auto">
                <h1 style="color: black">
                    <?= $role ?> Competition
                </h1>
                <input class="inputer" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search.."
                    title="Type in a value" />

                <select class="inputer" id="columnSelect" onchange="myFunction()">
                    <option value="0">All Columns</option>
                    <option value="1">By Group</option>
                    <option value="2">By Name</option>
                    <option value="3">By Class</option>
                    <option value="4">By Number</option>
                </select>
            </div>
        </div>
    </div>
    <!-- End -->

    <div class="container pt-3">
        <div class="row">
            <div class="col-lg-12 mx-auto bg-white rounded shadow" style="
            box-shadow: 10px 10px 40px #c5c5c5, -10px -10px 40px #ffffff !important;
          ">
                <!-- Fixed header table-->
                <div class="table-responsive">
                    <table class="table table-fixed">
                        <thead>
                            <tr>
                                <th scope="col" class="col-1">#</th>
                                <th scope="col" class="col-2">Group</th>
                                <th scope="col" class="col-3">Name</th>
                                <th scope="col" class="col-2">Class</th>
                                <th scope="col" class="col-2">Time</th>
                                <th scope="col" class="col-2">Download</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            <?php foreach ($datas as $data) { ?>

                                <tr class="tt <?= $data['status'] ?>">
                                    <th scope="row" class="col-1 group">
                                        <?= $i++ ?>
                                    </th>
                                    <td class="col-2 group">
                                        <?= $data['team_name'] ?>
                                    </td>
                                    <td class="col-3 name1">
                                        <div class="name2">
                                            <?= $data['member1'] ?>
                                        </div>
                                        <div class="name3">
                                            <?= $data['member2'] ?>
                                        </div>
                                    </td>
                                    <td class="col-2 group">
                                        <?= $data['class'] ?>
                                    </td>
                                    <td class="col-2 group">
                                        <?= $data['timestamp'] ?><br />
                                    </td>
                                    <td class="col-2 group"><a
                                            href="../controller/controller.php?submitId=<?= $data['submit_id'] ?>">Download</a>
                                    </td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- End -->
            </div>
        </div>
    </div>
    <script src="../js/page/admin.js"></script>
</body>

</html>