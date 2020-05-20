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
    <title>Korruption</title>
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
#rcorners1 {
  border-radius: 25px;
  background: #73AD21;
  padding: 20px; 
  width: 70%;
  height: auto; 
    margin: auto;
}
#rcorners2 {
  border-radius: 25px;
  background: blue;
  padding: 20px; 
  width: 70%;
  height: auto; 
    margin: auto;
}
        #rcorners3 {
  border-radius: 25px;
  background: purple;
  padding: 20px; 
  width: 70%;
  height: auto; 
    margin: auto;
}
        h1{
            
            text-align: center;
            font-family: fantasy;
            text-decoration-color: darkcyan;
        }
        .merky{display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;}   
        button.upload{
            background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
            border-radius: 2px;
margin-left: 35%;
  width: 30%;
        }
        button.upload:hover{
             background-color: #008CBA;
  color: white;
        }
        body {
  background-image: url('Corruption.jpg');
  background-repeat: no-repeat;
              background-size: cover;
}
        .center{
            text-align: center;
            color: darkcyan;
        }
        iframe{margin-left: 25px;}
        
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
</style>
  </head>
  <body>
 <nav>
  <ul class="navbar">
  <li class="navpunkt"><a class="navlink" href="index.php">Forside</a></li>
  <li class="navpunkt"><a class="navlink active" href="emner.php">Lav en Artikel</a></li>
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
      <button class="dif" type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
      </li>
  </ul>
 </nav>
<div style="margin-top:50px;">
<main>
    <h1>Korruption</h1>
    <div class="center">
        <p>Gå nedenstående igennem og klik hen på uploadsiden nederst, for at lave en artikel</p>
    </div>
    
    <div id="rcorners1">
    <h1>Læsestof</h1>
        <a href="https://www.berlingske.dk/politik/her-er-loekkes-vaerste-moegsager">Lars Løkkes værste møgsager</a>
        <br>
        <a href="https://www.dr.dk/nyheder/indland/fadbamser-rammer-lars-lokkes-facebook-side">Fadbamser på Lars Løkkes Facebook-Side</a> 
        <br>
        <a href="https://www.bbc.com/news/world-us-canada-50695438?intlink_from_url=https://www.bbc.com/news/topics/cm8m1lj59z3t/corruption&link_location=live-reporting-story">Ericsson betaler 1 milliard dollars i bøde til USA's justitsministerie pga bestikkelse</a> 
        </div>
    <div id="rcorners2">
<h1>Øvelser</h1>
        <p style="text-align:center;">Gennemfør nedenstående spil, quizzer og øvelser. Du starter spillet ved at trykke på det grønne flag og stopper det ved at trykke på den røde cirkel.</p>
        <iframe src="https://scratch.mit.edu/projects/394646634/embed" allowtransparency="true" width="485" height="402" frameborder="0" scrolling="no" allowfullscreen></iframe>

        <iframe src="https://scratch.mit.edu/projects/396703744/embed" allowtransparency="true" width="485" height="402" frameborder="0" scrolling="no" allowfullscreen></iframe>
              <p>Diskuter Artiklerne i læste i grupper. Hvad gjorde mest indtryk og hvilke vinkler kan i se emnet fra?</p>
    </div>
<div id="rcorners3">
    <h1>Skriveværktøjer</h1>
    <p>Vælg jeres vinkel og kilderne i vil inddrage.</p>
    <p>Skriv jeres pointer ned, i punktform, så det er nemmere at skrive selve teksten.</p>
    <p>Skriv et paragraf ad gangen.</p>
    <p>Forslag til vinkler og spørgsmål i kan tage op: Hvor er korruption værst? Hvis skyld er korruptionen? Onde mennesker eller et ødelagt system?</p>
    </div>
    <h1 style="color:darkcyan;">Gå videre til Artikelskrivningssiden</h1>
    <a href="lav.php">
    <button class="upload">Skriv Artikel</button>
        </a>
</main>
</div>
  </body>
</html>
