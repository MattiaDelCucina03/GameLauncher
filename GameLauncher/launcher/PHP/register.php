
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
</head>
<body>
    <div class="header">
        <h2>REGISTER</h2>
    </div>
        <form action="DB.php" method="POST">
            <?php include('errors.php')?>
            <div class="campi">
            <label>username:</label>
                <input type="text" placeholder="username" name="username" required>
            </div>
            <div class="campi">
            <label> Password:</label>
                <input type="password" placeholder="password" name="password_1" required>
            </div>
            <div class="campi">
            <label> Conferma Password:</label>
                <input type="password" placeholder="conferma password" name="password_2" required>
            </div>
            <div class="campi">
            <button type="submit" id="btn" name="register" value="Registrati">Registrati</button>
            </div>
            <p>
            <a href="login.php">Accedi</a>
            </p>
        </form> 
        <?php
        /*
        session_start();
        $username = "";
        $errors = array();
        
        $db = mysqli_connect('localhost','root','','launcher-game');
            if(isset($_POST['register'])){
                $username = htmlentities($_POST['username']);
                $password_1 = htmlentities($_POST['password_1']);
                $password_2 = htmlentities($_POST['password_2']);
          //echo $password_1, $password_2;
                if(count($errors)== 0){
                    //$password_1 = hash($password_1,'srdtfgyiuhjiuhgbvuy');
                    //$password_1 = md5($password_1);
                    $sql = "INSERT INTO users(username,password)
                            VALUE('$username','$password')";
                    mysqli_query($db,$sql);
                    $_SESSION['username'] = $username;
                    $_SESSION['successo'] = "sei registrato";
                    header('Location:login.php');
                }
            
            }
            */
        ?> 
</body>
</html>