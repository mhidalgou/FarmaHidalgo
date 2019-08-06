<?php
include('../config/global.php');
include('../core/cls_conexion.php');
include('../core/cls_view.php');
include('../model/cls_usuario.php');
include('../controller/usuarioController.php');
$myModel = new cls_usuario();
$myModel->setCedula($_POST['usuario']);
$myModel->setPassword($_POST['pass']);
$res = $myModel->login();
if (!is_null($res)) {
  session_start();
  $miuser = array(//$myModel->getRoll()
  	'idusuario'	=> $res[0]->idusuario,
    'cedula'   	=> $res[0]->cedula,
    'nombre'   	=> $res[0]->nombre,
    'password'  => $res[0]->password,
    'fk_idrol'  => $res[0]->fk_idrol,
    'correo'    => $res[0]->correo,
  	'time'     	=> time()+13000000
  	 );
  $_SESSION['usuario'] = $miuser;
  header("Location: ../");
}else{
  //echo '<script language="javascript">alert("Acceso denegado");</script>';
  header("Location: recuperapass.php");
}
?>

