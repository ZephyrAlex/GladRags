<?php
    //Include connection file
    include_once '../connect.php';

    //Create connection
     $connection = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    //Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    } 

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    $user_check = $_SESSION['username'];

    $ses_sql = mysqli_query($connection, "SELECT username FROM users WHERE username = '$user_check' ");

    $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

    $login_user = $row['username'];

    if(isset($user_check) != true) {
        header("location: logout.php");
    }

?>