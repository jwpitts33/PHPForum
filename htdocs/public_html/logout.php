<!DOCTYPE html>
<html lang="en">

<?php
  session_start();
  include "library/db_connect.php";
  include_once "library/user_manager.php";
  logout();
?>

<html>
  <?php include "templates/head.php" ?>

  <body>

    <?php include "templates/nav.php" ?>

    <div class="container">
      <h1>Goodbye</h1>

      You have logged out
    </div>
  </body>
</html>