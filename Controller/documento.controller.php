<?php
require_once 'model/dispositivo.php';

class DocumentoController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new dispositivo();
    }

    public function Index(){
        require_once 'view/header.php';
        require_once 'view/documento/index.php';
        require_once 'view/footer.php';
    }

}
