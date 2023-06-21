<?php
require_once './php/pdo.php';
$categories = $pdo->query("SELECT * FROM category")->fetchAll(PDO::FETCH_OBJ);


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script src="https://kit.fontawesome.com/791c42954a.js" crossorigin="anonymous"></script>   
        <link href="https://fonts.googleapis.com/css?family=Archivo+Black&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="./css/style.css" />
        <title>Organic'D home page</title>
    </head>
    <body>

    <section id="header">
            <a href="#"><img src="./img/logo.png" alt="" class="logo"></a>
            <div>
                <ul id="navbar">
                    <li><a href="./home.php">Home</a></li>
                    <li><a class="active" href="./Shop.php">Shop</a></li>
                    <li><a href="./Blog.php">Blog</a></li>
                    <li><a href="./About.php">About</a></li>
                    <li><a href="./Contact.php">Contact us</a></li>
                    <li class="lg-bag"><a href="./Cart.php" ><i class="fa-solid fa-cart-shopping"></i></a></li>
                    <a id="close"><i class="fa-solid fa-xmark"></i></a>
                </ul>
            </div>
            
            <div id="mobile">
                <a href="Cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
                <i id="bar" class="fas fa-outdent"></i>
            </div>
    </section>


        <section id="page_header">
            <h2>Welcome to the SHOP</h2>
            <p>Free shiping for every 200$ buy!!</p>
        </section>

        <?php include './html/cats.php' ?>


        <section id="product1" class="section-p1">
            <div class="pro-con">
                
            <?php
            foreach($categories as $category){
            $id=$category->id;
            $categoryy=$category->category;

            $sqlState = $pdo->prepare("SELECT * FROM category WHERE id=?");

            $sqlState->execute([$id]);
            
            $category=$sqlState->fetch(PDO::FETCH_ASSOC);


            
            $sqlState = $pdo->prepare("SELECT * FROM products WHERE category_id=?");
            $sqlState->execute([$id]);
            
            $products=$sqlState->fetchAll(PDO::FETCH_OBJ);
            ?>

            <?php
            if(empty($categories)){
            //echo"<h4> There are no categories!! <br>Please add some.</h4>";
            }elseif(empty($products)){
            //echo"<h3> There are no Products in the category </strong>{$categoryy}</strong> for the moment!!</h3>";
            }else{
            //echo "<h3>Products of the category {$categoryy}:<h3>";
            foreach($products as $prodcut){
            ?>
                <!--PRODUCT1--> 
                <div class="pro">
                    <img src="img/products/f1.jpeg" alt="">
                    <div class="des">
                        <span><?=  $prodcut->name ?></span>
                        <h5><?=  $prodcut->name ?></h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4><?=  $prodcut->price ?> $</h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-light fa-cart-plus" id="cart"></i></a>
                </div>
                <?php }}} ?>
            </div>
            </div>
        </section>


        <section id="pagination" class="section-p1">
            <a href="#">1</a>
            <a href="#">2</a>
            <a href="#"><i class="fa-solid fa-right-long"></i></a>


        </section>


        <?php include './html/footer.php' ?>

        <script src="./js/nav.js"></script>
    </body>
</html>
