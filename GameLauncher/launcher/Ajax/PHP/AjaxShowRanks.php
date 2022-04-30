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
?>
<table>
    <tr>
        <th>Utente</th>
        <th>Punti</th>
    </tr>
    <?php
    while($row=$result->fetch_assoc()){
        echo "<tr>";
        echo "<td>".$row["name"]."</td>";
        echo "<td>".$row["score"]."</td>";
        echo "</tr>";
    }
    ?>
</table>
<?php
?>