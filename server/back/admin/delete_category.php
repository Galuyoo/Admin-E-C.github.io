<?php 
require_once '../php/pdo.php';

$id= $_GET['id'];

$sqlState = $pdo->prepare('DELETE FROM category WHERE id=?');

$Delete=$sqlState->execute([$id]);
header('location: ../Categories.php');



?>