<!DOCTYPE html>
<html lang="en">

<?php
  session_start();
  include "library/db_connect.php";
  include_once "library/user_manager.php";
  include_once "library/forums_manager.php";

  if (isset($_GET["forumName"])) {
    $success = new_forum($_GET["forumName"], $conn);

    if ($success) {
      header("Location: " . URI . "/public_html/forums.php");
    }
  }
  else {
    $success = true;
  }
?>

<html>
  <?php include "templates/head.php"; ?>

  <body>
    <?php include "templates/nav.php"; ?>

    <div class="container">
      <h1>Create Forum</h1>

      <?php
        if ($success == false) {
          echo "Error Creating Forum" ;
        }
      ?>

      <form action="" method="get">
        Forum Name: <input type="text" name="forumName"><br>
        <input type="submit">
      </form>

    </div>

  </body>

</html>