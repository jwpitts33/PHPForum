<?php

  class forum {
    public $id;
    public $name;
    public $creator;
    public $created_date;
    public $updated_date;
    public $num_posts;
  }

  class forumPost {
    public $id;
    public $subject;
    public $body;
    public $creator;
    public $created_date;
  }

  function getForumsList($conn) {

    $stmt = $conn->prepare("SELECT ID, NAME, CREATOR, CREATED_DATE, UPDATED_DATE, NUM_POSTS FROM FORUMS_T");

    $stmt->execute();
    $stmt->bind_result($m_id, $m_name, $m_creator, $m_created_date, $m_updated_date, $m_num_posts);
    
    $i = 0;
    while($stmt->fetch()) {
      $new_forum = new forum();
      $new_forum->id = $m_id;
      $new_forum->name = $m_name;
      $new_forum->creator = $m_creator;
      $new_forum->created_date = $m_created_date;
      $new_forum->updated_date = $m_updated_date;
      $new_forum->num_posts = $m_num_posts;                  
      $forums[$i] = $new_forum;
      $i = $i + 1;
    }

    $stmt->close();

    return $forums;
  }

  function new_forum($forumName, $conn) {

    $stmt = $conn->prepare("INSERT INTO FORUMS_T (NAME, CREATOR, CREATED_DATE, UPDATED_DATE) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $forumName, $_SESSION["user"], date("Y-m-d"), date("Y-m-d"));

    $stmt->execute();

    return true;
  }

  function get_posts($forumNumber, $conn) {

    $stmt = $conn->prepare("SELECT ID, SUBJECT, BODY, CREATOR, CREATED_DATE FROM FORUM_POSTS_T WHERE FORUM_ID = ?");

    $stmt->bind_param("i", $forumNumber);
    $stmt->execute();
    $stmt->bind_result($m_id, $m_subject, $m_body, $m_creator, $m_created_date);
    
    $forum_posts = false;
    $i = 0;
    while($stmt->fetch()) {
      $new_post = new forumPost();
      $new_post->id = $m_id;
      $new_post->subject = $m_subject;
      $new_post->body = $m_body;
      $new_post->creator = $m_creator;
      $new_post->created_date = $m_created_date;           
      $forum_posts[$i] = $new_post;
      $i = $i + 1;
    }

    $stmt->close();

    if($forum_posts) {
      return $forum_posts;
    }
    else {
      return false;
    }

  }

  function post_to_forum($subject, $body, $forumNumber, $conn) {

    $stmt = $conn->prepare("INSERT INTO FORUM_POSTS_T (FORUM_ID, SUBJECT, BODY, CREATED_DATE, CREATOR) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $forumNumber, $subject, $body , date("Y-m-d"), $_SESSION["user"]);

    $stmt->execute();

    return true;
  }



?>