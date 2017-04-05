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
        
        if(isset($_POST['del_offers'])) {
            //Delete was pressed
            
            //Get filenames from directory
            $files = glob('../webbsida/bilder/erbjudanden/*'); 

            //Iterate files
            foreach($files as $file){
                //Delete file from directory
                if(is_file($file))
                unlink($file); 
            } 
 
            //Delete data from database
            $sql_del = "Delete FROM offers";
            
            //Error check
            if (mysqli_query($connection, $sql_del)) {
                echo nl2br("Files successfully deleted.\n");
            } 
            
            else {
                echo nl2br("Error deleting files: " . mysqli_error($connection) . ".\n");
            } 
        }

        else if(isset($_POST['submit'])) {
            //Submit was pressed
            
            //Get values from form in admin.php
            $price1 = $_POST['price1'];
            $price2 = $_POST['price2'];
            $price3 = $_POST['price3'];        

            //Check if file inputs are empty
            if($_FILES["offer1"]["error"] == 4 ||
               $_FILES["offer2"]["error"] == 4 ||
               $_FILES["offer3"]["error"] == 4) {
                echo nl2br("One or more inputs was empty.\n");
            }
            
            //Check if text input are empty
            else if(empty($price1) || empty($price2) || empty($price3)) {
                echo nl2br("You did not fill out the required fields.\n");
            }
     
            else {
                //Specifies the directory where the files is going to be placed
                $target_dir = "../webbsida/bilder/erbjudanden/";

                //Specifies the path of the files to be uploaded
                $target_file1 = $target_dir . basename($_FILES["offer1"]["name"]);
                $target_file2 = $target_dir . basename($_FILES["offer2"]["name"]);
                $target_file3 = $target_dir . basename($_FILES["offer3"]["name"]);

                $uploadOk = 1;

                //Holds the file extension of the files
                $imageFileType1 = pathinfo($target_file1,PATHINFO_EXTENSION);    
                $imageFileType2 = pathinfo($target_file2,PATHINFO_EXTENSION);    
                $imageFileType3 = pathinfo($target_file3,PATHINFO_EXTENSION);    

                //Check if image files is actual images or fake images
                if(isset($_POST["submit"])) {
                    $check1 = getimagesize($_FILES["offer1"]["tmp_name"]);
                    $check2 = getimagesize($_FILES["offer2"]["tmp_name"]);
                    $check3 = getimagesize($_FILES["offer3"]["tmp_name"]);

                    if($check1 !== false || $check2 !== false || $check3 !== false) {
                        echo nl2br("File 1 is an image - " . $check1["mime"] . ".\n");
                        echo nl2br("File 2 is an image - " . $check2["mime"] . ".\n");
                        echo nl2br("File 3 is an image - " . $check3["mime"] . ".\n");

                        $uploadOk = 1;
                    }
                    
                    else {
                        //Error message if files are not an image
                        echo nl2br("One of the files were not an image, try again.\n");
                        $uploadOk = 0;
                    }
                }

                //Check if file already exists
                if (file_exists($target_file1) ||
                    file_exists($target_file2) ||
                    file_exists($target_file3)) {

                    //Error message if file already exist under the same name
                    echo nl2br("Sorry, atleast one of the files already exists under the same name, remove images and try again.\n");

                    $uploadOk = 0;
                }

                //Allow certain file formats
                if($imageFileType1 != "jpg" && $imageFileType1 != "png" && 
                   $imageFileType1 != "jpeg" && $imageFileType1 != "gif" &&

                   $imageFileType2 != "jpg" && $imageFileType2 != "png" && 
                   $imageFileType2 != "jpeg" && $imageFileType2 != "gif" &&

                   $imageFileType3 != "jpg" && $imageFileType3 != "png" && 
                   $imageFileType3 != "jpeg" && $imageFileType3 != "gif") {

                    echo nl2br("Sorry, only JPG, JPEG, PNG & GIF files are allowed.\n");
                    $uploadOk = 0;
                }

                //Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo nl2br("Sorry, your files was not uploaded.\n");
                    //If everything is ok, try to upload file
                }
                
                else {
                    if (move_uploaded_file($_FILES["offer1"]["tmp_name"], $target_file1) && 
                        move_uploaded_file($_FILES["offer2"]["tmp_name"], $target_file2) && 
                        move_uploaded_file($_FILES["offer3"]["tmp_name"], $target_file3)) {
                    }
                    
                    else {
                        echo nl2br("Sorry, there was an error uploading your files.\n");
                    }
                }

                //Upload images path to database 
                $file_name1 = "../webbsida/bilder/erbjudanden/".$_FILES["offer1"]["name"];
                $file_name2 = "../webbsida/bilder/erbjudanden/".$_FILES["offer2"]["name"];
                $file_name3 = "../webbsida/bilder/erbjudanden/".$_FILES["offer3"]["name"];

                //Inserting images path to database
                if($uploadOk == 1) {
                    $sql = "INSERT INTO offers(offer1, offer2, offer3, price1, price2, price3) VALUES ('$file_name1', '$file_name2', '$file_name3', '$price1', '$price2', '$price3')";

                    //Error check
                    if(mysqli_query($connection, $sql)){
                        echo nl2br("Files successfully added.\n");
                    }
                    
                    else {
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
                    }
                }
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
    <title> Lägg till erbjudande </title>
    
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