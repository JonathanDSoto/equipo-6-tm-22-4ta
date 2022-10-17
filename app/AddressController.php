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
                $last_name = strip_tags(trim($_POST['first_name'])); 
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
        echo $response;
        

    }
}


?>