<?php
session_start(); 

// 1. If user not logged in, redirect to login page.
if (empty($_SESSION['user'])) //sandt hvis der mangler sessionsvariabel use (som kunne være password tror jeg)
{
  header('Location:login.php'); // Brugeren har tastet forkert og kommer til login siden
  exit; //php scriptet stopper, hemmelig information vises ikke
} 


 // 2. Read existing users from a file (if it exists; else initialize
  //    to empty array):
  $answers = [];
  if (file_exists("answers.txt"))
  {
    $string = file_get_contents("answers.txt");
    $answers  = json_decode($string, true);
  }


  $user=$_SESSION['user'];
  $newanswer = $_POST['answer'];
  $id = $_POST['id'];
  
    $answer = [
    "Svar" => $newanswer,
    "Forfatter" => $user,
    "id" => $id,
    "svar-id" => count($answers)
         ];

// 2. Read existing users from a file (if it exists; else initialize
  //    to empty array):
  $answers = [];
  if (file_exists("answers.txt"))
  {
    $string = file_get_contents("answers.txt");
    $answers  = json_decode($string, true);
  }

  // 3. 
  $answers[] = $answer;

 // 4. 
  $string = json_encode($answers);
  file_put_contents("answers.txt", $string);

  header("Location: show.php?id=$id");
?>
