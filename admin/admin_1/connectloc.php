<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "glad_rags";

    //skapar anslutning
    $conn = new mysqli($servername, $username, $password, $dbname);

    //kollar kopplingen
    if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

?> 