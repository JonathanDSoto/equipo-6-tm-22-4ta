<?php
include 'config.php';
include_once 'Validator.php';
// include 'util/functions.php';

if (isset($_POST['global_token']) && ($_POST['global_token'] == $_SESSION['global_token'])){
   /// echo 'primer if';
    if(isset ($_POST['action'])){
   //     echo 'segindo if';
        switch($_POST['action']){
           
             case 'register':{
                // print_r($_FILES['avatar']);
                // $_POST = qu($_POST);
                /* <form action="app/UserController.php" method="post" enctype="multipart/form-data"> html de prueba create user
    
    <input type="text" value="name" name="name">
    <input type="text" value="last" name="lastname">
    <input type="text" value="ema" name="email">
    <!-- <input type="text" value="naasdmeweew" name="phone_numbLlLLer" -->
    <input type="text" value="phone" name="phone_number">
    <input type="text" value="role" name="role">
    <input type="text" value="pass" name="password">
    <input type="file" name="avatar">
    
    
    <input type="hidden" name="global_token" value="<?= $_SESSION['global_token']?>">
    <input type="text" name="action" value="register">
    <input type="submit">
</form> */

                $validate = Validator::createUser($_POST['name'],$_POST['lastname'], $_POST['email'], $_POST['phone_number'],
                $_SESSION['name'], $_POST['role'], $_POST['password'],$_FILES['avatar']['type']);
                if($validate['status'] == 1){
                    $name = strip_tags($_POST['name']);
                    $lastname =  $_POST['lastname'];
                    $email = strip_tags($_POST['email']);
                    $phone_number = strip_tags($_POST['phone_number']); 
                    $created_by = $_SESSION['name'];
                    $role =  strip_tags( $_POST['role']);
                    $password = strip_tags( $_POST['password']);
                    $profile_photo_file = $_FILES['avatar']['tmp_name']; 
                    $_SESSION['_MESSAGE'] = UserController::register($name, $lastname, $email, $phone_number, $created_by, $role, $password, $profile_photo_file);
                }else{
                    $_SESSION['_MESSAGE'] = $validate['data'];
                }   
                header('Location: '.$_SERVER['HTTP_REFERER']);

/*                 $lastname = 'lastname';
                $name = 'name';
                $email ='emcrail';
                $phone_number = 'phone_number'; 
                $created_by ='phone_number';
                $role = 'role';
                $password ='role';
                $profile_photo_file = $_FILES['avatar']['tmp_name']; */
       //         UserController::register($name, $lastname, $email, $phone_number, $created_by, $role, $password, $profile_photo_file);
                break;
            }



            /* <form action="app/UserController.php" method="post" enctype="multipart/form-data"> html de prueba delete user
    
    
    <input type="text" name="id"  value="ert">
    <input type="hidden" name="global_token" value="<?= $_SESSION['global_token']?>">
    <input type="text" name="action" value="delete">
    <input type="submit"> */
            case 'delete':{
                $result = Validator::integer($_POST['id']);
                echo $result;
                if($result){
                    $_SESSION['_MESSAGE'] = UserController::delete($_POST['id']);
                }else{ 
                    $_SESSION['_MESSAGE'] = 'Hay algo mal con ese ID';
                }
                print_r(
                    $_SESSION['_MESSAGE']
                ); 
                header('Location: '.$_SERVER['HTTP_REFERER']);  
                break;
            }


             case 'edit':{
                echo 'dafsv';
                print_r(strlen($_POST['phone_number']));

                /*  ($name, $lastname ,$email, $phone_number, $created_by, $role, $password, $photo_type = '
                image/jpeg', $user_id = '999'){
 */

//  public static function createUser($name, $lastname ,$email, $phone_number, $created_by, $role, $password, $photo_type = 'image/jpeg', $user_id = '999'){


    /* <form action="app/UserController.php" method="post">
<input type="text" value="name" name="name">
    <input type="text" value="last" name="lastname">
    <input type="text" value="ema" name="email">
    <input type="text" value="phone" name="phone_number">
    <input type="text" value="role" name="role">
    <input type="text" value="pass" name="password">
    <input type="text" value="user id" name="user_id">
   
    <input type="hidden" name="global_token" value="<?= $_SESSION['global_token']?>">
    <input type="text" name="action" value="edit">
    <input type="submit">
</form> */
                $validate = Validator::createUser($_POST['name'], $_POST['lastname'], $_POST['email'], $_POST['phone_number'], $_SESSION['name'],$_POST['role'], $_POST['password'],'image/jpeg',$_POST['user_id']);
                
                if($validate['status'] == 1){
                    $name = strip_tags($_POST['name']);
                    $lastname =  $_POST['lastname'];
                    $email = strip_tags($_POST['email']);
                    $phone_number = strip_tags($_POST['phone_number']); 
                    $created_by = $_SESSION['name'];
                    $role =  strip_tags( $_POST['role']);
                    $password = strip_tags( $_POST['password']);
                    $user_id = strip_tags($_POST['user_id']);
                    // $profile_photo_file = $_FILES['avatar']['tmp_name']; 
                    $_SESSION['_MESSAGE'] = UserController::edit($name, $lastname, $email, $phone_number, $created_by, $role, $password, $user_id);
                }else{
                    $_SESSION['_MESSAGE'] = $validate['data'];
                }
                
                 print_r( $_SESSION['_MESSAGE']);
                header('Location: '.$_SERVER['HTTP_REFERER']);
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

    // echo $response;
    $response = json_decode($response);

    return $response;
/*     if(isset($response->code) && $response->code > 0 ){
    
        // header("Location:".BASE_PATH.'/users');
        print_r($response);
    }else{
        header("Location:".BASE_PATH.'/users?error=true');
        return array();
    } */

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

    echo $response;
/*     if(isset($response->code) && $response->code > 0 ){
        return true;
    }else{
        return false;
    } */
    
    }

    public static function edit($name, $lastname, $email, $phone_number, $created_by, $role, $password, $user_id){  
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/users',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS => 'name='.$name.'&lastname='.$lastname.'&email='.$email.'&phone_number='.$phone_number.'created_by='.$created_by.'&role='.$role.'&password='.$password.'&id='.$user_id,
        CURLOPT_HTTPHEADER => array(
		    'Authorization: Bearer '.$_SESSION['token'],
		    'Content-Type: application/x-www-form-urlencoded'
		  ),
		));

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    //print_r(UserController::get(1));
    public static function get($id){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/users/'.$id,
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
        return $response;
    }

}
?>