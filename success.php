<?php

require("includes/common.php");
if (!isset($_SESSION['email'])) {
    echo "<script>window.location.href='index.php'</script>";
}
$user_id = $_SESSION['user_id'];
$item_ids_string = $_GET['itemsid'];

//We will change the status of the items purchased by the user to 'Confirmed'
$query = "UPDATE user_item SET status=2 WHERE user_id=" . $user_id . " AND item_id IN (" . $item_ids_string . ") and status= 1 ";
mysqli_query($con, $query) or die($mysqli_error($con));
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width = device-width, initial-scale = 1">
        <title>Success | Life Style Store</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <?php include 'includes/header.php'; ?>

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