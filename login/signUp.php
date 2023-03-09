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
  <link rel="stylesheet" href="../style/registerStyle.css">
</head>

<body>
  <video id="bgVideo" autoplay loop muted plays-inline>
    <source src="../video/night-sky.mp4">
  </video>
  <form class="" action="" method="post">
    <div class="container my-3">
      <h2>Create an account with us</h2>
      <div class="form-group">
        <label for="exampleInputEmail1">Username</label>
        <input type="name" class="form-control" id="user" aria-describedby="emailHelp" placeholder="Enter email" name="username">
        <p id="namemsg"></p>
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="emailId" aria-describedby="emailHelp" placeholder="Enter email" name="email">
        <p id="error_email" style="color: red;"></p>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="pass" placeholder="Password" name="password">
        <p id="message" style="display: none;">Password is<span id="strength"></span></p>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Confirm password</label>
        <br><input type="text" class="form-control" id="cpass" placeholder="Password" name="cpassword">
        <p id="conpass"></p>
        <p class="registrationFormAlert" id="CheckPasswordMatch"></p>
        <p class="registrationFormAlert" id="CheckPasswordMatch2"></p>
      </div>
      <?php
      require "registerNow.php";
      if (isset($_SESSION['fromMessage'])) { ?>
        <p class="error">
          <?php
          echo $_SESSION['fromMessage']; ?></p>
      <?php
        //On reload error should not be displayed on screen.
        unset($_SESSION['fromMessage']);
      }
      ?>

      <button type="submit" class="btn btn-success" name="submit" id=submit-btn>Submit</button>
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
  <script src="../jquery/signUp.js"></script>
</body>

</html>
