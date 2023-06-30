<section id="header">
<?php
    $user_id = $_SESSION['user']['id'];
?>
        <a href="#"><img src="./img/logo.png" alt="" class="logo"></a>
        <div>
            <ul id="navbar">
                <li><a href="./home.php">Home</a></li>
                <li><a class="active" href="./Shop.php">Shop</a></li>
                <li><a href="./Blog.php">Blog</a></li>
                <li><a href="./About.php">About</a></li>
                <li><a href="./Contact.php">Contact us</a></li>
                <li class="lg-bag"><a href="./Cart.php" ><i class="fa-solid fa-cart-shopping"></i>Cart(<?php
                    if (isset($_SESSION['cart'][$user_id])) {
                        echo count($_SESSION['cart'][$user_id]);
                    } else {
                        echo "0";
                    }
                ?>)
                </a></li>
                <a id="close"><i class="fa-solid fa-xmark"></i></a>
            </ul>   
        </div>

        <div id="mobile">
            <a href="Cart.php"><i class="fa-solid fa-cart-shopping"></i>Cart (as)           
         <?php
            if (isset($_SESSION['cart'][$user_id])) {
                echo count($_SESSION['cart'][$user_id]);
            } else {
                echo "0";
            }
        ?>
        </a>
            <i id="bar" class="fas fa-outdent"></i>
        </div>
</section>