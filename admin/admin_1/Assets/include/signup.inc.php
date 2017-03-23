<?php
session_start();
include '../../connectloc.php';

$Fnamn = $_POST['Fnamn'];
$Enamn = $_POST['Enamn'];
$Epost = $_POST['Epost'];
$AdminID = $_POST['AdminID'];
$pwd_unHash = $_POST['pwd'];

if (empty($Fnamn)){
    header("Location: ../../signup.php?error=empty");
    exit();
}
if (empty($Enamn)){
    header("Location: ../../signup.php?error=empty");
    exit();
}
if (empty($Epost)){
    header("Location: ../../signup.php?error=empty");
    exit();
}
if (empty($AdminID)){
    header("Location: ../../signup.php?error=empty");
    exit();
}
if (empty($pwd_unHash)){
    header("Location: ../../signup.php?error=empty");
    exit();
} 
else{
    $sql = "SELECT AdminID FROM admin WHERE AdminID='$AdminID'";
    $result = mysqli_query($conn, $sql);    
    $AdminIDcheck = mysqli_num_rows($result);
    
    if($AdminIDcheck > 0){
        header("Location: ../../signup.php?error=user");
    exit();
    }
    else{
        $encryted_password = password_hash($pwd_unHash, PASSWORD_DEFAULT);
        $sql = "INSERT INTO admin (Fnamn, Enamn, Epost, AdminID, pwd) 
        VALUES ('$Fnamn', '$Enamn', '$Epost', '$AdminID', '$encryted_password')";
        $result = mysqli_query($conn, $sql);

    header("Location: ../../index.php");
    }
}
?>