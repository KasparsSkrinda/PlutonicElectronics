<?php
$con = mysqli_connect("fdb1034.awardspace.net", "3931073_kaspars", "Kaspars1738", "3931073_kaspars")or die($mysqli_error($con));
if(session_status() == PHP_SESSION_NONE){
    session_start();
}