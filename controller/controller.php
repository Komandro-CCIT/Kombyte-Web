<?php
require_once '../models/models.php';
require_once '../core/db.php';
$conn = getConnection();
$model = new models($conn);

if (isset($_POST['login'])) {
    $model->login();
}

if (isset($_POST['submit'])) {
    $model->submit();
}

if (isset($_GET['submitId'])) {
    $submitId = $_GET['submitId'];
    $model->downloadFile($submitId);
}

