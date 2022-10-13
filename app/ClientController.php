<?php 
include 'config.php';

// arreglo que tiene una asociacion entre la accion que se manda desde el formulario  y el metodo que se llama aqui
$methodAction = [
    'create' => 'ClientController::create',
    'delete' => 'ClientController::delete'
];
// 'accion' => 'metodo'
if (isset($_POST['global_token']) && ($_POST['global_token'] == $_SESSION['global_token'])){
    /// echo 'primer if';
     if(isset ($_POST['action']) &&  array_key_exists($_POST['action'], $methodAction)){ // revisamos si se envo la accion por post y si esta tiene un metodo asignado 
        // print_r( $_POST );
        forward_static_call_array($methodAction[$_POST['action']], compact('_POST')); // llamamos al metodo de la accion y pasamos el arreglo post como argumento 
    }
}

class ClientController{
    public static function getAll(){ 
        $token = $_SESSION['token'];       

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://crud.jonathansoto.mx/api/clients',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$token
          ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        $response = json_decode($response);
        if(isset($response->code) && $response->code > 0 ){
            return $response->data;
        }else{
            return array();
        }

    }

    /*       <form action="<?= BASE_PATH?>client" method="post">
            <input type="hidden" name="action" value="create">
            <input type="text" value="name" name="name">
            <input type="hidden" name="global_token" value="<?= $_SESSION['global_token']?>">
                <input type="submit" name="" id="">
            </form> */
    public static function create($args){
        // print_r( $args);
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://crud.jonathansoto.mx/api/clients',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',

    CURLOPT_POSTFIELDS => array('name' =>   $args['name'],'email' => $args['email'],'password' =>   $args['password'],'phone_number' =>   $args['phone_number'],'is_suscribed' => '1','level_id' => '1'),
    CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer '.$_SESSION['token']
    ),
    ));

        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response);
        if(isset($response->code) && $response->code > 0 ){
            return $response->data;
        }else{
            return array();
        }
    }

    public static function delete($args){
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/clients/'.$args['id'],
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
        echo $response;

    }
}


?>