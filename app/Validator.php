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
    /*    CURLOPT_POSTFIELDS => 'name=Jonathan%20&lastname=Soto%201&email=jsoto%40abcs.mx&
    phone_number=6123480678&created_by=jonathan%20soto&role=Administrador&password=password123&id=112', */

 
    public static function password($value){
        return strlen($value) >= 10;
    }

    public static function image($value){
        // echo $value;
        return preg_match('/image\/jpe?g/',$value);
    }

    public static function name($value){
        return (preg_match("/^[a-zA-Z']+$/",$value));// letras mayusculas , minusculas y espacios

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