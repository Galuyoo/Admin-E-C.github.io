
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
        <?php include './html/links.php' ?>
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
            <img style="  width: 100%;height: 50%;"src="../back/upload/product/<?=$product->img?>" class="card-img-top w-70 mx-auto" alt="" onclick="window.location.href='details.php?id=<?= $idProduct ?>'">
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
