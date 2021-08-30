<?php 
    
    include ('../db_rep/aunthentication.php');
    include('../db_rep/db.php');
    authenticate();
  $id= $_SESSION['id'];  
  $name =$_SESSION['name'];
  $file =$_SESSION['file'];
  
?>

<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
  <link rel="stylesheet" type="text/css" href="css/sty.css">
  
</head>
<body>  
  <div class="head">
     <div>
       <img class="logo" src="logo2.png">
       <img class="location" src="location.png">
       <label>Ikeja, 35 Olowu Street</label>
       <div class="links">
  <a class="q" href="index.php">HOME</a>
  <a class="q" href="add_patient.php">CREATE PATIENT</a>
  <a class="q" href="view_patient.php">VIEW PATIENT</a>
  <a class="q" href="diagnosis.php">TREAT PATIENT</a>
  <a class="q" href="logout.php">LOG OUT</a>
</div>
</div>
          
	        
          <?php echo "<h1>Hello <br>DR $name</h1>"; ?><div class="ig"><img class="i"  src="images/<?php echo $file ?>"  width="150" height="200"></div>

</body>
</html>