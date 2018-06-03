<?php

class CriptografiaController{

    public function __CONSTRUCT(){
    }

    public function Index(){
        require_once 'view/header.php';
        require_once 'view/criptografia/index.php';
        require_once 'view/footer.php';
    }

    public function Criptografar(){
        header('Content-Type: application/json');

        if(strlen($this->clean($_REQUEST['texto']))){
            $response['cesar'] = $this->cesar($this->clean($_REQUEST['texto']),0);
            $response['aes'] = $this->aes_salt($this->clean($_REQUEST['texto']),0);
            $response['base64'] = $this->base_64($this->clean($_REQUEST['texto']),0);
            $response['natural'] = $_REQUEST['texto'];
        
            $response['success'] = true;
        } else {
            $response['success'] = false;
            $response['message'] = "O texto não pode ser vazio!";
        }
        $json_response = json_encode($response);
		echo $json_response;
    }

    public function Descriptografar(){
        header('Content-Type: application/json');
        
        if(strlen($this->clean($_REQUEST['texto']))){
            switch ((int)$_REQUEST['tipo']) {
                case 1: //Cesar
                    $natural = $this->cesar($this->clean($_REQUEST['cesar']) ,1);
                    break;
                case 2: //AES_SALT
                    $natural = $this->aes_salt($_REQUEST['aes'],1);
                    break;
                default: //Base64
                    $natural = $this->base_64($_REQUEST['base64'],1);
                    break;
            }

            $response['cesar'] = $this->cesar($natural ,0);
            $response['aes'] = $this->aes_salt($natural,0);
            $response['base64'] = $this->base_64($natural,0);
            $response['natural'] = $natural;
            $response['tipo'] = $_REQUEST['tipo'];
            
            $response['success'] = true;
        } else {
            $response['success'] = false;
            $response['message'] = "O texto não pode ser vazio!";
        }
        $json_response = json_encode($response);
		echo $json_response;
    }

    function clean($texto) {
        $texto1 = strtr(utf8_decode($texto),utf8_decode('ŠŒŽšœžŸ¥µÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýÿ+'),'SOZsozYYuAAAAAAACEEEEIIIIDNOOOOOOUUUUYsaaaaaaaceeeeiiiionoooooouuuuyy-');
        return strtolower($texto1);
    }

    public function cesar($texto,$acao = 0){
        $a = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', ' ');
        $b = str_split($texto); 
        $num = strlen($texto); 
        $max = count($a) - 1; 
        $deslocamento = 3; //Padrão 3 de deslocamento

        $retorno = "";
        
        for($i=0; $i<$num; ++$i){
            if($b[$i] == in_array($b[$i], $a)){
                foreach($a as $chave => $valor){
                    if($b[$i] == $valor){
                    $c[$valor] = $chave;
                    }
                }
            }
        }

        if(!$acao){
            for($i=0; $i < $num ; $i++) {
                $number = $c[$b[$i]]; 
                if ($number == '26') {
                    $last = ' ';
                } else {
                    if ($deslocamento < 0) {
                    $final = $number + $deslocamento;
                    } else {
                    $final = $number + $deslocamento;
                    }
                    if ($final < 0) {
                        $last = $a[$final + $max];
                    } elseif ($final > $max - 1) {
                        $last = $a[$final - $max];
                    } else {
                        $last = $a[$final];
                    }
                }
                $retorno .= $last;
            }
        } else {
            for($i=0; $i < $num ; $i++) {
                $number = $c[$b[$i]];
                if ($number == '26') {
                    $last = ' ';
                } else {
                    if ($deslocamento < 0) {
                    $final = $number - $deslocamento;
                    } else { 
                    $final = $number - $deslocamento;
                    }
                    if ($final < 0) { 
                        $last = $a[$final + $max];
                    } elseif ($final > $max - 1) {
                        $last = $a[$final - $max];
                    } else {
                        $last = $a[$final];
                    }
                }
                $retorno .= $last;
            }
        }

        return $retorno;
    }

    public function aes_salt($texto,$acao = 0){

        $salt = "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCqGKukO1De7zhZj6+H0qtjTkVxwTCpvKe4eCZ0FPqri0cb2JZfXJ/DgYSF6vUpwmJG8wVQZKjeGcjDOL5UlsuusFncCzWBQ7RKNUSesmQRMSGkVb1/3j+skZ6UtW+5u09lHNsj6tQ51s1SPrCBkedbNf0Tp0GbMJDyR4e9T04ZZwIDAQAB";

        if(!$acao){
            $aes_salt = openssl_encrypt("$texto", 'aes-256-cbc', "$salt");
            $msg = "$salt:$aes_salt";
        } else {
            $components = explode(':',$texto);

            $salt = $components[0];
            $aes_salt = $components[1];

            $msg = openssl_decrypt("$aes_salt", 'aes-256-cbc', "$salt");
        }
        return $msg;
    }

    public function base_64($string,$acao = 0){
        if(!$acao){
            return base64_encode($string);
        }
        else {
            return base64_decode($string);
        }
    }

}
