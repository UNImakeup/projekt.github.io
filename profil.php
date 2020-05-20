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
        .card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  text-align: center;
  font-family: arial;
            border-radius: 20px;
}

.title {
  color: grey;
  font-size: 18px;
}

button.profil {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
    border-radius: 20px;
}

a.profil {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button.profil:hover, a.profil:hover {
  opacity: 0.7;
}
        h1{
            font-family: fantasy;
          }
        h1.profil{
            font-family: fantasy;
            text-align: center;
          }
.flex-container {
            display:flex;
            justify-content:flex-start;
          }
          .flex-item {
          margin-left:10px;
          margin-right: 20px;
          }
          .one {order: 1;    

}
          .two {order: 2;
          width:70%;
}
        .three {
            order: 3;
        }
        #rcorners1 {
  border-radius: 25px;
  background: #73AD21;
  padding: 20px; 
  width: 100%;
  height: auto; 
    margin: auto;
}
         #rcorners2 {
  border-radius: 25px;
  background: darkcyan;
  padding: 20px; 
  width: 100%;
  height: auto; 
    margin: auto;
}
        ul.q{
margin: auto;
list-style-type: none;
width:30%;
}
li.qlink{
     border-style: solid;
     border-color: aqua;
     text-align: center;
     font-size: 20px;
     margin: 10px;
     font-weight: bold;
}
a.qlinka{
  text-decoration: none;
}
</style>
  </head>
  <body>
 <nav>
  <ul class="navbar">
  <li class="navpunkt"><a class="navlink" href="index.php">Forside</a></li>
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
        "<a class='navlink active'>",
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

<h1 style="text-align:center">Profil</h1>
    <div class="flex-container">
<div class="flex-item one">
<div class="card">
  <img src="profil.png" alt="profil" style="width:100%">
  <?php
    echo "<h1>",
        $_SESSION['user'],
         "</h1>";
    ?>
  <p class="title">Elev</p>
  <p>Gymnasie</p>
  <p><button class="profil">Kontakt</button></p>
</div>
    </div>
    <div class="flex-item two">
        <div id="rcorners1">
    <h1>Artikler</h1>
            <?php
  foreach($questions as $question){
      if($question[Forfatter]==$_SESSION['user'])
    echo 
        "<li class='qlink'>",
        "<a class='qlinka' href='show.php?id=2'>",
        $question['Titel'],
                "<br>",
        "<img src='./image/",
        $question['thumbnail'],
        "' width=20% height=auto>",
        "<a/>",
        "</li>";
}
  ?>
            <h1>Stats</h1>
            <div class="flex-container">
            <div class="flex-item one">
                <div id="rcorners2">
                <h1 class="profil">Artikel</h1>
                    <h1 class="profil">1</h1>
                    </div>
                </div>
            <div class="flex-item two">
                <div id="rcorners2">
                <h1 class="profil">Delinger</h1>
                <h1 class="profil">0</h1>
                    </div>
                </div>
                <div class="flex-item three">
                <div id="rcorners2">
                <h1 class="profil">Upvotes</h1>
                 <h1 class="profil">0</h1>
                    </div>
                </div>
            </div>
        </div>
        </div>
</main>
        </div>
</div>
  </body>
</html>
