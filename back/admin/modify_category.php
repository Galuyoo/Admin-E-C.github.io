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
        <title>Modify category Page</title>
    </head>
    <body>

<?php include './html/header.php' ?>
<div class="container py-2">
    <h4>Modify category</h4>
    <?php
    require_once '../php/pdo.php';
    $sqlState = $pdo->prepare('SELECT * FROM category WHERE id=?');
    $id=$_GET['id'];
    $sqlState->execute([$id]);

    $categories = $sqlState->fetch();

    if(isset($_POST['Modify'])){
        $category = $_POST['category'];
        $description = $_POST['description'];  // Here

        if(!empty($category) && !empty($description)){  // And here
        
            // If no records are found, proceed with insertion
            $sqlState = $pdo->prepare('UPDATE category SET category=?,
                                                            description=?
                                                        WHERE id=?');
            $sqlState->execute([$category,$description,$id]);  // And here
            header('location: ../Categories.php');
            
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
        <input readonly type="hidden" class="form-control" name="id" value="<?php echo $categories['id'];?>">

        <label class="form-label">category</label>
        <input type="text" class="form-control" name="category" value="<?php echo $categories['category'];?>">

        <label class="form-label">description</label>
        <textarea class="form-control" name="description"><?php echo $categories['description'];?></textarea>

        <input type="submit" value="Modify category" class="btn btn-primary my-2" name="Modify">
    </form>
</div>

    <?php include './html/footer.php' ?>

    </body>
</html>