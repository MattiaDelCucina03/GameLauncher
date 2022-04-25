<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
    <div class="header">
        <h2>LOGIN</h2>
    </div>
        <form action="DB.php" method="POST">
        <?php require_once('errors.php')?>
            <div class="fields">
            <label>Username:</label>
                <input type="text" placeholder="username" name="username" required>
            </div>
            <div class="fields">
            <label> Password:</label>
                <input type="password" placeholder="password" name="password" required>
            </div>
            <div class="fields">
            <button type="submit" id="btn" name="access" value="accedi">accedi</button>
            </div>
            <p>
            <a href="register.php">non hai un profilo?</a>
            </p>
        </form>  
</body>
</html>