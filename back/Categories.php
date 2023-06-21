<!DOCTYPE html>
<html lang="en">
<?php include './html/head.php' ?>

<body>
<?php include './html/header.php';?>
<div class="container">
        <h2>List of Categories</h2>
        <a href="add_category.php" class="btn btn-primary">Add category</a>
    <table class="table table-striped table-hover">
        <thead>  
            <tr>
                <th>#id</th>
                <th>Category_name</th>
                <th>Description</th>
                <th>img</th>
                <th>Creation_date</th>
                <th>Modify & Delete</th>
            </tr>
        </thead>
        <tbody class="align-middle">

    <?php
        require_once './php/pdo.php';
        $categories = $pdo->query('SELECT * FROM category ORDER BY id DESC')->fetchAll(PDO::FETCH_ASSOC);
        foreach ($categories as $category){
        
            ?>
            <tr>
                <td><?php echo $category['id'] ?></td>
                <td><?php echo $category['category'] ?></td>
                <td><?php echo $category['description'] ?></td>
                <td><?php echo'<i class="';echo $category['img'];echo'"></i>'; ?></td>
                <td><?php echo $category['real_time'] ?></td>
                <td>
                    <a href="./admin/modify_category.php?id=<?php echo $category['id']; ?>" class="btn btn-primary">Modify</a>
                    <a href="./admin/delete_category.php?id=<?php echo $category['id'];?>" onclick="return confirm('Do you really want to delete ur category? <?php echo $category['category'] ?>');" class="btn btn-danger">Delete</a>
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