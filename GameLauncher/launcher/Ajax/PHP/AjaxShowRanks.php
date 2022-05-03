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
<table class="table table-striped">
    <tr>
        <th>Posizione</th>
        <th>Utente</th>
        <th>Punti</th>
    </tr>
    <?php
    while($row=$result->fetch_assoc()){
        $posizione = $posizione +1;
        echo "<tr>";
        echo "<td>".$posizione."</td>";
        echo "<td>".$row["name"]."</td>";
        echo "<td>".$row["score"]."</td>";
        echo "</tr>";
    }
    ?>
</table>
<?php
?>