<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Modify product page</title>
    <link rel="stylesheet" href="./css/style.css" />

</head>
<body>

<?php 
require_once '../php/pdo.php';

include './html/header.php';

?>

<div class="container py-2">
    <h4>modify Products</h4>
        <?php 
            $sqlState = $pdo->prepare('SELECT * FROM products WHERE id=?');
            $id=$_GET['id'];
            $sqlState->execute([$id]);

            $product = $sqlState->fetch(PDO::FETCH_OBJ);;

            if(isset($_POST['Modify'])){
                $name = $_POST['name'];
                $price = $_POST['price'];
                $discount = $_POST['discount'];
                $category = $_POST['category'];

                
                if(!empty($name) && !empty($price) && !empty($category)){  // And here
                
                    // If no records are found, proceed with insertion
                    $sqlState = $pdo->prepare('UPDATE products SET name=?,
                                                                    price=?,
                                                                    discount=?,
                                                                    category_id=?
                                                                WHERE id=?');
                    $updated = $sqlState->execute([$name,$price,$discount,$category,$id]);  // And here
                    var_dump($sqlState->errorInfo());
                    if($updated){
                        header('location: ../Products.php');
                    }else{
                        ?>
                        <div class="alert alert-danger" role="alert">
                            Database error (40023).
                        </div>
                        <?php
                    }
                }else{
                    ?>
                    <div class="alert alert-danger" role="alert">
                        Category and description are required
                    </div>
                    <?php
                }
            }

        ?>
    <form method="post">
        <input hidden class="form-control" type="text" name="id" value="<?= $id ?>">

        <label class="form-label">name</label>
        <input type="text" class="form-control" name="name" value="<?= $product->name ?>" >

        
        <label class="form-label">price</label>
        <input type="number" class="form-control" name="price" step="0.01" min="0" value="<?= $product->price ?>">


        <label class="form-label">discount</label>
        <input type="number" class="form-control" value="0" name="discount" min="0" max="90" value="<?= $product->discount ?>">
        <?php 
        $categories = $pdo->query('SELECT * FROM category ORDER BY id DESC')->fetchAll(PDO::FETCH_ASSOC);
        ?>
    <label for="">category</label>
    <select name="category" class="form-control my2">
            <option value="" >Click here to chose a category</option>
            <?php
                foreach ($categories as $category){
                    if($product->category_id == $category['id']){
                        echo "<option selected value='".$category['id']."'>".$category['category']."</option>";

                    }else{
                        echo "<option value='".$category['id']."'>".$category['category']."</option>";

                    }
                }
            ?>
        </select>

        <input type="submit" value="modify product" class="btn btn-primary my-2" name="Modify">

    </form>
</div>

    <?php include './html/footer.php' ?>

    </body>
</html>