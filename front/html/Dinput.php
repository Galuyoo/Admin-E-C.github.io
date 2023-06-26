<div>
  <?php
    $user_id = $_SESSION['user']['id'];
    $qty = $_SESSION['cart'][$user_id][$idProduct] ?? 0;
    $btn = $qty == 0 ? 'Add to cart' : 'Modify';
  ?>
    <form method="post" class="counter d-flex" action="./php/Add_cart.php">
        <div class="counter d-flex">
            <button  onclick="return false;" class="btn btn-primary mx-1 counter-take">-</button>
            <input type="hidden" name="id" value="<?= $idProduct ?>" >
            <input  class="form-control" type="number" value="<?= $qty ?>" name="qty" id="qty" max="99">
            <button onclick="return false;" class="btn btn-primary mx-1 counter-add">+</button>
        </div>
       <input class="btn btn-success btn-sm" type="submit"  type="submit" name="add" value="<?= $btn?>">   
    </form>
</div> 