<!DOCTYPE html>
<html lang="en">
<?php include './html/head.php' ?>

    <body>

<?php include './html/header.php' ?>
<div class="container py-2">
    <h4>Add category</h4>
    <?php
    if(isset($_POST['add'])){
        $category = $_POST['category'];
        $description = $_POST['description'];  // Here
        $img = $_POST['img'];

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
                $sqlState = $pdo->prepare('INSERT INTO category(category,description,img) VALUES(?,?,?)');
                $sqlState->execute([$category,$description,$img]);  // And here
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

        <label class="form-label">icon (from fontawesome)</label>
        <input type="text" class="form-control" name="img">

        <input type="submit" value="Add category" class="btn btn-primary my-2" name="add">
    </form>
</div>

    <?php include './html/footer.php' ?>

    </body>
</html>