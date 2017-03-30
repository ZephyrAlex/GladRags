<?php
session_start();
include '../../connectloc.php';

$AdminID = $_POST['AdminID'];
$pwd_Form = $_POST['pwd'];




$sql = "SELECT * FROM admin WHERE AdminID='$AdminID'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$hash_pwd_db = $row['pwd'];


if (!password_verify($pwd_Form, $hash_pwd_db)){
    header("Location: ../../index.php?error=user");
    exit();
} else{

        $_SESSION['ID'] = $row['ID'];
    header("Location: ../../index.php");
}

?>