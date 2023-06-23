<?php

session_start();

var_dump($_POST);

$id = $_POST['id'];
$qty = $_POST['qty'];

if(!empty($qty) && !empty($id)){
    var_dump($_SESSION['user']);

}else{
    header("location: ../details.php?id=$id");
}

?>