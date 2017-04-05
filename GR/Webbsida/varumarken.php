<?php
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Gladrags </title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/navigation.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/slider.css">
    <link rel="stylesheet" href="assets/css/brands.css">
    <link rel="stylesheet" href="assets/css/media_queries.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/slider.js"></script>
    <script type="text/javascript" src="assets/js/menu_toggle.js"></script>
    <script type="text/javascript" src="assets/js/menu.js"></script>
    <script type="text/javascript" src="assets/js/imagegrid.js"></script>
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
    <!-- Wrapper slutar -->
    <!-- Body innehåll-->
    <div id="main">
        <div id="content">
            <!-- Text och bilder -->
            <div class="text">
                <h1> Varumärken </h1> </div>
            <!-- Varumärken bilder -->
            <div id="brands">
                <?php
                    //Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo 
                        '<div class="brand">
                            
                            <a href="' .$row['brand_address'] . '" target="_blank">
                                              
                                <img src="' .$row["brand_img"]. '">
                                        
                                <h1 class="brand_popup">' .$row['name']. '</h1>
                                        
                            </a> 
                                
                        </div>';
                    }   
                ?>
            </div>
            <!-- Varumärken bilder slutar -->
        </div>
    </div>
    <!-- Bodyn slutar -->
    <!-- Footer börjar -->
    <div id="footer">
        <!-- Wrapper i Footern, Skapar position för texten -->
        <div id="wrapper">
            <div id="left">
                <div id="hitta">
                    <h1 title="Hitta"> Hitta </h1>
                    <p title="Köpmangatan 14"> Köpmangatan 14 </p>
                    <p title="641 30 Katrineholm"> 641 30 Katrineholm </p>
                    <a href="kontakt.html#map">
                        <p title="Google Maps"> Google Maps </p>
                    </a>
                </div>
            </div>
            <div id="center">
                <div id="kontakt">
                    <h1 title="Kontakt"> Kontakt </h1>
                    <p title="Telefon: 0150-533 80"> Telefon: 0150-533 80 </p> <a href="mailto:info@gladrags.se"> Mail: info@gladrags.se </a> </div>
            </div>
            <div id="right">
                <div id="footer_menu">
                    <a href="index.php">
                        <h1 title="Gladrags"> Gladrags </h1> </a> <a href="varumarken.php" title="Varumärken"> Varumärken </a> <a href="om_oss.html" title="Om oss"> Om oss </a> <a href="anstallda.php" title="Anställda"> Anställda </a> <a href="kontakt.html" title="Kontakt"> Kontakt </a></div>
            </div>
        </div>
        <!-- Wrapper slutar -->
        <!-- Copyright sektionen -->
        <div id="copyright">
            <a href="index.php" class="copyright">
                <p title="© Gladrags, 2015"> © Gladrags, 2015 </p>
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