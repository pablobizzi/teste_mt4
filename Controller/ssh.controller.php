<?php
require_once 'model/dispositivo.php';

class SshController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new dispositivo();
    }

    public function Index(){
        require_once 'view/header.php';
        require_once 'view/ssh/index.php';
        require_once 'view/footer.php';
    }

    public function connect(){
        $disp = new dispositivo();

        if(isset($_REQUEST['id_dispositivo'])){
            $disp = $this->model->select($_REQUEST['id_dispositivo']);
        }

        if($disp->id_dispositivo){

            var_dump(extension_loaded('ssh2'));

            // require_once 'view/header.php';
            // require_once 'view/dispositivo/edit.php';
            // require_once 'view/footer.php';

            $connection = ssh2_connect($disp->hostname, 22);
            ssh2_auth_password($connection, $_REQUEST["usuario"], $_REQUEST["senha"]);

            $stream = ssh2_shell($connection, 'vt102', null, 80, 24, SSH2_TERM_UNIT_CHARS);
        }
        else {
            header('Location: index.php');
        }
    }

}
