<?php
session_start();

// 1. If user not logged in, redirect to login page.
if (empty($_SESSION['user'])) //sandt hvis der mangler sessionsvariabel use (som kunne være password tror jeg)
{
  header('Location:login.php'); // Brugeren har tastet forkert og kommer til login siden
  exit; //php scriptet stopper, hemmelig information vises ikke
} 
?>
  <!doctype html>
  <html>
    <head>
      <title>Submit Post</title>
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
.button {
  background-color: #FF6400;
  border-radius: 8px;
  border: 1px solid #FF6400;
  margin: 5px;
}
input[type=text] {
  border-radius: 4px;
}
        input[type=file] {
  border-radius: 2px;
}
        textarea{
         border-radius: 4px;     
        }
        main{
            margin-left: 40%;
            
        }
        p{
            color: darkcyan;
                font-family: fantasy;
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
<main>
      <form method="POST" action="derp.php" enctype="multipart/form-data"> 
        <p>Titel</p> <input type="text" name="title"> <br>
        <p>Artiklens Indhold</p> 
          <textarea name="post" rows="10" cols="30"></textarea>
          <br>
        <p>Thumbnail</p> <input type="file"
        name="thumbnail"
       accept="image/png, image/jpeg">
          <br>
          <input type="submit" name="submit1" value="Submit" class="button">
      </form>
</main>
</div>
    </body>
  </html>
