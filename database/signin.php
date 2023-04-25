<?php
session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: signin.php");
    exit;
}
require_once "conn.php";

$email = $password = "";
$email_err = $password_err = $login_err = "";


//check if email is empty
if(empty(trim($_POST["email"]))){
    $email_err = "enter an email.";
}else{
    $email = trim($_POST["email"]);
}


//check if password is empty
if(empty(trim($_POST["password"]))){
    $password_err = "enter your password";
}else{
    $password = trim($_POST["password"]);
}

//validate credentials
if(empty($email_err) && empty($password_err)){

    //prepare a select statement
    $sql = "SELECT id, email, password FROM user WHERE email = ?";

    if($stmt = $mysqli->prepare($sql)){
        
    }
}
?>