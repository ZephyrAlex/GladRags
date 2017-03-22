<?php
    session_start();
    include_once 'connect.php';

    //Skapar anslutning
     $connection = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    //Kollar anslutning
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    
    //Hämtar värden från formuläret i login.php
    $username = $_POST['username'];
    global $username;
    $password = $_POST['password'];
    
    //För att skydda mot mysql injection 
    $username = stripcslashes($username);
    $password = stripcslashes($password);
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);
    $password = md5($password);

    //Hämtar värden från databasen
    $result = mysqli_query($connection, "SELECT id FROM users WHERE username = '$username' AND password = '$password' ")
        or die("Failed to query database ".mysqli_error());
    
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   
    //Kollar om Inputen är tom
    if(empty($username) || empty($password)) {
        echo "You did not fill out the required fields";
    }
    
    //Kollar om uppgifterna stämmer
    else if (mysqli_num_rows($result) ==1) {
        //Startar session
        $_SESSION['username'] = $username;
        $_SESSION['last_action'] = time();
        //Skickas till admim-sidan
        header("location: admin/index.php");
    }
    
    //Om uppgifterna inte stämmer
    else {
        echo "Failed to login: Incorrect username or password";
    }
    
?>