<?php
include('config/session.php');
include('config/global.php');
include('core/cls_conexion.php');
include('model/cls_usuario.php');
include('model/cls_cliente.php');
include('core/cls_view.php');
include('model/cls_persona.php');
include('model/cls_doctor.php');
include('model/cls_agenda.php');



if(isset($_GET["controller"])){
    $controllerObj = cargarControlador($_GET["controller"]);//cargamos el controlador.
    lanzarAccion($controllerObj);//ejecutamos la accion.
}else{
    $controllerObj=cargarControlador(CONTROLADOR_DEFECTO);
    lanzarAccion($controllerObj);
}
function cargarControlador($controller){
    $controlador=ucwords($controller).'Controller';
    $strFileController='controller/'.$controlador.'.php';

    if(!is_file($strFileController)){
        $strFileController='controller/'.ucwords(CONTROLADOR_DEFECTO).'Controller.php';//utlizamos el CONTROLADOR_DEFECTO de la clase global.
        $controlador = ucwords(CONTROLADOR_DEFECTO).'Controller';
    }
    require_once $strFileController;//agregamos el file
    $controllerObj = new $controlador();//instancia al controlador que se recibio por parametro.

    return $controllerObj;
}
//ejecutada desde el main index, parametro que retorna cargarControlador
function lanzarAccion($controllerObj){
    if(isset($_GET["action"]) && method_exists($controllerObj, $_GET["action"])){//si existe action y exite method_exists el metodo que enviamos por action en el objeto usuario
        cargarAccion($controllerObj, $_GET["action"]);
    }else{
        cargarAccion($controllerObj, ACCION_DEFECTO);//objeto enviado, index, lo cual va ejecutar el metodo index del usuario mostrando la vista.
    }
  
}
//objeto y metodo por parametros
function cargarAccion($controllerObj,$action){
    $accion = $action;
    $controllerObj->$accion();//ejecuta metodo de la instancia del obj que se recibe.
}
?>
