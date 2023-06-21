<!DOCTYPE html>
<html lang="en">
<?php include './html/head.php' ?>

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
        $img = $_POST['img'];
        if(!empty($category) && !empty($description)){  // And here
        
            // If no records are found, proceed with insertion
            $sqlState = $pdo->prepare('UPDATE category SET category=?,
                                                            description=?,
                                                            img=?
                                                        WHERE id=?');
            $sqlState->execute([$category,$description,$img,$id]);  // And here
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

        <label class="form-label">img</label>
        <input type="text" class="form-control" name="img" value="<?php echo $categories['img'];?>">

        <input type="submit" value="Modify category" class="btn btn-primary my-2" name="Modify">
    </form>
</div>

    <?php include './html/footer.php' ?>

    </body>
</html>