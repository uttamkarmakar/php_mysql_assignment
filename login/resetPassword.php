<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  session_start();
  include '../database/Connections.php';
  include '../database/UserRegistration.php';
  
if (isset($_POST['update'])) {

  if (isset($_GET['token'])) {
    $obj = new UserRegistration;
    $token = $_GET['token'];
    //First checking if the user is entering a valid password or not.
    if ($obj->isValidPass(($_POST["newpassword"])) === TRUE) {
      $newpassword = mysqli_real_escape_string($conn, $_POST["newpassword"]);
      $cpassword = mysqli_real_escape_string($conn, ($_POST["cpassword"]));
      
      //If the new password and the confirm password matches then update the new password into the database.
      
      if ($newpassword === $cpassword) {
        $updateQuery = "update " . UserRegistration::TABLE_NAME . " set userPassword='$newpassword' where token='$token';";
        $query = mysqli_query($conn, $updateQuery);

        if ($query) {
          //If the password successfully updated into the database then redirect to the login page with a message
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
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>Hello, world!</title>
  <!-- <link rel="stylesheet" href="../style/error.css"> -->
  <link rel="stylesheet" href="../style/resetPassword.css">
</head>

<body>
  <video id="bgVideo" autoplay loop muted plays-inline>
    <source src="../video/night-sky.mp4">
  </video>
  <form class="" action="" method="post">
    <div class="container my-3">
      <h2>Reset your password</h2>
      <div class="form-group">
        <label for="exampleInputPassword1">New Password</label>
        <input type="newpassword" class="form-control" id="exampleInputPassword1" placeholder="Password" name="newpassword">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Confirm New Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="cpassword">
      </div>

      <div>
        <?php
        if (isset($_SESSION['passMsg'])) {
          echo $_SESSION['passMsg'];
        } else {
          echo $_SESSION['passMsg'] = "";
        }
        ?>
      </div>

      <button type="submit" class="btn btn-success" name="update">Update Password</button>
      <a href="login.php" type="submit" class="btn btn-success" name="submit">Back to login in</a>
    </div>
    </div>
  </form>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
