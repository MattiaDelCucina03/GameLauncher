<?php
session_start();
$username = "";
$errors = array();

$db = mysqli_connect('localhost','root','','launcher-game');

if(isset($_POST['register'])){
    $username = htmlentities($_POST['username']);
    $password_1 = htmlentities($_POST['password_1']);
    $password_2 = htmlentities($_POST['password_2']);
    
    if($password_1 != $password_2){
        header("Location: register.php");
    }else{

        $password_1 = crypt($password_1,"gdasvdkjhabdgjasv");
        $sql = "INSERT INTO users(username,password)
                VALUE('$username','$password_1')";
        mysqli_query($db,$sql);
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password_1;
        $_SESSION['successo'] = "sei registrato";
        header('Location:login.php');
    }

}
if(isset($_POST['accedi'])){
    if(count($errors)== 0){
        $password = htmlentities($_POST['password']);
        $password = crypt($password,"gdasvdkjhabdgjasv");
        $sql = "SELECT username FROM users where password = '".$password."'";
        $username = htmlentities($_POST['username']);
        $result = mysqli_query($db, $sql);
        $row = $result->fetch_row();
        $accesso = $row[0];
        if($username == $accesso){
    echo "hhihihihihihihihi";

            $_SESSION['username']= $username;
            $_SESSION['password'] = $password;
            $_SESSION['successo'] = "sei entrato";
            header('Location:home.php');
            
        }
    } else {
        header("Location: login.php");
    }
}
if(isset($_POST['logout'])){
     header('Location:login.php'); 
    }