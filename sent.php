<!DOCTYPE html>

<head>
<title>Sent messages</title>
<style>
#left
{
	display:inline;	
	padding:5px 2px;
	border:2px solid #FF635A;
	border-radius:20px;
	margin:10px;	
}
#saw
{       
	display:inline;
        padding:5px 2px;
        border:2px solid #6F65FF;
        border-radius:20px;
        margin:10px;

}
body
{
	background-color:#EEEEEE;
}
</style>
</head>


<body>
<h3 style="text-align:center ; padding:0px 0px10px 0px">Your Chat history</h3>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$sender=$receiver="";

	$sender = $_POST["sender"];
	$receiver = $_POST["receiver"];

	$servername = "localhost";
	$user="guest";
	$pass="Guest123#";
	$dbname="first_year";
	

	$conn = new mysqli($servername, $user, $pass, $dbname);

	if ($conn->connect_error) 
	{
    		die("Connection failed: " . $conn->connect_error);
	}

	$sql1 = "SELECT sender , reciever , message FROM prerna_message ORDER BY messageid DESC";

	$result = $conn->query($sql1);

	$send="";
	$message="";
	$rec ="";
	if($result->num_rows>0)
	{
		 while($row = $result->fetch_assoc())
		{
			$send = $row["sender"];
			$rec = $row["reciever"];
			if($send==$sender && $rec == $receiver)
			{
				$message = $row["message"];
				echo "<div style='text-align:right'><p id='left'> ".$message." : ".$send."</p></div> ";
				#echo " Receiver : ".$rec." ";
				#echo " ".$message;
				echo '<br>';
			}
			else if($send==$receiver && $rec == $sender)
			{
				$message = $row["message"];
				echo "<div><p id='saw'> ".$send." : ".$message."</p></div> ";
				#echo " Receiver : ".$rec." ";
				#echo "<span style='text-align:left'>".$message."</span>";
				echo '<br>';
			}
		}
	} 
	else
	{
		echo "You haven't sent any messages";
	}
	$conn->close();
}

?>

</body>

</html>
