<?php  
include_once 'Validator.php';
include_once "config.php";

if (isset($_POST['action'])) {

	if ( isset($_POST['global_token']) && 
		$_POST['global_token'] == $_SESSION['global_token']) {

		switch ($_POST['action']) {
			case 'create':{

				// public static function create($name, $slug, $description, $features, $brand_id, $cover, $categories, $tags){

 		 		$name = strip_tags(trim($_POST['name']));
				$slug = strip_tags(trim($_POST['slug']));
				$description = strip_tags(trim($_POST['description']));
				$features = strip_tags(trim($_POST['features']));
				$brand_id = strip_tags(trim($_POST['brand_id']));
				$cover = $_FILES['cover']['tmp_name'];
			
				// $categories = strip_tags(trim($_POST['categories']));
				$validationResult = Validator::createProduct($name, $slug, $description, $features, $brand_id, $_FILES['cover']['type']);

/* 				print_r($validationResult);
 				$tags =  [3,4];
				$categories = [1,2]; */
 				$tags = $_POST['tags'];
				$categories = $_POST['categories'];
			/* 	
				print_r( Validator::integerArray($tags));
				print_r( Validator::integerArray($categories)); */
					
				$suficientesTags = count($tags)>=2;
				$suficientesCats = count($categories)>=2;

				

				if($suficientesCats && $suficientesTags && $validationResult['status'] == '1' && Validator::integerArray($categories) && Validator::integerArray($tags)){
					$_SESSION['_MESSAGE'] = ProductsController::create($name, $slug, $description, $features, $brand_id, $cover, $categories,$tags);
				}else{
					$_SESSION['_MESSAGE'] = $validationResult['data'];
				}

				header('Location: '.$_SERVER['HTTP_REFERER']);  
				break; 
			}
			case 'update':{

			 
				 
				$name = strip_tags(trim($_POST['name']));
				$slug = strip_tags(trim($_POST['slug']));
				$description = strip_tags(trim($_POST['description']));
				$features = strip_tags(trim($_POST['features']));
				$brand_id = strip_tags(trim($_POST['brand_id']));
				$id = strip_tags(trim($_POST['id']));
 
				$validationResult = Validator::updateProduct($name, $slug, $description, $features, $brand_id, $id);
				

				
				/* $tags = [1,2,3];
				$categories = [1,2,3]; */

				$tags = $_POST['tags'];
				$categories = $_POST['categories'];
							
				$suficientesTags = count($tags)>=2;
				$suficientesCats = count($categories)>=2;



				if($suficientesCats && $suficientesTags && $validationResult['status'] == '1' && Validator::integerArray($categories) && Validator::integerArray($tags)){
					$_SESSION['_MESSAGE'] = ProductsController::edit($name, $slug, $description, $features, $brand_id, $id, $categories, $tags);
				}else{
					$_SESSION['_MESSAGE'] = $validationResult['data'];
				}

				header('Location: '.$_SERVER['HTTP_REFERER']);  
			
	  
			break;
		}

			case 'delete':
			
				$productController = new ProductsController();
				$valid = Validator::integer(strip_tags(trim($_POST['id'])));
				if ($valid){
					$_SESSION['_MESSAGE'] = ($productController->remove($_POST['id']));
				}else{
					$_SESSION['_MESSAGE'] = 'Hay algo mal con ese ID';
				}
				  header('Location: '.$_SERVER['HTTP_REFERER']);  
			break; 
		}

	}
}

Class ProductsController
{
	public function getProducts()
	{

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
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

	public function getProduct($slug)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/slug/'.$slug,
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


	/*     <form action="app/ProductsController.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="name">
    <input type="text" name="slug" placeholder="slug">
    <input type="text" name="description" placeholder="desc">
    <input type="text" name="features" placeholder="features">
    <input type="text" name="brand_id" placeholder="brand id">
    <input type="file" name="cover" placeholder="cover">
    <input type="hidden" name="global_token" value="<?= $_SESSION['global_token']?>">   
    <input type="text" name="action" value="create" id="">
        <input type="submit" name="" id="">
    </form> */

	public static function createProduct($name,$slug,$description,$features,$brand_id, $image)
	{
 

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS => array(
		  	'name' => $name,
		  	'slug' => $slug,
		  	'description' => $description,
		  	'features' => $features,
		  	'brand_id' => $brand_id,
		  	'cover'=> new CURLFILE($image)
		  ),
		  CURLOPT_HTTPHEADER => array(
		    'Authorization: Bearer '.$_SESSION['token']
		  ),
		)); 

		$response = curl_exec($curl); 
		curl_close($curl);
		$response = json_decode($response);



		return $response;
/* 
		if ( isset($response->code) && $response->code > 0) {

			header("Location:../products?success=true");
		}else{ 

			#var_dump($response);
			header("Location:../products?error=true");
		} */

	}

	public static function updateProduct($name,$slug,$description,$features,$brand_id,$id)
	{
 

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'PUT',
		  CURLOPT_POSTFIELDS => 'name='.$name.'&slug='.$slug.'&description='
		  .$description.'&features='.$features.'&brand_id='.$brand_id.'&id='.$id,
		  CURLOPT_HTTPHEADER => array(
		    'Authorization: Bearer '.$_SESSION['token'],
		    'Content-Type: application/x-www-form-urlencoded'
		  ),
		));


		$response = curl_exec($curl); 
		curl_close($curl);
		$response = json_decode($response);


		return $response;

/* 		if ( isset($response->code) && $response->code > 0) {

			header("Location:../products?success=true");
		}else{ 

			#var_dump($response);
			header("Location:../products?error=true");
		}
 */
	}

	public function remove($id)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/'.$id,
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


		return $response;

/* 		if ( isset($response->code) && $response->code > 0) {
			
			return true;
		}else{

			return false;
		} */
	}



	// ESTOS SON LOS OTROS



	public static function create($name, $slug, $description, $features, $brand_id, $cover, $categories, $tags){
		
	$curl = curl_init();

	curl_setopt_array($curl, array(
	CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => '',
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 0,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => 'POST',
	CURLOPT_POSTFIELDS => array('name' => $name,'slug' => $slug,'description' => $description,'features' => $features,'brand_id' => $brand_id,'cover'=> new CURLFILE($cover),'categories[0]' => $categories[0],'categories[1]' => $categories[1],'tags[0]' => $tags[0],'tags[1]' => $tags[1]),
	CURLOPT_HTTPHEADER => array(
		'Authorization: Bearer '.$_SESSION['token']
		// 'Authorization: Bearer 3|JSvLL27EhMfH70onI5sSZP6ROwcdSsHQU8cm7k9X'
	),
	));

	$response = curl_exec($curl);

	curl_close($curl);
	return  $response;

	}

	public static function edit($name, $slug, $description, $features, $brand_id, $id, $categories, $tags){
		

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'PUT',
		  CURLOPT_POSTFIELDS => 'name='.$name.'&slug='.$slug.'&description='.$description.'&features='.$features.'&brand_id='.$brand_id.'&id='.$id.'&categories%5B0%5D='.$categories[0].'&categories%5B1%5D='.$categories[1].'&tags%5B0%5D='.$tags[0].'&tags%5B1%5D='.$tags[1].'',
		  CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer '.$_SESSION['token'],
			// 'Authorization: Bearer 3|JSvLL27EhMfH70onI5sSZP6ROwcdSsHQU8cm7k9X',
			'Content-Type: application/x-www-form-urlencoded'
		  ),
		));
		
		$response = curl_exec($curl);
		
		curl_close($curl);
		echo $response;
		

	}
}


?>