<?php
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wordlepinoy";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    $sql = "SELECT user_id, username, password, email FROM userlogs WHERE username = '$username'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $test = $row['password'];

        if ($password = $row['password']) {
            $_SESSION['username'] = $row['username'];

require 'phpmailer/src/Exception.php'; 
require 'phpmailer/src/PHPMailer.php'; 
require 'phpmailer/src/SMTP.php';

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'neilysystems@gmail.com';
$mail->Password = 'zpwdatajeobxhsvy';

$mail->SMTPSecure = 'ssl'; 
$mail->Port = 465;

$mail->setFrom('neilysystems@gmail.com');
$mail->addAddress($row['email']);
$mail->isHTML(true);
$mail->Subject = "bananana"; 
$date = new DateTime();
$date = $date->format('Y-m-d H:i:s');
$mail->Body = "You have login at $date";

$mail->send();






            header("Location: index4.php");
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that username.";
    }
}

$conn->close();
?>
