<?php 
include 'config.php';
include_once 'Validator.php';


if (isset($_POST['action'])) {

    if (isset($_POST['global_token']) && 
       $_POST['global_token'] == $_SESSION['global_token']){
            switch ($_POST['action']) {

                //    public static function createAddress($first_name, $last_name,$street_and_user_number, $postal_code, $city, $province, $phone_number, $is_billing_address, $client_id){
            case 'create':{
                $first_name = strip_tags(trim($_POST['first_name']));
                $last_name = strip_tags(trim($_POST['last_name'])); 
                $street_and_use_number = strip_tags(trim($_POST['street_and_use_number'])); 
                $postal_code = strip_tags(trim($_POST['postal_code'])); 
                $city = strip_tags(trim($_POST['city'])); 
                $province = strip_tags(trim($_POST['province'])); 
                $phone_number = strip_tags(trim($_POST['phone_number'])); 
                $is_billing_address = strip_tags(trim($_POST['is_billing_address'])); 
                $client_id = strip_tags(trim($_POST['client_id'])); 
                $validation  = Validator::createAddress($first_name, $last_name, $street_and_use_number, $postal_code, $city, $province, $phone_number, $is_billing_address, $client_id);
                
                if($validation['status'] == 1){
                    $_SESSION['_MESSAGE'] = AddressController::createAddress($first_name, $last_name, $street_and_use_number, $postal_code, $city, $province, $phone_number, $is_billing_address, $client_id);
                }else{
                    $_SESSION['_MESSAGE'] = $validation['data'];
                }
                
                header('Location: '.$_SERVER['HTTP_REFERER']);  
                break;
            }
            case 'update':{
                $first_name = strip_tags(trim($_POST['first_name']));
                $last_name = strip_tags(trim($_POST['last_name']));   
                $street_and_use_number = strip_tags(trim($_POST['street_and_use_number'])); 
                $postal_code = strip_tags(trim($_POST['postal_code'])); 
                $city = strip_tags(trim($_POST['city'])); 
                $province = strip_tags(trim($_POST['province'])); 
                $phone_number = strip_tags(trim($_POST['phone_number'])); 
                $is_billing_address = strip_tags(trim($_POST['is_billing_address'])); 
                $client_id = strip_tags(trim($_POST['client_id']));
                $address_id = strip_tags(trim($_POST['address_id']));
                $validation  = Validator::createAddress($first_name, $last_name, $street_and_use_number, $postal_code, $city, $province, $phone_number, $is_billing_address, $client_id, $address_id);
                
                // print_r($validation);
                if($validation['status'] == 1){
                    $_SESSION['_MESSAGE'] = AddressController::update($first_name, $last_name, $street_and_use_number, $postal_code, $city, $province, $phone_number, $is_billing_address, $client_id, $address_id);
                }else{
                    $_SESSION['_MESSAGE'] = $validation['data'];
                }
                
                header('Location: '.$_SERVER['HTTP_REFERER']);  
                break;
            }

            case 'delete':{
                $validation = Validator::integer($_POST['address_id']);
                if($validation){
                    $_SESSION['_MESSAGE'] = AddressController::delete($_POST['address_id']);
                }else{
                    $_SESSION['_MESSAGE'] = 'Hay algo mal con ese ID';
                }
                header('Location: '.$_SERVER['HTTP_REFERER']);  
                break;
            }
            }
    }
}





class AddressController{
    public static function getAddresses($client_id){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/addresses/clients/'.$client_id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$_SESSION['token'],
        ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        // $response = json_encode($response);
        // echo $response;
         return $response;
    }
/*   <form action="app/AddressController.php" method="POST">
    
    <input type="text" name="first_name" value="first n" id="">
    <input type="text" name="last_name" value="last n" id="">
    <input type="text" name="street_and_use_number" value="calle y n" id="">
    <input type="text" name="postal_code" value="cod post" id="">
    <input type="text" name="city" value="city" id="">
    <input type="text" name="province" value="province" id="">
    <input type="text" name="phone_number" value="tel" id="">
    <input type="text" name="is_billing_address" value="is bill" id="">
    <input type="text" name="client_id" value="id client" id="">
    <input type="hidden" name="global_token" value="<?= $_SESSION['global_token']?>">
    <input type="text" name="action" value="create">
    <input type="submit">
    
    </form> */

    public static function createAddress($first_name, $last_name,$street_and_user_number, $postal_code, $city, $province, $phone_number, $is_billing_address, $client_id){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/addresses',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('first_name' => $first_name,'last_name' => $last_name,'street_and_use_number' => $street_and_user_number,'postal_code' => $postal_code,'city' => $city,'province' => $province,'phone_number' => $phone_number,'is_billing_address' => $is_billing_address,'client_id' => $client_id),
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$_SESSION['token'],
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;

    }
    /* 
    <form action="app/AddressController.php" method="POST">
    
    <input type="text" name="first_name" value="first n" id="">
    <input type="text" name="last_name" value="last n" id="">
    <input type="text" name="street_and_use_number" value="calle y n" id="">
    <input type="text" name="postal_code" value="cod post" id="">
    <input type="text" name="city" value="city" id="">
    <input type="text" name="province" value="province" id="">
    <input type="text" name="phone_number" value="tel" id="">
    <input type="text" name="is_billing_address" value="is bill" id="">
    <input type="text" name="client_id" value="id client" id="">
    <input type="text" name="address_id" value="id dir" id="">
    <input type="hidden" name="global_token" value="<?= $_SESSION['global_token']?>">
    <input type="text" name="action" value="update">
    <input type="submit">
    
    </form> */

    public static function update($first_name, $last_name, $street_and_user_number, $postal_code, $city, $province, $phone_number, $is_billing_address, $client_id, $address_id){
        

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/addresses',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'PUT',
          CURLOPT_POSTFIELDS => 'first_name='.$first_name.'&last_name='.$last_name.'&street_and_use_number='.$street_and_user_number.'&postal_code='.$postal_code.'&city='.$city.'&province='.$province.'&phone_number='.$phone_number.'&is_billing_address='.$is_billing_address.'&client_id='.$client_id.'&id='.$address_id,
          CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$_SESSION['token'],
            'Content-Type: application/x-www-form-urlencoded'
          ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        return $response;
    }
    // print_r(AddressController::delete(26));
    public static function delete($address_id){
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/addresses/'.$address_id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'DELETE',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$_SESSION['token'],
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;

    }
}


?>