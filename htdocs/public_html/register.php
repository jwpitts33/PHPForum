<?php

  include_once "library/db_connect.php";
  include_once "library/user_manager.php";
  session_start();

  if (isset($_GET["username"]) && isset($_GET["password"]) && isset($_GET["email"])) {
    $error = register($_GET["username"], $_GET["password"], $_GET["email"], $conn);

    if ($error == false) {
      header("Location: " . URI . "/public_html/home.php");
    }
  } else {
    $error = false;
  }

?>

<html>
  <head>
    <title>Bingtelski</title>
  </head>

  <body>

    <?php include "templates/nav.php"; ?>

    <h1>Registration</h1>

    <?php 
      if ($error) {
        echo "<div>Registration Error</div><br>";
      }
    ?>

    <form action="" method="get">
      Username: <input type="text" name="username"><br>

      Email: <input type="text" name="email"><br>

      Password: <input type="text" name="password"><br>

      Repeat Password: <input type="text"><br>

      <input type="submit">
    </form>
  </body>
</html>