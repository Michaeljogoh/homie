<?php 
    session_start();
    include('../db_rep/db.php');
  $id= $_SESSION['id'];  
  $name =$_SESSION['name'];
  ?>

<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
</head>
<body>
	        
	        <a href="view_doc.php">VIEW REGISTERED DOCTORS</a>
	        
</body>
</html>