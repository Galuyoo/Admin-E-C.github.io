
<?php
require_once './php/pdo.php';

//fect all categories
$categories = $pdo->query("SELECT * FROM category ORDER BY id DESC LIMIT 4")->fetchAll(PDO::FETCH_OBJ);


// Get the id
$id=$_GET['id'];


// fetch Product
$sqlState = $pdo->prepare("SELECT * FROM products WHERE id=?");
$sqlState->execute([$id]);

$products=$sqlState->fetch(PDO::FETCH_OBJ);

$name = $products->name;

$price = $products->price;

$description = $products->description;

$discount = $products->discount;


$category_id= $products->category_id ;

//fectch category
$sqlState = $pdo->prepare("SELECT * FROM category WHERE id=?");

$sqlState->execute([$category_id]);

$category=$sqlState->fetch(PDO::FETCH_OBJ);

$category=  $category->category;

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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
        <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="./css/style.css" />
        <title>category / <?= $category ?></title>
    </head>
    <body>
    <?php include './html/header.php' ?>

    <section id="prodetails" class="section-p1">
        <div class="single-pro-image">
            <img src="../back/upload/product/<?= $products->img?>" width="100%" id="MainImg" alt="">

            <div class="small-img-grp">
                <div class="small-img-col">
                    <img src="../back/upload/product/<?= $products->img?>" width="100%" id="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="../back/upload/product/<?= $products->img?>" width="100%" id="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="./img/products/f3.jpeg" width="100%" id="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="./img/hero1.png" width="100%" id="small-img" alt="">
                </div>
            </div>
        </div>
    
        <div class="single-pro-details">

            <div class="d-flex">
                <div class="w-100" >
                    <h6><a href="./Shop.php">Shop</a>/<a href="category.php?id=<?= $category_id ?>"><?= $category ?></a>/<?= $name ?></h6>
                    <h4><?= $name ?></h4>
                </div>

                <h7><span class="badge text-bg-success">- <?= "$discount%";?></span> </h7>
            </div>
            <hr>

            <div class="inline">
                <select>
                    <option>select size</option>
                    <option>10ml</option>
                    <option>20ml</option>
                    <option>30ml</option>
                    <option>100ml</option>
                    <option>140ml</option>
                </select>
                <div class="howmany" >
                    <div class="counter d-flex">
                        <button class="btn btn-primary mx-1 counter-add">+</button>
                        <input class="form-control" type="number" value="1" name="qty" id="qty" max="99">
                        <button class="btn btn-primary mx-1 counter-take">-</button>
                    </div>
                </div>
                <button class="btn btn-primary ">Add To Cart</button>
    
            </div>

            <?php 
                if(!empty($discount)){
                    $new_price = $price -(($price*$discount)/100);
                    ?>
                
                <h2>        <span  class="badge text-bg-success">$<?= $new_price ?></span> <span class="badge text-bg-danger"><strike><?= "\$$price";?></strike></h2>


                
            <?php }else{ ?>

            <h2> <span  class="badge text-bg-success">$<?= $price ?></span> </h2>
              <?php } ?>
            <h4>Products details</h4>
            
            <span><?= $description ?></span>
            <hr>

        </div>

    </section>

    <section id="product1" class="section-p1">
            <h2>Seasonique Products Section</h2>
            <p>Embrace the rhythm of the seasons with Organic'D's Seasonique line.</p>
            <div class="pro-con">
            <?php
            foreach($categories as $category){
            $id=$category->id;
            $categoryy=$category->category;

            $sqlState = $pdo->prepare("SELECT * FROM category WHERE id=? ORDER BY id DESC LIMIT 4");

            $sqlState->execute([$id]);
            
            $category=$sqlState->fetch(PDO::FETCH_ASSOC);


            
            $sqlState = $pdo->prepare("SELECT * FROM products WHERE category_id=?  ORDER BY id DESC LIMIT 4");
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
                $idProduct =$product->id;
                $price=$product->price;
                $discount=$product->discount;
                $description=$product->description;
    
                $pprice = $price -(($price*$discount)/100);
            ?>
                <!--PRODUCT1--> 
                <div class="pro" >
            <img src="../back/upload/product/<?=$product->img?>" class="card-img-top w-70 mx-auto" alt="" onclick="window.location.href='details.php?id=<?= $idProduct ?>'">
                <div class="des" onclick="window.location.href='details.php?id=<?= $idProduct ?>'">
                        <span><?=  $categoryy ?></span>
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
        </section>
    

    <?php include './html/footer.php' ?>

    <script>
    var MainImg = document.getElementById("MainImg");
    var SmallImg = document.getElementsByClassName("small-img-col");

    SmallImg[0].onclick = function() {
        MainImg.src = this.getElementsByTagName("img")[0].src;
    };

    SmallImg[1].onclick = function() {
        MainImg.src = this.getElementsByTagName("img")[0].src;
    };

    SmallImg[2].onclick = function() {
        MainImg.src = this.getElementsByTagName("img")[0].src;
    };

    SmallImg[3].onclick = function() {
        MainImg.src = this.getElementsByTagName("img")[0].src;
    };
</script>


    <script src="./js/nav.js"></script>
    <script src="./js/input.js"></script>

    </body>
</html>
