<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- style.css -->
  <link rel="stylesheet" href="../style/login-style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="../jquery/login.js"></script>
  <title>Login/Sign Up</title>
</head>

<body>
  <video id="bgVideo" autoplay loop muted plays-inline>
    <source src="../video/night-sky.mp4">
  </video>
  <!-- Html for the login page -->
  <div class="container my-3">
    <div class="login-main">
      <div class="login-main--container container-shrimp">
        <form method="post" action="login-validate.php">
        <?php
              // echo $_SESSION["loginMessage"];
              // unset($_SESSION["loginMessage"]);
              session_start();
              if(isset($_SESSION["successMsg"])) {
                echo $_SESSION["successMsg"];
                unset($_SESSION["successMsg"]);
              }
              else{
                $_SESSION["fromMessage"] ="";
              }
            ?>
          <h1>Enter your login details</h1>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">User email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" name="uemail" id="login-email" placeholder="User email" required>
              <p id="error_email"></p>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name="pass" id="inputPassword3" placeholder="Password" required ><span><i class="fa-sharp fa-solid fa-eye show" onclick="show_pass()"></i></span>

            </div>
          </div>
          <div class="loginErr">
            <?php
              // echo $_SESSION["loginMessage"];
              // unset($_SESSION["loginMessage"]);
              if(isset($_SESSION["loginMessage"])) {
                ?> <p class="loginMsg"><?php echo $_SESSION["loginMessage"];?></p><?php
              $_SESSION["loginMessage"] ="";
              unset($_SESSION["loginMessage"]);
              } 
            ?>  
          </div>
          <div class="form-group row">
            <div class="col-sm-10">
              <input type="submit" name="login" class="form-control" id="login-submit" placeholder="login"  required>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-10">
              <h5>Don't have an account?</h5>
              <a href="signUp.php" type="submit" name="button-submit" class="btn btn-success">Register Now</a>
            </div>
            <div class="col-sm-10">
              <h5>Forgot your password?</h5>
              <a href="recoverEmail.php
              " type="submit" name="button-submit" class="btn btn-success">Click here</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
</body>

</html>
