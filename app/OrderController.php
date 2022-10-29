<?php 
include 'config.php';
include_once 'Validator.php';
/*                  ['id' => 61, 'quantity' => 1],
                        ['id' => 62, 'quantity' => 1]
                    ];  */
/*  $pres = [
    ['id' => 61, 'quantity' => 1],
    ['id' => 62, 'quantity' => 1]
];  */
/* $presArraay = [];
foreach($pres as $key=> $value){
    $presArraay["presentations[$key][id]"] = $value['id'];
    $presArraay["presentations[$key][quantity]"]  = $value['quantity'];
} */

//   print_r(OrderController::create('112','122', '1', '2', '1', '1', '1', '1', $pres));
// print_r(OrderController::getDetails('264'));
// print_r($presArraay);
if (isset($_POST['action'])) {

    if (isset($_POST['global_token']) && 
       $_POST['global_token'] == $_SESSION['global_token']){
            switch ($_POST['action']) { 
                case 'betweenDates':{
                    var_dump($_POST);
                    // $_POST['to'] == '' ?  Date('Y-m-d') : null;
                    $validDates = Validator::date_yyy_mm_dd($_POST['from']) && Validator::date_yyy_mm_dd($_POST['to']);
                    if($validDates){
                        $_SESSION['_MESSAGE'] = OrderController::getBetweenDates($_POST['from'], $_POST['to']);
                    }else{
                        $_SESSION['_MESSAGE'] = 'Intenta con otras fechas';
                    }
                 header('Location: '.$_SERVER['HTTP_REFERER']);  
                    break;
                }

                case 'create':{
                    
                    /* 
                    public static function create($folio, $total, $is_paid, $client_id, $address_id, $order_status_id, 
                    $payment_type_id, $coupon_id, $presentations){ */
                    $folio = strip_tags(trim($_POST['folio']));
                    $total = strip_tags(trim($_POST['total']));
                    $is_paid = strip_tags(trim($_POST['is_paid']));
                    $client_id = strip_tags(trim($_POST['client_id']));
                    $address_id = strip_tags(trim($_POST['address_id']));
                    $order_status_id = strip_tags(trim($_POST['order_status_id']));
                    $payment_type_id = strip_tags(trim($_POST['payment_type_id']));
                    $coupon_id = strip_tags(trim($_POST['coupon_id']));
                    $presentations = $_POST['presentations'];
                    
                    $validationResult = Validator::createOrder($folio, $total, $is_paid, $client_id, $address_id, $order_status_id, $payment_type_id, $coupon_id);
/*                     $presentations = [
                        ['id' => 61, 'quantity' => 1],
                        ['id' => 62, 'quantity' => 1]
                    ]; */
                    $validOrderStatusId = ($order_status_id > 0 && $order_status_id < 7);
                    $validPresentations = Validator::kwd_integer_array($presentations);
                    if($validPresentations['status'] == '1' && $validOrderStatusId && $validationResult['status']== '1'){
                            $_SESSION['_MESSAGE'] = OrderController::create($folio, $total, $is_paid, $client_id, $address_id, $order_status_id, $payment_type_id, $coupon_id, $presentations);
                    }else{
                        $_SESSION['_MESSAGE'] = $validationResult['data'];
                    }


                    header('Location: '.$_SERVER['HTTP_REFERER']);  
                    break;
                }

                case 'update':{

                    $order_id = $_POST['order_id'];
                    $order_status_id = $_POST['order_status_id'];

                    if($order_status_id>0 && $order_status_id<7){ // el estado de la orden solo puede tener valores en este rango
                        $_SESSION['_MESSAGE'] = OrderController::update($order_id, $order_status_id);
                    }
                    header('Location: '.$_SERVER['HTTP_REFERER']);  
                    break;
                }

                case 'delete':{
                    $order_id = $_POST['order_id'];
                    $validId = Validator::integer($order_id);
                    if($validId){
                        $_SESSION['_MESSAGE'] = OrderController::delete($order_id);
                    }else{
                        $_SESSION['_MESSAGE'] = 'Hay algo mal con ese ID';
                    }
                }
            }
        }
}


/* <form action="app/OrderController.php" method="POST"> // CODIGO DE PRUEBA PARA OBTENER ENTRE FECHAS
    <input type="date" name="from">
    <input type="date" name="to">
    <input type="hidden" name="global_token" value="<?= $_SESSION['global_token']?>">   
    <input type="text" name="action" value="betweenDates" id="">
    <input type="submit" name="" id="">
</form>
 */

