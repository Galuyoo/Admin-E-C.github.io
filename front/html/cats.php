<section id="dpd">
    <div class="dropdown">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Categories
        </a>
    
        <ul class="dropdown-menu">
            <?php


            if(empty($categories)){
                echo"<h4> There are no categories for the moment!!</h4>";
            }else{

                foreach($categories as $category){
                    ?>
                    <li><a class="dropdown-item" href="category.php?id=<?= $category->id ?>"><?php echo'<i class="';echo $category->img;echo'"></i>'; ?><?= $category->category ?></a></li>
                    <li><hr class="dropdown-divider"></li>
                    <?php
                }
            }

            ?>

        </ul>
    </div>
</section>