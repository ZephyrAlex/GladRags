<?php
session_start();
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="Assets/css/form.css">
</head>
<body>
    <?php
    $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    if (strpos($url, 'error=empty') !== false){
         echo "Fyll i alla felt";
     }
    elseif (strpos($url, 'error=user') !== false){
         echo "användarnamnet finns redan";
     }
    
    echo "<br>";
    
    
    if(isset($_SESSION['ID'])){
        echo $_SESSION['ID'];
    } else{
        echo "du  är inte inloggad";
    }
    ?>
        <a href="index.php">har du redan en sidan klicka här.</a>
   <br><br><br>
   
   
   
    
    <form action="Assets/include/signup.inc.php" method="POST">
        <input type="text" name="Fnamn" placeholder="Förnamn"><br>
        <input type="text" name="Enamn" placeholder="Efternamn"><br>
        <input type="eemail" name="Epost" placeholder="E-post"><br>
        <input type="text" name="AdminID" placeholder="Användarnamn"><br>
        <input type="password" name="pwd" placeholder="Lösenord"><br>
        <button type="submit">SIGN UP</button>
    </form>
    <br><br><br>
    <form action="Assets/include/signout.inc.php">
        <button>LOG OUT</button>
    </form>
    
</body>
</html>  