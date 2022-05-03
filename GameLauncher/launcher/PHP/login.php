<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
    <div class="header">
        <h2>LOGIN</h2>
    </div>
        <form action="DB.php" method="POST">
       
            <div class="campi">
            <label>Username:</label>
                <input type="text" placeholder="username" name="username" required>
            </div>
            <div class="campi">
            <label> Password:</label>
                <input type="password" placeholder="password" name="password" required>
            </div>
            <div class="campi">
            <button type="submit" id="btn" name="access" value="accedi">accedi</button>
            </div>
            <p>
            <a href="register.php">non hai un profilo?</a>
            </p>
        </form> 

        <?php
        /*
         session_start();
         $username = "";
         $db = mysqli_connect('localhost','root','','launcher-game');
            if(isset($_POST['accedi'])){
                if(count($errors)== 0){
                    $password = $_POST['password'];
                    echo $password;
                    $password = hash($password,'srdtfgyiuhjiuhgbvuy');
                    echo $password;
                    $sql = "SELECT username FROM users where password = '".$password."'";
                    $username = htmlentities($_POST['username']);
                    $result = mysqli_query($db, $sql);
                    $row = $result->fetch_row();
                   // echo $row[0];
                    $accesso = $row[0];
                    if($username == $accesso){
                        $_SESSION['username']= $username;
                        $_SESSION['successo'] = "sei entrato";
                        header('Location:home.php');
                    }
                } else {
                    header("Location: login.php");
                }
            
            }
            */
        ?> 
</body>
</html>