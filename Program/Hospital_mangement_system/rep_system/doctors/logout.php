<?php 

   session_start();
   include('../db_rep/db.php');
   include ('../db_rep/aunthentication.php');
   authenticate();
   unset($_SESSION['name']);
   unset($_SESSION['file']);
   header('location:doc_login.php');


   $id= $_SESSION['id'];  
  $name =$_SESSION['name'];
  $file =$_SESSION['file'];

?>