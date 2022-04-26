
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
            <div class="fields">
            <label>username:</label>
                <input type="text" placeholder="username" name="username" required>
            </div>
            <div class="fields">
            <label> Password:</label>
                <input type="password" placeholder="password" name="password_1" required>
            </div>
            <div class="fields">
            <label> Conferma Password:</label>
                <input type="password" placeholder="confirm password" name="password_2" required>
            </div>
            <div class="fields">
            <button type="submit" id="btn" name="register" value="Registrati">Registrati</button>
            </div>
            <p>
            <a href="login.php">Accedi</a>
            </p>
        </form>  
</body>
</html>