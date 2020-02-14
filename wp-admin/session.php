<?PHP
if (!isset($_SESSION['login'])) { //belum login
    header("location:index.php");
    exit();
} else {
    $now = time(); // Checking the time now when home page starts.
    if ($now > $_SESSION['expire']) {
        session_destroy();
        header("location:index.php");
    }
}
require 'function.php';
