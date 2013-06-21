<?php
require "db.php";
session_start();
require_once('class.messages.php');
$msg = new Messages();

if (isset($_GET["user_id"])) {
      $user_id = (int) $_GET["user_id"]; 
      $sql = "SELECT * FROM users WHERE user_id = $user_id";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result);
      var_dump($row);
}
  if (isset(($_POST["user_id"])&&($_POST["confirm == "yes"])) {
	   $user_id = $_POST["user_id"];
	   $sql = "DELETE FROM users WHERE user_id = $user_id";
	   $result = mysqli_query($con,$sql); 
     $row = mysqli_fetch_array($result);
     var_dump($row);
     $msg->add('s', 'Success - user deleted 4');
     header('Location: manage_users.php');  
  }else { 
  header('Location: manage_users.php'); 
}
?> 
<html>
<body>
<form action="delete_user.php" method="POST">
Confirm Box: <input type="text" name="confirm" value="Confirm Yes/No">	
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




4. Delete user page - user_delete.php
this is the same as the edit page but it deletes the user on submission. It redirects 
back to the 
manage users page with a flash message saying "Success - user deleted"