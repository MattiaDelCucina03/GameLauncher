<?php
session_start();
$userName=$_SESSION["username"];
$gameCode=$_GET["gameCode"];
$score=$_GET["score"];

$mysqli = new mysqli("localhost", "root", "", "videogames");

$query="SELECT userID from users where name="."'".$userName."'";
$userID=$mysqli->query($query)->fetch_assoc()["userID"];

$query="SELECT scores.score from scores where scores.userID=".$userID." and scores.gameCode="."'".$gameCode."'";
$row=$mysqli->query($query)->fetch_assoc();

if($row==false){
    $query="INSERT INTO scores(userID, gameCode, score) VALUES (".$userID.","."'".$gameCode."'".",".$score.")";
    $mysqli->query($query);
}else{
    $score+=$row["score"];
    $query="UPDATE scores SET score=".$score." where scores.userID=".$userID." and scores.gameCode="."'".$gameCode."'";
    $mysqli->query($query);
}
?>