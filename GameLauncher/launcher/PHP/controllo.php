<?php
    if(array_key_exists("username", $_SESSION)!=true){
        header("Location: login.php");
    }
?>