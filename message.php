<!DOCTYPE html>

<head>
<title>Sent message</title>
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
	$sender=$receiver=$message="";

	$sender = $_POST["sender"];
	$receiver = $_POST["receiver"];
	$message = $_POST["message"];

	$servername = "localhost";
	$user="guest";
	$pass="Guest123#";
	$dbname="first_year";
	

	$conn = new mysqli($servername, $user, $pass, $dbname);

	if ($conn->connect_error) 
	{
    		die("<br><br><h3 style='text-align:center;'>Connection failed: </h3>" . $conn->connect_error);
	}

	$sql = "INSERT INTO prerna_message (sender , reciever , message)
	VALUES ('$sender' , '$receiver' , '$message')";

	if ($conn->query($sql) === TRUE) 
	{
    		echo "<br><br><div style='text-align:center'><h3>Your message has been sent</h3></div><br>";
		echo '<div style="text-align:center"><form method="post" action="chat.php"><input type="hidden" id="sender" name="sender" value='.$sender.' readonly><input type="hidden" id="receiver" name="receiver" value='.$receiver.' readonly><input type="submit" value="Continue" name="continue" id="continue"></form></div>';
	}
	 else 
	{
	    echo "Error: " . $sql . "<br>" . $conn->error;
	} 
}
?>

</body>

</html>
