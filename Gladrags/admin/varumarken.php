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
    <nav>
        <ul id="menu_ul">
            <li><a href="index.php"> STARTSIDA </a></li>
            <li><a href="varumarken.php"> VARUMÄRKEN </a></li>
            <li><a href="anstallda.php"> ANSTÄLLDA </a></li>
        </ul>
            <p id="user"> Logged in as: <?php echo $login_user;?></p>
        <form action="logout2.php">
            <input type="submit" id="logoutbutton" value="Logout"/>
        </form>
    </nav>
    <div id="main">
        <!-- Brands start -->
        <div id="brands">
            <!-- Edit start -->
            <div class="edit">
                <h2> Lägg till varumärken </h2>
                <!-- Add brand form start -->
                <form action="brands.php" method="post" enctype="multipart/form-data">
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
            
        
                    <!-- Delete button -->
                    <input id="button" style="float:right;position:relative;right:10px;" type="submit" name="del_brand" value="Ta bort">
                                        
                    <br>

                    <h2> Varumärken </h2>
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
                </form>
                <!-- Delete brand end -->
            </div>
            <!-- Edit end -->
        </div>
        <!-- Brands end --
    </div>
</body>
</html>