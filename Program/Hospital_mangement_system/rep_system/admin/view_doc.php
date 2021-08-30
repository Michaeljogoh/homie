<?php 
  session_start();
 include('../db_hms/db.php');
$v = mysqli_query($db, "SELECT * FROM doctor ") or die (mysqli_error($db));

	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
	<body>
		<table border="1">
			 <tr>
			 	<th>NAME</th><th>AGE</th><th>EMAIL</th><th>STATE</th><th>ADDRESS</th><th>PHONE NO</th><th>HOSPITAL NAME</th><th>LICENSE ID</th>
			 </tr>
			 <tr>
			 	  <?php while($result = mysqli_fetch_array($v)){ ?>
			 	  <td><?php echo $result[1] ?></td>
			 	  <td><?php echo $result[2] ?></td>
			 	  <td><?php echo $result[3] ?></td>
			 	  <td><?php echo $result[4] ?></td>
			 	  <td><?php echo $result[5] ?></td>
			 	  <td><?php echo $result[6] ?></td>
			 	  <td><?php echo $result[7] ?></td>
			 	  <td><?php echo $result[8] ?></td>
			 	  <td><a href="view_patient.php">View Patient</a></td>
			 	</tr>
			<?php } ?>
</table>
	
	</body>
	</html>
