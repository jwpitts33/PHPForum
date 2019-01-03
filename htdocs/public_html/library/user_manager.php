<!-- user controller -->

<?php

<<<<<<< Updated upstream
=======
  include_once "library/db_connect.php";

>>>>>>> Stashed changes
  function login($username, $password, $conn) {

    $stmt = $conn->prepare("SELECT EMAIL, PASSWORD FROM USERS WHERE USERNAME = ?");
    $stmt->bind_param("s", $username);

    $stmt->execute();
    $stmt->bind_result($email, $actual_password);
    $stmt->fetch();

<<<<<<< Updated upstream
=======
    if (empty($actual_password) || empty($email)) {
      return false;
    }

>>>>>>> Stashed changes
    if ($password == $actual_password) {
      $_SESSION["user"] = $username;
      $_SESSION["email"] = $email;
    } else {
      return false;
    }

    $stmt->close();

    return true;
  }

  function register($username, $password, $email, $conn) {

    $stmt = $conn->prepare("INSERT INTO USERS (username, password, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $password, $email);

    $stmt->execute();

    $_SESSION["user"] = $username;
    $_SESSION["email"] = $email;

    $stmt->close();

    return true;
  }

  function logout() {

    $_SESSION["user"] = "";
    $_SESSION["email"] = "";
  }

  function logged_in() {
    
    if (empty($_SESSION["user"])) {
      return false;
    }
    else {
      return true;
    }
  }

?>
