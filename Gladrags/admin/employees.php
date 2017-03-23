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
        
        if(isset($_POST['del_employee']) && empty($_POST['checked_id']) == false) {
            //Delete was pressed
            $idArr = $_POST['checked_id'];
        
            foreach($idArr as $id) {
                //Get imagepath from database
                $sql_path = "SELECT employee_img FROM employees WHERE employee_id = '$id'";
                $result = $connection->query($sql_path);

                while($row=mysqli_fetch_array( $result )) {
                    $image_path = $row['employee_img'];
                }

                $files = glob('../webbsida/bilder/anstallda/*'); 

                //Iterate files
                foreach($files as $file){
                    //Delete picture of selected employee              
                    if($file = $image_path)
                    unlink($file);
                    break;
                }
            }
            
            //Separate ID-array
            $comma_separated = implode(",", $idArr);
            
            //Delete selected brand from database
            $sql_del = "Delete FROM employees WHERE employee_id IN($comma_separated)";
            
            if (mysqli_query($connection, $sql_del)) {
                echo nl2br("Selected employees successfully deleted.\n");
            } 

            else {
                echo nl2br("Error deleting selected employees: " . mysqli_error($connection) . ".\n");
            }
        }
    
        else if(isset($_POST['add_employee'])) {
            //Submit was pressed
            //Get values from form in admin.php
            $name = $_POST['name'];
            $role = $_POST['role'];
            // Escape user inputs for security
            $description = mysqli_real_escape_string($connection, $_POST['description']);

            //Check if image input is empty
            if($_FILES["employee_img"]["error"] == 4) { 

                echo nl2br("No image was selected.\n");
            }

             //Check if text inputs are empty
            else if(empty($name) || empty($role) || empty($description)) {
                echo nl2br("You did not fill out the required fields.\n");
            }

            else {

                //Specifies the directory where the files is going to be placed
                $target_dir = "../webbsida/bilder/anstallda/";

                //Specifies the path of the files to be uploaded
                $target_file = $target_dir . basename($_FILES["employee_img"]["name"]);

                $uploadOk = 1;

                //Holds the file extension of the files
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);    

                //Check if image files is actual images or fake images
                if(isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["employee_img"]["tmp_name"]);

                    if($check !== false) {
                        echo nl2br("File is an image - " . $check["mime"] . ".\n");

                        $uploadOk = 1;
                    }

                    else {
                        echo nl2br("File is not an image, try again.\n");
                        $uploadOk = 0;
                    }
                }

                //Check if file already exists
                if (file_exists($target_file)) {

                    echo nl2br("Sorry, the file already exists under the same name, change image name and try again.\n");

                    $uploadOk = 0;
                }

                //Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && 
                   $imageFileType != "jpeg" && $imageFileType != "gif") {

                    echo nl2br("Sorry, only JPG, JPEG, PNG & GIF files are allowed.\n");
                    $uploadOk = 0;
                }

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo nl2br("Sorry, image was not uploaded.\n");
                    // If everything is ok, try to upload file
                } 
                else {
                    if (move_uploaded_file($_FILES["employee_img"]["tmp_name"], $target_file)) {
                    } 
                    else {
                        echo nl2br("Sorry, there was an error uploading your file.\n");
                    }
                }

                //Upload images path to database 
                $employee_img = "../webbsida/bilder/anstallda/".$_FILES["employee_img"]["name"];

                //Inserting images path to database
                if($uploadOk == 1) {
                    $sql = "INSERT INTO employees(employee_name, role, description, employee_img) VALUES ('$name', '$role', '$description', '$employee_img')";

                    if(mysqli_query($connection, $sql)){
                        echo nl2br("Employee added successfully.\n");
                    } 
                    else {
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
                    }
                }     
            }
        }
        
        else {
            echo nl2br("Error: No employees were selected.\n");
        }
    }
       
    //Close connection
    mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <title> Lägg till anställda </title>
    
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css?<?php echo time(); ?>">
</head>
<body>
    <div id="return_button">
        <li>
            <a href="anstallda.php"> Tillbaka </a>
        </li>
    </div>
</body>
</html>