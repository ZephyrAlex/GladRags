<?php
    session_start();
    if (null !==($_SESSION["SESepost"]) && null !==($_SESSION["SEStoken"])){
        include '../../connectloc.php';

        $epost = $_SESSION["SESepost"];
        $token =  $_SESSION["SEStoken"];
        
        $nyPwd = $_POST['nyLosen'];
        $repPwd = $_POST['repLosen'];
        
        $data  = $conn->query("SELECT * FROM admin WHERE Epost='$epost' AND token='$token'");
        $row = mysqli_fetch_assoc($data);
        
        
            echo $row["Epost"];

        if (empty($nyPwd)){

        exit();
        }

        if (empty($repPwd)){
        exit();
        } 
        
        if($data->num_rows>0){
           
            if($nyPwd == $repPwd){
        
                $encryted_password = password_hash($nyPwd, PASSWORD_DEFAULT);
        
                $conn->query("UPDATE admin SET pwd = '$encryted_password', token =''");
        
            session_unset();
            session_destroy();
                header("Location: ../../index.php");
            }
        }
            else{
            echo"bättre felmedelande senare ";
        }
         
    } else{
        header("Location: reset.php");
        exit();
    }

?>