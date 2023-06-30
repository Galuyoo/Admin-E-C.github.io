<?php
session_start();
$connecte = false;
if (isset($_SESSION["user"])) {
    $connecte = true;
}
else{
    header('location: index.php');
}
?>

<section id="header">
            <div>
                <ul id="navbar" style="padding-top: 10px;">
                    <li><a  href="Home.php"><i class="fa-solid fa-house"></i> Home</a></li>
                <?php
                        if($connecte){
                            ?>
                    <li><a href="admin.php"><i class="fa-solid fa-user-tie"></i> Admin</a></li>
                    <li><a href="add_category.php"><i class="fa-solid fa-list-check"></i> Add category</a></li>
                    <li><a href="add_product.php"><i class="fa-solid fa-list-check"></i> Add product</a></li>
                    <li><a href="Categories.php"><i class="fa-sharp fa-regular fa-rectangle-list"></i> List of Categories</a></li>
                    <li><a href="Products.php"><i class="fa-sharp fa-regular fa-rectangle-list"></i> List of Products</a></li>
                    <?php
                        }else{
                            ?>
                            <li><a href="index.php"><i class="fa-solid fa-right-to-bracket"></i> Sign in</a></li>

                        <?php 
                        }
                        ?>
                    <li><a href="./php/logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>

                    <a id="close"><i class="fa-solid fa-xmark"></i></a>
                </ul>
            </div>
            
            <div id="mobile">
                <a href="Cart.html"><i class="fa-solid fa-cart-shopping"></i></a>
                <i id="bar" class="fas fa-outdent"></i>
            </div>
</section>
