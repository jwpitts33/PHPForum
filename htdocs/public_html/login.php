<<<<<<< Updated upstream
<?php

  include_once "library/user_manager.php";
  include_once "library/db_connect.php";
  session_start();
=======
<!DOCTYPE html>
<html lang="en">

<?php
  session_start();
  include_once "library/user_manager.php";
>>>>>>> Stashed changes

  if (isset($_GET["username"]) && isset($_GET["password"])) {
    $success = login($_GET["username"], $_GET["password"], $conn);

    if ($success == true) {
      header("Location: " . URI . "/public_html/home.php");
    }
  } else {
    $success = true;
  }
<<<<<<< Updated upstream

?>

<html>
  <head> 
    <title>Bingtelski</title>
  </head>

  <body>

    <?php include "templates/nav.php"; ?>

    <h1>Login</h1>

    <?php 
      if (!$success) {
        echo "<div>Login Failed</div><br>";
      }
    ?>

    <form action="" method="get">
      Username: <input type="text" name="username"><br>

      Password: <input type="text" name="password"><br>

      <input type="submit">
    </form>
  </body>
=======
?>

<html>
  <?php include "templates/head.php"; ?>

  <body>
    <?php include "templates/nav.php"; ?>

    <div class="container">
      <h1>Login</h1>

      <?php 
        if (!$success) {
          echo "<div>Login Failed</div><br>";
        }
      ?>

      <form action="" method="get">
        <div>Username: </div><input type="text" name="username"><br>

        <div>Password: </div><input type="text" name="password"><br>

        <input type="submit">
      </form>
    </div>


  </body>

>>>>>>> Stashed changes
</html>
