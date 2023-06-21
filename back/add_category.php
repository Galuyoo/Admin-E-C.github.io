<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <script
        src="https://kit.fontawesome.com/64d58efce2.js"
        crossorigin="anonymous"
        ></script>

        <link rel="stylesheet" href="./css/style.css" />
        <title>Adding cat Page</title>
    </head>
    <body>

<?php include './html/header.php' ?>
<div class="container py-2">
    <h4>Add category</h4>
    <?php
    if(isset($_POST['add'])){
        $category = $_POST['category'];
        $description = $_POST['description'];  // Here
        $rating = $_POST['rating'];

        if(!empty($category) && !empty($description)){  // And here
            require_once './php/pdo.php';
            // First check if category already exists
            $checkQuery = $pdo->prepare('SELECT * FROM category WHERE category = ?');
            $checkQuery->execute([$category]);
            $result = $checkQuery->fetch();

            if($result){
                // If a record is found, display an error message
                ?>
                <div class="alert alert-danger" role="alert">
                    The category already exists!
                </div>
                <?php
            } else {
                // If no records are found, proceed with insertion
                $sqlState = $pdo->prepare('INSERT INTO category(category,description,rating) VALUES(?,?,?)');
                $sqlState->execute([$category,$description,$rating]);  // And here
                header('location: ./Categories.php');
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
        <label class="form-label">category</label>
        <input type="text" class="form-control" name="category">

        <label class="form-label">description</label>
        <textarea class="form-control" name="description"></textarea>

        <label class="form-label">rating</label>
        <input type="text" class="form-control" name="rating">

        <input type="submit" value="Add category" class="btn btn-primary my-2" name="add">
    </form>
</div>

    <?php include './html/footer.php' ?>

    </body>
</html>