<?php 
       session_start();
       include('db.php');
       function authenticate(){
       	if(!isset($_SESSION['name'])&& !isset($_SESSION['file'])){
       		header("location:doc_login.php");
       	// }if (!isset($_SESSION['id'])) {
       		
       	}
       }

?>