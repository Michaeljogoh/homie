<?php 
   
   include ('../db_rep/db.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Doctor SIGN UP</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body style="background-color: #F0F2F5">
       <?php 
        if(isset($_POST['submit'])){
        	$error = array();
        	$default_size=2097152;
        	// $extension = array("image/jpg", "image/jpeg", "image/png");

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
        	if(empty($_POST['mail'])){
        		$error['mail'] = "Yes insert your mail";
        	}else{
        		$mail = mysqli_real_escape_string($db, $_POST['mail']);
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
          if(empty($_POST['hn'])){
            $error['hn'] = "Yes you go like put password";
          }else{
            $hn =mysqli_real_escape_string($db, $_POST['hn']);
           }
           if(empty($_POST['ld'])){
            $error['ld'] = "Yes you go like put password";
          }else{
            $ld =mysqli_real_escape_string($db, $_POST['ld']);
           }
        	if(empty($_POST['password'])){
        		$error['password'] = "Yes you go like put password";
        	}else{
        		$password =mysqli_real_escape_string($db, $_POST['password']);
           }
           if(empty($_POST['password'])){
           	$error['password'] = "fill in this part";
           }else{
           	$sp = md5(mysqli_real_escape_string($db, $_POST['password']));
           }
           if($_FILES['upload']['size'] > $default_size){
           	 echo "File is big";
           }else{
           	$filename = str_replace("", "_", $_FILES['upload']['name']);
             $destination = 'images/' .$filename;
             if(move_uploaded_file($_FILES['upload']['tmp_name'], $destination )){
             			echo "File succesfully Uploaded";
             		}
           }
           if(empty($error)){
           	$q = mysqli_query($db, "INSERT INTO doctor VALUES(NULL, '".$name."', '".$age."', '".$mail."', '".$state."', '".$text."', '".$phone."', '".$hn."', '".$ld."', '".$filename."', '".$password."', '".$sp."') ")or die (mysqli_error($db));

           	$msg = "Succssfully captured <a class=\"s\" href=\"doc_login.php\">Click to login</a>";
           	header("location:doc_sign.php?msg=$msg");
           }
       }


       if(isset($_GET['msg'])){
       	 echo "<h3 class=\"og\">" .$_GET['msg']. "</h3>";
     }
       unset($name);
       unset($age);
       unset($mail);
       unset($state);
       unset($text);
       unset($phone);
       unset($password);
       unset($sp);
           ?>
           <div>
       <img class="logo" src="logo2.png">
       <img class="location" src="location.png">
       <label>Ikeja, 35 Olowu Street</label>
       <div class="links">
  <a class="q" href="index.php">HOME</a>
  <a class="q" href="About.php">ABOUT US</a>
  <a class="q" href="contact.php">CONTACT US</a>
  
</div>
</div>
          <div class="container">
            <div id="div1">
               <img src="doc.png" width="300" height="800">
            </div>
            <div id="div2" >
       
	<form enctype="multipart/form-data" action="" method="post">
		<p class="w">NAME :<br><input class="mil" type="text" name="name" value="<?php if(isset($name)) echo $name ?>"><?php if(isset($error['name'])) echo $error['name'] ?></p>
		<p class="w"> AGE:<br>
			<select class="mil" name="age">
				<option class="op" value="">Select Age</option>
				<?php for($a=1; $a<=100; $a++){ ?>
				<option value="<?php echo $a ?>"<?php if(isset($age) && $age == $a) echo "selected = selected" ?>><?php echo $a ?></option>
				
			<?php } ?>
			</select>
			<?php if(isset($error['age'])) echo $error['age'] ?>
		</p>
		<p class="w">EMAIL<br><input class="mil" type="email" name="mail" value="<?php if(isset($mail))  echo $mail ?>"><?php if(isset($error['mail']))echo $error['mail'] ?></p>
		<?php 
          
$s = array("Abuja", "Abia", "Adamawa", "Akwa Ibom", "Anambra", "Bauchi", "Bayelsa", "Benue", "Borno", "Cross River", "Delta", "Ebonyi", "Edo", "Ekiti", "Enugu", "Gombe", "Imo", "Jigawa", "Kaduna", "Kano", "Katsina", "Kebbi", "Kogi", "Kwara", "Lagos", "Nassarawa", "Niger", "Ondo", "Osun", "Oyo", "Plateau", "Rivers", "Sokoto", "Taraba", "Yobe", "Zamfara");
	 ?> 
		 
		 <p class="w">STATE OF ORIGIN<br>
		 <select class="mil" name="state">
				<option class="op" value="">Select State of Origin</option>
                <?php foreach ($s as  $s) { ?>
                <option value="<?php echo $s ?>"> <?php if(isset($state) && $state == $s) echo "selected = selected" ?>  <?php echo $s ?>
                	
                </option>
                <?php } ?> 	
              
			</select>
			<?php if(isset($error['state']))  echo $error['state'] ?>
		</p>

		<p class="w">ADDRESS<br><textarea class="mil"  name="text" rows="1" cols="20"><?php if(isset($text))echo $text ?></textarea><?php if(isset($error['text'])) echo $error['text'] ?></p>
		<p class="w">PHONE NO:<br><input class="mil" type="number" name="phone" value="<?php if(isset($phone)) echo $phone ?>"><?php if(isset($error['phone'])) echo $error['phone'] ?></p>
    <p class="w">HOSPITAL NAME:<br><input class="mil" type="text" name="hn"></p>
    <p class="w">LICENSE ID<br><input class="mil" type="text" name="ld"></p>
		<p class="w">PASSWORD<br><input class="mil" type="password" name="password" value="<?php if(isset($password)) echo $password ?>"><?php if(isset($error['password'])) echo $error['password'] ?></p>
	    <p class="w"> Select Profile picture<br> <input type="file" name="upload"></p>
		<input class="mit" type="submit" name="submit" value="Click to submit">
		
	</form>
  </div>
     <div id="test"></div>
   </div>
</body>
</html>