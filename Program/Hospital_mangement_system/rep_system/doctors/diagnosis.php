  <?php 
  session_start();
 include('../db_rep/db.php');
  $id= $_SESSION['id'];
  ?>
 <!DOCTYPE html>
<html>
<head>
	<title>Treat Patient</title>
</head>
<body>
	<a href="doc_home.php ">HOME</a>
    <a href="view_patient.php">VIEW PATIENT</a>
    <a href="diagnosis.php">TREAT PATIENT</a>
    <hr>
    <h4>Insert treatment  details</h4>
	        <?php 
             if(isset($_POST['submit'])){
             	$error = array();

            if(empty($_POST['di'])){
            	$error['di'] ="*";
            }else{
            	$di = mysqli_real_escape_string($db, $_POST['di']);
            }
             if(empty($_POST['name'])){
            	$error['name'] ="*";
            }else{
            	$name = mysqli_real_escape_string($db, $_POST['name']); 
            }	
            if(empty($_POST['pw'])){
            	$error['pw'] ="*";
            }else{
            	$pw = mysqli_real_escape_string($db, $_POST['pw']);
            } 	
            if(empty($_POST['ph'])){
            	$error['ph'] ="*";
            }else{
            	$ph = mysqli_real_escape_string($db, $_POST['ph']);
            } 	
            if(empty($_POST['bp'])){
            	$error['bp'] ="*";
            }else{
            	$bp = mysqli_real_escape_string($db, $_POST['bp']);
            } 	
            if(empty($_POST['pt'])){
            	$error['pt'] ="*";
            }else{
            	$pt = mysqli_real_escape_string($db, $_POST['pt']);
            }
            if(empty($_POST['text'])){
            	$error['text'] ="*";
            }else{
            	$text = mysqli_real_escape_string($db, $_POST['text']);
            }
            if(empty($_POST['drug'])){
            	$error['drug'] = "*";
            }else{
            	$drug = mysqli_real_escape_string($db, $_POST['drug']);
            } 
             if(empty($_POST['date'])){
            	$error['date'] ="*";
            }else{
            	$date = mysqli_real_escape_string($db, $_POST['date']);
            } 
            if(empty($error)){
               $q = mysqli_query($db, "INSERT INTO diagnosis VALUES(NULL, '".$di."', '".$name."', '".$pw."', '".$ph."', '".$bp."', '".$pt."', '".$text."', '".$drug."', '".$date."', '".$id."') ") or die (mysqli_error($db));

               $msg = "Uploded Sucessfully	";
               header("location:diagnosis.php?msg=$msg");
           }
       }
             if(isset($_GET['msg'])){
             	echo "<h4>".$_GET['msg']. "</h4>";
             }
            	?>
     	
          <form action="" method="post">
              
		<p>patient id number<input type="text" name="di" value="<?php if(isset($di)) echo $di ?>"><?php if(isset($error['di'])) echo $error['di'] ?></p>
		<p>patient Name<input type="text" name="name"><?php if(isset($error['name'])) echo $error['name'] ?></p>	
	    <p>patient weight<input type="text" name="pw"></p>
	    <p>patient height<input type="text" name="ph"></p>
	    <p>patient blood pressure<input type="text" name="bp"></p>
	    <p>patient temprature<input type="text" name="pt"></p>
	    <p>treatment text<textarea rows="10" cols="10" name="text"></textarea></p>
	    <p>Drugs<textarea rows="10" cols="10" name="drug"></textarea></p>
	    <p><input type="date" name="date"></p>	
	    <input type="submit" name="submit" value="click to submit">

		
	</form>

</body>
</html> 