<?php 
include 'config.php';
include_once 'Validator.php';

if (isset($_POST['action'])) {

    if (isset($_POST['global_token']) && 
       $_POST['global_token'] == $_SESSION['global_token']){
        
        switch ($_POST['action']) {
           case 'create':
            //eate($name, $code, $percentage_discount, $min_amount_required, $min_product_required, $start_date, $end_date, $max_uses, $count_uses, $valid_only_first_purchase, $status){


                //ic function edit($name, $code, $percentage_discount, $min_amount_required, $min_product_required, $start_date, $end_date, $max_uses, $count_uses, $valid_only_first_purchase, $status, $id){
                $name = strip_tags(trim($_POST['name']));
                $code = strip_tags(trim($_POST['code']));
                $percentage_discount = strip_tags(trim($_POST['percentage_discount']));
                $min_amount_required = strip_tags(trim($_POST['min_amount_required']));
                $min_product_required = strip_tags(trim($_POST['min_product_required']));
                $start_date = strip_tags(trim($_POST['start_date']));
                $end_date = strip_tags(trim($_POST['end_date']));
                $max_uses = strip_tags(trim($_POST['max_uses']));
                $count_uses = strip_tags(trim($_POST['count_uses']));
                $valid_only_first_purchase = strip_tags(trim($_POST['valid_only_first_purchase']));
                $status = strip_tags(trim($_POST['status']));

                $validationResult = Validator::createCoupon($name, $code, $percentage_discount, $min_amount_required, $min_product_required, 
                $start_date, $end_date, $max_uses, $count_uses, $valid_only_first_purchase, $status);

                if($validationResult['status'] == '1'){
                    $_SESSION['_MESSAGE'] = CouponController::create($name, $code, $percentage_discount, $min_amount_required, $min_product_required, $start_date, $end_date, $max_uses, $count_uses, $valid_only_first_purchase, $status);
                }else{
                    $_SESSION['_MESSAGE'] = $validationResult['data'];
                }
                header('Location: '.$_SERVER['HTTP_REFERER']);  


                break;

            case 'edit':
                $name = strip_tags(trim($_POST['name']));
                $code = strip_tags(trim($_POST['code']));
                $percentage_discount = strip_tags(trim($_POST['percentage_discount']));
                $min_amount_required = strip_tags(trim($_POST['min_amount_required']));
                $min_product_required = strip_tags(trim($_POST['min_product_required']));
                $start_date = strip_tags(trim($_POST['start_date']));
                $end_date = strip_tags(trim($_POST['end_date']));
                $max_uses = strip_tags(trim($_POST['max_uses']));
                $count_uses = strip_tags(trim($_POST['count_uses']));
                $valid_only_first_purchase = strip_tags(trim($_POST['valid_only_first_purchase']));
                $status = strip_tags(trim($_POST['status']));
                $id = strip_tags(trim($_POST['id']));

                $validationResult = Validator::createCoupon($name, $code, $percentage_discount, $min_amount_required, $min_product_required, 
                $start_date, $end_date, $max_uses, $count_uses, $valid_only_first_purchase, $status, $id);

                print_r($validationResult);

                if($validationResult['status'] == '1'){
                    $_SESSION['_MESSAGE'] = CouponController::edit($name, $code, $percentage_discount, $min_amount_required, $min_product_required, $start_date, $end_date, $max_uses, $count_uses, $valid_only_first_purchase, $status, $id);
                }else{
                    $_SESSION['_MESSAGE'] = $validationResult['data'];
                }

                // print_r( $_SESSION['_MESSAGE']);
                header('Location: '.$_SERVER['HTTP_REFERER']); 
                break;
            case 'delete':{
                $id = $_POST['id'];
                $validId = Validator::integer($id);
                if($validId){
                    $_SESSION['_MESSAGE'] = CouponController::delete($id);
                }else{
                    $_SESSION['_MESSAGE'] = 'Hay algo mal con ese ID';
                }
                header('Location: '.$_SERVER['HTTP_REFERER']); 
                break;
            }
        }
    }
}



