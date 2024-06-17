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

    $sql = "SELECT user_id, username, password, email, score FROM userlogs WHERE username = '$username'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $test = $row['password'];

        if ($password = $row['password']) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['score'] = $row['score'];
            

            $inputUsername = $_POST['username'];
            $inputPassword = $_POST['password'];
        
            if ($inputUsername == $username && $inputPassword == $password) {
                $_SESSION['loggedin'] = true;
                setcookie('loggedin', true, time() + (86400 * 30), "/"); // 86400 = 1 day

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
$mail->Subject = "You recently login"; 
$date = new DateTime();
$timezone = new DateTimeZone('+08:00');
$date->setTimezone($timezone);
$date = $date->format('Y-m-d H:i:s');
$mail->Body = "You have login at $date";

$mail->send();





            $error = "no error";
            header("Location: index5.php");
        } else {
            echo "Invalid password.";
        }
        } else {
            echo "No user found with that username.";

        }
        } else {
            echo "Invalid credentials.";

        }
}

$conn->close();
?>
<html>
<body>
   <script> 
        setTimeout(()=> {
        window.location.href = "index.php"
      }
      ,5000);
   </script>
</body>
</html>
