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
$stmt = $conn->prepare("INSERT INTO USERS (username, password, email) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $password, $email);

// set parameters and execute
$username = $_GET["username"];
$password = $_GET["password"];
$email = $_GET["email"];

$stmt->execute();

$_SESSION["user"] = $username;
$_SESSION["email"] = $email;
$_SESSION["logged_in"] = true;

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