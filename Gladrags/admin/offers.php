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
            $files = glob('../webbsida/bilder/slider/*'); 

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
                echo nl2br("Files deleted successfully.\n");
            } 
            
            else {
                echo nl2br("Error deleting files: " . mysqli_error($connection) . ".\n");
            }
        }
    
        else {
            //Submit was pressed
            //Check if inputs are empty
            if($_FILES["fileToUpload1"]["error"] == 4 ||
               $_FILES["fileToUpload2"]["error"] == 4 ||
               $_FILES["fileToUpload3"]["error"] == 4 ||
               $_FILES["fileToUpload4"]["error"] == 4) {
                echo nl2br("One or more inputs was empty.\n");
            }
     
            else {
                //Specifies the directory where the files is going to be placed
                $target_dir = "../webbsida/bilder/slider/";

                //Specifies the path of the files to be uploaded
                $target_file1 = $target_dir . basename($_FILES["fileToUpload1"]["name"]);
                $target_file2 = $target_dir . basename($_FILES["fileToUpload2"]["name"]);
                $target_file3 = $target_dir . basename($_FILES["fileToUpload3"]["name"]);
                $target_file4 = $target_dir . basename($_FILES["fileToUpload4"]["name"]);

                $uploadOk = 1;

                //Holds the file extension of the files
                $imageFileType1 = pathinfo($target_file1,PATHINFO_EXTENSION);    
                $imageFileType2 = pathinfo($target_file2,PATHINFO_EXTENSION);    
                $imageFileType3 = pathinfo($target_file3,PATHINFO_EXTENSION);    
                $imageFileType4 = pathinfo($target_file4,PATHINFO_EXTENSION);    

                //Check if image files is actual images or fake images
                if(isset($_POST["submit"])) {
                    $check1 = getimagesize($_FILES["fileToUpload1"]["tmp_name"]);
                    $check2 = getimagesize($_FILES["fileToUpload2"]["tmp_name"]);
                    $check3 = getimagesize($_FILES["fileToUpload3"]["tmp_name"]);
                    $check4 = getimagesize($_FILES["fileToUpload4"]["tmp_name"]);

                    if($check1 !== false || $check2 !== false || $check3 !== false || $check4 !== false) {
                        echo nl2br("File 1 is an image - " . $check1["mime"] . ".\n");
                        echo nl2br("File 2 is an image - " . $check2["mime"] . ".\n");
                        echo nl2br("File 3 is an image - " . $check3["mime"] . ".\n");
                        echo nl2br("File 4 is an image - " . $check4["mime"] . ".\n");
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
                    file_exists($target_file3) ||
                    file_exists($target_file4)) {

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
                   $imageFileType3 != "jpeg" && $imageFileType3 != "gif" &&

                   $imageFileType4 != "jpg" && $imageFileType4 != "png" && 
                   $imageFileType4 != "jpeg" && $imageFileType4 != "gif") {

                    echo nl2br("Sorry, only JPG, JPEG, PNG & GIF files are allowed.\n");
                    $uploadOk = 0;
                }

                //Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo nl2br("Sorry, your files was not uploaded.\n");
                    //If everything is ok, try to upload file
                }
                
                else {
                    if (move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $target_file1) && 
                        move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file2) && 
                        move_uploaded_file($_FILES["fileToUpload3"]["tmp_name"], $target_file3) && 
                        move_uploaded_file($_FILES["fileToUpload4"]["tmp_name"], $target_file4)) {
                    }
                    
                    else {
                        echo nl2br("Sorry, there was an error uploading your files.\n");
                    }
                }

                //Upload images path to database 
                $file_name1 = "../webbsida/bilder/slider/".$_FILES["fileToUpload1"]["name"];
                $file_name2 = "../webbsida/bilder/slider/".$_FILES["fileToUpload2"]["name"];
                $file_name3 = "../webbsida/bilder/slider/".$_FILES["fileToUpload3"]["name"];
                $file_name4 = "../webbsida/bilder/slider/".$_FILES["fileToUpload4"]["name"];

                //Inserting images path to database
                if($uploadOk == 1) {
                    $sql = "INSERT INTO offers(img1, img2, img3, img4) VALUES ('$file_name1', '$file_name2', '$file_name3', '$file_name4')";

                    //Error check
                    if(mysqli_query($connection, $sql)){
                        echo nl2br("Files added successfully.\n");
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