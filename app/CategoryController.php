<?php
include_once "config.php";
include_once 'Validator.php';
if (isset($_POST['action'])) {
	
	if (isset($_POST['global_token']) && 
	   $_POST['global_token'] == $_SESSION['global_token']){
    
        switch($_POST['action']){
            case 'create':{
                // $curl = curl_init($name, $description, $slug, $category_id);
                $name = strip_tags(trim($_POST['name']));
                $description = strip_tags(trim($_POST['description']));
                $slug = strip_tags(trim($_POST['slug']));
                $category_id = strip_tags(trim($_POST['category_id']));
                $validation = Validator::createCategory($name, $description, $slug, $category_id);
                if ($validation['status'] == '1'){
                    $_SESSION['_MESSAGE'] = CategoryController::create($name, $description, $slug, $category_id);
                }else{
                     $_SESSION['_MESSAGE'] =  $validation['data']; 
                }
                header('Location: '.$_SERVER['HTTP_REFERER']);	
                break;
            }

            case 'edit':{
                // $curl = curl_init($name, $description, $slug, $category_id);
                $id = strip_tags(trim($_POST['id']));
                $name = strip_tags(trim($_POST['name']));
                $description = strip_tags(trim($_POST['description']));
                $slug = strip_tags(trim($_POST['slug']));
                $category_id = strip_tags(trim($_POST['category_id']));
                $validation = Validator::editCategory($id, $name, $description, $slug, $category_id);
                if ($validation['status'] == '1'){
                    $_SESSION['_MESSAGE'] = CategoryController::edit($id, $name, $description, $slug, $category_id);
                }else{
                        $_SESSION['_MESSAGE'] =  $validation['data']; 
                }
                header('Location: '.$_SERVER['HTTP_REFERER']);	
                break;
            }

            case 'delete':{
                $valid = Validator::integer($_POST['id']);
                if($valid){
                    $_SESSION['_MESSAGE'] = CategoryController::delete($_POST['id']);
                }else{
                    $_SESSION['_MESSAGE'] = 'Hay algo mal con ese ID';
                }
                // print_r($_SESSION['_MESSAGE']);
                header('Location: '.$_SERVER['HTTP_REFERER']);	
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

    /* 
     <form action="app/CategoryController.php" method="post">
    <input type="text" name="name" placeholder="name" id="">
    <input type="text" name="description" placeholder="desc" id="">
    <input type="text" name="slug" placeholder="slug" id="">
    <input type="text" name="category_id" placeholder="cat id" id="">

    <input type="hidden" name="global_token" value="<?= $_SESSION['global_token']?>">   
    <input type="text" name="action" value="create" id="">
    <input type="submit" name="" id="">
 </form>
 */

    public static function create($name, $description, $slug, $category_id){
        
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://crud.jonathansoto.mx/api/categories',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array('name' => $name,'description' => $description,'slug' => $slug,'category_id' => $category_id),
    CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer '.$_SESSION['token']
        // 'Authorization: Bearer 3|JSvLL27EhMfH70onI5sSZP6ROwcdSsHQU8cm7k9X'
    ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return $response;
    }


    // el ID de la categoria en especifico es el primer ID. Todas tienen el category ID en 1 

    /* 
    <form action="app/CategoryController.php" method="post">
        <input type="text" name="name" placeholder="name" id="">
        <input type="text" name="id" placeholder="id" id="">
        <input type="text" name="description" placeholder="desc" id="">
        <input type="text" name="slug" placeholder="slug" id="">
        <input type="text" name="category_id" placeholder="cat id" id="">
        <input type="hidden" name="global_token" value="<?= $_SESSION['global_token']?>">   
        <input type="text" name="action" value="edit" id="">
        <input type="submit" name="" id="">
    </form> */
    public static function edit($id, $name, $description, $slug, $category_id){
        
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://crud.jonathansoto.mx/api/categories',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'PUT',
    CURLOPT_POSTFIELDS => 'id='.$id.'&name='.$name.'&description='.$description.'&slug='.$slug.'&category_id='.$category_id,
    CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer '.$_SESSION['token'],
        'Content-Type: application/x-www-form-urlencoded'
    ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return $response;

    }

/* 
    <form action="app/CategoryController.php" method="post">
        <input type="text" name="id" id="">
        <input type="hidden" name="global_token" value="<?= $_SESSION['global_token']?>">   
        <input type="text" name="action" value="delete" id="">
        <input type="submit" name="" id="">
    </form>
    </form>
 <?php  */
    public static function delete($id){
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://crud.jonathansoto.mx/api/categories/'.$id,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'DELETE',
    CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer '.$_SESSION['token'],
    ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    return $response;

    }
}