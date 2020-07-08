<!DOCTYPE html>

<html>

<head>
<title>Chat</title>
<style>
.field
{
        width:70%;
        padding:8px 8px;
        margin:8px 0;
        border-radius:4px;
}
body
{
        background-color:black;
}
.box
{
        background-color:white;
        width:40%;
        margin:auto;
        padding : 2% 1% ;
        border : 2px solid black;
	border-radius:30px;
	text-align:center;

}
#sent
{
         background-color:maroon;
        color:white;
	border : 2px solid maroon;
        border-radius:4px;
	padding:8px , 10px;
}
#send
{
         background-color:maroon;
        color:white;
        border : 2px solid maroon;
	border-radius:4px;
	padding : 8px , 10px;

}
h2
{
	color:white;
	text-align:center;
}
</style>
</head>


<body>
<h2>Please enter your message below</h2>
<?php

	$sender = $_POST["sender"];
	$receiver = $_POST["receiver"];

	echo '<div class="box" ><form method="post" action="message.php"><input class="field" type="text" id="message" name="message"><input type="hidden" id="sender" name="sender" value='.$sender.' readonly><input type="hidden" id="receiver" name="receiver" value='.$receiver.' readonly><br><input type="submit" value="Send" name="send" id="send"></form><br>';

	echo '<form method="post" action="sent.php"><input type="hidden" id="sender" name="sender" value='.$sender.' readonly><input type="hidden" id="receiver" name="receiver" value='.$receiver.' readonly><input type="submit" value="See chat history" name="sent" id="sent"></form></div>';

	

?>

</body>
</html>
