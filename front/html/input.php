<div>
    <form method="post" class="counter d-flex" action="./php/Add_cart.php">
        <div class="counter d-flex">
            <input type="hidden" name="id" value="<?= $idProduct ?>" >
            <button  onclick="return false;" class="btn btn-primary mx-1 counter-take">-</button>
            <input  class="form-control" type="number" value="1" name="qty" id="qty" max="99">
            <button onclick="return false;" class="btn btn-primary mx-1 counter-add">+</button>
        </div>
        <button  type="submit" value="add" name="add" id="cartButton" class="cart-button">
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