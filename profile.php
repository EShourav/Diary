<?php

	include("connect.php");
	include("functions.php");

	$title = $_SESSION['email'];

	
	$result = mysqli_query($con, "SELECT firstName, image, lastName, date, bday FROM users WHERE email='$title'");


	//$name = mysqli_fetch_assoc($result);
  	// echo $name;
   $img_src="";
   while ($row=mysqli_fetch_row($result))
    {
    	$name = $row[0];
	    $img_src=$row[1];
	    $name2 = $row[2];
	    $date = $row[3];
	    $bday = $row[4];
    }

	if(logged_in())
	{	
	?>
	<?php


	?>

		<div id="wrapper">
			<div id="menu">
				Welcome <?php echo $name; ?> 
				<a href="profile.php">Home</a>
				<a href="newPage.php">New Page</a>
				<a href="archieve.php">Archieve</a>
				<a href="logout.php">Logout</a>
			</div>
			<div id="photo_panel">
				<p style="text-align: center"><img src="images/<?php echo $img_src; ?>" alt="<?php echo $name; ?>" style="width: 25%; text-align: center"  ></p>
			</div>
			<div id="formDiv">
				<p style="text-align: center; font-size: 20px; font-style: bold">Basic Informations<br/></p>
				Account created: <?php echo $date; ?> <br/>
				Name: <?php echo $name;?> <?php echo $name2; ?> <br/>
				Birth date: <?php echo $bday; ?> <br/>
				Email: <?php echo $title; ?><br/>
			</div>
		</div>
	

	<?php
	
	}
	else
	{
		echo "Your are not logged in!!";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title> <?php echo $name; ?> </title>
	<link rel="stylesheet" href="css/profileStyle.css">
</head>
<body>
	
</body>
</html>