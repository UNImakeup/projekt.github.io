<?php
session_start();
?>
  <!doctype html>
  <html>
    <head>
      <title>Question</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <style>
          .svarForm{
              display: none;
          }
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
      cursor: pointer;
}
input[type=text] {
 
  border-radius: 4px;
}
.flex-container {
            display:flex;
            justify-content:space-between;
          }
          .flex-item {
          margin-left:10px;
          margin-right:auto;
          }
          .one {order: 1;
          width: 70%;  
}
          .two {order: 2;
          width 30%;
}
          .orange{
          background: #FFC500;
}
h1{
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
          button.knap{     
  background-color: darkcyan; /* Green */
  border: none;
  color: white;

  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 12px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 2px;
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

<div class="flex-container">
<main class="flex-item one">
<article>
<header>
<?php
  $questions = [];
  if (file_exists("sporgsmal.txt"))
  {
    $string = file_get_contents("sporgsmal.txt");
    $questions  = json_decode($string, true);
  }
  
// 2. Read existing answers from a file (if it exists; else initialize
  //    to empty array):
  $answers = [];
  if (file_exists("answers.txt"))
  {
    $string = file_get_contents("answers.txt");
    $answers  = json_decode($string, true);
  }

  $id = $_GET['id'];
  $question = $questions[$id];
  $title = $question['Titel'];
  $post = $question['Post'];
  $forfatter = $question['Forfatter'];
  $thumbnail = $question['thumbnail'];

  echo "<h1>$title</h1>",
    "<p>Written by: $forfatter</p>",
    "<img src='./image/$thumbnail' width=60% height=60% >",
    "<p> $post</p>";
    

  echo<<<END
</header>
<input type="button" value="svar" id="visSvar" class="button" onclick="svarFunction()">
    <br>
      
      <div class="svarForm" id="svarForm">

          <form method="POST" action="save.php"> 
Dit Svar: <input type="text" name="answer"> <br>
        <input type="hidden" name="id" value=$id>
        <input type="submit" value="Indsend Dit Svar" class="button">
          </form>
            

      </div>
END;

?>
    <button class="knap">Del</button>
    <button class="knap">Upvote</button>
          <hr>
      <script>
      function svarFunction(){
          document.getElementById("svarForm").style.display = "block";
          }  
      </script>
  <?php
foreach($answers as $i => $answer){      //loop hvor vi k rer igennem
if($_GET['id']==$answer['id']){
    echo "<section class='answer orange'>";
    echo $answer['Forfatter']; 
    echo "<br>";
    echo $answer['Svar'];
    echo "<br>";
    if ($_SESSION['user']==$answer['Forfatter']) 
{
  echo "<form method='POST' action='edit.php?idforsvar=$i'>";
    echo "Rediger dit Svar: <input type='text' name='nyesvar'>"; 
    echo "<input type='submit' value='Indsend Dit Svar' class='button'>";      
    echo "</form>";    
  }
    echo "</section>";
    echo "<br>"; 
}  
}
  ?>
</article>
</main>
<aside class="flex-item two">
     <h1>Andre Artikler</h1>
<ul>
  <?php
  foreach($questions as $i => $question){
if($i!=$id){
    echo 
        "<li>",
        "<a href='show.php?id=$i'>",
        $question['Titel'],
        "<a/>",
        "</li>",
        "<hr>";
}
}
  ?>
</ul>
</aside>

</div>
</div>

    </body>
  </html>
