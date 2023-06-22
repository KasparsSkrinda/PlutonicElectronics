<?php
require("includes/common.php");
  // Iegūst ievadītos datus no lietotāja no signup.php
  $name = $_POST['name'];
  $name = mysqli_real_escape_string($con, $name);

  $email = $_POST['e-mail'];
  $email = mysqli_real_escape_string($con, $email);
//Paroles šifrēšana
  $password = $_POST['password'];
  $password = mysqli_real_escape_string($con, $password);
  $password = MD5($password);

  $regex_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
  $regex_num = "/^[789][0-9]{9}$/";
//Šī ir pārbaude vai jau lietotāja ievadītais e-pasts jau eksistē, vai nē.
  $query = "SELECT * FROM users WHERE email='$email'";
  $result = mysqli_query($con, $query)or die($mysqli_error($con));
  $num = mysqli_num_rows($result);
  //Pārbaude vai ievadītie dati jau eksistē
  if ($num != 0) {
    $m = "<span class='red'>Email Already Exists</span>"; 
    header('location: signup.php?m1=' . $m);
  } else if (!preg_match($regex_email, $email)) {
    $m = "<span class='red'>Not a valid Email Id</span>";
    header('location: signup.php?m1=' . $m);
  } else {
  //Ja ievadītie dati neeksistē jau datu bāze, tos saglabā un ievada datu bāzē.
    header('location: login.php');
    $query = "INSERT INTO users(name, email, password)VALUES('" . $name . "','" . $email . "','" . $password . "')";
    mysqli_query($con, $query) or die(mysqli_error($con));
    $user_id = mysqli_insert_id($con);
    //Izveido lietotāja jaunu sesiju
    $_SESSION['email'] = $email;
    $_SESSION['user_id'] = $user_id;
   }