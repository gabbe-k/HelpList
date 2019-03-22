<?php
session_start();

// Remove token and user data from the session
unset($_SESSION['idToken']);

echo $_SESSION['idToken'];

$_SESSION = [];
// Deletes session cookie and destroys the session (not just the session data)
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

session_destroy();
?>
