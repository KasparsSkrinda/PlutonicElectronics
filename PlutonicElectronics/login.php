<?php
//Pieslēgšanās datu bāzei, kā arī sesijas izveide
require("includes/common.php");
// Pārvieto lietotāju uz produktu mājaslapu, ja lietotājs ir pieslēdzies
if (isset($_SESSION['email'])) {
    header('location: products.php');
    
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <!--Sniedz norādījumus pārlūkprogrammai, kā kontrolēt lapas izmērus un mērogošanu-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--Produktu lapas nosaukums-->
        <title>Login | PlutonicElectronics</title>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/style.css" rel="stylesheet">
        <!-- jQuery -->
        <script src="js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </head>

    <body>
        <?php include 'includes/header.php'; ?>
        <div id="content">
            <div class="container-fluid decor_bg" id="login-panel">
                <div class="col-lg-4 col-md-6">
                </div>
                <div class="row">
                    <div class="col-lg-4 col-lg-offset-3 col-md-4">
                        <div class="panel panel-primary" >
                            <div class="panel-heading">
                            <!-- Pieslēgšanās ievadformas -->
                                <h4>LOGIN</h4>
                            </div>
                            <div class="panel-body">
                                <p class="text-warning"><i>Login to make a purchase</i><p>
                                <form action="login_submit.php" method="POST">
                                    <div class="form-group">
                                        <input type="email" class="form-control"  placeholder="Email" autofocus="on" name="e-mail" required = "true">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password" name="password" required = "true">
                                    </div>
                                    
                                    <button type="submit" name="submit" class="btn btn-primary">Login</button><br><br>
                                    <!-- Pārbaude vai ir kļūda, un ja ir kļuda, tad izvada to.-->
                                    <?php if(isset($_GET['error'])) echo $_GET['error']; ?>
                                </form><br/>
                            </div>
                            <!-- Ja nav izveidots konts, lietotājam piedāva izveidot tādu. -->
                            <div class="panel-footer"><p>Don't have an account? <a href="signup.php">Register</a></p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>