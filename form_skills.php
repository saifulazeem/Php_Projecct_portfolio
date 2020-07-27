<?php

include("connection.php");


		session_start();
						
		if(isset($_SESSION['loged_user']))
		{
   		  $val = $_SESSION['loged_user'];

   		  $arr=explode("@", $val);
   		  $author=$arr[0];
   		
		}

	if (isset($_GET['logout']))
		 {
				session_destroy();
			header("location:login.php");
		}


?>


<!DOCTYPE html>
<html>
<head>
	<title>Skills</title>
	<link rel="stylesheet" type="text/css" href="css/navbar.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>



<style type="text/css">
	.abs
{
   width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  
  border: 1px solid #ccc;
  box-sizing: border-box;
}
.Contact
{
	padding-left: 20px;
	padding-right: 20px;
	width: 35%;
	height:250px;
	background-color:white;
}




	
	body
	{
		background-image: url("images/img1.jpg");

	}



</style>




<body>


	<div>
		<header>
			<div class="navbar">
				<ul>
					<li><a href="home.php">HOME</a></li>
					<li><a href="#work">PROJECTS</a></li>
					<li><a href="about.php">ABOUT</a></li>
					<li><a href="contact.php">CONTACT</a></li>
				</ul>
			</div>
			<div style="position:absolute;top:5px;right:20px;padding:10px;background-color: ;color:red">

		<form id="logout" method="get">
			<input type="submit" value="Log Out" style="background-color: black;width: 80px;height: 40px;color: white" type="submit" name="logout" >
		</form>
			</div>
			
		</header>

	</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<center>
	<div class="Contact">
	<h1 style="float: left;">Add Skills:</h1>
			<br>
		<br>


	<form action="form_skills.php" method="post">

		<textarea class="abs" name="u_skills" placeholder="Enter you skills"></textarea>
		<button style="width=100%" type="submit" name="publish">PUBLISH</button>
		
	</form>
</div>

</center>


</body>
</html>


<?php

if (isset($_POST["publish"]))
 {
	$skills=mysqli_real_escape_string($con,$_POST["u_skills"]);



	$query=$con->prepare("INSERT INTO skills(skills,author) VALUES(?,?)");

	$query->bind_param("ss",$author,$skills);
	$query->execute();

	echo "Skills has been Added";

	$query->close();
}



  ?>