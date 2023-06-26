
<?php
session_start();
require_once './php/pdo.php';

    
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" type="text/css" />        
        <link rel="stylesheet" href="./css/style.css" />
        <link href="https://fonts.googleapis.com/css?family=Archivo+Black&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="./css/style.css" />
        <title> Cart webpage </title>
    </head>
    <body>

    <section id="header">
        <?php
            $user_id = $_SESSION['user']['id'];
        ?>
                <a href="#"><img src="./img/logo.png" alt="" class="logo"></a>
                <div>
                    <ul id="navbar">
                        
                        <li><a href="./home.php">Home</a></li>
                        <li><a href="./Shop.php">Shop</a></li>
                        <li><a href="./Blog.php">Blog</a></li>
                        <li><a href="./About.php">About</a></li>
                        <li><a href="./Contact.php">Contact us</a></li>
                    <li class="lg-bag"><a href="./Cart.php" class="active"><i class="fa-solid fa-cart-shopping"></i>Cart(<?php
                            echo count($_SESSION['cart'][$user_id]);
                        ?>)
                        </a></li>
                        <a id="close"><i class="fa-solid fa-xmark"></i></a>
                    </ul>   
                </div>

                <div id="mobile">
                    <a href="Cart.php"><i class="fa-solid fa-cart-shopping"></i>Cart (<?php echo count($_SESSION['cart'][$user_id]);?>)           

                </a>
                    <i id="bar" class="fas fa-outdent"></i>
                </div>
    </section>

    <?php 
$user_id = $_SESSION['user']['id'];
$cart = $_SESSION['cart'][$user_id];
$product_id = array_keys($cart);
$product_id = implode(',', $product_id);

$sqlState = $pdo->prepare('SELECT * FROM products WHERE id IN (' . $product_id . ')');
$sqlState->execute();
$products = $sqlState->fetchAll(PDO::FETCH_OBJ);


if (empty($cart)) {
    ?>
    <div class="alert alert-warning" role="alert">
        YOU HAVE NO MANA
    </div>
    <?php
} else {
    ?>
    <ul class="list-group List-group-flush w-25"></ul>

    <?php
    foreach($products as $product){
        echo "<option value='".$category['id']."'>".$category['category']."</option>";

        ?>
    <li class="list-group-item">A</li>
<?php
    }
?>

    </ul>
        <?php
}
?>



    <?php include './html/footer.php' ?>
    <script src="./js/nav.js"></script>
    <script src="./js/input.js"></script>
    </body>
</html>
