 
<?php

  if (logged_in() == true) {
    echo "
    <a href='home.php'>Homepage</a><br>

    Hello, " . $_SESSION["user"] . "<br>

    <a href='logout.php'>Log Out</a><br>
    " ;

  } else {
    echo "
    <a href='home.php'>Homepage</a><br>

    <a href='login.php'>Login</a><br>

    <a href='logout.php'>Log Out</a><br>
    " ;
  } 
?>