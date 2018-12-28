<?php

  session_start();
  include_once "library/user_manager.php";
  logout();

?>

<html>
  <head>
    <title>Bingtelski</title>
  </head>

  <body>

    <?php include "templates/nav.php" ?>

    <div>
      <h1>Goodbye</h1>

      You have logged out
    </div>
  </body>
</html>