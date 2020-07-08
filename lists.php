<!DOCTYPE html>

<html>

<head>
<title>List of users</title>
<style>
body
{
	background-color:black;
}
.box
{
	background-color:white;
	width:50%;
	margin:auto;
	padding : 2% 1% 3% 4%;
        border : 2px solid black;
        border-radius:30px;

}
h2
{
	color:white;
	text-align:center;
}
#Chat
{
	 background-color:maroon;
        color:white;
        border-color:maroon;
}
#edit
{
         background-color:maroon;
        color:white;
	border-color:maroon;
	padding:5px 10px;
}
#logout
{
         background-color:maroon;
        color:white;
	border-color:maroon;
	padding:5px 10px;
	
}

.field
{
	width:40%;
	padding:8px 8px;
	margin:8px 0;
	border-radius:4px;
}
</style>
</head>


<body>
<h2>Welcome to LiveChat</h2><br><br><br>
<?php
	error_reporting(E_ALL);
ini_set('display_errors', 1);

	$sender = $_POST["emails"];

	$servername = "localhost";
	$username="guest";
	$password="Guest123#";
	$dbname="first_year";
	
	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) 
	{
    		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT username, firstname, lastname , email , phone , gender FROM prerna_user";

	$email="";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc()) 
		{
			
			if($sender!=$row["email"])	
			{
			echo "<div class='box'>Username :   " . $row["username"]. "<br>Name :   " . $row["firstname"]. " " . $row["lastname"]."<br>Phone :   ".$row["phone"]."<br>Gender :   ".$row["gender"]."</div>";
			//echo '<img src='.$image_src.'></img><br>';

			$email = $row["email"];			

			echo '<div class="box"><form method="post" action="chat.php">Chat with :<input class="field" type="email" id="receiver" name="receiver" value='.$email.'><br>Your UserId : <input class="field" type="email" id="sender" name="sender" value='.$sender.'><br><input class="field" type="submit" value="Chat" name="Chat" id="Chat"></form></div><br><br><br>';
  			}
		} 
		
	}
	else 
	{
		echo "0 results";
	}
	$conn->close();

	echo '<div style="text-align:center"><form method="post" action="profile.php"><input type="hidden" id="email" name="email" value='.$sender.'><input type="submit" value="Edit profile" name="edit" id="edit"></form></div>';

	
	echo '<br><div style="text-align:center"><form method="post" action="logout.php"><input type="submit" value="Logout" name="logout" id="logout"></form></div>';
?>

</body>
</html>
