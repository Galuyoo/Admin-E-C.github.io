<?php
session_start();
require_once './php/pdo.php';
$shipping = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include './html/links.php' ?>
    <title>Cart webpage</title>
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
            <li><a  href="./Contact.php">Contact us</a></li>
            <li  class="lg-bag"><a  class="active" href="./Cart.php"><i class="fa-solid fa-cart-shopping"></i>Cart(<?php
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
        <a class="active"  href="Cart.php"><i class="fa-solid fa-cart-shopping"></i>Cart (as)
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


<section id="page_header">
    <h2>Welcome to the Cart page</h2>
    <p>Free shipping for every $200 purchase!</p>
</section>


<section id="cart" class="section-p1">
    <?php
    $user_id = $_SESSION['user']['id'];
    $cart = isset($_SESSION['cart'][$user_id]) ? $_SESSION['cart'][$user_id] : array();

    if (empty($cart) || !is_array($cart)) {
            ?>
        <div class="alert alert-warning" role="alert">Your Cart is empty!</div>
        <?php
    } else {
        $product_id = array_keys($cart);
        $product_id = implode(',', $product_id);

        $sqlState = $pdo->prepare('SELECT * FROM products WHERE id IN (' . $product_id . ')');
        $sqlState->execute();
        $products = $sqlState->fetchAll(PDO::FETCH_OBJ);
        ?>
        <h3>YOU HAVE <?= count($cart); ?> ELEMENT(S) IN YOUR CART</h3>
        <table width="100%">
            <thead>
            <tr>
                <td>REMOVE</td>
                <td>IMAGE</td>
                <td>PRODUCT</td>
                <td>PRICE</td>
                <td>QUANTITY</td>
                <td>DISCOUNT</td>
                <td>SUBTOTAL</td>
            </tr>
            </thead>
            <tbody>
            <?php
            $total = 0;
            foreach ($products as $product):
                $idProduct = $product->id;
                $price = $product->price;
                $discount = $product->discount;

                if ($discount == 0) {
                    $pprice = $price;
                    $totalofproduct = $price * $cart[$idProduct];
                } else {
                    $pprice = $price - (($price * $discount) / 100);
                    $totalofproduct = $pprice * $cart[$idProduct];
                }

                $total += $totalofproduct;
                ?>
                <tr>
                    <td style="text-align: center;"><a href="./php/Dlt_cart.php?id=<?= $product->id ?>"><i
                                    class="far fa-times-circle"></i></a></td>
                    <td><img src="../back/upload/product/<?= $product->img ?>" width="100%"></td>
                    <td><?= $product->name ?></td>
                    <td>$<?= $product->price ?></td>
                    <td><?php include './html/Cart_input.php' ?></td>
                    <td><?= $product->discount ?>%</td>
                    <td>$<?= $totalofproduct ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="6" align="right"><strong>Total:</strong></td>
                <td>$<?= $total ?></td>
            </tr>
            </tfoot>
        </table>
    <?php } ?>
</section>


<?php
if (isset($_POST['dlt'])) {
    $_SESSION['cart'][$user_id] = [];
    header('location: Shop.php');
}

if (isset($_POST['Cnf'])) {
    $cart_user = $_SESSION['cart'][$user_id];
    $sql = '';
    foreach($cart_user as $productid=>$qty){
        $sql .= "INSERT INTO commande()"; 
    }
}
?>


<section id="cart-add" class="section-p1">
    <div id="coupon">
        <h3>Apply Coupon</h3>
        <div>
            <input type="text" placeholder="Enter your Coupon">
            <button class="normal">Apply</button>
        </div>
    </div>

    <div id="subtotal">
        <h3>Cart Total</h3>
        <?php
        $user_id = $_SESSION['user']['id'];
        $cart = isset($_SESSION['cart'][$user_id]) ? $_SESSION['cart'][$user_id] : array();

        if (empty($cart) || !is_array($cart)) {
            ?>
            <div class="alert alert-warning" role="alert">Your Cart is empty!</div>
            <?php
        } else {
            ?>
            <table>
                <tr>
                    <td>Cart Subtotal</td>
                    <td>$<?= $total ?></td>
                </tr>
                <tr>
                    <td>Shipping</td>
                    <td>
                        <?php
                        if ($shipping == 0) {
                            echo "Free";
                        } else {
                            echo "$" . $shipping;
                            $total = $total - $shipping;
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong>$<?= $total ?></strong></td>
                </tr>
            </table>


            <form method="post">
                <input type="submit" name="Cnf" class="btn btn-primary" value="Confirm the command">
                <input type="submit" name="dlt" class="btn btn-danger" value="Delete the command"
                       onclick="return confirm('Do you really want to delete your Cart?');">
            </form>
        <?php } ?>
    </div>
</section>

<?php include './html/footer.php' ?>
<script src="./js/nav.js"></script>
<script src="./js/input.js"></script>
</body>
</html>
