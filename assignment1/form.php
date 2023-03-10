<?php 
  session_start();
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../style/formstyle.css">
</head>
<body>
  <div class="container">
    <h2> <span class="hello">Hello</span>
      <?php echo $_SESSION["firstname"] . " " . $_SESSION["lastname"];?>
    </h2>
  </div>
</body>
</html>
