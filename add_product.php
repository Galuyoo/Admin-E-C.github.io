<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Add product page</title>
    <link rel="stylesheet" href="./css/style.css" />

</head>
<body>

<?php 
require_once './php/pdo.php';

include './html/header.php';

$categories = $pdo->query('SELECT * FROM category')->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="container py-2">
    <h4>Add Product</h4>
        <?php 
            if(isset($_POST['add'])){
                $name = $_POST['name'];
                $price = $_POST['price'];
                $discount = $_POST['discount'];
                $category = $_POST['category'];
                $date = date('Y-m-d H:i:s');

            }



            if (!empty($name) && !empty($price) && !empty($category)) {
                try {
                    $sqlState = $pdo->prepare('INSERT INTO products  VALUES (null, ?,?,?,?,?)');
                    $inserted = $sqlState->execute([$name, $price, $discount, $category, $date]);
                    header('location: ./Products.php');

                }
                catch (PDOException $e) {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        Database error (40023).
                    </div>
                    <?php
                }
                
            
            ?>


            <?php
            } else {
            ?>
                <div class="alert alert-danger" role="alert">
                    Category, price and name are required !!
                </div>
        <?php
            }

        ?>
    <form method="post">
        <label for="">category</label>
        <select name="category" class="form-control my2">
            <option value="" >Click here to chose a category</option>
            <?php
                foreach ($categories as $category){
                    echo "<option value='".$category['id']."'>".$category['category']."</option>";
                }
            ?>
        </select>


        <label class="form-label">name</label>
        <input type="text" class="form-control" name="name">

        
        <label class="form-label">price</label>
        <input type="number" class="form-control" name="price" step="0.01" min="0">


        <label class="form-label">discount</label>
        <input type="number" class="form-control" value="0" name="discount" min="0" max="90">


        <input type="submit" value="Add product" class="btn btn-primary my-2" name="add">

    </form>
</div>

    <?php include './html/footer.php' ?>

    </body>
</html>