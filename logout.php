
<?php include 'include/db.php'?>
<?php session_start(); ?>
<?php
   $_SESSION['username'] = null;
   $_SESSION['password'] = null;
   $_SESSION['role'] = null;
   $_SESSION['firstname'] = null;
   $_SESSION['lastname'] = null;
   
   header("Location: ../index.php");


?>

