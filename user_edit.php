<?php
require "db.php";
session_start();
require_once('class.messages.php');
$msg = new Messages();

if (isset($_GET["user_id"])) {
      $user_id=$_GET["user_id"];

      $sql = "SELECT * FROM users WHERE user_id = $user_id";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result);
      var_dump($row);
}

if (isset($_POST["user_id"])) {
	$user_id = $_POST["user_id"];

	$sql = "UPDATE users SET firstname = '$_POST[firstname]', lastname = '$_POST[lastname]', password = '$_POST[password]', email= '$_POST[email]' WHERE user_id = $user_id";
	$result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
    var_dump($row);
    $msg->add('s', 'Success - changes saved');
    header('Location: manage_users.php');  
}
?> 
<html>
<body>
<form action="user_edit.php" method="POST">
User ID: <input type="text" name="user_id" value="<?php echo  $user_id;?>">
First name: <input type="text" name="firstname" value="<?php echo  $row['firstname'];?>">
Last name: <input type="text" name="lastname" value="<?php echo $row['lastname'];?>">
Email: <input type="text" name="email" value="<?php echo  $row['email'];?>">
<input type="submit" value="go">
</form>
<p><a href="/lorraine/manage_users/manage_users.php">Reload</a></p>
</form>
</body>
</html>



1. Pass the ID for the thing you want to edit in from the query string

2. Retrieve the row for this item

3. Make sure you can get at the fields e.g 

echo $row['firstName'];

4. Use this syntax within the value attribute of the form fields to display the current value in the database 

At this point the form displays to the user . The form action is the same page you're working in

the user can then make any edits

5. When form is submitted using POST, you check to see if the request contains POST data

e.g. if (isset($_POST['firstName'])) {
  // all your POST form processing happens in here
}

6. Inside that conditional you get the form data using e.g. 

$firstName = $_POST['firstName'];
...
to get the data then construct the SQL statement to UPDATE the row

This looks a  lot like the insert page logic

7. Execute the SQL and redirect to the listing page with a flash message



















3. Edit user page - user_edit.php 
this is linked from the list of users and passed the user_id to edit as a query string. Otherwise it has similar 
functionality to the add user form including the same validation. 
It redirects back to the manage users page with a flash message saying "Success - changes saved"