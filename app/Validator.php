<?php 
include_once 'Messages.php';

class Validator {

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
        array_push($errors['data'], Validator::letters_spaces($description) ?  null : 'descripcion mal' );
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

        array_push($errors['data'] ,Validator::letters_spaces($description) ? null: 'descripcion mal');
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
     // $curl = curl_init($name, $description, $slug, $category_id);
    public static function createCategory($name, $description, $slug, $category_id){
        $data = [$name, $description, $slug, $category_id]; 
        array_walk($data, 'Validator::trim_value');
        $errors = ['status'=> '', 'data'=> []];

        // array_push($errors['data'] ,Validator::integer($id) ? null: 'ID mal');
        array_push($errors['data'] ,Validator::letters_spaces($name) ? null: 'nombre mal');
        array_push($errors['data'] ,Validator::letters_spaces($description) ? null: 'descripcion mal');
        array_push($errors['data'] ,Validator::letters_spaces($slug) ? null: 'slug mal');
        array_push($errors['data'] ,Validator::integer($category_id) ? null: 'ID de categoria mal');


        $errors['data'] = array_filter($errors['data']);
        $errors['status'] = !empty($errors['data'])?  '2' :'1'; 
        return ($errors);

    }

    public static function editCategory($id, $name, $description, $slug, $category_id){
        $data = [$id,$name, $description, $slug, $category_id]; 
        array_walk($data, 'Validator::trim_value');
        $errors = ['status'=> '', 'data'=> []];

        array_push($errors['data'] ,Validator::integer($id) ? null: 'ID mal');
        array_push($errors['data'] ,Validator::letters_spaces($name) ? null: 'nombre mal');
        array_push($errors['data'] ,Validator::letters_spaces($description) ? null: 'descripcion mal');
        array_push($errors['data'] ,Validator::letters_spaces($slug) ? null: 'slug mal');
        array_push($errors['data'] ,Validator::integer($category_id) ? null: 'ID de categoria mal');


        $errors['data'] = array_filter($errors['data']);
        $errors['status'] = !empty($errors['data'])?  '2' :'1'; 
        return ($errors);
    }

    public static function createTag($name, $description, $slug){
        $data = [$name, $description, $slug]; 
        array_walk($data, 'Validator::trim_value');
        $errors = ['status'=> '', 'data'=> []];

        // array_push($errors['data'], Validator::letters_spaces($name) ?  null : sprintf(Message::WRONG_INTEGER, 'ID')); 
        array_push($errors['data'], Validator::letters_spaces($name) ?  null : 'nombre mal' );
        array_push($errors['data'], Validator::letters_spaces($description) ?  null : 'descripcion mal' );
        array_push($errors['data'], Validator::slug($slug) ?  null : 'slug mal' );
        // array_push($errors['data'], Validator::integer($id) ?  null : 'ID mal' );


        $errors['data'] = array_filter($errors['data']);
        $errors['status'] = !empty($errors['data'])?  '2' :'1'; 
        return ($errors);

    }

    public static function editTag($name, $description, $slug, $id){
        $data = [$name, $description, $slug, $id]; 
        array_walk($data, 'Validator::trim_value');
        $errors = ['status'=> '', 'data'=> []];

        // array_push($errors['data'], Validator::letters_spaces($name) ?  null : sprintf(Message::WRONG_INTEGER, 'ID')); 
        array_push($errors['data'], Validator::letters_spaces($name) ?  null : 'nombre mal' );
        array_push($errors['data'], Validator::letters_spaces($description) ?  null : 'descripcion mal' );
        array_push($errors['data'], Validator::slug($slug) ?  null : 'slug mal' );
        array_push($errors['data'], Validator::integer($id) ?  null : 'ID mal' );


        $errors['data'] = array_filter($errors['data']);
        $errors['status'] = !empty($errors['data'])?  '2' :'1'; 
        return ($errors);

    }
 
    public static function createProduct($name, $slug, $description, $features, $brand_id, $photo_type){
        $data = [$name, $slug, $description, $features, $brand_id, $photo_type]; 
        array_walk($data, 'Validator::trim_value');
        $errors = ['status'=> '', 'data'=> []];

        array_push($errors['data'], Validator::letters_spaces($name) ?  null : 'nombre mal' );
        array_push($errors['data'], Validator::slug($slug) ?  null : 'slug mal' );
        array_push($errors['data'], Validator::letters_spaces($description) ?  null : 'descripcion mal' );
        array_push($errors['data'], Validator::letters_spaces($features) ?  null : 'caracteristicas mal' );
        array_push($errors['data'], Validator::integer($brand_id) ?  null : 'ID de marca mal' );
        array_push($errors['data'], Validator::image($photo_type) ?  null : 'image type mal');
      
    

        $errors['data'] = array_filter($errors['data']);
        $errors['status'] = !empty($errors['data'])?  '2' :'1'; 
        return ($errors);

    }


    public static function updateProduct($name, $slug, $description, $features, $brand_id, $id){
        $data = [$name, $slug, $description, $features, $brand_id, $id]; 
        array_walk($data, 'Validator::trim_value');
        $errors = ['status'=> '', 'data'=> []];

        array_push($errors['data'], Validator::letters_spaces($name) ?  null : 'nombre mal' );
        array_push($errors['data'], Validator::slug($slug) ?  null : 'slug mal' );
        array_push($errors['data'], Validator::letters_spaces($description) ?  null : 'descripcion mal' );
        array_push($errors['data'], Validator::letters_spaces($features) ?  null : 'caracteristicas mal' );
        array_push($errors['data'], Validator::integer($brand_id) ?  null : 'ID de marca mal' );
        array_push($errors['data'], Validator::integer($id) ?  null : 'ID del producto mal' );


        
        $errors['data'] = array_filter($errors['data']);
        $errors['status'] = !empty($errors['data'])?  '2' :'1'; 
        return ($errors);
    }

