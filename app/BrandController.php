<?php
include_once "config.php";
include_once 'Validator.php';
if (isset($_POST['action'])) {
	
	if (isset($_POST['global_token']) && 
	   $_POST['global_token'] == $_SESSION['global_token']){
		
			switch ($_POST['action']) {
				case 'delete':{
					return BrandController::delete($_POST['id']);
					break;
				}
				case 'create':{
					/* 

					// prueba de validacion para crear brand
if(!empty($_SESSION['_MESSAGE'])){
    print_r($_SESSION['_MESSAGE']);
    $_SESSION['_MESSAGE'] = [];
}
// print_r($_SESSION['_MESSAGE']);
?>
<form action="app/BrandController.php" method="POST">

    <input type="text" value="naasdmeweew" name="name">
    <input type="text" value="descqweqweaription" name="description">
    <input type="text" value="slaawrerwug" name="slug">
    <input type="text" name="global_token" value="<?= $_SESSION['global_token']?>">
    <input type="text" name="action" value="create">
    <input type="submit"> */
					$validate = Validator::createBrand($_POST['name'], $_POST['slug'],$_POST['description']);
					if($validate['status'] == 1){
						$name = strip_tags(trim($_POST['name']));
						$description = strip_tags(trim($_POST['description']));
						$slug = strip_tags(trim($_POST['slug']));
						$_SESSION['_MESSAGE'] =  BrandController::create($name, $slug, $description);
					}else{
						 $_SESSION['_MESSAGE'] =  $validate['data']; 
					}
					header('Location: '.$_SERVER['HTTP_REFERER']);
					break;
				}

				case 'update':{
					$name = strip_tags(trim($_POST['name']));
					$description = strip_tags(trim($_POST['description']));
					$slug = strip_tags(trim($_POST['slug']));
					$brand_id = strip_tags(trim($_POST['brand_id']));
					BrandController::update($name, $description, $slug, $brand_id);
					break;
				}

			}
		}
}

Class BrandController
{


	public static function getBrands()
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://crud.jonathansoto.mx/api/brands',
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

		// return $response->data;

 		if ( isset($response->code) && $response->code > 0) {
			
			return $response->data;
		}else{

			return array();
		} 


	}

	public static function delete($brandId){
		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://crud.jonathansoto.mx/api/brands/'.$brandId,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'DELETE',
		));

		$response = curl_exec($curl);

		curl_close($curl);
		echo $response;

	}

	public static function create($name, $description, $slug){
		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://crud.jonathansoto.mx/api/brands',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS => array('name' => $name,'description' => $description,'slug' => $slug),
		CURLOPT_HTTPHEADER => array(
		    'Authorization: Bearer '.$_SESSION['token']
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$response = json_decode($response);


		return $response;

/* 		 print_r( $response );
		if (isset($response->code) && $response->code > 0) {
			return $response;
		}else{
			return array();
		} */
	}

	public static function update($name, $description, $slug, $brand_id){
		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://crud.jonathansoto.mx/api/brands',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'PUT',
		CURLOPT_POSTFIELDS => "name=".$name."&description=".$description."&slug=".$slug."&id=".$brand_id,
		CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer '.$_SESSION['token']
		),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$response = json_decode($response);
		if (isset($response->code) && $response->code > 0) {
			return $response->data;
		}else{
			return array();
		}
	}

}

?>