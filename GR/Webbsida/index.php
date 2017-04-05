<?php
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Gladrags </title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/navigation.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/ninja-slider.css">
    <link rel="stylesheet" href="assets/css/media_queries.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/resp.css" media="screen and (max-width: 1300px)">
    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/ninja-slider.js"></script>
    <script type="text/javascript" src="assets/js/menu_toggle.js"></script>
    <script type="text/javascript" src="assets/js/menu.js"></script>
    <!-- fav icon -->
    <link rel="shortcut icon" href="bilder/favicon.png" /> </head>

<body>
    <!-- Wrapper runt headern -->
    <div id="top">
        <!-- header med Glad Rags logo -->
        <div id="header">
            <!-- Länk på Gladrags logo till Startsida och GladRags Logo -->
            <a href="index.php"><img class="logga" src="bilder/logotyp.jpg"></a>
        </div>
        <!-- meny -->
        <nav>
            <div id="box2"> 
                <img class="fb1" src="bilder/ikoner/facebook_icon.png" style="cursor:pointer;" a href="https://www.facebook.com/GLADRAGS2/" target="_blank"> 
                <img class="instagram1" src="bilder/ikoner/instagram_icon.png" style="cursor:pointer;"> 
                <img class="twitter1" src="bilder/ikoner/twitter_icon.png" style="cursor:pointer;"> 
            </div>
            <div id="mobile_menu">
                <!--  Knapp för visning av meny i sutfplatta och mobilvy -->
                <button><i class="fa fa-bars fa-2x" aria-hidden="true"></i></button> <span> MENY </span>
                <!--  Knapp slutar -->
            </div>
            <ul id="menu_ul">
                <li><a href="index.php"> STARTSIDA </a></li>
                <li><a href="varumarken.php"> VARUMÄRKEN </a></li>
                <li><a href="om_oss.html"> OM OSS </a></li>
                <li><a href="anstallda.php"> ANSTÄLLDA </a></li>
                <li><a href="kontakt.html"> KONTAKT </a></li>
            </ul>
        </nav>
        <!-- meny slutar -->
        <div id="box1"> 
            <img class="fb2" src="bilder/ikoner/facebook_icon.png" style="cursor:pointer;" a href="https://www.facebook.com/GLADRAGS2/" target="_blank">
            <a href="https://www.facebook.com/GLADRAGS2/" target="_blank"></a> 
            <img class="instagram2" src="bilder/ikoner/instagram_icon.png" style="cursor:pointer;"> 
            <img class="twitter2" src="bilder/ikoner/twitter_icon.png" style="cursor:pointer;"> 
        </div>
    </div>
    <!-- Headerwrapper slutar -->
    <!-- Body innehåll-->
    <div id="main">
        <div id="content">
            <!-- Text och bilder -->
            <div class="text">
                <!--Image slider start-->
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
                <!--Image slider slutar-->
                <h2> Välkommen! </h2>
                    <p> Den 3 augusti, 2012 öppnade Gladrags, efter att Birgitta under en period varit kontakt med ett stort antal leverantörer och representatner för kända klädmärken. Ett viktigt jobb för att hitta den rätta mixen för sina kunder. </p>
                    <br>
                    <p> Idag är Gladrags en butik som är känd och etablerad där Birgitta med personal står för en välkomnande miljö och en gedigen kunskap om kläder, mode, stil och de nyaste trenderna. </p>
                    <div id="offers">
                        <br>
                        <h2> Veckans Erbjudanden! </h2> 
                    </div>
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
                    <br>
                    <br>
                    <h2 class="fb-feed"> Kolla in våra nyheter på facebook! </h2>
                    <br>
                    <div align="center">
                        <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FGLADRAGS2%2F&tabs=timeline&width=500&height=500&small_header=true&adapt_container_width=true&hide_cover=true&show_facepile=true&appId=1283787944997931" width="500" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>        
                    </div>
                    <br> </div>
        </div>
    </div>
    <!-- Body innehåll slutar -->
    <!-- Footer börjar -->
    <div id="footer">
        <!-- Wrapper i Footern, Skapar position för texten -->
        <div id="wrapper">
            <div id="left">
                <div id="hitta">
                    <h1> Hitta </h1>
                    <p> Köpmangatan 14 </p>
                    <p> 641 30 Katrineholm </p>
                    <a href="kontakt.html#map">
                        <p> Google Maps </p>
                    </a>
                </div>
            </div>
            <div id="center">
                <div id="kontakt">
                    <h1> Kontakt  </h1>
                    <p> Telefon: 0150-533 80 </p> <a href="mailto:info@gladrags.se"> Mail: info@gladrags.se </a> </div>
            </div>
            <div id="right">
                <div id="footer_menu"> <a href="index.php"><h1> Gladrags  </h1></a> <a href="varumarken.php"> Varumärken </a> <a href="om_oss.html"> Om oss </a> <a href="anstallda.php"> Anställda </a> <a href="kontakt.html"> Kontakt </a> </div>
            </div>
        </div>
        <!-- Wrapper slutar -->
        <!-- Copyright sektionen -->
        <div id="copyright">
            <a href="index.php" class="copyright">
                <p> © Gladrags, 2015 </p>
            </a>
        </div>
        <!-- Copyright sektionen slutar -->
    </div>
    <!-- Footer slutar -->
    <!-- Tillbaka till toppen knapp -->
    <script type="text/javascript">
        // create the back to top button
        $('body').prepend('<a href="#" class="back-to-top">Back to Top</a>');
        var amountScrolled = 300;
        $(window).scroll(function () {
            if ($(window).scrollTop() > amountScrolled) {
                $('a.back-to-top').fadeIn('slow');
            }
            else {
                $('a.back-to-top').fadeOut('slow');
            }
        });
        $('a.back-to-top, a.simple-back-to-top').click(function () {
            $('html, body').animate({
                scrollTop: 0
            }, 700);
            return false;
        });
    </script>
    <!-- Tillbaka till toppen knapp slutar -->
</body>
</html>