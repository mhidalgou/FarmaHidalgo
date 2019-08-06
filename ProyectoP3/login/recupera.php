<?php
include('../config/global.php');
include('../core/cls_conexion.php');
include('../core/cls_view.php');
include('../model/cls_usuario.php');
include('../controller/usuarioController.php');
$myModel = new cls_usuario();
$myModel->setCedula($_POST['usuario']);
$res = $myModel->getBy($_POST['usuario']);

if (!is_null($res)) {
  $myModel->enviarcorreo($myModel->getCorreo,'12345');
  header("Location: ../");
}else{
  //echo '<script language="javascript">alert("Acceso denegado");</script>';
  header("Location: recuperapass.php");
}
?>