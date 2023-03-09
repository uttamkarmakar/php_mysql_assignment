<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  //Including the UserLogin file where UserLogin class is present.
  include '../database/UserLogin.php';
  require 'login.php';
  $loginObj = new UserLogin;

if (isset($_POST["login"])) {
  //Storing the return values from the login method
  $temp = $loginObj->login($_POST['uemail'], md5(($_POST['pass'])));
  if ($temp == TRUE) {
    //If the login details are correct then move inside to the main page.
    session_start();
    $_SESSION["logged"] = TRUE;
    header("location: ../assignment5/index.php");
  } else {
    //If the username or the password does not match redirect to the login page.
    $_SESSION["loginMessage"] = "Invalid username and password";
    header("location:login.php");
  }
}
