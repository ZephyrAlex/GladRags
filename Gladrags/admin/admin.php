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

    $sql = "SELECT * FROM offers ORDER BY offer_id DESC LIMIT 1";
    $sql2 = "SELECT * FROM news ORDER BY news_id DESC LIMIT 1";
    $sql3 = "SELECT employee_name, role, description, employee_img, employee_id FROM employees";
    $sql4 = "SELECT name, brand_address, brand_img, brand_id FROM brands";
    
    //Images
    $result1 = $connection->query($sql);
    $result2 = $connection->query($sql);
    $result3 = $connection->query($sql);
    $result4 = $connection->query($sql);
    
    //News
    $result5 = $connection->query($sql2);

    //Employees
    $result6 = $connection->query($sql3);

    //Brands
    $result7 = $connection->query($sql4);
?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <title> Gladrags Admin </title>
    
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css?<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="../webbsida/css/slider.css?<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="../webbsida/css/brands.css?<?php echo time(); ?>">
    
    <!-- JS -->
    <script type="text/javascript" src="../webbsida/js/slider.js?<?php echo time(); ?>"></script>

</head>
<body>
    <nav>
        <p id="confirmation"> Login successful: Welcome <?php echo $login_user;?>.</p>
        <p id="user"> Logged in as: <?php echo $login_user;?></p>
        <form action="logout.php">
            <input type="submit" id="logoutbutton" value="Logout"/>
        </form>
    </nav>
    <!-- Main start -->
    <div id="main">
        <div id="offers">
            <div class="edit">
                <form action="upload_offers.php" method="post" enctype="multipart/form-data">
                    <h2> Lägg till bilder </h2>
                    <!-- Choose file buttons -->
                    <input id="file" type="file" name="fileToUpload1" id="fileToUpload1" />
                    <br>
                    <br>
                    <input id="file" type="file" name="fileToUpload2" id="fileToUpload2" />
                    <br>
                    <br>
                    <input id="file" type="file" name="fileToUpload3" id="fileToUpload3" />
                    <br>
                    <br>
                    <input id="file" type="file" name="fileToUpload4" id="fileToUpload4" />
                    <br>
                    <br>
                    <!-- Upload button -->
                    <input id="button" style="float:right;" type="submit" name="submit" value="Lägg till">
                </form>
                <!-- Delete button -->
                <form action="delete_offers.php">
                    <input id="button" style="float:right;margin-right:10px;" type="submit" name="delete_offers" value="Ta bort">
                </form>
                <br>
                <br>
                <h2> Slider </h2>
                <!--Image slider start-->
                <div id='slider'>
                    <div class="slider-inner">
                        <ul>
                            <li>
                                <a class="img" 
                                    href="<?php while($row=mysqli_fetch_array( $result1 )){echo $row['img1'];}?>" 

                                    data-fs-image="<?php while($row=mysqli_fetch_array( $result1 )){echo $row['img1'];}?>">
                                </a>
                            </li>
                            <li>
                                <span class="img" 
                                    style="background-image:url(<?php while($row=mysqli_fetch_array( $result2 )){echo $row['img2'];}?>);" 

                                   data-fs-image="<?php while($row=mysqli_fetch_array( $result2 )){echo $row['img2'];}?>">
                                </span>
                            </li>
                            <li>
                                <a href="/">
                                    <img class="img" 
                                        src="<?php while($row=mysqli_fetch_array( $result3 )){echo $row['img3'];}?>" 

                                        data-fs-image="<?php while($row=mysqli_fetch_array( $result3 )){echo $row['img3'];}?>" 
                                    />
                                </a>
                            </li>
                            <li>
                                <a class="img" 
                                   href="<?php while($row=mysqli_fetch_array( $result4 )){echo $row['img4'];}?>" 

                                   data-fs-image="<?php while($row=mysqli_fetch_array( $result4 )){echo $row['img4'];}?>"> 
                                </a>
                            </li>
                        </ul>
                        <div class="fs-icon" title="Expand/Close"></div>
                    </div>
                </div>
                <!--Image slider end-->
            </div>
        </div>
        <div id="news">
            <div class="edit"> 
                <h2> Lägg till nyheter </h2>
                <form action="upload_news.php" method="post">
                    <p>
                        <textarea cols="40" rows="10" name="news_insert" id="news_insert"></textarea>
                    </p>
                    <br>
                    <!-- Submit button -->
                    <input input id="button" style="float:right;" type="submit" name="submit_news" value="Lägg till">
                </form>
                <!-- Delete button -->
                <form action="delete_news.php">
                    <input id="button" style="float:right;margin-right:10px;" type="submit" name="delete_news" value="Ta bort">
                <br>
                <br>
                </form>
                <h2> Nyheter </h2>
                <p>
                    <?php
                         while($row=mysqli_fetch_array( $result5 )){
                             echo $row['text'];
                         }
                    ?>
                </p>
            </div>
        </div>
        <div id="employees">
            <div class="edit">
                <h2> Lägg till anställd </h2>
                <form action="add_employee.php" method="post" enctype="multipart/form-data">
                    <p> Namn </p>
                    <input type="text" name="name" id="name">
                    
                    <p> Roll </p>
                    <input type="text" name="role" id="role">
                    
                    <p> Beskrivning </p>
                    <p>
                        <textarea cols="40" rows="5" name="description" id="description"></textarea>
                    </p>
                    
                    <br>
                    <p> Bild </p>
                    <input id="file" type="file" name="employee_img" id="employee_img" />
                    <br>
                    <br>
                
                    <!-- Submit button -->
                    <input id="button" style="float:right;margin-right:65px;" type="submit" name="add_employee" value="Lägg till">
                </form>
            
                <form id="delete_form" name="delete_employee" action="delete_employee.php" method="post">
                    <!-- Delete button -->
                    <input id="button" style="float:right;position:relative;top:-10px;right:10px;" type="submit" name="del_employee" value="Ta bort">
                    <br>

                    <h2> Anställda </h2>
                    <?php
                        //Output data of each row
                        while($row = $result6->fetch_assoc()) {
                            echo '<div class="employee"><input type="checkbox" id="checked_id[]" name="checked_id[]" value="' .$row["employee_id"]. '" /><img class="employee_img" src="' .$row["employee_img"]. '">' ."<h3>" .$row["employee_name"]. "</h3><h4>". $row["role"] ."</h4><p>". $row["description"] ."</p></div><br>";
                        }
                    ?>
                </form>
            </div>
        </div>
        
        <!-- Brands start -->
        <div id="brands">
            <!-- Edit start -->
            <div class="edit">
                <h2> Lägg till varumärken </h2>
                <!-- Add brand form start -->
                <form action="add_brand.php" method="post" enctype="multipart/form-data">
                    <p> Varumärke </p>
                    <input type="text" name="brand" id="brand">
                               
                    <p> Adress till varumärket </p>
                    <input type="text" name="brand_address" id="brand_address">
                                
                    <br>
                    <p> Bild </p>
                    <input id="file" type="file" name="brand_img" id="brand_img" />
                    <br>
                    <br>
                
                    <!-- Submit button start -->
                    <input id="button" style="float:right;margin-right:65px;" type="submit" name="add_brand" value="Lägg till">
                    <!-- Submit button end -->
                </form>
                <!-- Add brand form end -->
            
                <!-- Delete brand form start -->
                <form id="delete_form" name="delete_brand" action="delete_brand.php" method="post">
                    <!-- Delete button start -->
                    <input id="button" style="float:right;position:relative;top:-10px;right:10px;" type="submit" name="del_brand" value="Ta bort">
                    <!-- Delete button end -->
                    <br>

                    <h2> Varumärken </h2>
                    <div id="brands">
                    <?php
                        //Output data of each row
                        while($row = $result7->fetch_assoc()) {
                            echo '<div class="brand">
                                      <a href="' .$row['brand_address'] . '" target="_blank">
                                        
                                        <input type="checkbox" id="checked2_id[]" name="checked2_id[]" value="' .$row["brand_id"]. '"/>
                                        
                                        <img src="' .$row["brand_img"]. '">
                                        
                                        <h1 class="brand_popup">' .$row['name']. '</h1>
                                        
                                      </a> 
                                  </div>';
                        }
                    ?>
                    </div>
                </form>
                <!-- Delete brand form end -->
            </div>
            <!-- Edit end -->
        </div>
        <!-- Brands end -->
    </div>
    <!-- Main end -->
</body>
</html>

<?php
    //Close connection
    mysqli_close($connection);
?>