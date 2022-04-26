<?php
session_start();
$userName=$_SESSION["username"];
$gameCode=$_GET["gameCode"];
$score=$_GET["score"];

$mysqli = new mysqli("localhost", "root", "", "videogiochi");

$query="SELECT idUtente from utenti where nome="."'".$userName."'";
$userID=$mysqli->query($query)->fetch_assoc()["idUtente"];

$query="SELECT punteggi.punteggio from punteggi where punteggi.idUtente=".$userID." and punteggi.codiceGioco="."'".$gameCode."'";
$row=$mysqli->query($query)->fetch_assoc();

if($row==false){
    $query="INSERT INTO punteggi(idUtente, codiceGioco, punteggio) VALUES (".$userID.","."'".$gameCode."'".",".$score.")";
    $mysqli->query($query);
}else{
    $score+=$row["punteggio"];
    $query="UPDATE punteggi SET punteggio=".$score." where punteggi.idUtente=".$userID." and punteggi.codiceGioco="."'".$gameCode."'";
    $mysqli->query($query);
}
?>