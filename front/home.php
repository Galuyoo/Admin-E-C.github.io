<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include './html/links.php' ?>
        <title>Organic'D home page</title>
    </head>
    <body>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include './html/links.php' ?>
    <title>Organic'D home page</title>
</head>
<body>
    
<section id="header">
<?php
    $user_id = $_SESSION['user']['id'];
?>
        <a href="#"><img src="./img/logo.png" alt="" class="logo"></a>
        <div>
            <ul id="navbar">
                <li><a class="active" href="./home.php">Home</a></li>
                <li><a href="./Shop.php">Shop</a></li>
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




        <section id="hero">
            <h4> Buy-and-bennefit</h4>
            <h2>Embrace nature</h2>
            <h1>100% Organic</h1>
            <p>Free shiping for every 200$ buy!!</p>
            <div class="leaves"><a class="a" href="#">Shop Now</a></div>   
        </section>

        <section id="feature" class="section-p1">
            <div class="fe-box">
                <img src="img/features/f1.png" alt="">
                <h6>Free Shipping</h6>
            </div>
            <div class="fe-box">
                <img src="img/features/f2.png" alt="">
                <h6>Pure & Organic</h6>
            </div>
            <div class="fe-box">
                <img src="img/features/f3.png" alt="">
                <h6>24/7 Support</h6>
            </div>
            <div class="fe-box">
                <img src="img/features/f4.png" alt="">
                <h6>Online Order</h6>
            </div>
            <div class="fe-box">
                <img src="img/features/f5.png" alt="">
                <h6>Good deal</h6>
            </div>

        </section>

        <section id="product1" class="section-p1">
            <h2>Our Products</h2>
            <p>The golden secret to ageless beauty.</p>
            <div class="pro-con">
                <!--PRODUCT1--> 
                <div class="pro">
                    <img src="img/products/f1.jpeg" alt="">
                    <div class="des">
                        <span>SKIN CARE</span>
                        <h5>ARGAN OIL</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>15$</h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-light fa-cart-plus" id="cart"></i></a>
                </div>

                <!--PRODUCT2--> 
                <div class="pro">
                    <img src="img/products/f2.jpeg" alt="">
                    <div class="des">
                        <span>SKIN CARE</span>
                        <h5>ARGAN OIL</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>22$</h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-light fa-cart-plus" id="cart"></i></a>
                </div>

                <!--PRODUCT3--> 
                <div class="pro">
                    <img src="img/products/f3.jpeg" alt="">
                    <div class="des">
                        <span>SKIN CARE</span>
                        <h5>ARGAN OIL</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>13$</h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-light fa-cart-plus" id="cart"></i></a>
                </div>

                <!--PRODUCT4--> 
                <div class="pro">
                    <img src="img/products/f4.jpeg" alt="">
                    <div class="des">
                        <span>HAIR CARE</span>
                        <h5>ARGAN OIL</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>10$</h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-light fa-cart-plus" id="cart"></i></a>
                </div>

                <!--PRODUCT5--> 
                <div class="pro">
                    <img src="img/products/f5.jpeg" alt="">
                    <div class="des">
                        <span>LOTION</span>
                        <h5>ARGAN OIL</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>15$</h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-light fa-cart-plus" id="cart"></i></a>
                </div>

                <!--PRODUCT6--> 
                <div class="pro">
                    <img src="img/products/f5.jpeg" alt="">
                    <div class="des">
                        <span>ESSENTIAL OIL</span>
                        <h5>ARGAN OIL</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>17$</h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-light fa-cart-plus" id="cart"></i></a>
                </div>

                <!--PRODUCT7--> 
                <div class="pro">
                    <img src="img/products/f5.jpeg" alt="">
                    <div class="des">
                        <span>CHI7AJA</span>
                        <h5>ARGAN OIL</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>15$</h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-light fa-cart-plus" id="cart"></i></a>
                </div>

                <!--PRODUCT8--> 
                <div class="pro">
                    <img src="img/products/f5.jpeg" alt="">
                    <div class="des">
                        <span>ARGAN</span>
                        <h5>ARGAN OIL</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>11$</h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-light fa-cart-plus" id="cart"></i></a>
                </div>
            </div>
        </section>

        <section id="banner">
            <h4>Unlock the Door to Exclusive Savings with Organic'D</h4>
            <h2>the <span>golden</span> secret to ageless beauty.</h2>
            <div class="leaves"><a class="a" href="#">Discover Deals</a></div>   
        </section>

        <section id="product2" class="section-p1">
            <h2>Seasonique Products Section</h2>
            <p>Embrace the rhythm of the seasons with Organic'D's Seasonique line.</p>
            <div class="pro-con">
                <!--PRODUCT1--> 
                <div class="pro">
                    <img src="img/products/f1.jpeg" alt="">
                    <div class="des">
                        <span>ARGAN</span>
                        <h5>ARGAN OIL</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>15$</h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-light fa-cart-plus" id="cart"></i></a>
                </div>

                <!--PRODUCT2--> 
                <div class="pro">
                    <img src="img/products/f2.jpeg" alt="">
                    <div class="des">
                        <span>ARGAN</span>
                        <h5>ARGAN OIL</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>15$</h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-light fa-cart-plus" id="cart"></i></a>
                </div>

                <!--PRODUCT3--> 
                <div class="pro">
                    <img src="img/products/f3.jpeg" alt="">
                    <div class="des">
                        <span>ARGAN</span>
                        <h5>ARGAN OIL</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>15$</h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-light fa-cart-plus" id="cart"></i></a>
                </div>

                <!--PRODUCT4--> 
                <div class="pro">
                    <img src="img/products/f4.jpeg" alt="">
                    <div class="des">
                        <span>ARGAN</span>
                        <h5>ARGAN OIL</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>15$</h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-light fa-cart-plus" id="cart"></i></a>
                </div>

                <!--PRODUCT5--> 
                <div class="pro">
                    <img src="img/products/f5.jpeg" alt="">
                    <div class="des">
                        <span>ARGAN</span>
                        <h5>ARGAN OIL</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>15$</h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-light fa-cart-plus" id="cart"></i></a>
                </div>

                <!--PRODUCT6--> 
                <div class="pro">
                    <img src="img/products/f5.jpeg" alt="">
                    <div class="des">
                        <span>ARGAN</span>
                        <h5>ARGAN OIL</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>15$</h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-light fa-cart-plus" id="cart"></i></a>
                </div>

                <!--PRODUCT7--> 
                <div class="pro">
                    <img src="img/products/f5.jpeg" alt="">
                    <div class="des">
                        <span>ARGAN</span>
                        <h5>ARGAN OIL</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>15$</h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-light fa-cart-plus" id="cart"></i></a>
                </div>

                <!--PRODUCT8--> 
                <div class="pro">
                    <img src="img/products/f5.jpeg" alt="">
                    <div class="des">
                        <span>ARGAN</span>
                        <h5>ARGAN OIL</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>15$</h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-light fa-cart-plus" id="cart"></i></a>
                </div>
            </div>
        </section>

        <section id="sm-banner" class="section-p1">
            <div class="banner-box">
                <h4>Start Saving Today</h4>
                <h2>Buy 3 get 1 <span>FREE</span> </h2>
                <p>Nature's gift, Argan oil,<br> nourishing body and soul.</p>
                <div class="leaves"><a class="a-sm" href="#">Learn</a></div>   
            </div>
            <div class="banner-box banner-box2">
                <h4>Oil for hair & skin <br>& massage</h4>
                <h2>all-in-one</h2> 
                <p>Discover Organic'D's versatile.</p>
                <div class="leaves"><a class="a-sm" href="#">Seasons</a></div>   
            </div>
        </section>

        <section id="banner3" class="">
            <div class="banner-box">
                <h2>Seasonique Products</h2>
                <h3>Summer collection <br>-50% OFF</h3>
                <p style="color:beige" ><a href="#"></a>Click to learn more</a></p>

            </div>
            <div class="banner-box banner-box3">
                <h2><strong>Hair Products</strong></h2>
                <h3>Summer collection <br>-50% OFF</h3>
            </div>
            <div class="banner-box banner-box4">
                <h2>Skin care Products</h2>
                <h3>Summer collection <br> -50% OFF</h3>
            </div>
            
            <div>

            </div>
        </section>



        <?php include './html/footer.php' ?>

        <script src="./js/nav.js"></script>
    </body>
</html>
