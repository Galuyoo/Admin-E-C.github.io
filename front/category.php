
<?php
session_start();

require_once './php/pdo.php';
$categories = $pdo->query("SELECT * FROM category")->fetchAll(PDO::FETCH_OBJ);

$id=$_GET['id'];
$sqlState = $pdo->prepare("SELECT * FROM category WHERE id=?");

$sqlState->execute([$id]);

$category=$sqlState->fetch(PDO::FETCH_ASSOC);

$categoryy=$category['category'];

$description = $category['description'];



$sqlState = $pdo->prepare("SELECT * FROM products WHERE category_id=?");
$sqlState->execute([$id]);

$products=$sqlState->fetchAll(PDO::FETCH_OBJ);
    
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
        <title>category / <?= $description ?></title>
    </head>
    <body>

    <?php include './html/header.php' ?>

    
    <section id="page_header">
            <h2>Welcome to the SHOP</h2>
            <p>Free shiping for every 200$ buy!!</p>
    </section>

    <?php include './html/cats.php' ?>


    <section id="product1" class="section-p1">
    <h3><?php echo " {$description}"; ?></h3>
        <div class="pro-con">
        

        <?php
        if(empty($categories)){

            ?>
            <div class="alert alert-danger" role="alert">Category not found!</div>
            <?php

        }elseif(empty($products)){

            ?>
            <div class="alert alert-danger" role="alert">There is no products in this category!</div>
            <?php

        }else{

        foreach($products as $product){
            $idProduct =$product->id;
            $price=$product->price;
            $discount=$product->discount;
            $pprice = $price -(($price*$discount)/100);
        ?>
            <!--product1--> 
            <div class="pro" >
            <img src="../back/upload/product/<?=$product->img?>" class="card-img-top w-70 mx-auto" alt="" onclick="window.location.href='details.php?id=<?= $idProduct ?>'">
                <div class="des" onclick="window.location.href='details.php?id=<?= $idProduct ?>'">
                    <span><?= $categoryy ?></span>
                    <h5><?=  $product->name ?></h5>
                    <h6>  <?php if(empty($description)){
                                echo "There is no description!";                
                                }else{
                                echo $description;
                                }?></h6>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4><?=  $pprice ?> $</h4>
                </div>
                
                <?php include './html/input.php' ?>

            </div>
            <?php }} ?>
        </div>
    </section>


    <section id="pagination" class="section-p1">
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#"><i class="fa-solid fa-right-long"></i></a>
    </section>


    <?php include './html/footer.php' ?>


    <script src="./js/nav.js"></script>
    <script src="./js/input.js"></script>
    </body>
</html>
