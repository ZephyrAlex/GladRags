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
    
    //Slider
    $sql = "SELECT * FROM slider ORDER BY slider_id DESC LIMIT 1";
    $result1 = $connection->query($sql);
    $result2 = $connection->query($sql);
    $result3 = $connection->query($sql);
    $result4 = $connection->query($sql);
    
    //Offers
    $sql2 = "SELECT * FROM offers ORDER BY offers_id DESC LIMIT 1";
    $result5 = $connection->query($sql2);
    $result6 = $connection->query($sql2);
    $result7 = $connection->query($sql2);
    
    //Prices
    $result8 = $connection->query($sql2);
    $result9 = $connection->query($sql2);
    $result10 = $connection->query($sql2);
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
    <link rel="stylesheet" type="text/css" href="css/offers.css?<?php echo time(); ?>">
    
    <link rel="stylesheet" type="text/css" href="../webbsida/assets/css/ninja-slider.css?<?php echo time(); ?>">
    
    <!-- JS -->
    <script type="text/javascript" src="../webbsida/assets/js/ninja-slider.js?<?php echo time(); ?>"></script>
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
                <p id="user"> Inloggad som: <?php echo $login_user;?></p>
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
        <!-- Slider images -->
        <div id="slider_images">
            <!-- Slider form -->
            <form action="slider.php" method="post" enctype="multipart/form-data">
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
                <!--Image slider start -->
                <div id="ninja-slider">
                    <div class="slider-inner">
                        <ul>
                            <li>
                                <a class="ns-img" href="<?php while($row=mysqli_fetch_array( $result1 )){echo $row['img1'];}?>"></a>
                                <div class="caption"></div>
                            </li>
                            <li>
                                <a class="ns-img" href="<?php while($row=mysqli_fetch_array( $result2 )){echo $row['img2'];}?>"></a>
                                <div class="caption"></div>
                                <div class="caption cap1">NYA ERBJUDANDEN</div>
                                <div class="caption cap1 cap2">VARJE VECKA!</div>
                                <div class="caption"></div>
                            </li>
                            <li>
                                <a href="/"><img class="ns-img" src="<?php while($row=mysqli_fetch_array( $result3 )){echo $row['img3'];}?>" style="cursor:pointer;" /></a>
                                <div class="caption"></div>
                            </li>
                            <li>
                                <a class="ns-img" href="<?php while($row=mysqli_fetch_array( $result4 )){echo $row['img4'];}?>"></a>
                                <div class="caption cap1">BESÖK</div>
                                <div class="caption cap1 cap2">VÅR FACEBOOK-SIDA!</div>
                                <div class="caption"></div>
                            </li>
                        </ul>
                        <div class="fs-icon" title="Förstora/Stäng"></div>
                    </div>
                </div>
                <!--Image slider end -->      
                <!-- Delete button -->
                <input id="button" style="float:right;position:relative;right:10px;" type="submit" name="del_slider" value="Ta bort">
                <br>
            </form>
            <!-- Slider form end -->
        </div>
        <!-- Slider images end -->
        <!-- Offer -->
        <div id="offers">
            <!-- Offer form -->
            <form action="offers.php" method="post" enctype="multipart/form-data">
                <!-- Edit -->
                <div class="edit">
                    <h2> Lägg till erbjudanden </h2>
                    
                    <!-- File buttons -->
                    <p> Erbjudande 1 </p>
                    <input id="file" type="file" name="offer1" id="offer1" />
                    <p> Pris </p>
                    <input type="text" name="price1" id="price1">
                    <br>
                    <br>
                    <p> Erbjudande 2 </p>
                    <input id="file" type="file" name="offer2" id="offer2" />
                    <p> Pris </p>
                    <input type="text" name="price2" id="price2">
                    <br>
                    <br>
                    <p> Erbjudande 3 </p>
                    <input id="file" type="file" name="offer3" id="offer3" />
                    <p> Pris </p>
                    <input type="text" name="price3" id="price3">
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
                <h2> Erbjudanden </h2>
                
                <!-- Offer images -->
                <div class="body-content1">
                    <div class="section-inner">
                        <div class="thirds clearfix">
                            
                            <!-- one-third -->
                            <div class="one-third mobile-collapse">
                                <div class="capp" alt="price1" title="price1">
                                    <?php while($row=mysqli_fetch_array( $result8 )){echo $row['price1'];}?>:- 
                                </div>
                                <img id="imgn" src="<?php while($row=mysqli_fetch_array( $result5 )){echo $row['offer1'];}?>" alt="Erjudande 1" title="Erjudande 1" />
                            </div>

                            <!-- one-third -->
                            <div class="one-third one-third-second mobile-collapse">
                                <div class="capp" alt="price2" title="price2">
                                    <?php while($row=mysqli_fetch_array( $result9 )){echo $row['price2'];}?>:- 
                                </div>
                                <img id="imgn" src="<?php while($row=mysqli_fetch_array( $result6 )){echo $row['offer2'];}?>" alt="Erbjudande 2" title="Erbjudande 2" />
                            </div>

                            <!-- one-third -->
                            <div class="one-third one-third-last mobile-collapse">
                                <div class="capp" alt="price3" title="price3">
                                    <?php while($row=mysqli_fetch_array( $result10 )){echo $row['price3'];}?>:- 
                                </div>
                                <img id="imgn" src="<?php while($row=mysqli_fetch_array( $result7 )){echo $row['offer3'];}?>" alt="Erbjudande 3" title="Erbjudande 3" />
                            </div>
                        </div>

                        <!-- two-columns -->
                        <div class="two-columns clearfix">
                            <!-- main -->
                            <div class="main mobile-collapse"> </div>
                            <div class="side mobile-collapse"> </div>
                        </div>
                    </div>
                </div>
                <!-- Offer images end-->
                <!-- Delete button -->
                <input id="button" style="float:right;position:relative;right:10px;" type="submit" name="del_offers" value="Ta bort">
                <br>
            </form>
            <!-- Offer form end -->
        </div>
        <!-- Offer end -->        
    </div>
    <!-- Main end -->
</body>
</html>