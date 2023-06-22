
<?php
require_once './php/pdo.php';
$categories = $pdo->query("SELECT * FROM category")->fetchAll(PDO::FETCH_OBJ);

$id=$_GET['id'];

$sqlState = $pdo->prepare("SELECT * FROM products WHERE category_id=?");
$sqlState->execute([$id]);

$products=$sqlState->fetchAll(PDO::FETCH_OBJ);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" type="text/css" />        
        <link rel="stylesheet" href="./css/style.css" />
        <link href="https://fonts.googleapis.com/css?family=Archivo+Black&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="./css/style.css" />
        <title>category / <?php echo $category['category']; ?></title>
    </head>
    <body>
    <?php include './html/header.php' ?>

    <section id="prodetails" class="section-p1">
        <div class="single-pro-image">
            <img src="img/products/f1.jpeg" width="100%" id="MainImg" alt="">
        </div>
    </section>
    



    <?php include './html/footer.php' ?>

    <script src="./js/nav.js"></script>
    </body>
</html>
