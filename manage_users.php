<?php
require "db.php";
session_start();
require_once('class.messages.php');
$msg = new Messages();
if (isset($_POST["firstname"])) {
     $firstname=$_POST["firstname"]; 
     $lastname=$_POST["lastname"];
     $password=$_POST["password"];
     $email=$_POST["email"];
   if ($firstname && $lastname && $password && $email)  {
      $sql = "INSERT INTO users (firstName, lastName, password, email)
         VALUES('$_POST[firstname]','$_POST[lastname]', '$_POST[password]','$_POST[email]')";
   } else {
         $msg->add('e','Sorry, you need to fill in all the boxes'); 
      }
      if (mysqli_query($con,$sql)) {
      // redirect uses GET instead of POST

   }  
}

?> 
<html>
<body>
<form action="manage_users.php" method="post">
First name: <input type="text" name="firstname">
Last name: <input type="text" name="lastname">
Password: <input type="text" name="password">
Email: <input type="text" name="email">
<input type="submit" value="go">
</form>
<p><a href="/lorraine/project_1/manage_users.php">Reload</a></p>
</form>
</body>
</html>
<?php
$result = mysqli_query($con,"SELECT * FROM users ORDER BY lastname");
// return all names
   echo "<table border='1'>
   <tr>
      <th>user_id</th>
      <th>first name</th>
      <th>last name</th>
      <th>email</th>
      <th>edit form</th>
      <th>delete records</th>
   </tr>";

while($row = mysqli_fetch_array($result))
   {
   echo "<tr>";
   echo "<td>" . $row['user_id'] . "</td>";
   echo "<td>" . $row['firstname'] ."</td>";
   echo "<td>" . $row['lastname'] . "</td>";
   echo "<td>" . $row['email'] . "</td>";
   echo "<td><a href=\"/lorraine/project_1/user_edit.phpuser_id={$row['user_id']}\">Edit Form</a></td>";
   echo "<td><a href=\"/lorraine/project_1/delete_user.php?user_id={$row['user_id']}\">Delete Records</a></td>";
   echo "</tr>";
   }
echo "</table>";

?> 