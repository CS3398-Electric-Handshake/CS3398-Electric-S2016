<?php
 session_start();
 if (!isset($_SESSION['user'])) {
  header("Location: Index.php");
 } else if(isset($_SESSION['user'])!="") {
  header("Location: Home.php");
 }
 
 if (isset($_GET['logout'])) {
  unset($_SESSION['user']);
    unset($_SESSION['email']);
     unset($_SESSION['ind']);
  session_unset();
  session_destroy();
  header("Location: Index.php");
  exit;
 }