   //eate($name, $code, $percentage_discount, $min_amount_required, $min_product_required, $start_date, $end_date, $max_uses, $count_uses, $valid_only_first_purchase, $status){
    public static function createCoupon($name, $code, $percentage_discount, $min_amount_required, $min_product_required, $start_date, $end_date, $max_uses, $count_uses, $valid_only_first_purchase, $status, $id='999'){
    $data = [$name, $code, $percentage_discount, $min_amount_required, $min_product_required, $start_date, $end_date, $max_uses, $count_uses, $valid_only_first_purchase, $status, $id]; 
    array_walk($data, 'Validator::trim_value');
    $errors = ['status'=> '', 'data'=> []];

    array_push($errors['data'], Validator::coupon_name($name) ?  null : 'nombre del cupon mal' );
    array_push($errors['data'], Validator::letras_y_numeros_no_espacios($code) ?  null : 'codigo del cupon mal' );
    array_push($errors['data'], Validator::integer($percentage_discount) ?  null : 'porcentaje de descuento del cupon mal' );
    array_push($errors['data'], Validator::integer($min_amount_required) ?  null : 'Cantidad minima requerida mal' );
    array_push($errors['data'], Validator::integer($min_product_required) ?  null : 'Cantidad minima de producto requerida mal' );
    array_push($errors['data'], Validator::date_yyy_mm_dd($start_date) ?  null : 'Fecha de inicio mal' );
    array_push($errors['data'], Validator::date_yyy_mm_dd($end_date) ?  null : 'Fecha de fin mal' );
    array_push($errors['data'], Validator::integer($max_uses) ?  null : 'Maximo de usos mal' );
    array_push($errors['data'], Validator::integer($count_uses) ?  null : 'Cantidad de usos mal' );
    array_push($errors['data'], Validator::integer($valid_only_first_purchase) ?  null : 'Valido solo en la primer compra mal' );
    array_push($errors['data'], Validator::integer($status) ?  null : 'Estado mal' );
    array_push($errors['data'], Validator::integer($id) ?  null : 'ID de producto mal' );
    
        
    $errors['data'] = array_filter($errors['data']);
    $errors['status'] = !empty($errors['data'])?  '2' :'1'; 
    return ($errors);
    }


    public static function kwd_integer_array($keyed_array){
        $errors = ['status'=> '', 'data'=> []];
        foreach($keyed_array as $data){
            array_push($errors['data'], Validator::integerArray(array_values($data))['status'] == 1 ?  null : $data);
        }
        $errors['data'] = array_filter($errors['data']);
        $errors['status'] = !empty($errors['data'])?  '2' :'1'; 
        return ($errors);
    }
    /*  public static function create($folio, $total, $is_paid, $client_id, $address_id, $order_status_id, 
                    $payment_type_id, $coupon_id, $presentations) */


    public static function createOrder($folio, $total, $is_paid, $client_id, $address_id, $order_status_id, 
    $payment_type_id, $coupon_id){

    $data = [$folio, $total, $is_paid, $client_id, $address_id, $order_status_id, 
    $payment_type_id, $coupon_id];
    $errors = ['status'=> '', 'data'=> []];

    array_push($errors['data'], Validator::letras_y_numeros_no_espacios($folio) ?  null : 'Folio mal' );
    array_push($errors['data'], Validator::integer($total) ?  null : 'Total mal' );
    array_push($errors['data'], Validator::integer($is_paid) ?  null : 'Pagado mal' );
    array_push($errors['data'], Validator::integer($client_id) ?  null : 'id de cliente mal' );
    array_push($errors['data'], Validator::integer($address_id) ?  null : 'id de direccion del cliente mal' );
    array_push($errors['data'], Validator::integer($payment_type_id) ?  null : 'ID de tipo de pago la orden mal' );
    array_push($errors['data'], Validator::integer($coupon_id) ?  null : 'ID de cupon la orden mal' );
    

    $errors['data'] = array_filter($errors['data']);
    $errors['status'] = !empty($errors['data'])?  '2' :'1'; 
    return ($errors);
    }



    public static function integerArray($array){
        $errors = ['status'=> '', 'data'=> []];
        foreach($array as $key => $value){
            array_push($errors['data'], Validator::integer($value) ?  null : 'El valor "'.$value.'" no es un numero entero');
            // array_push($errors['data'], Validator::integer() ?  null :$value);
        }

        
        $errors['data'] = array_filter($errors['data']);
        $errors['status'] = !empty($errors['data'])?  '2' :'1'; 
        return ($errors);
    }


 

    public static function date_yyy_mm_dd($value){
        return preg_match('/^\d{4}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])$/', $value);
    }

    public static function letters_spaces($value){
        return preg_match('/^[A-Za-z\s]+$/', $value);
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
        // echo $value . 'com  telef';@
         return preg_match('/^[0-9]{10}$/', $value);
    }
    public static function email($value){
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }


    public static function coupon_name($value){// cualquir simolo seguido de numero en porcentaje  
        return preg_match('/^.+[0-9]%$/', $value);
    }

    public static function letras_y_numeros_no_espacios($value){
        return preg_match('/^\w+$/', $value);
    }


 
}