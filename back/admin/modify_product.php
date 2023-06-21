<!DOCTYPE html>
<html lang="en">
<?php include './html/head.php' ?>

<body>

<?php 
require_once '../php/pdo.php';

include './html/header.php';

?>

<div class="container py-2">
    <h4>modify Products</h4>
        <?php 
            $sqlState = $pdo->prepare('SELECT * FROM products WHERE id=?');
            $id = $_GET['id'];
            $sqlState->execute([$id]);

            $product = $sqlState->fetch(PDO::FETCH_OBJ);

            if(isset($_POST['Modify'])){
                $name = $_POST['name'];
                $price = $_POST['price'];
                $discount = $_POST['discount'];
                $category = $_POST['category'];
                $description = $_POST['description'];
                $date = date('Y-m-d H:i:s');

                $filename='';
                if(!empty($_FILES['img']['name'])){
                    $img=$_FILES['img']['name'];
                    $filename = uniqid().$img;
                    if(move_uploaded_file($_FILES['img']['tmp_name'], '../upload/product/' . $filename))
                    var_dump($img);
                }
                
                if(!empty($name) && !empty($price) && !empty($category)){  // And here

                    if(!empty($filename)){
                        $query = "UPDATE products SET name=?,
                                                    price=?,
                                                    discount=?,
                                                    category_id=?,
                                                    description=?,
                                                    img=?
                                                WHERE id=?";
                        // If no records are found, proceed with insertion
                        $sqlState = $pdo->prepare($query);
                        $updated = $sqlState->execute([$name,$price,$discount,$category,$description,$filename,$id]);  // And here
                    }else{
                        $query = "UPDATE products SET name=?,
                                                    price=?,
                                                    discount=?,
                                                    category_id=?,
                                                    description=?,
                                                WHERE id=?";
                        // If no records are found, proceed with insertion
                        $sqlState = $pdo->prepare($query);
                        $updated = $sqlState->execute([$name,$price,$discount,$category,$description,$id]);  // And here
                    }

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
    <form method="post" enctype="multipart/form-data">
        <input hidden class="form-control" type="text" name="id" value="<?= $id ?>">

        <label class="form-label">name</label>
        <input type="text" class="form-control" name="name" value="<?= $product->name ?>" >

        
        <label class="form-label">price</label>
        <input type="number" class="form-control" name="price" step="0.01" min="0" value="<?= $product->price ?>">


        <label class="form-label">discount</label>
        <input type="number" class="form-control" value="0" name="discount" min="0" max="90" value="<?= $product->discount ?>">

        <label class="form-label">description</label>
        <textarea class="form-control" name="description"><?= $product->description ?></textarea>

        <label class="form-label">img</label>
        <input type="file" class="form-control" name="img">
        <label class="form-label">The current img-></label>
        <img height="200vh" src="../upload/product/<?= $product->img ?>"><br>

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