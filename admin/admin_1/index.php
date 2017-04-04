<?php
session_start();
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="Assets/css/form.css">
    <link rel="stylesheet" href="Assets/css/style.css">
</head>
<body> 
       <div id="logga">
           <img id="imglogga" src="Assets/img/GLADRAGS-logotyp.jpg" alt="logga">
       </div>
       
        <div id="inloggForm">
            <form action="Assets/include/login.inc.php" method="POST">
                <input type="text" name="AdminID" placeholder="Användarnamn"><br>
                <input type="password" name="pwd" placeholder="Lösenord"><br>
                <button type="submit">LOGIN</button>
            </form>
            <p id="reset">Om någon har slutat eller inte kommer ihåg lösenordet klicka <a href="reset.php">här</a> </p>
        </div>
    <?php
    if(isset($_SESSION['ID'])){
        header("location: ../index.php");
    } else{
    }
    ?>  
</body>
</html>  


