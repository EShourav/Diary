<?php
	include("connect.php");
	include("functions.php");

	$title = $_SESSION['email'];

	$result = mysqli_query($con, "SELECT id, firstName FROM users WHERE email='$title'");

   while ($row=mysqli_fetch_row($result))
    {
    	$id = $row[0];
	    $name=$row[1];
    }

	if(isset($_POST['submit']))
	{
		$write = $_POST['write'];
		$date = date("F, d Y");

		$insertQuery = "INSERT INTO data(id, date, message) VALUES ('$id','$date','$write')";
		if(mysqli_query($con, $insertQuery))
		{
			
			echo "Sucessfully inserted!!";

			header("refresh:2; url=newPage.php");
		}

	}
?>


<head>
	<title>New Page</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>


<body>
	<div id="wrapper">
		<div id="menu">
			Welcome <?php echo $name; ?> 
			<a href="profile.php">Home</a>
			<a href="newPage.php">New Page</a>
			<a href="archieve.php">Archieve</a>
			<a href="logout.php">Logout</a>
		</div>
		<div id="formDiv">
			<form method="POST" action="newPage.php" enctype="multipart/form-data">
				<label>Leave you message here:</label><br/>
				<input type="text" name="write" style="width: 300px; height: 50px; font-size: 15px"><br/><br/>
				<input type="submit" class="theButtons" name="submit"/>
			</form>
		</div>
			
		</div>
	</div>
			
</body>