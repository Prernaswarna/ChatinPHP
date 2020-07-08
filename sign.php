<!DOCTYPE html>

<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

 

?>

<html>

<head>
<title>Sign in</title>
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
#signin
{
        background-color:maroon;
        color:white;
        border-color:maroon;
}
</style>

</head>

<body>
<div id="box">
<h3>Sign In</h3>
<form name="myForm" method="post" action="signin.php">
Username :<br><input type="text" name="username" id="username">
<br>
Password :<br><input type="password" name="password" id="password">
<br>
<br>

<input type="submit" value="Sign in" name="signin" id="signin" onclick="validate()">
</form>
</div>
<script>
function validate()
{
var username=document.getElementById("username").value;
var regex =/[A-Za-z0-9]+$/;



if(username=="")
{
alert("Username must be filled");
}
else if(regex.test(username)==false)
{
alert("Invalid Username");
}
var pswd=document.getElementById("password").value;
if(pswd=="")
{
alert("Password must be filled");
}
}
</script>

</body>
</html>
