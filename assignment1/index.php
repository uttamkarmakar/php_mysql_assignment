<?php
  // If not logged in go to home page.
  session_start();
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  if(!isset($_SESSION['logged'])){
    header('location: ../login/login.php');
  } 
?>
<?php
  //Including the Class
  include("../classes/classes.php");
  $firstError = $lastError = "";
  $temp = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $person = new details($_POST["firstname"], $_POST["lastname"]);
  $person->firstName = $person->check_data($person->firstName);
  $person->lastName = $person->check_data($person->lastName);

  if ($person->check_valid($person->firstName)) {
    $firstError = "* Name should contains alphabets only!";
    $temp = 1;
  }
  if ($person->check_valid($person->lastName)) {
    $lastError = "* Last name should contains alphabets only!";
    $temp = 1;
  }
  if ($person->check_empty($person->firstName)) {
    $firstError = "* This field can't be empty!";
    $temp = 1;
  }
  if ($person->check_empty($person->lastName)) {
    $lastError = "* This field can't be empty!";
    $temp = 1;
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="../style/style.css">
  <style>
    .red {
      color: red;
      font-size: 25px;
    }
    .btn-primary {
      width: 700px;
    }
  </style>

</head>

<body>
  <video id="bgVideo" autoplay loop muted plays-inline>
  <source src="../video/night-sky.mp4">
  </video>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Innoraft task</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="../qeury/search.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../assignment1/index.php">FormWithName</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../assignment2/index.php">FormWithFile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../assignment3/index.php">FormWithMarks</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../assignment4/index.php">FormWithNumber</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../assignment5/index.php">FormWithEmail</a>
        <li class="nav-item">
          <a class="nav-link" href="../login/logout.php">Logout</a>
        </li>

      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>

  <div class="container">
    <form action="index.php" method="post">
      <h1>Enter your details below</h1>
      <div class="form-group">
        <label for="exampleInputEmail1">First name</label>
        <input type="name" name="firstname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter first name">
        <span class=red><?php echo $firstError ?></span>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">last name</label>
        <input type="name" name="lastname" class="form-control" id="exampleInputPassword1" placeholder="Enter last name">
        <span class="red"><?php echo $lastError ?></span>
      </div>
      <button type="submit" class="btn btn-primary btn-success">Submit</button>
    </form>
  </div>

  <?php
  //Checking Whether evething is okay or not,then move to the output page
  if ($temp == 0 && $_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["firstname"] = $person->firstName;
    $_SESSION["lastname"] = $person->lastName;
    header("location:form.php ");
  }
  ?>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
