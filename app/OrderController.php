<?php 
include 'config.php';
include_once 'Validator.php';


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
        $filteredOrders = [];
        $orders = OrderController::getOrders();
        foreach($orders as $order){
            if($order->client_id == $client_id){        
                array_push($filteredOrders, $order);
            }
        }
        return $filteredOrders;


    }
}