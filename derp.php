<?php
session_start();

// 1. If user not logged in, redirect to login page.
if (empty($_SESSION['user'])) //sandt hvis der mangler sessionsvariabel use (som kunne være password tror jeg)
{
  header('Location:login.php'); // Brugeren har tastet forkert og kommer til login siden
  exit; //php scriptet stopper, hemmelig information vises ikke
} 

$title=$_POST['title'];
$post=$_POST['post'];
$user=$_SESSION['user'];

$question = [
    "Titel" => $title,
    "Post" => $post,
    "Forfatter" => $user,
      ];

$questions = [];
  if (file_exists("sporgsmal.txt"))
  {
    $string = file_get_contents("sporgsmal.txt");
    $questions  = json_decode($string, true);
  }

  // 3. 
  $questions[] = $question;

 // 4. 
  $string = json_encode($questions);
  file_put_contents("sporgsmal.txt", $string);

  $nytsvar=count($questions);
  header("Location: show.php?id=$nytsvar");
?>