<?php
require_once 'model/dispositivo.php';

class DispositivoController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new dispositivo();
    }

    public function Index(){
        require_once 'view/header.php';
        require_once 'view/dispositivo/index.php';
        require_once 'view/footer.php';
    }

    public function edit(){
        $disp = new dispositivo();

        if(isset($_REQUEST['id_dispositivo'])){
            $disp = $this->model->select($_REQUEST['id_dispositivo']);
        }

        if($disp->id_dispositivo){
            require_once 'view/header.php';
            require_once 'view/dispositivo/edit.php';
            require_once 'view/footer.php';
        }
        else {
            header('Location: index.php?c=dispositivo&a=create');
        }
    }

    public function create(){
        $disp = new dispositivo();

        require_once 'view/header.php';
        require_once 'view/dispositivo/create.php';
        require_once 'view/footer.php';
    }

    public function save(){
        $disp = new dispositivo();

        $disp->hostname = $_REQUEST['hostname'];
        $disp->ip = $_REQUEST['ip'];
        $disp->tipo = $_REQUEST['tipo'];
        $disp->fabricante = $_REQUEST['fabricante'];

        $this->model->create($disp);

        header('Location: index.php');
    }

    public function update(){
        $disp = new dispositivo();

        $disp->id_dispositivo = $_REQUEST['id_dispositivo'];
        $disp->hostname = $_REQUEST['hostname'];
        $disp->ip = $_REQUEST['ip'];
        $disp->tipo = $_REQUEST['tipo'];
        $disp->fabricante = $_REQUEST['fabricante'];

        $this->model->update($disp);

        header('Location: index.php');
    }

    public function delete(){
        $this->model->delete($_REQUEST['id_dispositivo']);
        header('Location: index.php');
    }
}
