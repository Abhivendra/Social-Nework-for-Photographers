<?php
// Initialize variables to null.
$nameError ="";
$emailError ="";
$passwordError ="";
$usernameError ="";
$host="localhost";
$user="root";
$password="";
$db="";
$con="";
$con=mysql_connect($host,$user,$password);
if(!$con)
{
    echo '<h1>Connected to MySQL</h1>';
	$db=mysql_select_db("photographica
",$con);
}
else
{
    echo '<h1>MySQL Server is not connected</h1>';
}
// On submitting form below function will execute.
if(isset($_POST['submit'])){
if (empty($_POST["name"])) {
$nameError = "Name is required";
} else {
$name = test_input($_POST["name"]);
// check name only contains letters and whitespace
if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
$nameError = "Only letters and white space allowed";
}
}
if (empty($_POST["email"])) {
$emailError = "Email is required";
} else {
$email = test_input($_POST["email"]);
// check if e-mail address syntax is valid or not
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
$emailError = "Invalid email format";
}
}
if (empty($_POST["username"])) {
$ = "";
} 
if (mysql_num_rows(mysql_query("SELECT FROM user_login (User_name, password, Email_ID) WHERE User_name=$username",$db))>0) {
$usernameError = "username exists";
}
else {
$username = test_input($_POST["username"]);
// check address syntax is valid or not(this regular expression also allows dashes in the URL)
}
if (empty($_POST["password"])) {
$passwordError = "";
} else {
$password = $_POST["password"];
}

//test for errors
	if($nameError!="" || $passwordError!="" || $usernameError!="" || $emailError!="")
		redirect("www.Index.html");
	else
		redirect("www.google.com");
}
//php code ends here
?>