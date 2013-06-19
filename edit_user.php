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
?> 
<html>
<body>
<form action="edit_users.php" method="POST">
First name: <input type="text" name="firstname" value="<?php echo $firstname;?>">
Last name: <input type="text" name="lastname">
Email: <input type="text" name="email">
<input type="submit" value="go">
</form>
<p><a href="/lorraine/manage_users/manage_users.php">Reload</a></p>
</form>
</body>
</html>


3. Edit user page - user_edit.php 
this is linked from the list of users and passed the user_id to edit as a query string. Otherwise it has similar 
functionality to the add user form including the same validation. 
It redirects back to the manage users page with a flash message saying "Success - changes saved"