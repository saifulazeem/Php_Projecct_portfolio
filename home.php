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
	<title>Admin Home</title>
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


#p1
{
	font-size: 24px;
	
	font-family: "Times New Roman", Times, serif;

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

			<div style="color: red;float: right;width: 16%;padding: 4px">
		<p id="p1">Hi <?php echo $author; ?> !</p>
		</div>	


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
	

		

	


	 
			<div style="background-color: black; width: 20%; height: 170px; text-align: center;padding: 10px">
				<form action="home.php" method="get">
					<h2 style="color: white">Enter Title name</h2>
					
					<input  style="width: 190px;height: 35px"    type="text" name="desk_name" placeholder="Enter your Name" class="a1" required><br><br>
					<input  style="background-color: black;width: 80px;height: 40px;color: white"   type="submit" name="dsk_name" value="Enter">
					
				</form>
			</div>


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

		<button id="btnn"><a href="about.php">About My-Self</a></button>
</div>
	<br>
	
	<br>
<div style="text-align: center;">
<footer>
  	<a href="#facebook"><img style="width: 70px; height: 45px" src="images/fb.png"></a><a href="#twitter"><img style="width: 70px; height: 45px" src="images/twr1.png"></a><a href="#in"><img style="width: 80px; height: 45px" src="images/in2.png"></a>
</footer>
</div>

</body>
</html>


<?php

if(isset($_GET["dsk_name"]))
{
	$name=mysqli_real_escape_string($con,$_GET["desk_name"]);

	$query=$con->prepare("INSERT INTO title_name(name,author) VALUES(?,?)");
	$query->bind_param("ss",$name,$author);
	$query->execute();
	

	//echo '<script language=javascript>';
	//echo 'alert("Sucessfully Enter Nmae '.$name.'")';
	//echo '</script>';
	$query->close();
}
else
{
	echo "Sorry no name Entered";
}



?>