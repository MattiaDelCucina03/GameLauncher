<?php
require_once('DB.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../CSS/style2.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <style>
  .mySlides {display:none;}
  </style>

    <title>home</title>
</head>
<body>
    <?php 
    if(isset($_SESSION['success'])):
    ?>
    <h3>
        <?php
        unset($_SESSION['success']);
        ?>
    </h3>
    <?php
    endif 
    ?>
     <div id="user">
            <h1>welcome!</h1>
            <?php if(isset($_SESSION['username'])) {?>
            <h2><strong><?php echo $_SESSION['username'];?></strong></h2>
            <?php }?>
        </div>
    <form action="DB.php" method="POST">
       
        <button type="submit" id="logout" name="logout"  value="logout">logout</button>  
    </form>


     <div class="w3-content w3-display-container" style="width: 50%;">
        <a href="../Minigames/snake/index.html">
        <img class="mySlides" src="../PNG/snake.png" style="width: 100%">
        </a>
        <a href="../MiniGames/campoMinato/index.html">
        <img class="mySlides" src="../PNG/campo_minato.png" style="width: 100%">
        </a>
        <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button> 
        <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
    </div>

<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
showDivs(slideIndex += n);
}

function showDivs(n) {
var i;
var x = document.getElementsByClassName("mySlides");
if (n > x.length) {slideIndex = 1}
if (n < 1) {slideIndex = x.length}
for (i = 0; i < x.length; i++) {
x[i].style.display = "none";  
}
x[slideIndex-1].style.display = "block";  
}
</script>
</body>
</html>