<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include './html/links.php' ?>
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
                <li class="lg-bag"><a class="active" href="./Cart.php" ><i class="fa-solid fa-cart-shopping"></i>Cart(<?php
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

    <section id="page_header">
            <h2>Welcome to the SHOP</h2>
            <p>Free shiping for every 200$ buy!!</p>
    </section>

    <section id="cart" class="section-p1">
    <table width="100%">
        <thead>  
            <tr>
                <td>REMOVE</td>
                <td>IMAGE</td>
                <td>PRODICT</td>
                <td>PRICE</td>
                <td>QUANTITY</td>
                <td>SUBTOTAL</td>
            </tr>
        </thead>
        <tbody>
            <?php
                require_once './php/pdo.php';
                $categories = $pdo->query('SELECT * FROM category ORDER BY id DESC')->fetchAll(PDO::FETCH_ASSOC);
                foreach ($categories as $category){
            ?>
            <tr>
                <td> <a href="#"><i class="far fa-times-circle"></i></a> </td>
                <td><img src="./img/products/f1.jpeg" alt=""></td>
                <td>name of product</td>
                <td>price</td>
                <td><input type="number" value="1"></td>
                <td>final price</td>
            </tr>
            <tr>
                <td> <a href="#"><i class="far fa-times-circle"></i></a> </td>
                <td><img src="./img/products/f2.jpeg" alt=""></td>
                <td>name of product</td>
                <td>price</td>
                <td><input type="number" value="1"></td>
                <td>final price</td>
            </tr>
            <tr>
                <td> <a href="#"><i class="far fa-times-circle"></i></a> </td>
                <td><img src="./img/products/f3.jpeg" alt=""></td>
                <td>name of product</td>
                <td>price</td>
                <td><input type="number" value="1"></td>
                <td>final price</td>
            </tr>
            
        </tbody>
    </table>
    </section>

    <section id="cart-add" class="section-p1">
        <div id="coupon">
            <h3>Apply Coupon</h3>
            <div>
                <input type="text" placeholder="Enter your Coupon">
                <button class="normal">Apply</button>
            </div>
        </div>

        <div id="subtotal">
            <h3>Cart total</h3>
            <table>
                <tr>
                    <td>Card Subtotal</td>
                    <td>$ 423</td>
                </tr>
                <tr>
                    <td>Shipping</td>
                    <td>Free </td>
                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong>$ 423</strong></td>
                </tr>
            </table>
            <button class="normal">Proceed to checkout</button>
        </div>
    </section>

    <?php include './html/footer.php' ?>
    <script src="./js/nav.js"></script>
    <script src="./js/input.js"></script>
    </body>
</html>
