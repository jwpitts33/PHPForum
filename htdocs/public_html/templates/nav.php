

    <nav id="logged_in" class='navbar navbar-expand-lg navbar-dark bg-dark'>

      <a class="navbar-brand" href="home.php">FaceBing</a>

      <span class="navbar-text" >Hello, <?php echo $_SESSION["user"]; ?></span>

      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href='forums.php'>Forums</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href='logout.php'>Log Out</a>
        </li>
      </ul>

    </nav>

    <nav id="logged_out" class='navbar navbar-expand-lg navbar-dark bg-dark'>

      <a class='navbar-brand' href='home.php'>FaceBing</a>

      <ul class='nav navbar-nav ml-auto'>
        <li class="nav-item">
          <a class="nav-link" href='forums.php'>Forums</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href='login.php'>Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href='register.php'>Sign Up</a>
        </li>
      </ul>
    </nav>


<script>
  var logged_in = <?php echo json_encode(logged_in()); ?>;


  if (logged_in) {
    document.getElementById("logged_out").style.display = "none";
    document.getElementById("user").innerHTML = user;
  }
  else {
    document.getElementById("logged_in").style.display = "none";
  }


</script>

