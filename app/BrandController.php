<?php
include_once "config.php";

if (isset($_POST['action'])) {

	if (isset($_POST['global_token']) && 
	   $_POST['global_token'] == $_SESSION['global_token']){
		
			switch ($_POST['action']) {
				case 'delete':{
					return BrandController::delete($_POST['id']);
					break;
				}
				case 'create':{
					$name = strip_tags(trim($_POST['name']));
					$description = strip_tags(trim($_POST['description']));
					$slug = strip_tags(trim($_POST['slug']));
					BrandController::create($name, $slug, $description);
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


	public function getBrands()
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
		if (isset($response->code) && $response->code > 0) {
			return $response->data;
		}else{
			return array();
		}
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