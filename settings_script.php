<?php

// Šī faila funkcija ir nomainīt savam profilam paroli
require("includes/common.php");
if (!isset($_SESSION['email'])) {
    header('Location: /index.php');
}

$old_pass = $_POST['old-password'];
$old_pass = mysqli_real_escape_string($con, $old_pass);
$old_pass = MD5($old_pass);

$new_pass = $_POST['password'];
$new_pass = mysqli_real_escape_string($con, $new_pass);
$new_pass = MD5($new_pass);

$new_pass1 = $_POST['password1'];
$new_pass1 = mysqli_real_escape_string($con, $new_pass1);
$new_pass1 = MD5($new_pass1);

$query = "SELECT email, password FROM users WHERE email ='" . $_SESSION['email'] . "'";
$result = mysqli_query($con, $query)or die($mysqli_error($con));
$row = mysqli_fetch_array($result);
$orig_pass = $row['password'];
//Pārbaude lietotāja ievadītās paroles sakrīt
if ($new_pass != $new_pass1) {
	$error = "<span class='red'>The two passwords don't match</span>";
    header('Location: /settings.php?error= ' . $error);
} else {
    if ($old_pass == $orig_pass) {
        $query = "UPDATE  users SET password = '" . $new_pass . "' WHERE email = '" . $_SESSION['email'] . "'";
        mysqli_query($con, $query) or die($mysqli_error($con));
        $error = "<span class='red'>Password Updated</span>";
        header('Location: /settings.php?error= ' . $error);
    //Pārbaude vai sakrīt ar jau eksistējošo paroli
    } else{
    	$error = "<span class='red'>Wrong Old Password</span>";
        header('Location: /settings.php?error= ' . $error);
    }
}
?>