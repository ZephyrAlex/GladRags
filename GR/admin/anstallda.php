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
    
    //Employees
    $sql = "SELECT employee_name, role, description, employee_img, employee_id FROM employees";
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
    <link rel="stylesheet" type="text/css" href="css/employees.css?<?php echo time(); ?>">
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
    
    <!-- Main start -->
    <div id="main">
        <!-- Employees -->
        <div id="employees">
            <!-- Employee form -->
            <form action="employees.php" method="post" enctype="multipart/form-data">
                <!-- Edit -->
                <div class="edit">
                    <h2> Lägg till anställd </h2>    
                    
                    <p> Namn </p>
                    <input type="text" name="name" id="name">
                    
                    <p> Roll </p>
                    <input type="text" name="role" id="role">
                    
                    <p> Beskrivning </p>
                    <p><textarea placeholder="Skriv max två rader..." cols="40" rows="2" name="description" id="description"></textarea></p>
                    <br>
                    
                    <p> Bild </p>
                    <input id="file" type="file" name="employee_img" id="employee_img" />
                    <br>
                    <br>
                
                    <!-- Submit button -->
                    <input id="button" style="float:right;margin-right:65px;" type="submit" name="add_employee" value="Lägg till">
                    <br>
                </div>
                <!-- Edit end -->
                    
                <h2> Anställda </h2>   
                <?php
                    //Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="employee"><input type="checkbox" id="checked_id[]" name="checked_id[]" value="' .$row["employee_id"]. '" /><img class="employee_img" src="' .$row["employee_img"]. '">' ."<h3>" .$row["employee_name"]. "</h3><h4>". $row["role"] ."</h4><p>". $row["description"] ."</p></div>";
                    }
                ?>
                <!-- Delete button -->
                <input id="button" type="submit" name="del_employee" value="Ta bort">
            </form>
            <!-- Employee form end -->
        </div>
        <!-- Employees end -->
    </div>
    <!-- Main end -->
</body>
</html>