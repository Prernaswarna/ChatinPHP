<!DOCTYPE html>

<html>

<head>
<title>Sign up</title>
<style>
body
{
background-color:#EEEEEE;
}
#continue
{
	 background-color:maroon;
        color:white;
	border-color:maroon;
}
</style>
</head>

<body>

<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	//check if fields are empty

	$email=$password=$confirm="";

	if (empty($_POST["email"]))
	{
		die( "<br><br><h3 style='text-align:center;'>Email is required<h3>");
	}
	else
	{
		$email = test_input($_POST["email"]);
	}



	if (empty($_POST["password"]))
	{
     		die( "<br><br><h3 style='text-align:center;'>Password is required</h3>");
    	}
   	else
    	{
    		$password = test_input($_POST["password"]);
   	}

	if($_POST["password"] != $_POST["confirm"])
	{
		die("<br><br><h3 style='text-align:center'>Confirm password must match password<h3>");
	}

	//validate fields

	if (!filter_var($email, FILTER_VALIDATE_EMAIL))
	{
		die("<br><br><h3 style='text-align:center'>Email invalid</h3>");
	}

	//enter values to table

	$servername = "localhost";
	$user="guest";
	$pass="Guest123#";
	$dbname="first_year";
	

	$conn = new mysqli($servername, $user, $pass, $dbname);

	if ($conn->connect_error) 
	{
    		die("<br><br><h3 style='text-align:center'>Connection failed:</h3> " . $conn->connect_error);
	}

	$sql1 = "SELECT email FROM prerna_user";

	$result = $conn->query($sql1);
	
	$em="";

	if($result->num_rows>0)
	{
		 while($row = $result->fetch_assoc())
		{
			$em = $row["email"];
			if($em==$email)
				die("<br><br><h3 style='text-align:center'>Email is already registered</h3>");
		}
	} 


	//insert into table
	$hash="";
	$hash = password_hash($password , PASSWORD_BCRYPT);
	$sql = "INSERT INTO prerna_user (email , password)
	VALUES ('$email' , '$hash')";

	if ($conn->query($sql) === TRUE) 
	{
		echo("<br><br><h3 style='text-align:center;color:black;'>You have signed up sucessfully<h3>");
	}
	 else 
	{
	    echo "Error: " . $sql . "<br>" . $conn->error;
	} 
	
	//echo '<script>window.open("login.html")</script>';
	

	/*echo '<script>
	var form = document.createElement("FORM");
	form.method="POST";
	form.action = "log.php";	
	var input = document.createElement("INPUT");
	input.id="emails";
	input.name="emails";
	input.type="hidden";
	input.value= "abc@gmail.com";
	form.appendChild(input);
	document.body.appendChild(form);
	window.open("log.php");	
	form.submit();
	</script>'*/

	echo '<div style="text-align:center"><form method="post" action="log.php"><input type="email" id="emails" name="emails" value='.$email.'><br><br><input type="submit" value="Continue" name="continue" id="continue"></form></div>';

	$conn->close();



}



function test_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

</body>

</html>


