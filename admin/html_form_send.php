<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title> Gladrags </title>

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/navigation.css">
    <link rel="stylesheet" href="assets/css/contact.css">
    <link rel="stylesheet" href="assets/css/media_queries.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/menu_toggle.js"></script>
    <script type="text/javascript" src="assets/js/menu.js"></script>
    
    <!-- fav icon -->
    <link rel="shortcut icon" href="bilder/favicon.png" />

</head>

<body>
    <!-- Wrapper runt headern -->
    <div id="top">
        <!-- header med Glad Rags logo -->
        <div id="header">
            <!-- Länk på Gladrags logo till Startsida och GladRags Logo -->
            <a href="index.html"><img class="logga" src="bilder/GLADRAGS-logotyp.jpg"></a>
        </div>

        <!-- meny -->
        <nav>
 
        
            <div id="box2"> 

            <img class="ikon2" src="bilder/facebook-2.png" style="cursor:pointer;" a href="https://www.facebook.com/GLADRAGS2/" target="_blank" >
            <img class="ikon3" src="bilder/69366.png" style="cursor:pointer;">
            <img class="ikon1" src="bilder/twitter-icon-circle-logo.png" style="cursor:pointer;">
 
            </div> 
    
        <div id="mobile_menu">
            <!--  Knapp för visning av meny i sutfplatta och mobilvy -->
            <button><i class="fa fa-bars fa-2x" aria-hidden="true"></i></button>
            <span> MENY </span>
            <!--  Knapp slutar -->
        </div>

            <div id="mobile_menu">
                <!--  Knapp för visning av meny i sutfplatta och mobilvy -->
                <button><i class="fa fa-bars fa-2x" aria-hidden="true"></i></button>
                <span> MENY </span>
                <!--  Knapp slutar -->
            </div>
 
            <ul id="menu_ul">
                <li><a href="index.html"> STARTSIDA </a></li>
                <li><a href="varumarken.html"> VARUMÄRKEN </a></li>
                <li><a href="om_oss.html"> OM OSS </a></li>
                <li><a href="anstallda.html"> ANSTÄLLDA </a></li>
                <li><a href="kontakt.html"> KONTAKT </a></li>
            </ul>
        </nav>
        <!-- meny slutar -->
 
        
        
          <div id="box1" > 

            <img class="icon2" src="bilder/facebook-2.png" style="cursor:pointer;" a href="https://www.facebook.com/GLADRAGS2/" target="_blank" >
            <a href="https://www.facebook.com/GLADRAGS2/" target="_blank"></a>
            <img class="icon3" src="bilder/69366.png" style="cursor:pointer;">
            <img class="icon1" src="bilder/twitter-icon-circle-logo.png" style="cursor:pointer;">
 
            </div>
        <div class="validation">
<?php
    if(isset($_POST['email'])) {
     
        //Välj vart mejlet ska ta vägen, samt ämnet
        $email_to = "leoj.bergek@gmail.com";
     
        $email_subject = "Kundkontakt";
		
		function died($error) {
            //Detta är errormeddelandet
            echo "<div>Ajdå! Något gick snett. ";
            echo "Försök att rätta till dessa fel: .<br /><br />";
            echo $error."<br /><br />";
            echo "Klicka <a href=\"contact.php\">här</a> för att gå tillbaka. <br /><br /></div>";
            die();
        }
     
            
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['text'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
     
    $name = $_POST['name']; // Krav, kommer att valideras
    $email_from = $_POST['email']; // Krav, kommer att valideras
    $telephone = $_POST['telephone']; // Inget krav, kommer inte att valideras
    $comments = $_POST['text']; // Krav, kommer att valideras
     
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
    if(!preg_match($email_exp,$email_from)) {
        $error_message .= '<span style="color:red;text-align:center;">E-post adressen du angav verkar inte vara giltig.</span><br />';
    }
    $string_exp = "/^[A-Za-z .'-]+$/";
    if(!preg_match($string_exp,$name)) {
        $error_message .= '<span style="color:red;text-align:center;">Namnet du angav verkar inte vara giltigt.</span><br />';
    }
    if(strlen($comments) < 10) {
        $error_message .= '<span style="color:red;text-align:center;">Skriv en kommentar som innehåller åtminstone 10 tecken.</span><br />';
    }
    if(strlen($error_message) > 0) {
        died($error_message);
    }
    $email_message = "Meddelande:\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    $email_message .= "Namn: ".clean_string($name)."\n";
    $email_message .= "E-post: ".clean_string($email_from)."\n";
    $email_message .= "Telefon: ".clean_string($telephone)."\n\n";
    $email_message .= "Kommentar: ".clean_string($comments)."\n";
     
     
    // create email headers
    $headers = 'From: '.$email_from."\r\n".
    'Reply-To: '.$email_from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    mail($email_to, $email_subject, $email_message, $headers);  

}

//if "email" variable is filled out, send email
  if (isset($_REQUEST['email']))  {
  
    
  //Email response
  echo "Tack för din kontakt! Vi hör av oss via mail! <br><br>";
  echo "<a href='contact.php' target='_self'>Tillbaka till sidan</a>";
  }
  
  //if "email" variable is not filled out, display the form
  else  {
	  header('location: contact.php');
  }

die();
?>
        </div>
    </div>
    <!-- Wrappern slutar -->
</body>
</html>