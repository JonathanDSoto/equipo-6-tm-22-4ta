<?php class Validator{

/* $a = Validator::createBrand('vload','dfdsgdfad', 'qewefgr');
print_r($a);
	if($a['status'] == 1){
		echo 'can create';
	}else{*/
    public static function createBrand($name, $slug, $description, $brand_id = 1){
        $data = [$name, $slug, $description]; 
        array_walk($data, 'Validator::trim_value');
        $errors = ['status'=> '', 'data'=> []];
        // array_push($errors['errors'],(Validator::name($name)));
        // echo (Validator::slug($slug));
        array_push($errors['data'], Validator::name($name) ?  null : 'nombre mal' ); 
        array_push($errors['data'], Validator::slug($slug) ?  null : 'slug mal' );
        array_push($errors['data'], Validator::name($description) ?  null : 'descripcion mal' );
        array_push($errors['data'], Validator::integer($brand_id) ?  null :'brand id mal' );
        
        $errors['data'] = array_filter($errors['data']);
        $errors['status'] = !empty($errors['data'])?  '2' :'1'; 
        return ($errors);
    }

    public static function createUser($name, $lastname ,$email, $phone_number, $created_by, $role, $password, $photo_type = 'image/jpeg', $user_id = '999'){
        $data = [$name, $lastname ,$email, $phone_number, $created_by, $role, $password, $photo_type, $user_id ]; 
        array_walk($data, 'Validator::trim_value');
        $errors = ['status'=> '', 'data'=> []];

        array_push($errors['data'], Validator::person_name($name) ?  null : 'nombre mal');
        array_push($errors['data'], Validator::name($lastname) ?  null : 'apellido mal');
        // array_push($errors['data'], Validator::name($lastname) ?  null : 'apellido mal');
        array_push($errors['data'], Validator::email($email) ?  null : 'correo mal');
        array_push($errors['data'], Validator::phone($phone_number) ?  null : 'telefono mal');
        array_push($errors['data'], Validator::person_name($created_by) ?  null : 'created by mal');
        array_push($errors['data'], Validator::name($role) ?  null : 'role by mal');
        array_push($errors['data'], Validator::image($photo_type) ?  null : 'image type mal');
        array_push($errors['data'], Validator::password($password) ?  null : 'contraseña menor a 10 simbolos');
        array_push($errors['data'], Validator::integer($user_id) ?  null : 'user_id mal');
        

        $errors['data'] = array_filter($errors['data']);
        $errors['status'] = !empty($errors['data'])?  '2' :'1'; 
        return ($errors);
    }

// CURLOPT_POSTFIELDS => array('name' => $args['name'],'email' => $args['email'],'password' => $args['password'],'phone_number' =>   $args['phone_number'],'is_suscribed' => '1','level_id' => '1'),

    public static function createClient($name, $email, $password, $phone_number, $client_id = '1'){
        $data = [$name, $email, $password, $phone_number]; 
        array_walk($data, 'Validator::trim_value');
        $errors = ['status'=> '', 'data'=> []];

        array_push($errors['data'], Validator::person_name($name) ?  null : 'nombre mal');
        array_push($errors['data'], Validator::email($email) ?  null : 'correo mal');
        array_push($errors['data'], Validator::password($password) ?  null : 'contraseña menor a 10 simbolos');
        array_push($errors['data'], Validator::phone($phone_number) ?  null : 'telefono mal');
        array_push($errors['data'], Validator::integer($client_id) ?  null : 'client_id mal');

        $errors['data'] = array_filter($errors['data']);
        $errors['status'] = !empty($errors['data'])?  '2' :'1'; 
        return ($errors);
    }

    public static function createPresentation($description, $code, $weigth_in_grams, $status, $cover, $stock, $stock_min, $stock_max, $product_id){
        $data = [$description, $code, $weigth_in_grams, $status, $cover, $stock, $stock_min, $stock_max, $product_id]; 
        array_walk($data, 'Validator::trim_value');
        $errors = ['status'=> '', 'data'=> []];

        array_push($errors['data'] ,Validator::name($description) ? null: 'descripcion mal');
        array_push($errors['data'] ,Validator::name($code) ? null: 'codigo mal');
        array_push($errors['data'] ,Validator::integer($weigth_in_grams) ? null: 'peso en gramos mal');
        array_push($errors['data'] ,Validator::name($status) ? null: 'status mal');
        array_push($errors['data'] ,Validator::image($cover) ? null: 'cover mal');
        array_push($errors['data'] ,Validator::integer($stock) ? null: 'inventario mal');
        array_push($errors['data'] ,Validator::integer($stock_min) ? null: 'inventario minimo mal');
        array_push($errors['data'] ,Validator::integer($stock_max) ? null: 'inventario maximo mal');
        array_push($errors['data'] ,Validator::integer($product_id) ? null: 'product id mal');

        $errors['data'] = array_filter($errors['data']);
        $errors['status'] = !empty($errors['data'])?  '2' :'1'; 
        return ($errors);
    }

         //    public static function createAddress($first_name, $last_name,$street_and_user_number, $postal_code, $city, $province, $phone_number, $is_billing_address, $client_id){
    public static function createAddress($first_name, $last_name, $street_and_user_number, $postal_code, $city, $province, $phone_number, $is_billing_address, $client_id, $address_id = '999'){
        $data = [$first_name, $last_name, $street_and_user_number, $postal_code, $city, $province, $phone_number, $is_billing_address, $client_id, $address_id]; 
        array_walk($data, 'Validator::trim_value');
        $errors = ['status'=> '', 'data'=> []];

        array_push($errors['data'] ,Validator::name($first_name) ? null: 'primer nombre mal');
        array_push($errors['data'] ,Validator::name($last_name) ? null: 'apellido mal');
        array_push($errors['data'] ,Validator::street_and_user_number($street_and_user_number) ? null: 'calle y numero mal');
        array_push($errors['data'] ,Validator::codigo_postal($postal_code) ? null: 'codigo postal mal (5 numeros enteros)');
        array_push($errors['data'] ,Validator::letters_spaces($city) ? null: 'ciudad mal');
        array_push($errors['data'] ,Validator::letters_spaces($province) ? null: 'provincia mal');
        array_push($errors['data'] ,Validator::phone($phone_number) ? null: 'Telefono mal');
        array_push($errors['data'] ,Validator::integer($is_billing_address) ? null: '{es direccion de facturacion} mal');
        array_push($errors['data'] ,Validator::integer($client_id) ? null: 'ID del cliente mal');
        array_push($errors['data'] ,Validator::integer($address_id) ? null: 'ID de direccion mal');

        $errors['data'] = array_filter($errors['data']);
        $errors['status'] = !empty($errors['data'])?  '2' :'1'; 
        return ($errors);
    }

    public static function letters_spaces($value){
        return preg_match('/[A-Za-z\s]+$/', $value);
    }
    public static function codigo_postal($value){
        return preg_match('/^[0-9]{5}$/', $value);
    }

    public static function street_and_user_number($value){
        return preg_match('/[a-zA-Z1-9À-ÖØ-öø-ÿ]+\.?(( |\-)[a-zA-Z1-9À-ÖØ-öø-ÿ]+\.?)* (((#|[nN][oO]\.?) ?)?\d{1,4}(( ?[a-zA-Z0-9\-]+)+)?)/',$value);
    }
  
    public static function password($value){
        return strlen($value) >= 10;
    }

    public static function image($value){
        // echo $value;
        return preg_match('/image\/jpe?g/',$value);
    }

    public static function name($value){
        return (preg_match("/^[a-zA-Z]+$/",$value));// letras mayusculas , minusculas y espacios

    }

    public static function person_name($value){//Nombre único obligatorio, nombres adicionales opcionales, CON espacios, CON caracteres especiales:
        return  (preg_match("/^[A-Za-z]+((\s)?((\'|\-|\.)?([A-Za-z])+))*$/",$value));
    }

    public static function slug($value){
        return preg_match('/^[a-z0-9]+(?:-[a-z0-9]+)*$/', $value);
    }

    public static function trim_value(&$value) { 
        $value = trim($value);
        echo '$'.$value.'&<br>';
    }

    public static function integer($value){
        return preg_match('/^[0-9]+$/', $value);
    }

    public static function phone($value){
        echo $value . 'com  telef';
         return preg_match('/^[0-9]{10}$/', $value);
    }
    public static function email($value){
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }


 
}