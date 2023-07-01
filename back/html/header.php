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
<style>
    #header ul li a{
        font-size: small ;
    }
</style>
<section id="header">
        <?php
            $current_page = $_SERVER['PHP_SELF'];
        ?>
            <div>
                <ul id="navbar">
                    <li><a class="<?php if($current_page == '/Users/Lenovo/OneDrive/Documents/GitHub/Admin-E-C.github.io/back/Home.php') echo "active"; ?>" href="Home.php"><i class="fa-solid fa-house"></i> Home</a></li>
                <?php
                        if($connecte){
                            ?>
                    <li><a class="<?php if($current_page == '/Users/Lenovo/OneDrive/Documents/GitHub/Admin-E-C.github.io/back/admin.php') echo "active"; ?>"href="admin.php"><i class="fa-solid fa-user-tie"></i> Admin</a></li>
                    <li><a class="<?php if($current_page == '/Users/Lenovo/OneDrive/Documents/GitHub/Admin-E-C.github.io/back/add_category.php') echo "active"; ?>"href="add_category.php"><i class="fa-solid fa-list-check"></i> Add category</a></li>
                    <li><a class="<?php if($current_page == '/Users/Lenovo/OneDrive/Documents/GitHub/Admin-E-C.github.io/back/add_product.php') echo "active"; ?>"href="add_product.php"><i class="fa-solid fa-list-check"></i> Add product</a></li>
                    <li><a class="<?php if($current_page == '/Users/Lenovo/OneDrive/Documents/GitHub/Admin-E-C.github.io/back/Categories.php') echo "active"; ?>"href="Categories.php"><i class="fa-sharp fa-regular fa-rectangle-list"></i> List of Categories</a></li>
                    <li><a class="<?php if($current_page == '/Users/Lenovo/OneDrive/Documents/GitHub/Admin-E-C.github.io/back/Products.php') echo "active"; ?>"href="Products.php"><i class="fa-sharp fa-regular fa-rectangle-list"></i> List of Products</a></li>
                    <?php
                        }else{
                            ?>
                            <li><a href="index.php"><i class="fa-solid fa-right-to-bracket"></i> Sign in</a></li>

                        <?php 
                        }
                        ?>
                    
                    <li><a class="<?php if($current_page == '/Users/Lenovo/OneDrive/Documents/GitHub/Admin-E-C.github.io/back/cmd.php') echo "active"; ?>"href="cmd.php"><i class="fa-brands fa-shopify"></i> Orders</a></li>

                    <li><a href="./php/logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>

                    <a id="close"><i class="fa-solid fa-xmark"></i></a>
                </ul>
            </div>
            
            <div id="mobile">
                <i id="bar" class="fas fa-outdent"></i>
            </div>
</section>
