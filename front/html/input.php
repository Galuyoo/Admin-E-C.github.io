<div>
<?php
    $user_id = $_SESSION['user']['id'];
    $qty = $_SESSION['cart'][$user_id][$idProduct] ?? 0;
  ?>
    <form method="post" class="counter d-flex" action="./php/Add_cart.php">
        <div class="counter d-flex">
            <button  onclick="return false;" class="btn btn-primary mx-1 counter-take">-</button>
            <input type="hidden" name="id" value="<?= $idProduct ?>" >
            <input  class="form-control" type="number" value="<?= $qty ?>" name="qty" id="qty" max="99">
            <button onclick="return false;" class="btn btn-primary mx-1 counter-add">+</button>
        </div>
        <button  type="submit" value="cart" name="cart" id="cart_icon" class="cart-button">
            <a>  <i class="fa-solid fa-light fa-cart-plus" id="cart"></i></a>
        </button>
    </form>
</div>  


<style>
  .cart-button {
    background: none;
    border: none;
    padding: 0;
    cursor: pointer;
  }
</style>






