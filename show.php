<?php
session_start();
?>
  <!doctype html>
  <html>
    <head>
      <title>Question</title>
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
    "<p> $post</p>",
    "<img src='",
    $thumbnail,
    "'>";
    

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
     <h1>Related</h1>
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
