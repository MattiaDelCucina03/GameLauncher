
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
    
            <div class="campi">
            <label>username:</label>
                <input type="text" placeholder="username" name="username" required>
            </div>
            <div class="campi">
            <label> Password:</label>
                <input type="password" placeholder="password" name="password_1" required>
            </div>
            <div class="campi">
            <label>Confirm password:</label>
                <input type="password" placeholder="conferma password" name="password_2" required>
            </div>
            <div class="campi">
            <button type="submit" id="btn" name="register" value="Registrati">Registrati</button>
            </div>
            <p>
            <a href="login.php">Log in</a>
            </p>
        </form> 
</body>
</html>