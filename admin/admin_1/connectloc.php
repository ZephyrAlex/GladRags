<?php

    $servername = "gladrags.se.mysql";
    $username = "gladrags_se";
    $password = "bRsTLk6T";
    $dbname = "gladrags_se";

    //skapar anslutning
    $conn = new mysqli($servername, $username, $password, $dbname);

    //kollar kopplingen
    if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

?> 