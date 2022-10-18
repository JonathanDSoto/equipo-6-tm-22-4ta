<?php 
include 'config.php';
include_once 'Validator.php';
/* 

if (isset($_POST['action'])) {

    if (isset($_POST['global_token']) && 
       $_POST['global_token'] == $_SESSION['global_token']){
            switch ($_POST['action']) { */
class OrderController{
    public static function getOrders(){
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer '.$_SESSION['token']
    ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $response = json_decode($response);
    return $response->data;
    }


    public static function getOrdersWhereProduct($product_id){
        $filteredOrders = [];
        $orders = OrderController::getOrders();
        foreach($orders as $order){
            foreach($order->presentations as $presentation){
                if($presentation->product_id == $product_id){
                    array_push($filteredOrders, $order);
/*                     print_r(
                        json_encode(

                            $order
                        )
                    ) ; */
                }
                // echo '<br>';
            }
        }
        return $filteredOrders;
    }
}