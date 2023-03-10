<?php session_start();?>
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
    <div class="img">
      <img src="../upload-images/<?php echo $_SESSION["image"]; ?>" alt="jeee">
    </div>
    <h2> <span class="hello">Hello</span>
      <?php
      echo $_SESSION["firstname"] . " " . $_SESSION["lastname"];
      ?>
    </h2>
    <?php
    if (isset($_SESSION["text-area"])) {
      include("textarea.php");
    } ?>
  </div>
</body>
<?php
session_destroy();
?>
</html>
