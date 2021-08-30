<?php 
   session_start();
   include ('../db_rep/db.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>::Doctor::</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body style="background-color: #F0F2F5">
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
                   		$q = mysqli_query($db, "SELECT * FROM doctor WHERE email='".$email."' AND password = '".$password."' ") or die (mysqli_error($db));
                   		// echo mysqli_num_rows($q);
                   		if(mysqli_num_rows($q)==1){
                   		while ($result =mysqli_fetch_array($q)) {
                   				// echo $result[3];
                             
                           $_SESSION['id'] = $result[0];
                           $_SESSION['name'] = $result[1];
                           $_SESSION['file'] = $result[9];
                           header("location:doc_home.php");

                   			}	

                   		}else{
                   			$msg = "Invalid details look again";
                   			header("location:doc_login.php?msg=$msg"); 
                   		}
                   	}
                   }
                   if(isset($_GET['msg'])){
                      echo "<h3 class=\"go\">" .$_GET['msg']. "</h3>"; 
                   }else{

                     

                   }
                    // foreach ($error as $err) {
                    //      echo "<p class=\"er\">$err</p>";
                    //  }
                     
                   

                ?>
        <div>
       <img class="logo" src="logo2.png">
       <img class="location" src="location.png">
       <label>Ikeja, 35 Olowu Street</label>
       <div class="links">
  <a class="q" href="index.php">HOME</a>
  <a class="q" href="About.php">ABOUT US</a>
  <a class="q" href="contact.php">CONTACT US</a>
  <a class="q" href="doc_login.php">DOCTOR</a>
</div>
</div>
     <div class="main">
       
      <div class="div1">
        <img src="doc.png" width="300" height="350">
      </div>
      <div class="div2">
        <form action="" method="post">
      <p class="pp">Username:<br><input class="mil" type="mail" name="email" placeholder="emample@gmail.com"></p>
      <p class="pp">Password:<br><input class="mil" type="password" name="password"></p>
     
      <input class="login" type="submit" name="submit" value="Login">
      <img id="y" src="icons8-login-24.png">

  </form>
   <p id="pp">Don't have an account?</p>
  <a class="sign" href="doc_sign.php">Sign up</a>
      </div>


     </div>
	

</body>
</html>