<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script
        src="https://kit.fontawesome.com/64d58efce2.js"
        crossorigin="anonymous"
        ></script>

        <link rel="stylesheet" href="./css/style.css" />
        <title>Admine Page</title>
    </head>
    <body>

    <?php include './html/header.php' ?>

    <?php

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/php/conn.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}
?>
    
    <h1>Bonjoour <?= $user["name"] ?></h1>



    <?php include './html/footer.php' ?>

    </body>
</html>