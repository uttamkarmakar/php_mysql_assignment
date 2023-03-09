<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  session_start();
  require '../database/UserRegistration.php';
  require '../validations.php';
  $registerObj = new UserRegistration;

if(isset($_POST["submit"])) {
  //Checking whether the password contains all the required characters or not.
  $result = $registerObj->isValidPass($_POST['password']);
  
  if($result === TRUE) {
    //Generating a unique 15 random bytes for each registration.
    $token = bin2hex(random_bytes(15));
    $result = $registerObj->registration($_POST['username'], $_POST['email'], md5($_POST['password']), md5($_POST['cpassword']),$token);
    
    if($result == TRUE){
      $_SESSION["successMsg"] = "Registration was successful,Please login now";
      header("location:login.php");
    }
    else{
      $_SESSION["fromMessage"] = $result;
    }
  }
  else {
    $_SESSION["fromMessage"] = $result;
  }
}
