<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('location: login.php',  true,  301 );  exit;
}
session_destroy();
header('location: index.php',  true,  301 );  exit;
?>