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
?>

<head>
	<title>Archieve Page</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div id="wrapper">
		<div id="menu">
			Welcome <?php echo $id; ?> 
			<a href="profile.php">Home</a>
			<a href="newPage.php">New Page</a>
			<a href="archieve.php">Archieve</a>
			<a href="logout.php">Logout</a>
		</div>
		<div id="formDiv">
			<table style="width:100%">
			    <tr>
				    <th>Date</th>
				    <th>Message</th> 
				</tr>
			</table>
			<?php
				$results= mysqli_query($con, "SELECT date, message FROM data WHERE id='$id'");

			while ($row=mysqli_fetch_row($results))
		    {
		    	
			   echo '<tr>
					<th><b>'.$row[0].'</b></th>
					<th>'.$row[1].'</th><br/>
				</tr>';
		    }
			?>
		</div>
	</div>
</body>