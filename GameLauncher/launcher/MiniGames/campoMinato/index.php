<?php
session_start();
if (array_key_exists("username", $_SESSION) != true) {
    header("Location: ../../PHP/login.php");
} else{
    header("Location: home.html");
}
?>