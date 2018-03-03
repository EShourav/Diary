<?php
	
	include("connect.php");
	include("functions.php");

	if(logged_in())
	{
		header("location: profile.php");
		exit();
	}

	$error = "";

	if(isset($_POST['submit']))
	{
		$firstName = $_POST['fname'];
		$lastName = $_POST['lname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$passwordConfirm = $_POST['passwordConfirm'];
		$bday = $_POST['bday'];
		
		$image = $_FILES['image']['name'];
		$tmp_image = $_FILES['image']['tmp_name'];
		$imageSize = $_FILES['image']['size'];

		$conditions = isset($_POST['conditions']);

		$date = date("F, d Y");

		
		if(strlen($firstName)<3)
		{
			$error = "First name is too short!";
		}
		else if(strlen($lastName)<3)
		{
			$error = "Last name is too short!";
		}
		else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$error = "Please enter valid email address!";
		}
		else if (email_exists($email, $con)) 
		{
			 $error = "Someone is already registered with this email";
		}
		else if(strlen($password)<8)
		{
			$error = "Password must be greater than 8 characters!";
		}
		else if($password !== $passwordConfirm)
		{
			$error = "Password does not match!";
		}
		else if($image == "")
		{
			$error = "Please upload your image!";
		}
		else if($imageSize > 1048576)
		{
			$error = "Image size must be less than 1MB!";
		}
		else if(!$conditions)
		{
			$error = "You must be agree with the terms and conditions";
		}
		else
		{
			$password = md5($password);
			$imageExt = explode(".", $image);
			$imageExtension = $imageExt[1];
			
			if($imageExtension=='PNG' || $imageExtension=='png' || $imageExtension=='JPG' || $imageExtension=='jpg')
			{
				$image = rand(0, 100000).rand(0, 100000).rand(0, 100000).time().".".$imageExtension;
				$insertQuery = "INSERT INTO users(firstName, lastName, email, password, image, date, bday) VALUES ('$firstName','$lastName','$email', '$password','$image', '$date', '$bday')";
				if(mysqli_query($con, $insertQuery))
				{
					if(move_uploaded_file($tmp_image, "images/$image"))
					{
						echo "You are successfully registered!";
					}
					else
					{
						echo "Image is not uploaded";
					}
				}
			}
			else
			{
				echo "File must be an image!";
			}
		}
	}
?>


<html>
<head>
	<title>Registration Page</title>
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<div id="error" style="<?php if($error !=""){ ?> display: block; <?php } ?> "><?php echo $error ?></div>
	<div id="wrapper">
		<div id="menu">
			<a href="index.php">Sign Up</a>
			<a href="login.php">Login</a>
		</div>
		
		<div id="formDiv">
			<form method="POST" action="index.php" enctype="multipart/form-data">

				<label>First Name:</label><br/>
				<input type="text" name="fname" class="inputFields" required /><br/><br/>
				
				<label>Last Name:</label><br/>
				<input type="text" name="lname" class="inputFields" required /><br/><br/>
				
				<label>Birthday (MM/DD/YYYY):</label><br/>
				<input type="text" name="bday" class="inputFields" required /><br/><br/>
				
				<label>Email</label><br/>
				<input type="text" name="email" class="inputFields" required /><br/><br/>
				
				<label>Password</label><br/>
				<input type="password" name="password" class="inputFields" required /><br/><br/>
				
				<label>Re-enter Password</label><br/>
				<input type="password" name="passwordConfirm" class="inputFields" required /><br/><br/>
				
				<label>Image:</label><br/>
				<input type="file" name="image" id="imageupload" ><br/><br/>
				
				<input type="checkbox" name="conditions"/>
				<label>I agree with terms and conditions.</label><br/><br/>
				
				<input type="submit" class="theButtons" name="submit"/>
				
				
			</form>
		</div>
	</div>
</body>
</html>