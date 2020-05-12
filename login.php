<?php
session_start(); //aktivere sessions

$users = [];
  if (file_exists("users.txt"))
  {
    $string = file_get_contents("users.txt");
    $users  = json_decode($string, true);
  }

// 1. If someone already logged in, redirect to secret page.
if (! empty($_SESSION['user']))  //Undersøger om man er logget ind. Hvis den ikke er tom har brugeren altså indtastet informationen.
{
  header('Location:index.php'); 
} 

// 2. Otherwise, if known user tried to log in, register her as
//    logged in and redirect to secret page.
foreach($users as $user){
if (isset($_POST['username']) && $_POST['username'] == $user['username'] && $_POST['password'] == $user['password']) // Hvis brugeren har skrevet noget og de har skrevet mary, så kan man se hemmelig information, som er på index.php
{
  $_SESSION['user'] = $_POST['username'];
  header('Location:index.php');
  exit;
} 
}
?>
<!doctype html>
  <html>
    <head>
      <title>Login</title>
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
input[type=password] {
 
  border-radius: 4px;
}

      </style>
    </head>
    <body>
 <nav>
  <ul class="navbar">
  <li class="navpunkt"><a class="navlink" href="index.php">Forside</a></li>
  <li class="navpunkt"><a class="navlink" href="lav.php">Lav Sp&oslash;rgsm&aring;l</a></li>
<?php 
if (empty($_SESSION['user']))  //Undersøger om man er logget ind. Hvis den ikke er tom har brugeren altså indtastet informationen.
{
  echo "<li class='navpunkt' style='float:right'>",
        "<a class='navlink active' href='login.php'>Login",
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
      <p>Hvis du vil lave opslag eller svare p&aring; opslag, skal du logge ind f&oslash;rst</p>
      <form method="POST" action="">  
        Username: <input type="text" name="username"> <br>
        Password: <input type='password' name='password'>
        <input type="submit" value="Login" class='button'>
        not signed up? <a href="signup.php">
          make a user
        </a>
      </form>
</main>
</div>
    </body>
  </html>
