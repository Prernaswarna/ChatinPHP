<!DOCTYPE html>

<head>
<title>Edit profile Information</title>
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

<?php


$firstname = $gender = $lastname = $phone = $password = $confirm= "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$email = $_POST["email"];

   if (empty($_POST["firstname"]))
    {
     die( "<br><br><h3 style='text-align:center;'>Firstname is required</h3>");
    }
    else
    {
    $firstname = test_input($_POST["firstname"]);
    }
 
   if (empty($_POST["lastname"]))
    {
     die( "<br><br><h3 style='text-align:center;'>Lastname is required</h3>");
    }
    else
    {
    $lastname = test_input($_POST["lastname"]);
    }

  if (empty($_POST["gender"]))
   {
    die("<br><br><h3 style='text-align:center;'>Gender is required</h3>");
   }
  else
   {
    $gender = test_input($_POST["gender"]);
   }
   if (empty($_POST["phone"]))
    {
     die( "<br><br><h3 style='text-align:center;'>Phone is required</h3>");
    }
   else
    {
     $phone = test_input($_POST["phone"]);
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
		die("<br><br><h3 style='text-align:center;'>Confirm password must match password</h3>");
	}
	$hash="";

   	$hash = password_hash($password , PASSWORD_BCRYPT);

	//validate the fields


    if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
      die("Invalid firstname");
    }

     if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
      die("Invalid lastname");
    }

	$servername = "localhost";
	$user="guest";
	$pass="Guest123#";
	$dbname="first_year";
	

	$conn = new mysqli($servername, $user, $pass, $dbname);

	if ($conn->connect_error) 
	{
    		die("<br><br><h3 style='text-align:center;'>Connection failed: </h3>" . $conn->connect_error);
	}




	//insert into table

	$sql = "UPDATE prerna_user SET password='$hash' , firstname = '$firstname' , lastname = '$lastname' , phone = '$phone' , gender = '$gender' WHERE email = '$email'";




	if ($conn->query($sql) === TRUE) 
	{
    		echo("<br><br><h3 style='text-align:center;'>You edited your profile</h3>");
	}
	 else 
	{
	    echo "<br><br><h3 style='text-align:center;'>Error: </h3> " . $sql . "<br>" . $conn->error;
	} 

	echo '<div style="text-align:center"><form method="post" action="lists.php"><input type="hidden" id="emails" name="emails" value='.$email.' readonly><input type="submit" value="List" name="List" id="List"></form></div>';
	
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

</body>

</html>
