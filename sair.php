<?php
  @session_start();
  if ($_POST) {
    session_destroy();
    header("Location: index.php");
    exit(0);
  }
  header("Location: home.php");
  exit(0);
?>