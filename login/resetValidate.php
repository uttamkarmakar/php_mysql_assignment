<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  session_start();
  include '../database/Connections.php';
  include '../database/UserRegistration.php';
  // $resetObj = new GetConnection;
if (isset($_POST['update'])) {

  if (isset($_GET['token'])) {
    $obj = new UserRegistration;
    $token = $_GET['token'];

    if ($obj->isValidPass(($_POST["newpassword"])) === TRUE) {
      $newpassword = mysqli_real_escape_string($conn, $_POST["newpassword"]);
      $cpassword = mysqli_real_escape_string($conn, ($_POST["cpassword"]));

      if ($newpassword === $cpassword) {
        $updateQuery = "update " . UserRegistration::TABLE_NAME . " set userPassword='$newpassword' where token='$token';";
        $query = mysqli_query($conn, $updateQuery);

        if ($query) {
          $_SESSION["loginMessage"] = "Your password has been updated,Login with new password";
          header("Location:login.php");
        } else {
          $_SESSION['passMsg'] = "Your password not been updated";
          // header("Location:resetPassword.php");
        }
      }
    } else {
      $_SESSION['passMsg'] = "Please set the password in valid format at least one number,alphabet,special character(At least 8 characters)";
    }
  }
}
?>
