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
                $_SESSION['logged_as'] = "user";
                $_SESSION['teamId'] = $user['team_id'];
                $_SESSION['teamName'] = $user['team_name'];
                $_SESSION['member1'] = $user['member1'];
                $_SESSION['member2'] = $user['member2'];
                $_SESSION['class'] = $user['class'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['round'] = $user['round'];
                header("Location: ../pages/comp.php");
            } else {
                echo '<script>alert("Your password is incorect");';
                echo 'window.location.href="../";</script>';
            }

        } else {
            $stmtJ = $this->conn->prepare("SELECT * FROM tb_juries WHERE jury_name = ?");
            $stmtJ->execute([$teamName]);

            $jury = $stmtJ->fetch(PDO::FETCH_ASSOC);

            if ($jury) {
                if ($token === $jury['token']) {
                    session_start();
                    $_SESSION['logged_in'] = true;
                    $_SESSION['logged_as'] = "jury";
                    $_SESSION['juryRole'] = $jury['role'];
                    header("Location: ../pages/admin.php");
                } else {
                    echo '<script>alert("Your password is incorect");';
                    echo 'window.location.href="../";</script>';
                }
            } else {
                echo '<script>alert("Your username is incorect");';
                echo 'window.location.href="../";</script>';
            }
        }
    }

    public function submit()
    {
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileType = $_FILES['file']['type'];
        $status = $_POST['status'];
        $teamId = $_SESSION['teamId'];

        $fileData = file_get_contents($fileTmpName);

        $sql = "INSERT INTO tb_submit (team_id, status, filename, filetype, filesize, filedata) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);

        if ($stmt->execute([$teamId, $status, $fileName, $fileType, $fileSize, $fileData])) {
            session_destroy();
            echo '<script>alert("File has been submitted. Thank you for joining KomByte 2024!");';
            echo 'window.location.href="../";</script>';
            exit;
        } else {
            echo "Error uploading file: " . $this->conn->error;
        }
    }

    public function downloadFile($submitId)
    {
        $submitId = (int) $submitId;

        $sql = "SELECT * FROM tb_submit WHERE submit_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$submitId]);

        $file = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($file) {
            $fileData = $file['filedata'];
            $fileName = $file['filename'];

            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . $fileName . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . strlen($fileData));

            echo $fileData;
            exit;
        } else {
            echo "File not found in the database.";
        }
    }

    public function uppering($teamId)
    {
        $stmt = $this->conn->prepare("UPDATE tb_teams SET round = ? WHERE team_id = ?");
        $stmt->execute(["qr2", $teamId]);

        echo '<script>alert("Updating successful!")</script>;';
        echo '<script>window.location.href="../pages/admin.php";</script>';
    }

    public function logout()
    {
        session_destroy();
        echo '<script>window.location.href="../";</script>';
        exit;
    }

}
