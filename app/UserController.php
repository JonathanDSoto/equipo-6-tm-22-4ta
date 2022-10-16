<?php
include 'config.php';
// include 'util/functions.php';

if (isset($_POST['global_token']) && ($_POST['global_token'] == $_SESSION['global_token'])){
   /// echo 'primer if';
    if(isset ($_POST['action'])){
   //     echo 'segindo if';
        switch($_POST['action']){
           
             case 'register':{
                // print_r($_FILES['avatar']);
                // $_POST = qu($_POST);
                $lastname =  $_POST['lastname'];
                $name = strip_tags($_POST['name']);
                $email = strip_tags($_POST['email']);
                $phone_number = strip_tags($_POST['phone_number']); 
                $created_by = $_SESSION['name'];
                $role =  strip_tags( $_POST['role']);
                $password = strip_tags( $_POST['password']);
                $profile_photo_file = $_FILES['avatar']['tmp_name']; 


/*                 $lastname = 'lastname';
                $name = 'name';
                $email ='emcrail';
                $phone_number = 'phone_number'; 
                $created_by ='phone_number';
                $role = 'role';
                $password ='role';
                $profile_photo_file = $_FILES['avatar']['tmp_name']; */
                UserController::register($name, $lastname, $email, $phone_number, $created_by, $role, $password, $profile_photo_file);
                break;
            }


            case 'delete':{
                UserController::delete($_POST['id']);
                break;
            }
            
            


        }
    }
/*     else{
        echo 'accion no definida';
    }
}else{
    echo 'el toetrykurthgeken no coincide';
} */

}


class UserController{   
    public static function getAll(){
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://crud.jonathansoto.mx/api/users',
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
    // echo $response;
    $response = json_decode($response);
    if(isset($response->code) && $response->code > 0 ){
    //   header('Location: ../index.php');
        return $response->data;
    }else{
        return array();
    }
}

public static function register($name, $lastname, $email, $phone_number, $created_by, $role, $password, $profile_photo_file){
    
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://crud.jonathansoto.mx/api/users',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array('name' => $name,'lastname' => $lastname,'email' => $email,'phone_number' => $phone_number,'created_by' => $created_by,'role' => $role,'password' => $password,'profile_photo_file'=> new CURLFILE($profile_photo_file)),
    CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer '.$_SESSION['token']
    ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);

    echo $response;
    $response = json_decode($response);
    if(isset($response->code) && $response->code > 0 ){
    
        return $response->data;
    }else{
        return array();
    }

}

public static function delete($id){
        
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/users/'.$id,
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
        return true;
    }else{
        return false;
    }
    
    }

}
?>