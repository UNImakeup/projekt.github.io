<?php
session_start();

  $questions = [];
  if (file_exists("sporgsmal.txt"))
  {
    $string = file_get_contents("sporgsmal.txt");
    $questions  = json_decode($string, true);
  }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Forside</title>
    <style>
      ul.navbar {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: DarkCyan;
  position: fixed;
  top: 0;
  width: 100%;
}

li.navpunkt {
  
  float: left;
}
li a.navlink {
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}
li a.navlink:hover {
  background-color: aqua;
}

.active {
  background-color: #FF6400;
}
ul.q{
margin: auto;
list-style-type: none;
width:50%;
}
li.qlink{
     border-style: solid;
     border-color: aqua;
     text-align: center;
     font-size: 20px;
     margin: 10px;
     font-weight: bold;
}
li a.qlinka{
  text-decoration: none;
}
</style>
  </head>
  <body>
 <nav>
  <ul class="navbar">
  <li class="navpunkt"><a class="navlink active" href="index.php">Forside</a></li>
  <li class="navpunkt"><a class="navlink" href="lav.php">Lav Sp&oslash;rgsm&aring;l</a></li>
<?php 
if (empty($_SESSION['user']))  //Undersøger om man er logget ind. Hvis den ikke er tom har brugeren altså indtastet informationen.
{
  echo "<li class='navpunkt' style='float:right'>",
        "<a class='navlink' href='login.php'>Login",
        "</a></li>",
        "<li class='navpunkt' style='float:right'>",
        "<a class='navlink' href='signup.php'>Signup",
        "</a></li>";
  }
?>
  <?php 
if (! empty($_SESSION['user']))  //Undersøger om man er logget ind. Hvis den ikke er tom har brugeren altså indtastet informationen.
{
   echo "<li class='navpunkt' style='float:right'>",
        "<a class='navlink'>",
        $_SESSION['user'],
        "<img src='profil.png' height='12' width='12' style='margin:0px 10px'>",
        "</a>",
        "</li>";
} 
?>
  </ul>
 </nav>
<div style="margin-top:50px;">
<main>
<ul class="q">
  <?php
  foreach($questions as $i => $question){
    echo 
        "<li class='qlink'>",
        "Written by: ",
        $question['Forfatter'],
        "<br>",
        "<a class='qlinka' href='show.php?id=$i'>",
        $question['Titel'],
        "<a/>",
        "</li>";
}
  ?>
</ul>
</main>
</div>
  </body>
</html>
