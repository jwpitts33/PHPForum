<!-- database connect -->

<?php

  include_once "config.php";
  $conn = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

?>