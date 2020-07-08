<!DOCTYPE html>

<head>
<title>Edit profile</title>
<style>
#box
{
        background-color:white;
        width:40%;
        margin : auto;
        padding : 2% 5% 3% 7%;
        border : 2px solid black;
        border-radius:30px;
}
body
{
        background-color:black;
}
h3
{
        text-align:center;
}
#send
{
         background-color:maroon;
        color:white;
	border-color:maroon;
	padding:5px 10px;
}
</style>
</head>


<body>
<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$email = $_POST["email"];
	
	$servername = "localhost";
	$user="guest";
	$pass="Guest123#";
	$dbname="first_year";
	

	$conn = new mysqli($servername, $user, $pass, $dbname);

	if ($conn->connect_error) 
	{
    		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT username, firstname, lastname , email , phone , gender FROM prerna_user WHERE email = '$email' ";

		$username = "";
		$firstname = "";
		$lastname = "";
		$phone = "";	
		$gender = "";
	

	$result = $conn->query($sql);

	$row = $result->fetch_assoc();

	if($result==TRUE)
	{
		$username = $row["username"];
		$firstname = $row["firstname"];
		$lastname = $row["lastname"];
		$phone = $row["phone"];	
		$gender = $row["gender"];
		
	}

	
	echo '<div id="box"><h3>Edit Details</h3><form method="post" action="edit.php" enctype="multipart/form-data">
Firstname :<br><input type="text" id="firstname" name="firstname" value='.$firstname.'><br>Lastname :<br><input type="text" id="lastname" name="lastname" value='.$lastname.'><br>Phone :<br><input type="text" id="phone" name="phone" value='.$phone.'><br>Gender<br>
<input type="radio" id="male" name="gender" value="male">Male
<input type="radio" id="female" name="gender" value="female">Female
<input type="radio" id="other" name="gender" value="other">Other
<br>Password :<br><input type="password" name="password" id="password"><br>
Confirm Password :<br><input type="password" name="confirm" id="confirm"><br>
<input type="hidden" id="email" name="email" value='.$email.'><br>
<br><br><input type="submit" value="Edit" name="Edit" id="send"></form></div>';

}

?>

</body>
</html>
