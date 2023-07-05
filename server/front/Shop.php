<?php
session_start();

require_once './php/pdo.php';
$categories = $pdo->query("SELECT * FROM category")->fetchAll(PDO::FETCH_OBJ);


?>

<!DOCTYPE html>
<html lang="en">
    <head>
       <?php include './html/links.php' ?>
        <title>Organic'D home page</title>
    </head>
    <body>

    <?php include './html/header.php' ?>



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
            foreach($products as $product){
                $price=$product->price;
                $discount=$product->discount;
                $description=$product->description;
                $idProduct =$product->id;

                $pprice = $price -(($price*$discount)/100);
            ?>
                <!--PRODUCT1--> 
                <div class="pro" >
            <img style="width: 100%;height: 50%;" src="../back/upload/product/<?=$product->img?>" class="card-img-top w-70 mx-auto" alt="" onclick="window.location.href='details.php?id=<?= $idProduct ?>'">
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
    <script src="./js/input.js"></script>
    </body>
</html>
