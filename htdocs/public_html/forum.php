<!DOCTYPE html>
<html lang="en">

<?php
  session_start();
  include_once "library/user_manager.php";
  include "library/forums_manager.php";
  
  $forumPosts = get_posts($_POST["forumId"]);
?>

<html>
  <?php include "templates/head.php" ?>

  <body>

    <?php include "templates/nav.php" ?>

    <div class="container">
      Welcome to forum <?php echo $_POST["forumId"]; ?>
      <table class="table table-hover table-dark">
        <thead>
          <tr>
            <td>Forum</td>
            <td>Creator</td>
            <td>Last Updated</td>
            <td>Created</td>
          </tr>
        </thead>
        <tbody class="bg-dark">
        <?php if ($forumPosts) {
          foreach($forumPosts as $post) {
            echo "
            <tr>
              <td>".$post->subject."</td>
              <td>".$post->body."</td>
              <td>".$post->created_date."</td>
              <td>".$post->creator."</td>
            </tr>";
          }
        }
        ?>    
        </tbody>
      </table>

      <?php
        if (logged_in()) {
          echo "
          <a href='new_post.php'>Create New Post</a>
          ";
        }
      ?>

    </div>

  </body>
</html>