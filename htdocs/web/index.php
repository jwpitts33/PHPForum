<?php
  session_start();

  $_SESSION["logged_in"] = false;
  $_SESSION["user"] = "";
  $_SESSION["email"] = "";
  
  $uri = 'http://';
  $uri .= $_SERVER['HTTP_HOST'];
  header('Location: '.$uri.'/web/home.php');
  exit;
?>