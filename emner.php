<?php
session_start();

  $questions = [];
  if (file_exists("sporgsmal.txt"))
  {
    $string = file_get_contents("sporgsmal.txt");
    $questions  = json_decode($string, true);
  }
// 1. If user not logged in, redirect to login page.
if (empty($_SESSION['user'])) //sandt hvis der mangler sessionsvariabel use (som kunne være password tror jeg)
{
  header('Location:login.php'); // Brugeren har tastet forkert og kommer til login siden
  exit; //php scriptet stopper, hemmelig information vises ikke
} 

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>emner</title>
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
.flex-container {
	position: relative;
	    display: flex;
}

.img1-wrap {
	position: relative;
	overflow: hidden;
	flex: 33.33%;
}

.image {
	width: 100%;
}

.overlay {
	display: block;
	position: absolute;
	bottom: 0;
	left: 0;
	right: 0;
	background-color: DarkCyan;
	overflow: hidden;
	/*width: 100%;*/
	height: 20%;
	transition: .65s ease;
}
        .img1-wrap:hover .overlay {
	height: 100%;
    background-color: black;
            opacity: 0.8;
}

.text {
	white-space: nowrap; 
	color: white;
	font-size: 20px;
	position: absolute;
	overflow: hidden;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
	-ms-transform: translate(-50%, -50%);
}
        h1{
text-align: center;
            font-family: fantasy;
            text-decoration-color: darkcyan;
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
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
      </li>
  </ul>
 </nav>
<div style="margin-top:50px;">
<div> 
<main>
    <h1>Vælg et emne du vil skrive eller læse om</h1>
<div class="flex-container">
	<div class="img1-wrap">
		<img src="EU.jpg" alt="Avatar" class="image">
		<div class="overlay">
			<div class="text">EU</div>
		</div>
	</div>
	<div class="img1-wrap">
		<img src="Corona.jpg" alt="Avatar" class="image">
		<div class="overlay">
			<div class="text">Coronavirus - COVID-19</div>
		</div>
	</div>
    
	<div class="img1-wrap">
	<a href="korruption.php">
        <img src="Corruption.jpg" alt="Avatar" class="image">
		<div class="overlay">
			<div class="text">Korruption</div>
		</div>
        </a>
	</div>
     

</div>
    <div class="flex-container">
	<div class="img1-wrap">
		<img src="Ulighed.jpg" alt="Avatar" class="image">
		<div class="overlay">
			<div class="text">Social Ulighed</div>
		</div>
	</div>
    <div class="img1-wrap">
		<img src="LGBT.jpg" alt="Avatar" class="image">
		<div class="overlay">
			<div class="text">LGBT</div>
		</div>
	</div>
    <div class="img1-wrap">
		<img src="Climate.jpg" alt="Avatar" class="image">
		<div class="overlay">
			<div class="text">Klimaændringer</div>
		</div>
	</div>

</div>
    </main>   
</div>
</div>
  </body>
</html>
