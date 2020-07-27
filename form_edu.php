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
	<title>Education</title>
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
	height:450px;
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
	<h1 style="float: left;">Education Details:</h1>
			<br>
		<br>
		<form action="form_edu.php" method="post">
			<table>
					<tr>
					<td>TITLE</td>	<td><input style="width:100%" type="text" name="title_p" placeholder="Enter TITLE" required ></td>
				</tr>
				<tr>
					<td>Details</td> <td><textarea class="abs" name="content_p" placeholder="Enter content of Post here" required ></textarea> </td>
				</tr>
				<tr>
					<td>From Date</td>	<td><input class="abs" type="Date" name="exp_date" id="dates"></td>
				</tr>
				<tr>
					<td>To Date</td>	<td><input class="abs" type="Date" name="to_exp_date" id="daates"></td>
				</tr>
				<tr>
					<td></td><center>	<td><button style="width:100%" type="submit" name="publish" >Publish</button></td></center>
				</tr>
				</table>
			

		</form>


	</div>
		</center>
</body>
</html>


<?php
if(isset($_POST["publish"]))
{


$title=mysqli_real_escape_string($con,$_POST["title_p"]);
$info=mysqli_real_escape_string($con,$_POST["content_p"]);
$from_date=mysqli_real_escape_string($con,$_POST["exp_date"]);
$to_date=mysqli_real_escape_string($con,$_POST["to_exp_date"]);

$query=$con->prepare("INSERT INTO education(title,discription,from_date,to_date,author) VALUES(?,?,?,?,?)");
$query->bind_param("sssss",$title,$info,$from_date,$to_date,$author);
$query->execute();
echo "Education  Added Sucessfully";

$query->close();

}


?>