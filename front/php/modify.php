<?php
session_start();
if(!isset($_SESSION['user'])){
    header('location: ../index.php');
}


$id = $_POST['id'];
$qty = $_POST['qty'];
$user_id= $_SESSION['user']['id'];

if(!isset($_SESSION['cart'][$user_id])) {
    $_SESSION['cart'][$user_id] = [];
}
if($qty == 0){
    unset($_SESSION['cart'][$user_id][$id]);
}else{
    $_SESSION['cart'][$user_id][$id] = $qty;
}


header("location: ../Cart.php?id=$id");

?>