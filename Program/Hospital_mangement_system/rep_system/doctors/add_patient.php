 <?php 
  session_start();
 include('../db_rep/db.php');
  $id= $_SESSION['id'];
  ?>


<!DOCTYPE html>
<html>
<head>
	<title>Patient Sign up</title>
     <link rel="stylesheet" type="text/css" href="css/sty.css">
     <style type="text/css">
         .c{
            color:#2AABE2;
            font-family: arial;

         }
     </style>
</head>
<body style="background-color: #F0F2F5">

          <div class="head">
     <div>
       <img class="logo" src="logo2.png">
       <img class="location" src="location.png">
       <label>Ikeja, 35 Olowu Street</label>
       <div class="links">
    <a class="q" href="doc_home.php">HOME</a>
    <a class="q" href="view_patient.php">VIEW PATIENT</a>
    <a class="q" href="diagnosis.php">TREAT PATIENT</a>
    <a class="q" href="doc_login.php">DOCTOR</a>
</div>
</div>
	<?php 
        if(isset($_POST['submit'])){
        	$error = array();
        	if(empty($_POST['name'])){
        		$error['name'] = "please input your name";
        	}else{
        		$name= mysqli_real_escape_string($db, $_POST['name']);
        	}
        	if(empty($_POST['age'])){
        		$error['age'] = "Please input your age";
        	}else{
        		$age = mysqli_real_escape_string($db, $_POST['age']);
        	}
        	if(empty($_POST['weight'])){
        		$error['weight'] = "Yes input your weight";
        	}else{
        		$weight = mysqli_real_escape_string($db, $_POST['weight']);
        	}
        	if(empty($_POST['gender'])){
        		$error['gender'] = "Yes y u no choose gender";
        	}else{
        		$gender = mysqli_real_escape_string($db, $_POST['gender']);
        	}
        	if(empty($_POST['bg'])){
        		$error['bg'] = "Yes choose blood group";
        	}else{
        		$bg = mysqli_real_escape_string($db, $_POST['bg']);
        	}
        	if(empty($_POST['state'])){
        		$error['state'] = "Yes your state";
        	}else{
        		$state = mysqli_real_escape_string($db, $_POST['state']);
        	}
        	if(empty($_POST['text'])){
        		$error['text'] = "Yes fill in your address";
        	}else{
        		$text = mysqli_real_escape_string($db, $_POST['text']);
        	}
        	if(empty($_POST['phone'])){
        		$error['phone'] = "Yes input your number";
        	}else{
        		$phone = mysqli_real_escape_string($db, $_POST['phone']);
        	}
        	if(empty($error)){
$q = mysqli_query($db, "INSERT INTO patient VALUES(NULL, '".$name."', '".$age."', '".$weight."', '".$gender."', '".$bg."', '".$state."', '".$text."', '".$phone."', '".$id."') ") or die (mysqli_error($db));

        $msg = "Uploded Sucessfully  ";
        header("location:add_patient.php?msg=$msg");
        	}

        }
        if(isset($_GET['msg'])){
        	ECHO "<h3>". $_GET['msg']."</h3>";
        }
       unset($name);
       unset($age);
       unset($weight);
       unset($gender);
       unset($bg);
       unset($state);
       unset($text);
       unset($phone);
	?>


	<form action="" method="post">

		<p class="c">NAME :<br><input class="l" type="text" name="name" value="<?php if(isset($name)) echo $name ?>"><?php if(isset($error['name'])) echo $error['name'] ?></p> 
		<p class="c"> AGE:<br>
			<select name="age">
				<option value="">Select Age</option>
				<?php for($a=1; $a<=100; $a++){ ?>
				<option value="<?php echo $a ?>"<?php if(isset($age) && $age == $a) echo "selected = selected" ?>><?php echo $a ?></option>
				
			<?php } ?>
			</select>
			<?php if(isset($error['age'])) echo $error['age'] ?>
		</p>
		<p class="c">WEIGHT:<br><input class="l" type="text" name="weight" value="<?php if(isset($weight)) echo $weight ?>"><?php if(isset($error['weight'])) echo $error['weight'] ?></p>
		<p class="c">GENDER: <br>Male<input class="l" type="radio" name="gender" value="M" <?php if(isset($gender)&& $gender == "Male") echo "checked=checked"; ?>> 
			       Female<input class="l" type="radio" name="gender" value="F" <?php if(isset($gender)&& $gender == "Female" )echo "checked=checked";  ?>>
			          <?php if(isset($error['gender'])) echo $error['gender'] ?>

		</p>
             <?php 

				$b= array("A", "B", "AB", "O");

				 ?>
		<p class="c"> SELECT BLOOD GROUP:<br>
			<select name="bg">
				<option value="">Select blood group</option>
                <?php foreach ($b as  $b) { ?>
                <option value="<?php echo $b ?>"><?php if(isset($bg) && $bg == $b) echo "selected = selected" ?> <?php echo $b ?></option>
                <?php } ?> 	
              
			</select>
			<?php if(isset($error['bg'])) echo $error['bg'] ?>
		</p>
		<?php 
          
$s = array("Abuja", "Abia", "Adamawa", "Akwa Ibom", "Anambra", "Bauchi", "Bayelsa", "Benue", "Borno", "Cross River", "Delta", "Ebonyi", "Edo", "Ekiti", "Enugu", "Gombe", "Imo", "Jigawa", "Kaduna", "Kano", "Katsina", "Kebbi", "Kogi", "Kwara", "Lagos", "Nassarawa", "Niger", "Ondo", "Osun", "Oyo", "Plateau", "Rivers", "Sokoto", "Taraba", "Yobe", "Zamfara");
	 ?> 
		 
		 <p class="c">STATE OF ORIGIN:<br>
		 <select name="state">
				<option value="">Select State of Origin</option>
                <?php foreach ($s as  $s) { ?>
                <option value="<?php echo $s ?>"> <?php if(isset($state) && $state == $s) echo "selected = selected" ?>  <?php echo $s ?>
                	
                </option>
                <?php } ?> 	
              
			</select>
			<?php if(isset($error['state']))  echo $error['state'] ?>
		</p>

		<p class="cl">ADDRESS:<br><textarea class="area"  name="text" rows="1" cols="20"><?php if(isset($text))echo $text ?></textarea><?php if(isset($error['text'])) echo $error['text'] ?></p>
		<p class="c">PHONE NO:<br><input class="l" type="number" name="phone" value="<?php if(isset($phone)) echo $phone ?>"><?php if(isset($error['phone'])) echo $error['phone'] ?></p>
		<input type="submit" name="submit" value="submit">


		
	</form>

</body>
</html>