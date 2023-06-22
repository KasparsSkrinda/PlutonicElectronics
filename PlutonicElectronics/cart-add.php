<?php
//Pieslēgšanās datu bāzei, kā arī sesijas izveide
require("includes/common.php");
//Pārbaude vai 'id' ir, un vai tas ir skaitlis.
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    //Deklarē mainīgo $item_id
    $item_id = $_GET['id'];
    //Deklarē mainīgo $user_id
    $user_id = $_SESSION['user_id'];
    //Ievada datus iekšā datu bāzē
    $query = "INSERT INTO `user_item`(`user_id`, `item_id`, `status`) VALUES($user_id, $item_id, 1)";
    mysqli_query($con, $query)  or die(mysqli_error($con));
    header('location: products.php');
}