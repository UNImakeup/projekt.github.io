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
    <title>Bideo</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        p{
            margin-top: 2px;
        }
        .search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}
        .search-container {
  float: right;
}
.search-container input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}
        h1{
            text-align: center;
        }
</style>
  </head>
  <body>
 <nav>
  <ul class="navbar">
  <li class="navpunkt"><a class="navlink active" href="index.php">Forside</a></li>
  <li class="navpunkt"><a class="navlink" href="emner.php">Lav en Artikel</a></li>
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
        "<a class='navlink' href='profil.php'>",
        $_SESSION['user'],
        "<img src='profil.png' height='12' width='12' style='margin:0px 10px'>",
        "</a>",
        "</li>";
} 
?>
      <li class="navpunkt" style='float:right'>
      <div class="search-container">
    <form action="">
      <input type="text" placeholder="S&oslash;g efter artikler/kilder" name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
      </li>
  </ul>
 </nav>
<div style="margin-top:50px;">
<main>
    <h1>Popul&aelig;re Artikler</h1>
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
        "<img src='./image/",
        $question['thumbnail'],
        "' width=100% height=auto>",
        "<a/>",
      "<br>",
        "<p>0 Upvotes & 0 Delinger</p>",
        "</li>";
}
  ?>
</ul>
    </main>
</div>
  </body>
</html>
