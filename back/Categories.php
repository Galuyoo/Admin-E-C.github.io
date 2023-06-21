<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script
    src="https://kit.fontawesome.com/64d58efce2.js"
    crossorigin="anonymous"
    ></script>

    <link rel="stylesheet" href="./css/style.css" />
    <title>Categories</title>
</head>
<body>
<?php include './html/header.php';?>
<div class="container">
        <h2>Liste des catégories</h2>
        <a href="add_category.php" class="btn btn-primary">Add category</a>
    <table class="table table-striped table-hover">
        <thead>  
            <tr>
                <th>#id</th>
                <th>Category_name</th>
                <th>Description</th>
                <th>rating</th>
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
                <td><?php echo $category['rating'] ?></td>
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