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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    
    // Hash the password
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $userid = time();
    $date = new DateTime();
    $date = $date->format('Y-m-d H:i:s');
    
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO userlogs (user_id, username, password, email, created_at, updated_at, latestlog_at) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $userid, $username, $password, $email, $date, $date, $date);
    
    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
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
$mail->addAddress($_POST["email"]);
$mail->isHTML(true);
$mail->Subject = "bananana"; 
$mail->Body = "You have signup using your email($email) with a userid($userid) at $date";

$mail->send();


    } else {
        if ($conn->errno == 1062) { // Duplicate entry
            echo "Error: The username or email is already in use.";
        } else {
            echo "Error: " . $stmt->error;
        }
    }
    
    $stmt->close();
}

$conn->close();
?>
