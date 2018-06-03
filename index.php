<?php
  require_once 'model/database.php';

  ini_set('display_errors', 0);

  $controller = 'dispositivo';

  $tipos = array('Servidor','Roteador','Switch');

  $GLOBALS["tipos"] = $tipos;

  if(!isset($_REQUEST['c']))
  {

    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->Index();
  }
  else
  {
    
    $controller = strtolower($_REQUEST['c']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';

    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;

    call_user_func( array( $controller, $accion ) );
  }
  
