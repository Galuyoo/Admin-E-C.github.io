<?php 
require_once '../php/pdo.php';

$id= $_GET['id'];

$sqlState = $pdo->prepare('DELETE FROM products WHERE id=?');

$Delete=$sqlState->execute([$id]);
header('location: ../Products.php');

?>