class OrderController{

    public static function getBetweenDates($from, $to){
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders/'.$from.'/'.$to,
    // CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders/2022-10-04/2022-10-25',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        // 'Authorization: Bearer 3|JSvLL27EhMfH70onI5sSZP6ROwcdSsHQU8cm7k9X'
        'Authorization: Bearer '.$_SESSION['token']
    ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $response = json_decode($response);
    return $response;

    }


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

/*   print_r(OrderController::getOrdersWhereClient(10)); */
    public static function getOrdersWhereClient($client_id){
        $filteredOrders = [
            'orders' => [],
            'compras_transferencia' => ['num' => 0, 'total' => 0],// cantidad de compras segun el tipo de pago y suma del total de estas 
            'compras_tarjeta' => ['num' => 0, 'total' => 0],
            'compras_efectivo' => ['num' => 0, 'total' => 0],
            'cupones_usados' => ['num' => 0, 'total_descontado' => 0], // cantidad de cupones usados y suma del total descontado
            'total_gastado' => ['num' => 0, 'total_descontado' => 0] //
       ];
        $orders = OrderController::getOrders();
        foreach($orders as $order){
            if($order->client_id == $client_id){        
                array_push($filteredOrders['orders'], $order);
                if($order->payment_type_id == '3'){
                    // echo $order->payment_type->name;
                    $filteredOrders['compras_transferencia']['num']++;
                    $filteredOrders['compras_transferencia']['total']+=$order->total;
                }else if($order->payment_type_id == '2'){
                    $filteredOrders['compras_tarjeta']['num']++;
                    $filteredOrders['compras_tarjeta']['total']+=$order->total;
                }
                else if($order->payment_type_id == '1'){
                    $filteredOrders['compras_efectivo']['num']++;
                    $filteredOrders['compras_efectivo']['total']+=$order->total;
                }


                if(isset($order->coupon)){
                    $filteredOrders['cupones_usados']['num']++;
                    if($order->coupon->amount_discount>0){
                        $filteredOrders['cupones_usados']['total_descontado']+= $order->coupon->amount_discount;
                        echo $order->coupon->amount_discount.'<br>';
                    }else if($order->coupon->percentage_discount>0){
                        // print_r(json_encode( $order));
                        $descuento = $order->total * ($order->coupon->percentage_discount / 100);
                        $filteredOrders['cupones_usados']['total_descontado']+= $descuento;
                        // echo $descuento.   '   '. $order->total;
                    }
                }
                    //  print_r(json_encode($order->coupon));}
                
            }
        }
        // id 1 = efectivo 
        // id 2 = tarjeta
        // id 3 = transferencia


        /*  "payment_type": {
      "id": 2,
      "name": "Tarjeta"
    } */

        return json_encode($filteredOrders);
    }

    public static function create($folio, $total, $is_paid, $client_id, $address_id, $order_status_id, 
    $payment_type_id, $coupon_id, $presentations){
        

        $presArraay = [];
        foreach($presentations as $key=> $value){
            $presArraay["presentations[$key][id]"] = $value['id'];
            $presArraay["presentations[$key][quantity]"]  = $value['quantity'];
        }
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('folio' => $folio,
        'total' => $total,
        'is_paid' => $is_paid,
        'client_id' => $client_id,
        'address_id' => $address_id,
        'order_status_id' => $order_status_id,
        'payment_type_id' => $payment_type_id,
        'coupon_id' => $coupon_id,
/*         'presentations[0][id]' => $presentations[0]['id'],
        'presentations[0][quantity]' => $presentations[0]['quantity'], 
        'presentations[1][id]' => $presentations[1]['id'],
        'presentations[1][quantity]' => $presentations[1]['quantity'] */) + $presArraay,
       
       
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$_SESSION['token']
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
 
 //       echo $response;
        $response = json_encode($response);
        return $response;
    }


    public static function getDetails($order_id){
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders/details/'.$order_id,
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
    return $response;


    }


    public static function update($order_id, $order_status_id){
                
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS => 'id='.$order_id.'&order_status_id='.$order_status_id.'',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$_SESSION['token']
        ),
        ));


        $response = curl_exec($curl);

        curl_close($curl);
        return  $response;

    }

    public static function delete($order_id){
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders/'.$order_id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'DELETE',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$_SESSION['token']
        ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;

    }
}