<?php
session_start();
// Step 1: Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wordlepinoy";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Retrieve the user's score based on their username
$user_username = $_SESSION['username']; // This is the username of the user you want to retrieve the score for
$sql = "SELECT score FROM userlogs WHERE username = '$user_username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $user_score = $row["score"];
    }
}

$conn->close();


// Connect to your MariaDB database
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

// Retrieve data from AJAX request
$userId = $_SESSION['user_id'];
$newScore = $_POST['newScore']+$user_score;

// Update score in the database
$sql = "UPDATE userlogs SET score = $newScore WHERE user_id = $userId";

if ($conn->query($sql) === TRUE) {
    echo "Score updated successfully";
} else {
    echo "Error updating score: " . $conn->error;
}

$conn->close();
?>