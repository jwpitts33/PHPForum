<!DOCTYPE html>
<html lang="en">

<?php
  session_start();
  include "library/db_connect.php";
  include_once "library/user_manager.php";
  include "library/forums_manager.php";
  
  $forumPosts = get_posts($_POST["forumId"], $conn);

  if (isset($_POST["subject"]) && isset($_POST["body"])) {
    $success = post_to_forum($_POST["subject"], $_POST["body"], $_POST["forumId"] , $conn);

    if ($success == true) {
      header("Location: " . URI . "/public_html/forums.php");


    }
  } else {
    $success = true;
  }
?>

<html>
  <?php include "templates/head.php" ?>

  <body>

    <?php include "templates/nav.php" ?>

    <div class="container">
      <h2>Welcome to Forum <?php echo $_POST["forumId"]; ?></h2>
        <?php if ($forumPosts) {
          foreach($forumPosts as $post) {
            echo "
            <table class='table table-dark'>
              <thead>
                <tr>
                  <td>".$post->subject." by ".$post->creator." on ".$post->created_date."</td>
                </tr>
              </thead>
              <tbody class='bg-dark'>
                <tr>
                  <td>".$post->body."</td>
                </tr>
              </tbody>
            </table>
                ";
          }
        }
        ?>    

      <form id="fr" method="POST">
        Subject: <input type="text" name="subject" style="width: 500px;"><br>
        Body: <input type="text" name="body" style="width: 500px; height: 100px; margin: 10px;"><br>
        <input type="submit">
        <input type="hidden" name="forumId" value=<?php echo $_POST['forumId']; ?>>
      </form>

    </div>

  </body>
</html>