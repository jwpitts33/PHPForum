<!DOCTYPE html>
<html lang="en">

<?php
  session_start();
  include_once "library/user_manager.php";
  include_once "library/forums_manager.php";

  $forums = getForumsList();
?>

<html>
  <?php include "templates/head.php"; ?>

  <body>
    <?php include "templates/nav.php"; ?>

    <div class="container">
      <h1>Forums</h1>

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
          <?php
            foreach($forums as $forum) {
              echo "
              <tr onclick='forumRedirect(".$forum->id.")'>
                <td>".$forum->name."</td>
                <td>".$forum->creator."</td>
                <td>".$forum->updated_date."</td>
                <td>".$forum->created_date."</td>
              </tr>

              <form id='fr".$forum->id."' action='forum.php' method='POST'>
                <input type='hidden' name='forumId' value='".$forum->id."'>
              </form>
              ";
            }
          ?>
        </tbody>

      </table>

      <?php
        if (logged_in()) {
          echo "
          <a href='new_forum.php'>Create New Forum</a>
          ";
        }
      ?>

    </div>

    <script>
      function forumRedirect(id) {
          document.getElementById("fr"+id).submit();
      }
    </script>

  </body>

</html>