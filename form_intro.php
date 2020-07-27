
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
	<title>Intoduction</title>
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
	height:420px;
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
		
		<h1 style="float: left;">Introduction Details:</h1>
			<br>
		<br>
		<form method="get" action="form_intro.php" >

			<!--<h1>Enter you Name</h1>-->
			<input type="text" style="width:100%" name="uname" placeholder="Enter you Name" required>
			<h1>About My-Self</h1>
		<textarea type="text" class="abs" name="u_details" placeholder="Enter you Details" required></textarea><br>
			<button type="submit" style="width:100%" name="update">Submit</button>

			
		</form>
	</div>

</body>
</html>



<?php

if (isset($_GET["update"]))
 {
	$uname=mysqli_real_escape_string($con,$_GET["uname"]);
	$u_detail=mysqli_real_escape_string($con,$_GET["u_details"]);

	$query=$con->prepare("INSERT INTO intro(name,my_self,author) VALUES(?,?,?) ");
	$query->bind_param("sss",$uname,$u_detail,$author);
	$query->execute();

	$query->close();

	echo "Detail Are Sucessfully Added";
}



?>