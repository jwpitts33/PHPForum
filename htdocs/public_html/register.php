<!DOCTYPE html>
<html lang="en">

<?php
  session_start();
  include "library/db_connect.php";
  include_once "library/user_manager.php";

  if (isset($_GET["username"]) && isset($_GET["password"]) && isset($_GET["email"])) {
    $success = register($_GET["username"], $_GET["password"], $_GET["email"], $conn);

    if ($success == true) {
      header("Location: " . URI . "/public_html/home.php");
    }
  } else {
    $success = true;
  }
?>

<html>
  <?php include "templates/head.php"; ?>

  <body>
    <?php include "templates/nav.php"; ?>

    <div class="container">
      <h1>Registration</h1>

      <?php 
        if ($success == false) {
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

    </div>

  </body>

</html>