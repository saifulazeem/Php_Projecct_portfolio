<?php


		session_start();
						
		if(isset($_SESSION['loged_user']))
		{
   		  $val = $_SESSION['loged_user'];

   		  $arr=explode("@", $val);
   		  $author=$arr[0];
   		
		}
		//else if(!isset($_SESSION['loged_user'] ))
		else
		{
			header("location:login.php");
		}
		include("connection.php");

		



		//check if logout button is pressed

		if (isset($_GET['logout']))
		 {
				session_destroy();
			header("location:login.php");
		}



		
		
	?>


<!DOCTYPE html>
<html>
<head>
	<title>About</title>
	<link rel="stylesheet" type="text/css" href="css/navbar.css">
</head>
<style type="text/css">
	
.pic

{
	width:40%;
	background-color: red;
	float: left;
}
.pic img
{
	width: 100%;

	height: 350px;

}
.intro
{
	width: 55%;
	background-color: yellow;
	float: right;
	height: 335px;
	padding: 15px;

}

.intro h1
{
	font-size: 48px;
}
.intro p
{
	font-size: 24px;
}


.experience
{
	background-color: brown;
	padding: 15px;
}
.edu
{
	background-color: red;
	padding: 15px;
}
.skills
{
	background-color: orange;
	padding: 15px;
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
			<button style="background-color: black;width: 80px;height: 40px;color: white" type="submit" name="logout" >Log Out</button>
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




<div class="pic">


	<a href="pic_upload.php"><img src="images/img1.jpg"></a>

</div>

<div class="intro">
	<a href="form_intro.php">Add</a>
<p>
	<h1>Hi My Name Is Muhammad Saif Ul Azeem</h1>
		<h2>About My-Self:</h2><br>
		my nais kbkjdbkbfkdbf
		kjdkdkhfkhfkh



</p>
</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


<div class="experience">
	<a href="form_exp.php">Add</a>
	<h1>Experience</h1>
	<h2>Title</h2>
	<p>From:<b>to</b>Till</p>
	<h2>Description:</h2>
	<p>here is Description
	</p>
	

</div>


<div class="edu">
	<a href="form_edu.php">Add</a>
	<h1>Education</h1>
	<h2>Title</h2>
	<p>From:<b>to</b>Till</p>
	<h2>Description:</h2>
	<p>here is Description
	</p>
	
</div>


<div class="skills">
	<a href="form_skills.php">Add</a>
	<h1>Skills</h1>
	<p><h2>hhjhuhi</h2><h2>jjyhjgjh</h2> </p>
	
</div>

<br>


<div style="text-align: center;">
<footer>
  	<a href="#facebook"><img style="width: 80px; height: 45px" src="images/fb.png"></a><a href="#twitter"><img style="width: 80px; height: 45px" src="images/twr1.png"></a><a href="#in"><img style="width: 100px; height: 45px" src="images/in2.png"></a>
</footer>
</div>
</body>
</html>