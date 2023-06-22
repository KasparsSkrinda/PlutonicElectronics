<?php
//Uzsāk jaunu vai atsāk esošo sesiju
session_start();
//Pārbaude vai lietotājs ir pieslēdzies, ja nav aizved lietotāju uz pieslēgšanās formu.
if (!isset($_SESSION['email'])) {
    header('location: login.php',  true,  301 );  exit;
}
//iznīcina visus sesijā reģistrētos datus
session_destroy();
header('location: index.php',  true,  301 );  exit;
?>