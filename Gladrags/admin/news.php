<?php
    include('check.php');
    include_once '../connect.php';

    //Create commection
    $connection = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    //Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
     
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //Something was posted
        
        if(isset($_POST['del_news'])) {
            //Delete was pressed
            //Delete data from database
            $sql_del = "Delete FROM news";

            //Error check
            if (mysqli_query($connection, $sql_del)) {
                echo nl2br("News deleted successfully.\n");
            } 
            
            else {
                echo nl2br("Error deleting files: " . mysqli_error($connection) . ".\n");
            }
        }
    
        else {
            //Submit was pressed
            // Escape user inputs for security
            $news_insert = mysqli_real_escape_string($connection, $_POST['news_insert']);

            //Insert newstext into database
            $sql = "INSERT INTO news(text) VALUES ('$news_insert')";

            //Error check
            if(mysqli_query($connection, $sql)){
                echo nl2br("News added successfully.\n");
            }

            else {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
            }
        }           
    }
       
    //Close connection
    mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <title> Lägg till nyheter </title>
    
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css?<?php echo time(); ?>">
</head>
<body>
    <div id="return_button">
        <li>
            <a href="index.php"> Tillbaka </a>
        </li>
    </div>
</body>
</html>