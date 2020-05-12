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

$idforsvar=$_GET['idforsvar'];
$nyesvar=$_POST['nyesvar'];

foreach($answers as $answer){
if($idforsvar==$answer['svar-id'] && $_SESSION['user']==$answer['Forfatter']){
$answers[$idforsvar]['Svar']=$nyesvar;
}
}    


 // 4. 
  $string = json_encode($answers);
  file_put_contents("answers.txt", $string);

$sideid=$answer['id'];

  header("Location: show.php?id=$sideid");
?>
