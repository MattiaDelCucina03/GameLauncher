<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../CSS/styles.css">
<?php 
$mysqli = new mysqli("localhost", "root", "", "videogames");
$gameCode=$_GET["gameCode"];
$query="";
if($gameCode=="GENERAL"){
    $query="SELECT sum(scores.score) as score, users.name, scores.gameCode from scores join users using(userID) 
    group by users.name order by score desc";
}else{
    $query="SELECT scores.score, users.name, scores.gameCode from scores join users using(userID) where
     scores.gameCode="."'".$gameCode."' group by scores.gameCode, users.name order by score desc";
}
$result=$mysqli->query($query);
$posizione=0;
?>
<div class="container podium">
    <?php
    while($row=$result->fetch_assoc()){
        $posizione = $posizione +1;
        if($posizione == 1){
            echo '<div class="podium__item">
            <p class="podium__city">'.$row["name"].' score: '.$row["score"].'</p>
            <div class="podium__rank first">
              <svg class="podium__number" viewBox="0 0 27.476 75.03" xmlns="http://www.w3.org/2000/svg">
              <g transform="matrix(1, 0, 0, 1, 214.957736, -43.117417)">
                <path class="st8" d="M -198.928 43.419 C -200.528 47.919 -203.528 51.819 -207.828 55.219 C -210.528 57.319 -213.028 58.819 -215.428 60.019 L -215.428 72.819 C -210.328 70.619 -205.628 67.819 -201.628 64.119 L -201.628 117.219 L -187.528 117.219 L -187.528 43.419 L -198.928 43.419 L -198.928 43.419 Z" style="fill: #000;"/>
              </g>
            </svg>
            </div>
        </div>';
        } else if($posizione == 2){
            echo '<div class="podium__item">
            <p class="podium__city">'.$row["name"].' score: '.$row["score"].'</p>
            <div class="podium__rank second">2</div>
          </div>';
        } else if($posizione == 3){
            echo '<div class="podium__item">
            <p class="podium__city">'.$row["name"].' score: '.$row["score"].'</p>
            <div class="podium__rank third">3</div>
          </div>';
        } else {
    ?>
</div>
<table>
    <tr>
        <th>Posizione</th>
        <th>Utente</th>
        <th>Punti</th>
    </tr>
<?php
        echo "<tr>";
        echo "<td>".$posizione."</td>";
        echo "<td>".$row["name"]."</td>";
        echo "<td>".$row["score"]."</td>";
        echo "</tr>";
        }
}
?>
</table>