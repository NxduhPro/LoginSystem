<?php
// logout.php
session_start();

// Unset all of the session variables.
$_SESSION = array();

// If you want to destroy the session as well, use session_destroy().
session_destroy();

// Also delete the session cookie.
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
}

// Delete the loggedin cookie by setting its expiration time to a past time.
setcookie('loggedin', '', time() - 3600, "/");

// Redirect to the login page or any other page.
header('Location: index.php');
exit;
?>