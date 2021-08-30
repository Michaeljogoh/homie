<?php 
   session_start();
   include ('../db_rep/db.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
               <?php

                   if(isset($_POST['submit'])){
                   	$error= array();

                   	if(empty($_POST['email'])){
                   		$error['email'] ="please fill in your mail";
                   	}else{
                   		$email = mysqli_real_escape_string($db, $_POST['email']);
                   	}
                   	if(empty($_POST['password'])){
                   		$error['password'] = "oga put password";
                   	}else{
                   		$password = mysqli_real_escape_string($db, $_POST['password']);
                   	}
                   	if(empty($error)){
                   		$q = mysqli_query($db, "SELECT * FROM admin WHERE email='".$email."' AND password = '".$password."' ") or die (mysqli_error($db));
                   		// echo mysqli_num_rows($q);
                   		if(mysqli_num_rows($q)==1){
                   		while ($result =mysqli_fetch_array($q)) {
                   				// echo $result[3];
                             
                           $_SESSION['id'] = $result[0];
                           $_SESSION['name'] = $result[1];
                           header("location:admin_home.php");

                   			}	

                   		}else{
                   			$msg = "Invalid details look again";
                   			header("location:admin_login.php?msg=$msg"); 
                   		}
                   	}
                   }
                   if(isset($_GET['msg'])){
                      echo "<h3>" .$_GET['msg']. "</h3>"; 
                   }else{

                   }

                ?>
	<form action="" method="post">
		  <p>username<input type="mail" name="email" placeholder="example@gmail.com"></p>
		  <p>password<input type="password" name="password"></p>
		  <br><a href="doctor.php">Sign up</a><br>
		  <input type="submit" name="submit" value="Login">
		  <input type="submit" name="submit" value="Login">
		  

	</form>

</body>
</html>