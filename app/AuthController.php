<?php
include_once "config.php";

if (isset($_POST['action'])) {

	if (isset($_POST['global_token']) && 
		$_POST['global_token'] == $_SESSION['global_token']){

		switch ($_POST['action']) {
			case 'access':
				 
				$email = strip_tags($_POST['email']);
				$password = strip_tags($_POST['password']);
				AuthController::login($email,$password);
			break; 
			case 'logout':
             echo 'weghgnegwfq';
                $email = $_SESSION['email'];
                AuthController::logout($email);
                break;
		}


	}
}

// $pass = 'A9*27rh6%#271N';
// $email = 'crve_19@alu.uabcs.mx';
Class AuthController{


/* 

$pass = 'A9*27rh6%#271N'; $email = 'crve_19@alu.uabcs.mx';
?>
                <form action="app/AuthController.php" id="login_form" method="POST">
        <input type="text" name="email" value="<?= $email?>">
        <input type="text" name="password" value="<?= $pass?>">
        <input type="hidden" name="action" value="access">   
        <input type="hidden" name="global_token" value="<?= $_SESSION['global_token']?>">
        <input type="submit" value="GO!">
    </form>
 */

	public static function login($email,$password)
	{

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://crud.jonathansoto.mx/api/login',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS => array(
		  	'email' => $email,
		  	'password' => $password
		  ),
		));

		$response = curl_exec($curl); 
		curl_close($curl);
		$response = json_decode($response);

		if ( isset($response->code) && $response->code > 0) {

			$_SESSION['id']= $response->data->id;
			$_SESSION['name']= $response->data->name;
			$_SESSION['lastname']= $response->data->lastname;
			$_SESSION['avatar']= $response->data->avatar;
			$_SESSION['token']= $response->data->token;

			header("Location:".BASE_PATH."products");
		}else{


			#var_dump($response);
			header("Location:".BASE_PATH."?error=true");
		}


		

	}

/*  
<form action="<?=BASE_PATH?>auth" method="POST">
        <input type="hidden" name="action" value='logout'>
        <input type="hidden" name='global_token' value="<?= $_SESSION['global_token']?>">
        <input type="submit"value='cerrar sesion'>
    </form> */

    public static function logout($email){
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/logout',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('email' => $email),
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$_SESSION['token']
        ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        
        $response = json_decode($response);
        if(isset($response->code) && $response->code > 0 ){
        	header("Location:".BASE_PATH);
            //return $response->data;
        }else{
            return array();
        }

    }



    public static function getProfile(){
       
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/users/'.$_SESSION['id'],
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
}











?>