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
    
    //Offers
    $sql = "SELECT * FROM offers ORDER BY offer_id DESC LIMIT 1";
    $result1 = $connection->query($sql);
    $result2 = $connection->query($sql);
    $result3 = $connection->query($sql);
    $result4 = $connection->query($sql);
    
    //News
    $sql2 = "SELECT * FROM news ORDER BY news_id DESC LIMIT 1";
    $result5 = $connection->query($sql2);
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
        <!-- Offers -->
        <div id="offers">
            <!-- Offer form -->
            <form action="offers.php" method="post" enctype="multipart/form-data">
                <!-- Edit -->
                <div class="edit">
                    <h2> Lägg till bilder </h2>
                    
                    <!-- File buttons -->
                    <input id="file" type="file" name="fileToUpload1" id="fileToUpload1" />
                    <br>
                    <br>
                    <input id="file" type="file" name="fileToUpload2" id="fileToUpload2" />
                    <br>
                    <br>
                    <input id="file" type="file" name="fileToUpload3" id="fileToUpload3" />
                    <br>
                    <br>
                    <input id="file" type="file" name="fileToUpload4" id="fileToUpload4" />
                    <!-- File buttons end -->
                    
                    <br>
                    <br>
                    <br>
                    
                    <!-- Upload button -->
                    <input id="button" style="float:right;margin-right:65px;" type="submit" name="submit" value="Lägg till">
                
                    
                    <br>
                </div>
                <!-- Edit end -->
            
            <br>
            <br>
            <h2> Slider </h2>
            <!-- Image slider -->
            <div id='slider'>
                <div class="slider-inner">
                    <ul>
                        <li>
                            <a class="img" 
                                href="<?php while($row=mysqli_fetch_array( $result1 )){echo $row['img1'];}?>" 

                                data-fs-image="<?php while($row=mysqli_fetch_array( $result1 )){echo $row['img1'];}?>">
                            </a>
                        </li>
                        <li>
                            <span class="img" 
                                style="background-image:url(<?php while($row=mysqli_fetch_array( $result2 )){echo $row['img2'];}?>);" 

                               data-fs-image="<?php while($row=mysqli_fetch_array( $result2 )){echo $row['img2'];}?>">
                            </span>
                        </li>
                        <li>
                            <a href="/">
                                <img class="img" 
                                    src="<?php while($row=mysqli_fetch_array( $result3 )){echo $row['img3'];}?>" 

                                    data-fs-image="<?php while($row=mysqli_fetch_array( $result3 )){echo $row['img3'];}?>" 
                                /> 
                            </a>
                        </li>
                        <li>
                            <a class="img" 
                               href="<?php while($row=mysqli_fetch_array( $result4 )){echo $row['img4'];}?>" 

                               data-fs-image="<?php while($row=mysqli_fetch_array( $result4 )){echo $row['img4'];}?>"> 
                            </a>
                        </li>
                    </ul>
                    <!-- Expand picture icon -->
                    <div class="fs-icon" title="Expand/Close"></div>
                </div>
            </div>
            <!--Image slider end-->
            
            <!-- Delete button -->
                    <input id="button" style="float:right;position:relative;right:10px;" type="submit" name="del_offers" value="Ta bort">
            </form>
            <!-- Offer form end -->
            
            
        </div>
        <!-- Offers end -->
        
        <!-- News -->
        <div id="news">    
            <!-- News form -->
            <form action="news.php" method="post">
                <!-- Edit -->
                <div class="edit"> 
                    
                    <h2> Lägg till nyheter </h2>    
                    <!-- Textarea -->
                    <textarea cols="40" rows="6" name="news_insert" id="news_insert"></textarea>
                    
                    <br>
                    <br>
                    
                    <!-- Submit button -->
                    <input input id="button" style="float:right;margin-right:65px;" type="submit" name="submit_news" value="Lägg till">
                    <br>
                </div>
                <!-- Edit end -->
                <h2> Nyheter </h2>    
                <!-- News output -->
                <div id="news_output">
                    <p>
                        <?php
                             while($row=mysqli_fetch_array( $result5 )){
                                 echo $row['text'];
                             }
                        ?>
                    </p>
                </div>
                <!-- News output end -->
                <!-- Delete button -->
                <input id="button" style="float:right;position:relative;margin-right:10px;" type="submit" name="del_news" value="Ta bort">
            </form>
            <!-- News form end -->  
        </div>
        <!-- News end -->
    </div>
    <!-- Main end -->
</body>
</html>