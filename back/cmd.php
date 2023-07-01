<!DOCTYPE html>
<html lang="en">
<?php include './html/head.php' ?>

<body>

<?php 
require_once './php/pdo.php';

include './html/header.php';

?>

<div class="container">
        <h2>List of Orders</h2>
    <table class="table table-striped table-hover">
        <thead>  
            <tr>
                <th>#id</th>
                <th>client</th>
                <th>total</th>
                <th>Time</th>
                <th>Operation</th>
            </tr>
        </thead>
        <tbody class="align-middle">

    <?php
        require_once './php/pdo.php';
        $order = $pdo->query('SELECT cmd.*,user.name as "name" FROM cmd INNER JOIN user ON cmd.user_id = user.id ORDER BY id DESC')->fetchAll(PDO::FETCH_ASSOC);
        foreach ($order as $cmd){
        
            ?>
            <tr>
                <td><?php echo $cmd['id'] ?></td>
                <td><?php echo $cmd['name'] ?></td>
                <td>$<?php echo $cmd['total'] ?></td>
                <td><?php echo $cmd['real_time'] ?></td>
                <td><a class="btn btn-primary btn-sm" href="cmd_line.php?id=<?php echo $cmd['id'] ;?>">Show details</a></td>
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