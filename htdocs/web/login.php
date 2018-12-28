<?php

session_start();

$servername = "localhost";
$username = "sysadm";
$password = "mercury1";
$dbname = "bingtelski";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// prepare and bind
$stmt = $conn->prepare("SELECT EMAIL, PASSWORD FROM USERS WHERE USERNAME = ?");
$stmt->bind_param("s", $username);

// set parameters and execute
$username = $_GET["username"];
$submitted_password = $_GET["password"];

$stmt->execute();
$stmt->bind_result($email, $actual_password);
$stmt->fetch();

if ($submitted_password == $actual_password) {
  $_SESSION["user"] = $username;
  $_SESSION["email"] = $email;
  $_SESSION["logged_in"] = true;
} else {
  $_SESSION["user"] = "";
  $_SESSION["email"] = "";
  $_SESSION["logged_in"] = false;
}

$stmt->close();
$conn->close();
?>

<html>
  <head>
    <title>Bingtelski</title>
  </head>

  <body>
    <div>
      <a href="home.php">Homepage</a><br>

      Hello, <?php echo $_SESSION["user"]; ?><br>

      <a href="logout.php">Log Out</a><br>
    </div>

    <div>
      Your email is <?php echo $_SESSION["email"]; ?><br>
    </div>

  </body>
</html>