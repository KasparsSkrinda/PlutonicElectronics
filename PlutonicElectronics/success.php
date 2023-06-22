<?php
//Pieslēgšanās datu bāzei.
require("includes/common.php");
//pārbaude ja lietotājs nav pieslēdzies, tad to aizved uz sākumlapu
if (!isset($_SESSION['email'])) {
    header('location: index.php');
}
//Šī koda rinda nosaka user_id un sesijas mainīgo user_id vērtību
$user_id = $_SESSION['user_id'];
//Šī koda rinda deklarē itemsid, kas ir produkta attiecīgais statiskais identifikators
$item_ids_string = $_GET['itemsid'];

//Šis pārmainīs produkta statusu uz 'Confirmed', tad kad lietotājs būs to iegādājies. 
$query = "UPDATE user_item SET status=2 WHERE user_id=" . $user_id . " AND item_id IN (" . $item_ids_string . ") and status= 1 ";
mysqli_query($con, $query) or die($mysqli_error($con));
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width = device-width, initial-scale = 1">
        <title>Success | PlutonicElectronics</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
 <!-- Šis ir fails kuru izsauc, lai parādītos galvene tīmekļa vietnes augšā .-->
 <?php include 'includes/header.php'; ?>
 <!-- Lapas stils kā arī teksts kuru izvada pēc nopirkta produkta.-->
        <div class="container-fluid" id="content">
            <div class="col-md-12">
                <div class="col-lg-4 col-md-6 ">
                </div>
                <div class="jumbotron">
                      <h3 align="center">Thank you for shopping with us.</h3><hr>
                </div>
            </div>
        </div>
    </body>
</html>