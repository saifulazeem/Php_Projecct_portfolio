<?php
include("connection.php");


		session_start();
						
	
   		  $author="saif";
		

   	

		$query = $con->prepare("SELECT * FROM picture WHERE author = ?");
		$query->bind_param("s",$author);
		$query->execute();
		$result = $query->get_result();
		
		$query->close();


		$query1 = $con->prepare("SELECT * FROM intro WHERE author = ?");
		$query1->bind_param("s",$author);
		$query1->execute();
		$result1 = $query1->get_result();
		if($result1->num_rows>0){	

			while($row = $result1->fetch_assoc()) {

				$name1=$row["name"];
				$my_self=$row["my_self"];
			}
		}
		$query1->close();




		$query2 = $con->prepare("SELECT * FROM experience WHERE author = ?");
		$query2->bind_param("s",$author);
		$query2->execute();
		$result2 = $query2->get_result();
		if($result2->num_rows>0)
		{	

			while($row = $result2->fetch_assoc()) {

				$title=$row["title"];
				$from=$row["from_date"];
				$to=$row["to_date"];
				$dec=$row["discription"];

			}
		}
		$query2->close();



		$query3 = $con->prepare("SELECT * FROM education WHERE author = ?");
		$query3->bind_param("s",$author);
		$query3->execute();
		$result3 = $query3->get_result();
		if($result3->num_rows>0){	

			while($row = $result3->fetch_assoc()) {

				$title1=$row["title"];
				$from1=$row["from_date"];
				$to1=$row["to_date"];
				$dec1=$row["discription"];
			}
		}
		$query3->close();




		$query4 = $con->prepare("SELECT * FROM skills WHERE author = ?");
		$query4->bind_param("s",$author);
		$query4->execute();
		$result4 = $query4->get_result();

		if($result4->num_rows>0)
		{	

			while($row = $result4->fetch_assoc()) 
			{

				
				$idss=$row["id"];
				$aut=$row["author"];
				$skillss=$row["skills"];
			}
		}

		$query4->close();













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
	background-color: white;
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
	background-color: white;
	padding: 15px;
}
.edu
{
	background-color: white;
	padding: 15px;
}
.skills
{
	background-color: white;
	padding: 15px;
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




<div class="pic">
	<?php

		if($result->num_rows>0)
		{	

			while($row = $result->fetch_assoc()) {

				
		
		

	?>


	 <img src="images/my.jpg "> 

	<?php   }} ?>

</div>

<div class="intro">
	
<p>
	<h1> <?php  echo   $name1      ?> </h1>
		<h2>About My-Self:</h2><br>
		<?php
		echo $my_self;

		?>



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

	<h1>Experience</h1>
	<h2><?php echo $title;       ?> </h2>
	<p><?php  echo $from;   ?>:<b>to</b><?php  echo $to;   ?></p>
	<h2>Description:</h2>
	<p><?php   echo $dec;  ?>
	</p>
	

</div>


<div class="edu">

	<h1>Education</h1>
	<h2><?php echo $title1;       ?> </h2>
	<p><?php  echo $from1;   ?>:<b>to</b><?php  echo $to1;   ?></p>
	<h2>Description:</h2>
	<p><?php   echo $dec1;  ?>
	</p>
	
</div>


<div class="skills">

	<h1>Skills</h1>
	<p><h2> <?php   echo $skillss;   ?> </h2></p>
	
</div>

<br>


<div style="text-align: center;">
<footer>
  	<a href="#facebook"><img style="width: 80px; height: 45px" src="images/fb.png"></a><a href="#twitter"><img style="width: 80px; height: 45px" src="images/twr1.png"></a><a href="#in"><img style="width: 100px; height: 45px" src="images/in2.png"></a>
</footer>
</div>
</body>
</html>