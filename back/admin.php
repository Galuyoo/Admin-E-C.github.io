<!DOCTYPE html>
<html lang="en">
<?php include './html/head.php' ?>

<body>
<?php 
require_once './php/pdo.php';

include './html/header.php';

?>
<?php


if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/php/conn.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

?>

<h1>Hello <?= $user["name"] ?></h1>

<h1>Welcome to the moderationg website!!</h1>


<h3>this page will have statistics for our products and clients... in a form of charts</h3>

<h5>for now it will be impty</h5>

        <pre>
            <?php
                $sqlState1 = $pdo->prepare("SELECT * FROM category");
                $sqlState1->execute();
                print_r($sqlState1->fetchAll(PDO::FETCH_ASSOC));

                $sqlState2 = $pdo->prepare("SELECT * FROM products");
                $sqlState2->execute();
                print_r($sqlState2->fetchAll(PDO::FETCH_ASSOC));

                $sqlState3 = $pdo->prepare("SELECT * FROM user");
                $sqlState3->execute();
                print_r($sqlState3->fetchAll(PDO::FETCH_ASSOC));
            ?>
        </pre>

<?php include './html/footer.php' ?>
</body>
</html>