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
         <div id="employees">
            <div class="edit">
                <h2> Lägg till anställd </h2>
                <form action="employees.php" method="post" enctype="multipart/form-data">
                    <p> Namn </p>
                    <input type="text" name="name" id="name">
                    
                    <p> Roll </p>
                    <input type="text" name="role" id="role">
                    
                    <p> Beskrivning </p>
                    <p><textarea cols="40" rows="5" name="description" id="description"></textarea></p>
                    
                    <br>
                    
                    <p> Bild </p>
                    <input id="file" type="file" name="employee_img" id="employee_img" />
                    
                    <br>
                    <br>
                
                    <!-- Submit button -->
                    <input id="button" style="float:right;margin-right:65px;" type="submit" name="add_employee" value="Lägg till">
            
                    <!-- Delete button -->
                    <input id="button" style="float:right;position:relative;right:10px;" type="submit" name="del_employee" value="Ta bort">
                    
                    <br>

                    <h2> Anställda </h2>
                    
                    <?php
                        //Output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo '<div class="employee"><input type="checkbox" id="checked_id[]" name="checked_id[]" value="' .$row["employee_id"]. '" /><img class="employee_img" src="' .$row["employee_img"]. '">' ."<h3>" .$row["employee_name"]. "</h3><h4>". $row["role"] ."</h4><p>". $row["description"] ."</p></div><br>";
                        }
                    ?>
                </form>
            </div>
        </div>
    </div>
</body>
</html>