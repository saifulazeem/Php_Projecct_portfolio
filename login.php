<!DOCTYPE html>
<html>
<head>
  <title>login</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/navbar.css">
</head>

<?php


include("connection.php");

?>

<style>


.Contact
{
	padding-left: 20px;
	padding-right: 20px;
	width: 50%;
	height:500px;
	background-color:white;
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
			
			
		</header>

	</div>

<br>
<br>
<br>
<br>

<center>
 <div class="Contazct"> 
<form action="login.php" method="POST">
  <div  class="imgcontainer">
    <img src="images/logimg.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <center>

    <label for="uname"><b>Email</b></label><br>
    <input type="text" placeholder="Enter Email" name="uname" required>
    <br>

    <label for="psw"><b>Password</b></label><br>
    <input type="password" placeholder="Enter Password" name="psw" required>
    <br>
    <button type="submit" name="login">Login</button>
      </center>
  </div>

</form>
</div>
</center>
</body>
</html>




<?php

if (isset($_POST["login"]))
{
    $user=mysqli_real_escape_string($con,$_POST["uname"]);
    $pass=mysqli_real_escape_string($con,$_POST["psw"]);

    $query=$con->prepare("SELECT * FROM user WHERE  email=? AND password=?");

      $query->bind_param("ss",$user,$pass);
      $query->execute();
      $result=$query->get_result();

      if ($result->num_rows===0)
      
        exit('<h1 style="background:black; position:absolute;top:5px;right:10px; border:red ; border-style:outset ;color:red">No user exists</h1>');


      
    while($row=$result->fetch_assoc())
   {
       $id= $row['id'];
       $uname_db = $row['email'];
       $password_db = $row['password'];
    }
    
    $query->close();
  
    session_start();

    $_SESSION['loged_user']=$uname_db;

    echo '<script language=javascript>';
    echo 'alert("Sucessfuly loged in '.$_SESSION['loged_user'].' ")';
    echo '</script>';


      header("location:home.php");

  }


?>