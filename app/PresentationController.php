<?php 


if (isset($_POST['action'])) {

    if (isset($_POST['global_token']) && $_POST['global_token'] == $_SESSION['global_token']){
        switch($_POST['action']){

            //public static function create($description, $code, $weigth_in_grams, $status, $cover, $stock, $stock_min, $stock_max, $product_id){
                
                case 'create':{
                array_walk($_POST , 'PresentationController::trim_value');   
                $description = strip_tags($_POST['description']); 
                $code = strip_tags($_POST['code']);
                $weigth_in_grams = strip_tags($_POST['weigth_in_grams']);
                $status = strip_tags($_POST['status']);
                $cover = $_FILES['cover']['tmp_name'];
                $stock = strip_tags($_POST['stock']);
                $stock_min = strip_tags($_POST['stock_min']);
                $stock_max = strip_tags($_POST['stock_max']);
                $product_id = strip_tags($_POST['product_id']);
                PresentationController::create($description, $code, $weigth_in_grams, $status, $cover, $stock, $stock_min, $stock_max, $product_id);
                break;
            }

            case 'delete':{
                array_walk($_POST , 'PresentationController::trim_value'); 
                PresentationController::delete($_POST['presentation_id']);  
                
            }
       }
    }
}

class PresentationController{

//	print_r( PresentationController::getAll(1) );
    public static function getAll($productId){
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/presentations/product/'.$productId,
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
        if(isset($response->code) && $response->code > 0 ){
            return $response;
        }else{
            return array();
        }

    }

    public static function delete($presentationId){
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/presentations/'.$presentationId,
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
        $response = json_decode($response);
        if(isset($response->code) && $response->code > 0 ){
            return $response;
        }else{
            return array();
        }
    }


    public static function create($description, $code, $weigth_in_grams, $status, $cover, $stock, $stock_min, $stock_max, $product_id){
   // public static function create(){
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/presentations',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('description' => $description,'code' => $code,'weight_in_grams' => $weigth_in_grams,'status' => 
        $status,'cover'=> new CURLFILE($cover),
        'stock' => $stock,'stock_min' => $stock_min,'stock_max' => $stock_max,'product_id' => $product_id), 
      //  CURLOPT_POSTFIELDS => array('description' => 'cahuama de 4 litros','code' => 'khuamon','weight_in_grams' => '40000','status' => 'active','cover'=> new CURLFILE('../logo.jpg'),'stock' => '50','stock_min' => '10','stock_max' => '100','product_id' => '1'),
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$_SESSION['token']
        ),
        )); 
        $response = curl_exec($curl);
        $response = json_decode($response);
        if(isset($response->code) && $response->code > 0 ){
            return $response->data;
        }else{
            return array();
        }
    }

    static function trim_value(&$value) { 
        $value = trim($value);
    }

    public static function update(){
        
        
    }
}

?>