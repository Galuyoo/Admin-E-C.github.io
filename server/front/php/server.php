<?php
require './conn.php';
require './../../vendor/autoload.php';
header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Debug: Display the contents of $_POST
    var_dump($_POST);

    $itemList = json_decode(file_get_contents('php://input'));
    $total = 0;
    foreach($itemList as $item){
        $id = $mysqli->real_escape_string($item->id);
        $quantity = $mysqli->real_escape_string($item->quantity);

        $result = $mysqli->query('SELECT PRICE FROM products WHERE id='. $id .';');
        if($result->num_rows){
            $row = $result->FETCH_ASSOC();
            $total += $row['price'] * intval($quantity); 
        }else {echo json_encode(['status' => 'no such product found']); exit();}
    }
        $stripe = new \Stripe\StripeClient('sk_test_51NPCmAHIAJzbbsiYgVXxKA79wlEDg55kEPq0RRV7quOa9ydDsIWvyb75VIldXoIL7NxGamht0mFrvebKdSvfd2sk0093b2pCSG');
        $session = $stripe->checkout->sessions->create([
            'success_url'=> 'http://localhost:3000/Users/Lenovo/OneDrive/Documents/GitHub/Admin-E-C.github.io/server/front/success.html',
            'cancel_url' => 'http://localhost:3000/Users/Lenovo/OneDrive/Documents/GitHub/Admin-E-C.github.io/server/front/cancel.html',
            'payment_method_types' => ['card'],
            'mode' => 'payment',
            'line_items'=>[
                [
                    'quantity' => 1,
                    'price_data'=>[
                        'currency' => 'gbp',
                        'unit_amount' => $total,
                        'product_data' =>[
                            'name' => 'Organicd',
                            'description'=> 'Organicd OrganicdOrganicd .'
                        ]
                    ]
                ]
            ]
        ]);
    
    
        echo json_encode(['id'=>$session->id]);    
}


?>