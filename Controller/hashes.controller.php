<?php

class HashesController{

    public function __CONSTRUCT(){
    }

    public function Index(){
        require_once 'view/header.php';
        require_once 'view/hashes/index.php';
        require_once 'view/footer.php';
    }

    public function Process(){
        header('Content-Type: application/json');

        if(strlen(trim($_REQUEST['texto']))){
            $response['success'] = true;

            $table = array();
            array_push($table,$this->set_sha512($_REQUEST["texto"],trim($_REQUEST["hash"])));
            array_push($table,$this->set_hmac($_REQUEST["texto"],trim($_REQUEST["hash"])));
            array_push($table,$this->set_whirlpool($_REQUEST["texto"],trim($_REQUEST["hash"])));
            
            $response["table"] = $table;
        } else {
            $response['success'] = false;
            $response['message'] = "O texto não pode ser vazio!";
        }
        $json_response = json_encode($response);
		echo $json_response;
    }

    public function set_sha512($texto,$texto_user = ""){
        
        $hash = hash('sha512', $texto);
        
        if(!strlen($texto_user)){
            $user = "Não Informado";
        } else {
            $user = ($texto_user == $hash) ? "Igual" : "Diferente";
        }
        
        $array = array("method" => "SHA512", "hash" => $hash, "user" => $user);
        return $array;
    }

    public function set_hmac($texto,$texto_user = ""){

        $token = "MT4Rules";
        
        $hash = hash_hmac('sha512', $texto, $token);
        
        if(!strlen($texto_user)){
            $user = "Não Informado";
        } else {
            $user = ($texto_user == $hash) ? "Igual" : "Diferente";
        }
        
        $array = array("method" => "HMAC - SHA512", "hash" => $hash, "user" => $user);
        return $array;
    }

    public function set_whirlpool($texto,$texto_user = ""){

        $hash = hash('whirlpool', $texto);
        
        if(!strlen($texto_user)){
            $user = "Não Informado";
        } else {
            $user = ($texto_user == $hash) ? "Igual" : "Diferente";
        }
        
        $array = array("method" => "WHIRLPOOL", "hash" => $hash, "user" => $user);
        return $array;
    }

    

}
