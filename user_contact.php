<!DOCTYPE html>
<html>
<head>
	<title>Contact</title>
<link rel="stylesheet" type="text/css" href="css/navbar.css">
</head>

<link rel="stylesheet" type="text/css" href="css/style.css">
<style type="text/css">
	.abs
{
   width: 40%;
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
	width: 80%;
	height:500px;
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
					<li><a href="front.php">HOME</a></li>
					<li><a href="#work">PROJECTS</a></li>
					<li><a href="user_about.php">ABOUT</a></li>
					<li><a href="user_contact.php">CONTACT</a></li>
				</ul>
			</div>
			<div class="login_btn">
				<a href="login.php">Log In</a>
			</div>
			
		</header>

	</div>
<br>
		<br>
		<br>
		<br>
<br>
		<br>
		
<center>
	<div class="Contact">

		<h1 style="float: left;">Contact Us:</h1>
			<br>
		<br>
		<br>
		<br>
		
<form method="post">
	<!---<label for="input Name">Your Name</label>--><br>
	<input type="text" name="c_user" placeholder="Please Enter your Name" required>
	<br>
	<!--	<label for="input Email">Your Email</label>--><br>
	<input class="abs" type="Email" name="c_user" placeholder="Please Enter your Email Address" required>
	<br>
	<!--<label for="input Subject">Subject</label>--><br>
	<input type="text" name="c_sub" placeholder="Please Enter your Subject" required>
	<br>
	<!---<label for="input Message">Message</label>--><br>
	<textarea class="abs" type="text" name="c_message" placeholder="Type Your Message Here" required></textarea>
	<br>
	<button type="submit" name="message_sub" >Send</button>


</form>
</div>
</center>

</body>
</html>



<?php

include "connection.php";



if (isset($_POST["message_sub"]))

 {
	
}






?>