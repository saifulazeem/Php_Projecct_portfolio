<?php


		session_start();
						
		
		
   		 

   		  
   		  $author="saif";
   		
		
		//else if(!isset($_SESSION['loged_user'] ))
		
		include("connection.php");

		$query = $con->prepare("SELECT * FROM title_name WHERE author = ?");
		$query->bind_param("s",$author);
		$query->execute();
		$result = $query->get_result();
		$query->close();



		//check if logout button is pressed

		if (isset($_GET['logout']))
		 {
				session_destroy();
			header("location:login.php");
		}



		
		
	?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/navbar.css">
</head>

<style type="text/css">
	
	body
	{
		background-image: url("images/img1.jpg");

	}

	
	

		
.text
{
	background-color: white;
	text-align: center;
	font-size: 45px;
	font-family: "Times New Roman", Times, serif;
	 font-style: oblique;
}
.btn 
{
	padding: 20px;
	text-align: center;

	

}

.btn a
{
	text-decoration: none;
		display: block;
		color: white;
		text-align: center;
		padding: 15px;
		background-color: black;
		width: 250px;
		font-size: 35px;
			font-family: "Times New Roman", Times, serif;


}

.btn a:hover
{
	opacity: 0.8;
}

#btnn
{
	background-color: black;
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
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>


	<div class="text">

		<?php 


		if($result->num_rows>0){	

			while($row = $result->fetch_assoc()) {

				$num=$row["name"];
			}


		 ?>

		<p><b><?php echo  $num ;    ?></b></p>
	</div>

<?php } ?>



	<div class="btn">

		<button id="btnn"><a href="user_about.php">About My-Self</a></button>
</div>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
<div style="text-align: center; background-color: black; border-radius: 25px;
  border: 2px solid #73AD21;">
	<br>
<footer>
  	<a href="https://www.facebook.com/saif.azeem1"><img style="width: 50px; height: 45px" src="images/fb.png"></a><a href="#twitter"><img style="width: 50px; height: 45px" src="images/twr1.png"></a><a href="https://www.linkedin.com/in/muhammad-saif-ul-azeem-abbasi-1b71b417a/"><img style="width: 60px; height: 45px" src="images/in2.png"></a>
  	<br>
  	<br>

  	<label style="color: gray;">© 2020 Copyright</label>
  	 
</footer>
</div>

</body>
</html>