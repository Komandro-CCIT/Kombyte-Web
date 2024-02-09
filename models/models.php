<?php
session_start();
require_once '../core/db.php';
class models
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function login()
    {
        $teamName = $_POST['teamName'];
        $token = $_POST['token'];

        $stmt = $this->conn->prepare("SELECT * FROM tb_teams WHERE team_name = ?");
        $stmt->execute([$teamName]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            if ($token === $user['token']) {
                session_start();
                $_SESSION['logged_in'] = true;
                $_SESSION['teamId'] = $user['team_id'];
                $_SESSION['teamName'] = $user['team_name'];
                $_SESSION['member1'] = $user['member1'];
                $_SESSION['member2'] = $user['member2'];
                $_SESSION['class'] = $user['class'];
                header("Location: ../pages/comp.php");
            } else {
                echo '<script>alert("Your password is incorect");';
                echo 'window.location.href="../";</script>';
            }
        } else {
            echo '<script>alert("Your username is incorrect");';
            echo 'window.location.href="../";</script>';
        }
    }

    public function submit()
    {
        // File details
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileType = $_FILES['file']['type'];
        $teamId = $_SESSION['teamId'];

        // Read file data
        $fileData = file_get_contents($fileTmpName);

        // Prepare SQL query to insert file into database
        $sql = "INSERT INTO tb_submit (team_id, filename, filetype, filesize, filedata) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);

        // Execute query
        if ($stmt->execute([$teamId, $fileName, $fileType, $fileSize, $fileData])) {
            echo "File uploaded successfully.";
        } else {
            echo "Error uploading file: " . $this->conn->error;
        }
    }

}
