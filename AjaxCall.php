<?php
$userID=$_GET["userID"];
$gameID=$_GET["gameID"];
$score=$_GET["score"];
$mysqli = new mysqli("localhost", "root", "", "videogiochi");
$query="SELECT punteggi.punteggio from punteggi where punteggi.idUtente="+$userID+"and punteggi.idGioco="+$gameID;
$result=$mysqli->query($query)->fetch_assoc();
if(count($result)==0){
    $query="INSERT INTO punteggi(idUtente, idGioco, punteggio) VALUES ("+$userID+","+$gameID+","+$score+",)";
}else{
    $query="UPDATE punteggi set punteggio="+$score+$result["punteggio"]+"where punteggi.idUtente="+$userID+"and punteggi.idGioco="+$gameID;
}
echo "ciao";
?>