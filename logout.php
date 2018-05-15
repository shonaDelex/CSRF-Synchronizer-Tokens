<?php
	session_start(); 
	if((!isset($_SESSION["success"])))
	{
		header("location:index.php");
		exit();
	}
	if(isset($_POST['csrf'])){
		if($_POST['csrf'] == $_SESSION['csrf']){
			echo "Logout Success";
			session_destroy();
		}
		else{
			echo "csrf Check Failed";
		}
	}
	
?>