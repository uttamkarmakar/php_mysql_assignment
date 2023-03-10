<?php
  session_start();
  if(isset($_GET['q'])){
  switch ($_GET['q']) {
    case '1':
      // header("location: ../assignment1/index.php");
    include '../assignment1/index.php';
      break;
    case '2':
        // header("location: ../assignment2/index.php");
        include '../assignment2/index.php';
      break;
    case '3':
        // header("location: ../assignment2/index.php");
        include '../assignment3/index.php';
      break;
    case '4':
        // header("location: ../assignment3/index.php");
        include '../assignment4/index.php';
      break;
    case '5':
        // header("location: ../assignment4/index.php");
        include '../assignment5/index.php';
      break;
   default:
   echo "Enter a valid query";     
  }
}
