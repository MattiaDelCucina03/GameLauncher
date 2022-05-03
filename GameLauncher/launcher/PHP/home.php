<?php
require_once('DB.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../CSS/style2.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        .mySlides {
            display: none;
        }
    </style>

    <title>home</title>
</head>

<body>
    <?php
    if (isset($_SESSION['success'])) :
    ?>
        <h3>
            <?php
            unset($_SESSION['success']);
            ?>
        </h3>
    <?php
    endif
    ?>
    <div id="utente">
        <h1>Welcome!</h1>
        <?php if (isset($_SESSION['username'])) { ?>
            <h2><strong><?php echo $_SESSION['username']; ?></strong></h2>
        <?php } ?>
    <a href="../Rankings/index.php">
            <img src="../PNG/coppa.png" style="width: 50%;" >
    </a>
    </div>
    <form action="home.php" method="POST">
        <button type="submit" id="logout" name="logout" value="logout">logout</button>
    </form>
    <?php
    if (isset($_POST['logout'])) {
        header('Location:login.php');
    }
    ?>


    <div class="w3-content w3-display-container" style="width: 50%;">
        <?php
        $mysqli = new mysqli("localhost", "root", "", "videogames");
        $query = "SELECT img,name,link from games";
        $result = $mysqli->query($query);
        while ($row = $result->fetch_assoc()) {
        ?>
            <div class="w3-display-container mySlides">
                <a href=<?php echo $row["link"] ?>>
                    <img src=<?php echo $row["img"] ?> style="width: 100%">
                    <div class="w3-display-bottomleft w3-container w3-padding-16 w3-black">
                        <?php echo $row["name"] ?>
                    </div>
                </a>
            </div>
        <?php
        }
        ?>
        <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
        <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
    </div>
    <p id="descriptionGame"></p>

    <script>
        var slideIndex = 1;
        showDivs(slideIndex);

        function plusDivs(n) {
            showDivs(slideIndex += n);
        }

        function showDivs(n) {
            var i;
            var x = document.getElementsByClassName("mySlides");
            if (n > x.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = x.length
            }
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            x[slideIndex - 1].style.display = "block";

        }
        function seeRanks(){
            location.href="../Rankings";
        }
    </script>
</body>

</html>