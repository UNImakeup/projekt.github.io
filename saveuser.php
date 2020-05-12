<?php 
  // 1. Create user object
  //    (Make an associative array that represents the new user)
  $user = [
    "username" => $_GET["username"],
    "password" => $_GET["password"],
    "first name" => $_GET["firstname"],
    "last name" => $_GET["lastname"],
      "year of birth" => $_GET["yearofbirth"],
      "role" => $_GET["role"]
      ];

  // 2. Read existing users from a file (if it exists; else initialize
  //    to empty array):
  $users = [];
  if (file_exists("users.txt"))
  {
    $string = file_get_contents("users.txt");
    $users  = json_decode($string, true);
  }

  // 3. Add new user to the end of the existing users:
  $users[] = $user;

 // 4. Save all users back to file:
  $string = json_encode($users);
  file_put_contents("users.txt", $string);

 header('Location:login.php'); 

?>
