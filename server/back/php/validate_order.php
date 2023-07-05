<?php
include_once '../php/pdo.php';
var_dump($_GET);
$id = $_GET['id'];
$state = $_GET['state'];

$sqlState = $pdo->prepare('UPDATE cmd SET validation=? WHERE id = ?');

$sqlState -> execute([$state, $id]);

header('location: ../cmd_line.php?id='.$id);