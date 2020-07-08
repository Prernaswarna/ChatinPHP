
<!DOCTYPE html>

<html>

<head>
<title>Log in</title>
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
}
#box
{
	text-align:center;
}
</style>
</head>

<body>

<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$emails = $_POST["emails"];

$firstname = $gender = $lastname = $username = $phone = "";

$servername = "localhost";
        $user="guest";
        $pass="Guest123#";
        $dbname="first_year";

        $conn = new mysqli($servername, $user, $pass, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  	
	//check if fields are empty

    if (empty($_POST["username"]))
    {

	 $sql = "DELETE from prerna_user WHERE email = '$emails'";
 	if ($conn->query($sql) === TRUE)
        {
                echo("");
        }
   
	die("<br><br><h3 style='text-align:center'>Username is required</h3>");
    }
    else
    {
    $username = test_input($_POST["username"]);
    }


   if (empty($_POST["firstname"]))
   {
	   $sql = "DELETE from prerna_user WHERE email = '$emails'";
	   if ($conn->query($sql) === TRUE)
        {
                echo("");
        }

     die( "<br><br><h3 style='text-align:center'>Firstname is required</h3>");
    }
    else
    {
    $firstname = test_input($_POST["firstname"]);
    }
 
   if (empty($_POST["lastname"]))
   {
	   $sql = "DELETE from prerna_user WHERE email = '$emails'";
	   if ($conn->query($sql) === TRUE)
        {
                echo("");
        }

     die( "<br><br><h3 style='text-align:center'>Lastname is required</h3>");
    }
    else
    {
    $lastname = test_input($_POST["lastname"]);
    }

  if (empty($_POST["gender"]))
  {
	  $sql = "DELETE from prerna_user WHERE email = '$emails'";
	  if ($conn->query($sql) === TRUE)
        {
                echo("");
        }

    die("<br><br><h3 style='text-align:center'>Gender is required</h3>");
   }
  else
   {
    $gender = test_input($_POST["gender"]);
   }
   if (empty($_POST["phone"]))
   {
	   $sql = "DELETE from prerna_user WHERE email = '$emails'";
	   if ($conn->query($sql) === TRUE)
        {
                echo("");
        }

     die( "<br><br><h3 style='text-align:center'>Phone is required</h3>");
    }
   else
    {
     $phone = test_input($_POST["phone"]);
    }

   

	//validate the fields


   if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
	   $sql = "DELETE from prerna_user WHERE email = '$emails'";
	   if ($conn->query($sql) === TRUE)
        {
                echo("");
        }

      die("<br><br><h3 style='text-align:center'>Invalid firstname</h3>");
    }

   if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
	   $sql = "DELETE from prerna_user WHERE email = '$emails'";
	   if ($conn->query($sql) === TRUE)
        {
                echo("");
        }

      die("<br><br><h3 style='text-align:center'>Invalid lastname</h3>");
    }

   if (!preg_match("/^[a-zA-Z0-9 ]*$/",$username)) {
	   $sql = "DELETE from prerna_user WHERE email = '$emails'";
	   if ($conn->query($sql) === TRUE)
        {
                echo("");
        }

       die("<br><br><h3 style='text-align:center'>Invalid username</h3>");
    }

   if (!preg_match("/(\+91)*(\-)*[6-9]{1}[0-9]{9}$/",$phone)){
	   $sql = "DELETE from prerna_user WHERE email = '$emails'";
	   if ($conn->query($sql) === TRUE)
        {
                echo("");
        }
      die("<br><br><h3 style='text-align:center'>Invalid phone</h3>");
    }

$conn->close();


	$servername = "localhost";
	$user="guest";
	$pass="Guest123#";
	$dbname="first_year";
	
	$conn = new mysqli($servername, $user, $pass, $dbname);

	if ($conn->connect_error) 
	{
    		die("<br><br><h3 style='text-align:center'>Connection failed: </h3>" . $conn->connect_error);
	}

	//check for repeat username 

	$sql1 = "SELECT username FROM prerna_user";	
	
	$result = $conn->query($sql1);
	
	$use="";
	

	if($result->num_rows>0)
	{
		 while($row = $result->fetch_assoc())
		{
			$use= $row["username"];
			if($use==$username)
			{
				$sql = "DELETE from prerna_user WHERE email = '$emails'";
				die("<br><br><h3 style='text-align:center'>Username already exists</h3>");
			}
		}
	} 
	

	
	//insert into table
	$sql = "UPDATE prerna_user SET username = '$username' , firstname = '$firstname' , lastname = '$lastname' , phone = '$phone' , gender = '$gender' WHERE email = '$emails'";

	

	if ($conn->query($sql) === TRUE) 
	{
    		echo("<br><br><h3 style='text-align:center'>You have signed up sucessfully</h3>");
	}
	 else 
	{
	    echo "<br><br><h3 style='text-align:center'>Error: </h3>" . $sql . "<br>" . $conn->error;
	} 
	
	echo '<div id="box"><form method="post" action="lists.php"><input type="hidden" id="emails" name="emails" value='.$emails.' readonly><input type="submit" value="List" name="List" id="List"></form></div>';
	$conn->close();
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
