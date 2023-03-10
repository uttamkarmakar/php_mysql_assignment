<?php
  // If the user logout from the page then destroy the sessions
  session_start();
  session_unset();
  session_destroy();
  session_write_close();
  setcookie(session_name(),'',0,'/');
  session_regenerate_id(true);
  header('location: login.php');
?>