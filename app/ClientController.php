<?php 
include 'config.php';
include_once 'Validator.php';
// arreglo que tiene una asociacion entre la accion que se manda desde el formulario  y el metodo que se llama aqui
/* $methodAction = [
    'create' =>['function' => 'ClientController::create', 'requiresStripTags' => true],
    'delete' => ['ClientController::delete', 'requiresStripTags' => false],
    'get' => ['ClientController::get', 'requiresStripTags' => false],
    'edit' => ['ClientController::edit', 'requiresStripTags' => false],
    'getAll' =>['function' => 'ClientController::getAll', 'requiresStripTags' => false],
]; */
// 'accion' => 'metodo'
// if (isset($_POST['global_token']) && ($_POST['global_token'] == $_SESSION['global_token'])){
    /// echo 'primer if';
/*     if(isset($_POST['action'])){
        switch()
    }
     */
 /*     if(isset ($_POST['action']) &&  array_key_exists($_POST['action'], $methodAction)){ // revisamos si se envo la accion por post y si esta tiene un metodo asignado 
        // print_r( $_POST );
        if($methodAction[$_POST['action']]['requiresStripTags']){
            $_POST = array_map(function($v){
                echo "tags ";
                return trim(strip_tags($v));
            }, $_POST);
        }
        // forward_static_call_array($methodAction[$_POST['action']]['function'], compact('_POST')); // llamamos al metodo de la accion y pasamos el arreglo post como argumento 
    } */
// }
//   echo $_SESSION['global_token'];

