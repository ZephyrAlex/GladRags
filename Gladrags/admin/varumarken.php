<?php
    include('session_exit.php');
    include('check.php');
    include_once '../connect.php';

    //Create connection
     $connection = new mysqli($servername, $dbusername, $dbpassword, $dbname);
 
    //Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    
    //Brands
    $sql = "SELECT name, brand_address, brand_img, brand_id FROM brands";
    $result = $connection->query($sql);
?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <title> Gladrags Admin </title>
        
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css?<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="css/navigation.css?<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="css/form.css?<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="css/brands.css?<?php echo time(); ?>">
    
    <link rel="stylesheet" type="text/css" href="../webbsida/css/slider.css?<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="../webbsida/css/brands.css?<?php echo time(); ?>">
    
    <!-- JS -->
    <script type="text/javascript" src="../webbsida/js/slider.js?<?php echo time(); ?>"></script>
</head>
<body>
    <!-- Top -->
    <div id="top">
        <!-- Header -->
        <div id="header">
            <a href="index.html"><img src="../webbsida/bilder/logotyp.jpg"></a>
        </div>
        <!-- Header end -->
        <!-- Menu -->
        <nav>
            <ul id="menu_ul">
                <li><a href="index.php"> STARTSIDA </a></li>
                <li><a href="varumarken.php"> VARUMÄRKEN </a></li>
                <li><a href="anstallda.php"> ANSTÄLLDA </a></li>
            </ul>
                <p id="user"> Logged in as: <?php echo $login_user;?></p>
            <!-- Logout form -->
            <form action="logout.php">
                <input type="submit" id="logoutbutton" value="Logga ut"/>
            </form>
            <!-- Logout form end -->
        </nav>
        <!-- Menu end -->
    </div>
    <!-- Top end -->
    
    <!-- Main -->
    <div id="main">
        <!-- Brands -->
        <div id="brands" style="padding-top:0;">
            <!-- Add brand form -->
            <form action="brands.php" method="post" enctype="multipart/form-data">
                <!-- Edit -->
                <div class="edit">
                    <h2> Lägg till varumärken </h2>
                    <p> Varumärke </p>
                    <input type="text" name="brand" id="brand">
                               
                    <p> Adress till varumärket </p>
                    <input type="text" name="brand_address" id="brand_address">
                    <br>
                    
                    <p> Bild </p>
                    <input id="file" type="file" name="brand_img" id="brand_img" />
                    <br>
                    <br>
                
                    <!-- Submit button -->
                    <input id="button" style="float:right;margin-right:65px;" type="submit" name="add_brand" value="Lägg till">
                    <br>
                </div>
                <!-- Edit end -->
                
                <h2> Varumärken </h2>
                <!-- Brands -->
                <div id="brands">
                    <?php
                        //Output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo 
                            '<div class="brand">
                            
                                <a href="' .$row['brand_address'] . '" target="_blank">
                                        
                                    <input type="checkbox" id="checked_id[]" name="checked_id[]" value="' .$row["brand_id"]. '"/>
                                        
                                    <img src="' .$row["brand_img"]. '">
                                        
                                    <h1 class="brand_popup">' .$row['name']. '</h1>
                                        
                                </a> 
                                
                            </div>';
                        }
                    ?>
                </div>
                <!-- Brands end -->
                
                <!-- Delete button -->
                <input id="button" type="submit" name="del_brand" value="Ta bort">                
            </form>
            <!-- Delete brand form end -->
        </div>
        <!-- Brands end -->
    </div>
    <!-- Main end -->
</body>
</html>