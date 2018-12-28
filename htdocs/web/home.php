<?php
  session_start();
?>

<html>
  <head>
    <title>Bingtelski</title>
  </head>

  <body>
    <div>
      <?php 
      if ($_SESSION["logged_in"] == true) {
        echo "
        <a href='home.php'>Homepage</a><br>

        Hello, " . $_SESSION["user"] . "<br>

        <a href='logout.php'>Log Out</a><br>";
      } else {
        echo "
        <a href='home.php'>Homepage</a><br>

        <a href='welcome.php'>Login</a><br>

        <a href='register.php'>Sign Up</a><br>";
      } 

      ?>
    </div>

    <div>
      <h1>Home</h1>

      Welcome to Bingtelski<br>
    </div>
  </body>
</html>