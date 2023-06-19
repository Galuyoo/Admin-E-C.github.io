<?php
session_start();
$connecte = false;
if (isset($_SESSION["user_id"])) {
    $connecte = true;
}
else{
    header('location: index.php');
}
?>

<section id="header">
            <a href="#"><img src="./img/logo.png" alt="" class="logo"></a>
            <div>
                <ul id="navbar">
                    <li><a  href="Home.php">Home</a></li>
                    <li><a href="admin.php">Admin</a></li>
                <?php
                        if($connecte){
                            ?>
                    <li><a href="Blog.html">Add category</a></li>
                    <li><a href="About.html">Add product</a></li>
                    <li><a href="Contact.html">Connectact</a></li>
                    <li class="lg-bag"><a href="Cart.html" ><i class="fa-solid fa-cart-shopping"></i></a></li>
                    <?php
                        }else{
                            ?>
                            <li><a href="index.php">Sign in</a></li>

                        <?php 
                        }
                        ?>
                    <a id="close"><i class="fa-solid fa-xmark"></i></a>
                </ul>
            </div>
            
            <div id="mobile">
                <a href="Cart.html"><i class="fa-solid fa-cart-shopping"></i></a>
                <i id="bar" class="fas fa-outdent"></i>
            </div>
</section>
