
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
	<title>Picture Uploading</title>
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
	height:300px;
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
		<form method="post" action="pic_upload.php" enctype="multipart/form-data">
			<h1>Please Select Picture</h1>

			<input class="abs" type="file" name="pic_upload" required>
<br>
<br>
<br>
<br>
			<button type="submit" name="upload_pic"  style="width:100%">Upload</button>
			
		</form>
	</div>

</center>


</body>
</html>


<?php

if(isset($_POST["upload_pic"]))
{
	$target_dir="/images";
	$target_file=$target_dir.basename($_FILES["pic_upload"]["name"]);

	$uploadok=1;

	$imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$check = getimagesize($_FILES["pic_upload"]["tmp_name"]);

		if($check!==false)
		{
			    echo "File is an image - " . $check["mime"] . ".";
       			 $uploadOk = 1;
    	}
    else {
        echo "File is not an image.";
        $uploadOk = 0;
    	}

		if (file_exists($target_file))
		{
    		echo "Sorry, file already exists.";
    		$uploadOk = 0;
		}

		if ($_FILES["pic_upload"]["size"] > 50000000)
		 {
    		echo "Sorry, your file is too large.";
    		$uploadOk = 0;
			}

		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" )
	 {
    		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    		$uploadOk = 0;
		}

		if ($uploadOk == 0) 
		{
    		echo "Sorry, your file was not uploaded.";
		}

		else {
  
   				if (move_uploaded_file($_FILES["pic_upload"]["tmp_name"], $target_file))
   				 {

       				$name_of_uploaded_pic=basename( $_FILES["pic_upload"]["name"]);

       			echo "The file ".$name_of_uploaded_pic. " has been uploaded.";


       			$pdate=date("d/m/Y");

        			
	
        			$pic_data="img/".$name_of_uploaded_pic;


        					$query2 = $con->prepare("INSERT INTO picture(pdate,author,pic)VALUES(?,?,?)");
					$query2->bind_param("sss",$pdate,$author,$pic_data);
					$query2->execute();
					$query2->close();

    
    } 
    else
     {
        echo "Sorry, there was an error uploading your file.";
   }
}








}



?>
