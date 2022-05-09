<?php
    session_start();
    if(array_key_exists("username", $_SESSION)!=true){
        header("Location: ../PHP/login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classifica</title>
</head>

<body>
    <?php
    $mysqli = new mysqli("localhost", "root", "", "videogames");
    $query = "SELECT games.name, games.gameCode from games";
    $result = $mysqli->query($query);
    while ($row = $result->fetch_assoc()) {
    ?>
    <button type="button" class="buttons btn btn-warning btn-lg" id="<?php echo $row['gameCode'] ?>"><?php echo $row['name'] ?></button>
    <?php
    }
    ?>
    <button type="button" class="buttons btn btn-success btn-lg" id="GENERAL">General</button>
    <a href="../PHP/home.php"><button type="button" class="buttons btn btn-info btn-lg">Home</button></a>
    
    <div id="divContent"></div>

</body>

<script type="module">
import {
    seeRankings
} from "../Ajax/JS/AjaxCall.js";
let buttons=document.getElementsByClassName("buttons");
for(let i=0;i<buttons.length;i++){
    //buttons[i].addEventListener("click",seeRankings(buttons[i].textContent));
    buttons[i].onclick=function(){seeRankings(buttons[i].id)}
}
document.addEventListener('DOMContentLoaded', function(){
    seeRankings();
})
</script>

</html>