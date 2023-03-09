<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  require "../vendor/autoload.php";
  use PHPMailer\PHPMailer\PHPMailer;
//Sending mail from the user if he/she wants to reset password.
if (isset($_POST['send'])) {
  
  // require "../database/database.php";
  // $recoverObj = new GetConnection;
  include '../database/Connections.php';
  include '../database/UserRegistration.php';
  $email = mysqli_escape_string($conn, $_POST["email"]);

  $emailQuery = "select * from userInfo where userEmail = '$email';";
  $query = mysqli_query($conn, $emailQuery);
  $emailCount = mysqli_num_rows($query);

  if ($emailCount) {
    $userData = mysqli_fetch_array($query);
    $userName = $userData['userName'];
    $token = $userData['token'];
    $mail = new PHPMailer(true);
    //telling PHPMailer class to use the custom SMTP configuration defined.
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = "uttamkarmakar400@gmail.com";
    $mail->Password = "wsodxydwyhyhahqt";
    $mail->SMTPSecure = "ssl";
    $mail->Port = 465;
    $mail->setFrom('uttamkarmakar400@gmail.com');
    $mail->addAddress($_POST['email']);
    $mail->isHTML(true);
    $mail->Subject = "mail from uttam karmakar";
    $mail->Body = "Hi,$userName. Click here to reset your password <a href ='http://localhost/assignment/login/resetPassword.php?token=$token'>Click here</a>";
    $mail->send();
    header("location:recoverEmail.php");
    // echo "Sent";
  } else {
    echo "mail sending failed";
  }
}
