<!DOCTYPE html>


<html>

<head>
<title>Profile Page</title>
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
#loggedin
{
	 background-color:maroon;
        color:white;
	border-color:maroon;
}
</style>

</head>

<body>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$emails = $_POST["emails"];
	//	echo $emails;
	}

echo '<div id="box"><h3>Create Your Account</h3>
<form name="myForm" method="post" action="login.php" enctype="multipart/form-data">
Please fill in the details for the given email id<br><br>
Email Id :<br><input type="email" id="emails" name="emails" value='.$emails.' readonly><br>
<br>Username :<br><input type="text" name="username" id="username"><br>
<br>Phone Number :<br><input type="text" id="phone" name="phone"><br>
<br>Gender :<br>
<input type="radio" id="male" name="gender" value="male">Male
<input type="radio" id="female" name="gender" value="female">Female
<input type="radio" id="other" name="gender" value="other">Other
<br>
<br>First name :<br><input type="text" name="firstname" id="firstname">
<br>
<br>Last name :<br><input type="text" name="lastname" id="lastname">
<br>
<br>
<input id="loggedin" type="submit" value="Sign up" onclick = "validateform()">
</form>
</div>

<script>
function validateform(form)
{
var user = document.getElementById("username").value;
if(user=="")
{
	alert("Username must be filled out");
	return false;
}
var regex = /(\+91)*(\-)*[6-9]{1}[0-9]{9}$/;

var phone = document.getElementById("phone").value;
if(regex.test(phone)==false)
{
	alert("Invalid phone number");
	return false;
}

var regex1 = /[A-Za-z0-9]*$/;
if(regex1.test(user)==false)
{
	alert("Invalid username");
	return false;
}
var regex2 = /[A-Z][a-z]+/;
var first = document.getElementById("firstname");
var last = document.getElementById("lastname");

if(regex2.test(first)==false)
{
	alert("Invalid firstname");
	return false;
}
if(regex2.test(last)==false)
{
	alert("Invalid second name");
	return false;
}
return true;
}

</script>'

?>


</body>
</html>
