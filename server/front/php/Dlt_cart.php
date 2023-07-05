<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location: ../index.php');
}

if (isset($_POST['id'])) {
    // POST method
    $id = $_POST['id'];
} elseif (isset($_GET['id'])) {
    // GET method
    $id = $_GET['id'];
}

$user_id = $_SESSION['user']['id'];

unset($_SESSION['cart'][$user_id][$id]);

header("location:" . $_SERVER['HTTP_REFERER']);
exit();
?>
