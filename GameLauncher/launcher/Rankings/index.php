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
    <button type="submit" onclick="seeRanks(<?php echo $row['gameCode'] ?>)"><?php echo $row['name'] ?></button>
    <?php
    }
    ?>
    <button type="submit" onclick="seeRanks('General')">General</button>
</body>
<script type="module">
import {
    addScore, seeRankings
} from "../Ajax/JS/AjaxCall.js";
</script>

</html>