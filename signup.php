<?php 
session_start(); //aktivere sessions
if (! empty($_SESSION['user']))  //Undersøger om man er logget ind. Hvis den ikke er tom har brugeren altså indtastet informationen.
{
  header("Location:forside.php"); 
} 
?>

<!doctype html>
  <html>
    <head>
      <title>Signup</title>
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
input[type=date] {
 
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
        "<a class='navlink' href='login.php'>Login",
        "</a></li>",
        "<li class='navpunkt' style='float:right'>",
        "<a class='navlink active' href='signup.php'>Signup",
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

    <form action='saveuser.php' method='GET'>
    Username <input type='text' name='username'>
    Password <input type='password' name='password'>
    First name <input type='text' name='firstname'>
    Last Name <input type='text' name='lastname'> 
    Year of Birth <input type='date' name='yearofbirth'>
    Student <input type='radio' name='role' value='student'>
    Teacher <input type='radio' name='role' value='teacher'>
    <input type='submit' value='Opret' class='button'>
    <br>
    Already have a user? <a href='login.php'>
          login here
        </a>
</form>
</main>
  </div>

    </body>
  </html>



