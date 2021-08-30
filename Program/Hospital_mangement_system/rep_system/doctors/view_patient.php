<?php 
  session_start();
 include('../db_rep/db.php');
  $id= $_SESSION['id'];   
 $v = mysqli_query($db, "SELECT * FROM patient WHERE doctor_id = '".$id."' ") or die (mysqli_error($db));

	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
	<body>
    <a href="doc_home.php ">HOME</a>
    <a href="view_patient.php">VIEW PATIENT</a>
    <a href="diagnosis.php">TREAT PATIENT</a>
    <hr>
		<table border="1">
			 <tr>
			 	<th>ID NO</th><th>NAME</th><th>AGE</th><th>WEIGHT</th><th>GENDER</th><th>BLOOD GROUP</th><th>STATE</th><th>ADDRESS</th><th>PHONE NO</th>
			 </tr>
			 <tr>
			 	  <?php while($result = mysqli_fetch_array($v)){ ?>
			 	  <td><?php echo $result[0] ?></td>
			 	  <td><?php echo $result[1] ?></td>
			 	  <td><?php echo $result[2] ?></td>
			 	  <td><?php echo $result[3] ?></td>
			 	  <td><?php echo $result[4] ?></td>
			 	  <td><?php echo $result[5] ?></td>
			 	  <td><?php echo $result[6] ?></td>
			 	  <td><?php echo $result[7] ?></td>
			 	  <td><?php echo $result[8] ?></td>
			 	  <td><a href="view_diagnosis.php">view treatment</a></td>
			 	</tr>
			<?php } ?>
</table>
	
	</body>
	</html>