if (isset($_POST['action'])) {

	 if (isset($_POST['global_token']) && 
		$_POST['global_token'] == $_SESSION['global_token']){
            // echo 'dfghhjghdgsf';
	 	    switch ($_POST['action']) {
            case 'create':
/*             $data = ClientController::trim_data($_POST); // quitamos cosas invalidas de los parametros
            $validationResult = ClientController::validateCreate($data); // validamos que tengan el formato correcto 
            
             if (empty($validationResult)){ 
            //     print_r( $data);
                 ClientController::create($data); // creamos el registro y regresamos el resultado 
             }else{
                echo  json_encode(['errors' => $validationResult]); /// regresamos un json con los datos que estaban incorrectos
             } */

             
/* <!-- create client test code -->
<form action="app/ClientController.php" method="post">
<input type="text" value="name" name="name">
   
    <input type="text" value="ema" name="email">
    <input type="text" value="pass" name="password">
    <input type="text" value="phone" name="phone_number">
    <input type="hidden" name="global_token" value="<?= $_SESSION['global_token']?>">
    <input type="text" name="action" value="create">
    <input type="submit">
</form> */

             $validationResult = Validator::createClient($_POST['name'], $_POST['email'], $_POST['password'], $_POST['phone_number']);
             print_r($validationResult);
             if($validationResult['status'] == 1){
                $name = strip_tags(trim($_POST['name']));
                $email = strip_tags(trim($_POST['email']));
                $password = strip_tags(trim($_POST['password']));
                $_SESSION['_MESSAGE'] = ClientController::create($name, $email, $password, $phone_number);
             }else{
                $_SESSION['_MESSAGE'] = $validationResult['data'];
             }

            //  print_r($_SESSION['_MESSAGE']);

            header('Location: '.$_SERVER['HTTP_REFERER']);	
            break; 

            case 'delete':{
                $validationResult = Validator::integer($_POST['client_id']);
                // echo json_encode(ClientController::delete($_POST['id']));
                if($validationResult){
                    $_SESSION['_MESSAGE'] = ClientController::delete($_POST['client_id']);
                }else{
                    $_SESSION['_MESSAGE'] = 'Hay algo mal con ese ID';
                }
                header('Location: '.$_SERVER['HTTP_REFERER']);	
            break;
            }

/*             <!-- html de prueba de ceditar cliente -->
<form action="app/ClientController.php" method="post">
<input type="text" value="name" name="name">
   
    <input type="text" value="ema" name="email">
    <input type="text" value="pass" name="password">
    <input type="text" value="phone" name="phone_number">
    <input type="text" value="client_id" name="client_id">
    <input type="hidden" name="global_token" value="<?= $_SESSION['global_token']?>">
    <input type="text" name="action" value="edit">
    <input type="submit">
</form>
        */     case 'edit':{
                $validationResult = Validator::createClient($_POST['name'], $_POST['email'], $_POST['password'], $_POST['phone_number'], $_POST['client_id']);
                if($validationResult['status'] == 1){
                    $name = strip_tags(trim($_POST['name']));
                    $email = strip_tags(trim($_POST['email']));
                    $password = strip_tags(trim($_POST['password']));
                    $phone_number = strip_tags(trim($_POST['phone_number']));
                    $client_id = strip_tags(trim($_POST['client_id']));
                    $_SESSION['_MESSAGE'] = ClientController::edit($name, $email, $password, $phone_number, $client_id);
                 }else{
                    $_SESSION['_MESSAGE'] = $validationResult['data'];
                 }
                //  print_r($_SESSION['_MESSAGE']);
                break;
                header('Location: '.$_SERVER['HTTP_REFERER']);	
            }

        }
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
    public static function create($name, $email, $password, $phone_number){
    //  print_r( $args);
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
//   CURLOPT_POSTFIELDS => array('name' =>'namaaaaaaaaaaaaaaaaae','email' =>'emaideaefafal','password' =>  'papasswordessword','phone_number' =>   'phone_number','is_suscribed' => '1','level_id' => '1'),

    CURLOPT_POSTFIELDS => array('name' => $name,'email' => $email,'password' =>   $password,'phone_number' =>   $phone_number,'is_suscribed' => '1','level_id' => '1'),
    CURLOPT_HTTPHEADER => array(
        //'Authorization: Bearer 364|hkHnsGw8PTqQqyiYxvN74DPEP9NUm0zebeXQ3x1t'
         'Authorization: Bearer '.$_SESSION['token']
    ),
    ));

        $response = curl_exec($curl);
             echo $response;
        curl_close($curl);
        $response = json_decode($response);

        return $response;
/*         if(isset($response->code) && $response->code > 0 ){
            return $response->data;
        }else{
            return array();
        }  */
    }

    public static function delete($id){
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/clients/'.$id,
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

    //     echo json_encode( ClientController::get(['id' => '3']));
    public static function get($args){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/clients/'.$args['id'],
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
              return $response->data;
          }else{
              return array();
          }
    }

    public static function edit($name, $email, $password, $phone_number, $id){
    //    echo 'alagerga esto no jala >:V';
       // extract($args);
                

        // echo $id;
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/clients',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS => 'name='.$name.'&email='.$email.'&password='.$password.'&phone_number='.$phone_number.'&is_suscribed=1&level_id=1&id='.$id,

      //  CURLOPT_POSTFIELDS => 'name=jonathan%20soto&email=jsoto%40uabcs.mx&password=Th3_P4ssW0rd_4nt!_h4ck_2000&phone_number=6120000000&is_suscribed=1&level_id=1&id='.$args['id'],
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$_SESSION['token'],
            'Content-Type: application/x-www-form-urlencoded'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // echo $response; 
        $response = json_decode($response);
        return $response;
/*         if(isset($response->code) && $response->code > 0 ){
            return $response->data;
        }else{
            return array();
        } */

    }

    public static function validateCreate($args){
          extract($args);
          $response = [];
//array('name' =>'namaaaaaaaaaaaaaaaaae','email' =>'emaideaefafal','password' =>  'papasswordessword','phone_number' =>  
// 'phone_number','is_suscribed' => '1','level_id' => '1'),




        //  p}rint_r($name);
        if(!preg_match("/^[a-zA-Z-']*$/",$name)){
            array_push($response,'nombre tiene numeros');
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            array_push($response,'email en formto incorrecto');
        }
        if(!preg_match('/^[0-9]{11}$/', $phone_number)){
            array_push($response,'telefono en formto incorrecto  (solo se aceptan 11 numeros)');
        }
 
        return $response;
    }


    static function trim_data($dataArray) {
/*         foreach($dataArray as $data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
             echo $data;
        } */
        $newArray = array_map(function($v){
    
            return trim(strip_tags($v));
        }, $dataArray);

        // print_r ($newArray;
         return $newArray;
      }

// print_r(ClientController::getClient(1)
      public static function getClient($id){
                
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/clients/'.$id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$_SESSION['token'],
            'Content-Type: application/x-www-form-urlencoded'
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
    //   print_r(ClientController::getAddresses(1));
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
        echo $response;
        // return $response;
    }
}


?>