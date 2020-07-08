<!DOCTYPE html>


<?php



if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	//check for empty and validate username and password	

	$username = $password = "";

	if (empty($_POST["username"]))
    	{
     		die("<br><br><h3 style='text-align:center;'>Name is required</h3>");
    	}
	else
	{
		$username = test_input($_POST["username"]);
	}

	if (empty($_POST["password"]))
	{
		die( "<br><br><h3 style='text-align:center;'>Password is required</h3>");
	}
	else
	{
		$password = test_input($_POST["password"]);
	}
	
	if (!preg_match("/^[a-zA-Z0-9 ]*$/",$username))
	{
		die("<br><br><h3 style='text-align:center;'>Invalid username</h3>");
	}

	

	//check if username exists

	$servername = "localhost";
	$user="guest";
	$pass="Guest123#";
	$dbname="first_year";
	
	$conn = new mysqli($servername, $user, $pass, $dbname);

	if ($conn->connect_error) 
	{
    		die("Connection failed: " . $conn->connect_error);
	}

	
	$sql1 = "SELECT username ,email , password FROM prerna_user";	
	
	$result = $conn->query($sql1);

	$use="";
	$pas="";
	$check=0;
	
	

	
	if($result->num_rows>0)
	{
		 while($row = $result->fetch_assoc())
		{
			$check=0;
			$use= $row["username"];
			if($use==$username)
			{
				$check=$check+1;
			}
			$pas=$row["password"];
			if(password_verify($password , $pas))
			{
				$check=$check+1;
			}
			if($check==2)
			{

				echo("<br><br><h3 style='text-align:center;'>Signed in sucessfully</h3>");
				

				//go to user list page
				
				$email = $row["email"];
				

				
				echo '<div style="text-align:center"><form method="post" action="lists.php"><input type="hidden" id="emails" name="emails" value='.$email.' readonly><input type="submit" value="List" name="List" id="List"></form></div>';
			}
			
		}
	} 
	$conn->close();
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<html>
<head>
<title>Sign in</title>
<style>
body
{
background-color:#EEEEEE;
}
#List
{
         background-color:maroon;
        color:white;
	border-color:maroon;
	padding:5px 10px;
}

</style>


</head>

<body>


</body>

</html>
