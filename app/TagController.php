<?php 
include 'config.php';
include_once 'Validator.php';


if (isset($_POST['action'])) {

    if (isset($_POST['global_token']) && 
       $_POST['global_token'] == $_SESSION['global_token']){
            switch ($_POST['action']) {
                case 'create':{
                    $name =  strip_tags( trim($_POST['name']));
                    $description =  strip_tags( trim($_POST['description']));
                    $slug =  strip_tags( trim($_POST['slug']));
                    $validationResult = Validator::createTag($name, $description, $slug);
                    // print_r( $validationResult );

                    if($validationResult['status'] == '1'){
                        $_SESSION['_MESSAGE'] = TagController::create($name, $description, $slug);
                    }else {
                        $_SESSION['_MESSAGE'] = $validationResult['data'];
                    }
                    print_r( $_SESSION['_MESSAGE']);
                    header('Location: '.$_SERVER['HTTP_REFERER']);  
                    break;
                }

                case 'edit':{
                    $name =  strip_tags( trim($_POST['name']));
                    $description =  strip_tags( trim($_POST['description']));
                    $slug =  strip_tags( trim($_POST['slug']));
                    $id =  strip_tags( trim($_POST['id']));
                    $validationResult = Validator::createTag($name, $description, $slug, $id);


                    if($validationResult['status'] == '1'){
                        $_SESSION['_MESSAGE'] = TagController::edit($name, $description, $slug, $id);
                    }else {
                        $_SESSION['_MESSAGE'] = $validationResult['data'];
                    }
                 
                    header('Location: '.$_SERVER['HTTP_REFERER']);  
                    break;
                    
                }

                case 'delete':{
                    $id = $_POST['id'];
                    $valid = Validator::integer($id);
                    if($valid){
                        $_SESSION['_MESSAGE'] = TagController::delete($id);
                    }else{
                        $_SESSION['_MESSAGE'] = 'Hay algo mal con ese ID';
                    }
                    header('Location: '.$_SERVER['HTTP_REFERER']);  
                    break;
                }
            }

        }


    }


class TagController{
    public static function getAll(){
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/tags',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            // 'Authorization: Bearer 3|JSvLL27EhMfH70onI5sSZP6ROwcdSsHQU8cm7k9X'
            'Authorization: Bearer '.$_SESSION['token'],
        ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response);
        return $response->data;
    }


    /*  <form action="app/TagController.php" method="POST">
        <input type="text" name="name" placeholder="name">
        <input type="text" name="description" placeholder="">
        <input type="text" name="slug" placeholder="slug">
        <input type="hidden" name="global_token" value="<?= $_SESSION['global_token']?>">   
        <input type="text" name="action" value="create" id="">
        <input type="submit" name="" id="">
    </form> */

    public static function create($name, $description, $slug){
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/tags',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('name' => $name,'description' => $description,'slug' => $slug),
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$_SESSION['token'],
            // 'Authorization: Bearer 3|JSvLL27EhMfH70onI5sSZP6ROwcdSsHQU8cm7k9X'
        ),
        ));
        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }


    /*     <form action="app/TagController.php" method="POST">
        <input type="text" name="name" placeholder="name">
        <input type="text" name="description" placeholder="">
        <input type="text" name="slug" placeholder="slug">
        <input type="text" name="id" placeholder="id">
        <input type="hidden" name="global_token" value="<?= $_SESSION['global_token']?>">   
        <input type="text" name="action" value="edit" id="">
        <input type="submit" name="" id="">
    </form> */

    public static function edit($name, $description, $slug, $id){
        $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://crud.jonathansoto.mx/api/tags',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'PUT',
    CURLOPT_POSTFIELDS => 'name='.$name.'&description='.$description.'&slug='.$slug.'&id='.$id,
    CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer '.$_SESSION['token'],
        // 'Authorization: Bearer 3|JSvLL27EhMfH70onI5sSZP6ROwcdSsHQU8cm7k9X',
        'Content-Type: application/x-www-form-urlencoded'
    ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return $response;
    }


    /*     <form action="app/TagController.php" method="POST">
    <input type="text" name="id" placeholder="id">
        <input type="hidden" name="global_token" value="<?= $_SESSION['global_token']?>">   
        <input type="text" name="action" value="delete" id="">
        <input type="submit" name="" id="">
    </form> */
    public static function delete($id){

    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://crud.jonathansoto.mx/api/tags/'.$id,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'DELETE',
    CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer '.$_SESSION['token'],
        // 'Authorization: Bearer 3|JSvLL27EhMfH70onI5sSZP6ROwcdSsHQU8cm7k9X'
    ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;

    }
}