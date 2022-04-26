<?php
session_start();
$username = "";
$errors = array();

$db = mysqli_connect('localhost','root','','videogiochi');

if(isset($_POST['register'])){
    $username = htmlentities($_POST['username']);
    $password_1 = htmlentities($_POST['password_1']);
    $password_2 = htmlentities($_POST['password_2']);
    
if($password_1 =! $password_2){
    header("Location: register.php");
        array_push($errors,"La password di conferma è diversa"); 
    }
    else if(count($errors)== 0){
        $password = md5($password);
        $sql = "INSERT INTO utenti(nome,password)
                VALUE('$username','$password')";
        mysqli_query($db,$sql);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "sei registrato";
        header('Location:login.php');
    }

}
if(isset($_POST['access'])){
    if(count($errors)== 0){
        $password = md5($password);
        $sql = "SELECT nome FROM utenti where password = '".$password."'";
        $username = htmlentities($_POST['username']);
        $result = mysqli_query($db, $sql);
        $row = $result->fetch_row();
        $access = $row[0];
        if($username == $access){
            $_SESSION['username']= $username;
            $_SESSION['success'] = "sei entrato";
            header('Location:home.php');
        }
    } else {
        header("Location: login.php");
    }

}
if(isset($_POST['logout'])){
     header('Location:login.php'); 
    }
