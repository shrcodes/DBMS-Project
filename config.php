<?php 
    session_start();

    define('SITEURL', 'http://localhost/stationery/');
    
    $conn = mysqli_connect('localhost','root', '') or die(mysqli_error()); //Database Connection
    $db_select = mysqli_select_db($conn, 'stationery') or die(mysqli_error()); //Selecting Database
?>