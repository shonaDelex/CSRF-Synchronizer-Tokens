<?php
	session_start();
	if(!isset($_SESSION["success"]))
	{
		header("location:index.php");
		exit();
	}
		
	$_SESSION["csrf"] = md5(mt_rand()+time());
?>

<html>
	<head> 
		<title>
			Login
		</title>
	</head>
	<body>
		<form id="logout" method="POST" action="logout.php">
		
		<?php if(isset($error)){echo $error."<br>";}?>
			
			<input type="submit" value="Logout"/> 			
		</form>
	</body>
	
	<script>
		window.onload=getToken();
		function getToken(){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
			  if (this.readyState == 4 && this.status == 200) {
				var form = document.getElementById("logout");
				var token = document.createElement("input");
				token.setAttribute("type", "hidden");
				token.setAttribute("name", "csrf");
				token.setAttribute("value", this.responseText);
				form.appendChild(token);
			  }
			};
			xhttp.open("POST", "retrive.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send("token");
		}
	</script>
	
</html>