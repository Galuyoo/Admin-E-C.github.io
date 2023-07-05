<!DOCTYPE html>
<html lang="en">
<?php
$cmd_id = $_GET['id'];
require_once './php/pdo.php';
$sqlState = $pdo->prepare('SELECT cmd.*,user.name as "name" FROM cmd INNER JOIN user ON cmd.user_id = user.id 
                                             WHERE cmd.id=?
                                             ORDER BY id DESC');
$sqlState->execute([$cmd_id]);
$Order = $sqlState->fetch(PDO::FETCH_OBJ );
?>
<head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />        <link rel="stylesheet" href="./css/style.css" />
        <title>Oder number <?= $Order->id ?></title>
</head>
<body>

<?php 
require_once './php/pdo.php';

include './html/header.php';

?>
<div class="container">
        <h2>Order details</h2>
        <a class="btn btn-primary btn-sm" href="cmd.php">List of orders</a>
    <table class="table table-striped table-hover">
        <thead>  
            <tr>
                <th>#id</th>
                <th>client</th>
                <th>total</th>
                <th>Time</th>
                <th>Validation</th>
            </tr>
        </thead>
        <tbody class="align-middle">
            
            <?php
                $sqlStatecmd_line = $pdo->prepare('SELECT cmd_line.*,products.name,products.img from cmd_line
                                                    INNER JOIN products ON cmd_line.product_id = products.id
                                                    WHERE cmd_id = ?
                                                    ');
                
                $sqlStatecmd_line -> execute([$cmd_id]);
                $cmd_line = $sqlStatecmd_line->fetchAll(PDO::FETCH_OBJ);
            ?>
            <tr>
                <td><?php echo $Order->id ?></td>
                <td><?php echo $Order->name ?></td>
                <td>$<?php echo $Order->total ?></td>
                <td><?php echo $Order->real_time ?></td>
                <td><?php $validation =$Order->validation;
                          if($validation==0){ ?>
                            <a class="btn btn-success btn-sm" href="php/validate_order.php?id=<?= $Order->id ?>&state=1">Validate order</a>
                        <?php  }else{ ?>
                            <a class="btn btn-danger btn-sm" href="php/validate_order.php?id=<?= $Order->id ?>&state=0">Cancel order</a>                        
                        <?php } ?></td>
            </tr>
        </tbody>
    </table>
    <h3>Products in the Order:</h3>

    <table class="table table-striped table-hover">
        <thead>  
            <tr>
                <th>#id</th>
                <th>product name</th>
                <th>price</th>
                <th>quantity</th>
                <th>total</th>
            </tr>
        </thead>
        <tbody class="align-middle">
            <?php foreach($cmd_line as $cmd): ?>
                <tr>
                <td><?php echo $cmd->id ?></td>
                <td><?php echo $cmd->name ?></td>
                <td>$<?php echo $cmd->price ?></td>
                <td>x<?php echo $cmd->qty ?></td>
                <td>$<?php echo $cmd->total ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
    <?php include './html/footer.php' ?>

    </body>
</html>