<?php

session_start();

$_SESSION["logged_in"] = false;
$_SESSION["user"] = "";
$_SESSION["email"] = "";

?>

<html>
  <head>
    <title>Bingtelski</title>
  </head>

  <body>
    <div>
      <a href="home.php">Homepage</a><br>

      <a href="welcome.php">Login</a><br>

      <a href="register.php">Sign Up</a><br>
    </div>

    <div>
      <h1>Goodbye</h1>

      You have logged out
    </div>
  </body>
</html>