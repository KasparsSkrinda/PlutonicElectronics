<?php
//Pieslēgšanās datu bāzei, kā arī sesijas izveide
require("includes/common.php");
if (!isset($_SESSION['email'])) {
    header('location: index.php');
}
?>
<!--Nosaka ka dokuments ir HTML-->
<!DOCTYPE html>
<html lang="en">
    <head>
    <!--Sniedz norādījumus pārlūkprogrammai, kā kontrolēt lapas izmērus un mērogošanu-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cart | PlutonicElectronics</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container-fluid" id="content">
            <?php include 'includes/header.php'; ?>
            <div class="col-lg-4 col-md-6 ">
                </div>
            <div class="row ">
                <div class="col-md-6">
                 <!-- Tabulas izveides sākums-->
                    <table class="table table-striped">
    
                        <!-- Pārāda tabulu tikai, tad, kad kaut viens produkts ir pievienots grozam-->
                        <?php
                        $sum = 0;$id='';
                        $user_id = $_SESSION['user_id'];
                        //Atlasa datus no datu bāzes
                        $query = "SELECT items.price AS Price, items.id As id, items.name AS Name FROM user_item JOIN items ON user_item.item_id = items.id WHERE user_item.user_id='$user_id' and `status`=1";
                        $result = mysqli_query($con, $query)or die($mysqli_error($con));
                        if (mysqli_num_rows($result) >= 1) {
                            ?>
                            <thead>
                                <tr>
                                    <th>Item Number</th>
                                    <th>Item Name</th>
                                    <th>Price</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //Cikls, kas tasiīs tabulu, līdz vairs nav datu ko atlasīt no datu bāzes
                                while ($row = mysqli_fetch_array($result)) {
                                    $sum+= $row["Price"];
                                    $id .= $row["id"] . ", ";
                                    echo "<tr><td>" . "#" . $row["id"] . "</td><td>" . $row["Name"] . "</td><td>€ " . $row["Price"] . "</td><td><a href='cart-remove.php?id={$row['id']}' class='remove_item_link'> Remove</a></td></tr>";
                                }
                                $id = rtrim($id, ", ");
                                echo "<tr><td></td><td>Total</td><td>€ " . $sum . "</td><td><a href='success.php?itemsid=" . $id . "' class='btn btn-primary'>Confirm Order</a></td></tr>";
                                ?>
                            </tbody>
                            <?php
                        } else {

                            echo "Cart is empty! Add items first";
                        }
                        ?>
                        
                        <?php
                        ?>
                    </table>
                    <!-- Tabulas izveides beigas-->
                </div>
            </div>
        </div>
    </body>
</html>