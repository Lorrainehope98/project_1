<?php
require "db.php";
session_start();
require_once('class.messages.php');
$msg = new Messages();
if (isset($_POST["email"])) {
     $email=$_POST["email"]; 
     $password=$_POST["password"];
     $result = mysqli_query($con, "SELECT * FROM users where email = '$email' and password = '$password'");
     if ($row = mysqli_fetch_array($result)){
          echo 'You have logged in';
     }else{
          $msg->add('e','Sorry, that username and password were not recognised. Please try again');   
          // Redirect back to self 
          header('Location: login.php'); 
     exit(); 
     }
}
echo $msg->display();
?>
<!DOCTYPE html>
<html>
<header>
	<title>Garden Login Form</title>
	<link rel="stylesheet" type="text/css" href="style.css">
<header>
<body>
			<div id="wrapper">
				<h1>Sign In</h1>
				<p>
     			<form action="login.php"" method="post">
     			Email<br>
     			<p class = "email">
     			<input type="text" name="email" maxlength="50"><br>
     			Password<br>
     			</p>
     			<p class = "password">
     			<input type="password" name="password" maxlength="50"><br><br>
     		     </p>
     		     <p class= "submit">
     			<input class="submit-button" type="submit" name="submit" id="submit" value="Sign in" />
     			</p>
				</form>
				</p>
			</div>
<body>
<html>
<?php
// return all names
/*$result = mysqli_query($con, "SELECT * FROM Users");

while ($row = mysqli_fetch_array($result)) {
     echo $row['email'];
     echo "<br>";
}*/
?>