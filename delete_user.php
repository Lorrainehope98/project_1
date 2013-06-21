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
if (isset($_POST["user_id"])) {
	$user_id = $_POST["user_id"];
	$sql = "DELETE FROM users WHERE user_id = $user_id";
	$result = mysqli_query($con,$sql); 
    $row = mysqli_fetch_array($result);
    var_dump($row);
    $msg->add('s', 'Success - user deleted 3');
    header('Location: manage_users.php');  
}
?> 
<html>
<body>
<form action="delete_user.php" method="POST">
Are you sure you wish to delete: <?php echo $row['firstname'].$row['lastname'];?>
<input type="submit" value="go">
</form>
<p><a href="/lorraine/manage_users/manage_users.php">Reload</a></p>
</form>
</body>
</html>



Are you sure you wish to delete:  <input type="text" name="firstname" value="<?php echo  $row['firstname'];?>"><input type="text" name="lastname" value="<?php echo  $row['lastname'];?>">
4. Delete user page - user_delete.php
this is the same as the edit page but it deletes the user on submission. It redirects 
back to the 
manage users page with a flash message saying "Success - user deleted"