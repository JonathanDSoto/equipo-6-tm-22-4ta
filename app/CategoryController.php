<?php
include_once "config.php";
include_once 'Validator.php';
if (isset($_POST['action'])) {
	
	if (isset($_POST['global_token']) && 
	   $_POST['global_token'] == $_SESSION['global_token']){
    
        switch($_POST['action']){
            case 'e':{
                break;
            }
    }

   }

}


class CategoryController{
    public static function getAll(){
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/categories',
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
        return  $response->data;

    }
}