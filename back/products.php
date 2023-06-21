<!DOCTYPE html>
<html lang="en">
<?php include './html/head.php' ?>

<body>
<?php include './html/header.php';?>
<div class="container">
        <h2>Liste des catégories</h2>
        <a href="add_product.php" class="btn btn-primary">Add products</a>
    <table class="table table-striped table-hover">
        <thead>  
            <tr>
                <th>#id</th>
                <th>Product_name</th>
                <th>Price</th>
                <th>Discount</th>
                <th>final price</th>
                <th>Category used</th>
                <th>Creaction date</th>
                <th>Modify & Delete</th>
            </tr>
        </thead>
    <?php
        require_once './php/pdo.php';
        $categories = $pdo->query("SELECT products.*,category.category as 'category_cat' FROM products INNER JOIN category ON products.category_id = category.id")->fetchAll(PDO::FETCH_ASSOC);
        foreach ($categories as $products){
            $price=$products['price'];
            $discount=$products['discount'];

            $pprice = $price -(($price*$discount)/100);
            ?>
            <tr>
                <td><?= $products['id'] ?></td>
                <td><?= $products['name'] ?></td>
                <td><?= $price ?> MAD</td>
                <td><?= $discount ?> %</td>
                <td><?= $pprice ?> MAD</td>
                <td><?= $products['category_cat'] ?></td>
                <td><?= $products['real_time'] ?></td>
                <td>
                    <a href="./admin/modify_product.php?id=<?php echo $products['id'] ?>" class="btn btn-primary">Modify</a>
                    <a href="./admin/delete_product.php?id=<?php echo $products['id'] ?>" onclick="return confirm('Do you really want to delete ur data? <?php echo $products['name'] ?>');" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>


<?php include './html/footer.php' ?>
</body>
</html>