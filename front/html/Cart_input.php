<div class="d-flex justify-content-center align-items-center">
  <?php
  $user_id = $_SESSION['user']['id'];
  $qty = $_SESSION['cart'][$user_id][$idProduct] ?? 0;
  $btn = $qty == 0 ? 'Add to cart' : 'Modify';
  ?>
  <form method="post" class="counter d-flex flex-column align-items-center" action="./php/Add_cart.php">
    <div class="counter d-flex">
      <input type="hidden" name="id" value="<?= $idProduct ?>">
      <div class="input-group">
        <input class="form-control text-center" type="number" value="<?= $qty ?>" name="qty" id="qty" max="99">
        <input class="btn btn-success btn-sm" type="submit" name="add" value="<?= $btn ?>">
      </div>
    </div>
  </form>
</div>
