<!DOCTYPE html>
<html lang="en">

<?php
  session_start();
  include "library/db_connect.php";
  include_once "library/user_manager.php";
?>

<html>
  <?php include "templates/head.php"; ?>

  <body>
    <?php include "templates/nav.php"; ?>

    <div class="container">
      <div class="jumbotron">
        <h1>Welcome to FaceBing</h1>
      </div>
    </div>

    <?php include "templates/footer.php"; ?>

  </body>
</html>