class CouponController{
    public static function getAll(){
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://crud.jonathansoto.mx/api/coupons',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer '.$_SESSION['token']
    // 'Authorization: Bearer 3|JSvLL27EhMfH70onI5sSZP6ROwcdSsHQU8cm7k9X'
  ),
));

    $response = curl_exec($curl);
    curl_close($curl);
    $response = json_decode($response);
    if ( isset($response->code) && $response->code > 0) {
        return $response->data;
    }else{
        return array();
    } 
    }


    public static function get($coupon_id){
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/coupons/'.$coupon_id,
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
        if ( isset($response->code) && $response->code > 0) {
            return $response->data;
        }else{
            return array();
        } 
    }

    /* <form action="app/CouponController.php" method="POST">
    <input type="text" name='name' value="name">
    <input type="text" name='code' value="codig">
    <input type="text" name='percentage_discount' value="porc desc">
    <input type="text" name='min_amount_required' value="cant min">
    <input type="text" name='min_product_required' value="cant prod min">
    <input type="text" name='start_date' value="fech ini">
    <input type="text" name='end_date' value="fech ennd">
    <input type="text" name='max_uses' value="max use">
    <input type="text" name='count_uses' value="bount use">
    <input type="text" name='valid_only_first_purchase' value="valid furst">
    <input type="text" name='status' value="status">

    <input type="hidden" name="global_token" value="<?= $_SESSION['global_token']?>">
    <input type="text" name="action" value="create">
    <input type="submit">

</form> */
    public static function create($name, $code, $percentage_discount, $min_amount_required, $min_product_required, $start_date, $end_date, $max_uses, $count_uses, $valid_only_first_purchase, $status){
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/coupons',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('name' => $name,'code' => $code,'percentage_discount' => $percentage_discount,'min_amount_required' => $min_amount_required,'min_product_required' => $min_product_required,'start_date' => $start_date,'end_date' => $end_date,'max_uses' => $max_uses,'count_uses' => $count_uses,'valid_only_first_purchase' => $valid_only_first_purchase,'status' => $status),
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$_SESSION['token']
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $response = json_decode($response);
        if ( isset($response->code) && $response->code > 0) {
            return $response->data;
        }else{
            return array();
        } 
    }


    /* 
<!--  <form action="app/CouponController.php" method="POST">
    <input type="text" name='name' value="name">
    <input type="text" name='code' value="codig">
    <input type="text" name='percentage_discount' value="porc desc">
    <input type="text" name='min_amount_required' value="cant min">
    <input type="text" name='min_product_required' value="cant prod min">
    <input type="text" name='start_date' value="fech ini">
    <input type="text" name='end_date' value="fech ennd">
    <input type="text" name='max_uses' value="max use">
    <input type="text" name='count_uses' value="bount use">
    <input type="text" name='valid_only_first_purchase' value="valid furst">
    <input type="text" name='status' value="status">
    <input type="text" name='id' value="prod id">

    <input type="hidden" name="global_token" value="<?= $_SESSION['global_token']?>">
    <input type="text" name="action" value="edit">
    <input type="submit"> */


    public static function edit($name, $code, $percentage_discount, $min_amount_required, $min_product_required, $start_date, $end_date, $max_uses, $count_uses, $valid_only_first_purchase, $status, $id){
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/coupons',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS => 'name='.$name.'&code='.$code.'&percentage_discount='.$percentage_discount.'&min_amount_required='.$min_amount_required.'&min_product_required='.$min_product_required.'&start_date='.$start_date.'&end_date='.$end_date.'&max_uses='.$max_uses.'&count_uses='.$count_uses.'&valid_only_first_purchase='.$valid_only_first_purchase.'&status='.$status.'&id='.$id.'',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$_SESSION['token'],
            'Content-Type: application/x-www-form-urlencoded'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $response = json_decode($response);

        return $response;
/*         if ( isset($response->code) && $response->code > 0) {
            return $response->data;
        }else{
            return array();
        } */

    }

    /* <form action="app/CouponController.php" method="POST">

<input type="text" name='id' value="prod id">
<input type="hidden" name="global_token" value="<?= $_SESSION['global_token']?>">
<input type="text" name="action" value="delete">
<input type="submit">
 */

    public static function delete($id){
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/coupons/'.$id,
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


    public static function getWidgets($coupon_id){// ordenes y total descontado
        $coupon = CouponController::get($coupon_id);
        $data['total_discount'] = 0;
        $data['orders'] = [];
        $data['total_orders'] = 0;
        print_r($coupon);    
        if(!empty($coupon)){
            $data['orders'] = $coupon->orders;
            foreach($coupon->orders as $order){
                $data['total_orders']++;
                if($coupon->percentage_discount > 0)
                    $data['total_discount'] += $coupon->percentage_discount / 100 * ($order->total);
                else if($coupon->amount_discount >0)
                {
                    $data['total_discount'] +=  $coupon->amount_discount;
/*    
                    echo   $order->total;
                
                    echo   $coupon->amount_discount;
                    echo   '<br>';
                    echo    $order->total  - ($coupon->amount_discount); */
                }
                    // echo  '<br>';
            }
        }
     ///   print_r($data['total_discount'] );
      
        return $data;
    }

}


?>