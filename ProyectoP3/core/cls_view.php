<?php
/**
 *
 */
class cls_view
{
  function __construct()
  {
  }
  public function view($vista,$datos){
    
    foreach ($datos as $id_assoc => $valor) {
      ${$id_assoc}=$valor;
    
    }

    require 'view/'.$vista.'.php';// agregamos la $vista concatenada de la palabra view.php en la cual
    //podremos tener acceso a $allusers ya que estaria dentro de este mismo metodo.
  }

  public function redirect($controlador=CONTROLADOR_DEFECTO,$accion=ACCION_DEFECTO){
    header("Location:index.php?controller=".$controlador."&action=".$accion);
  }
  public function url($controlador=CONTROLADOR_DEFECTO,$accion=ACCION_DEFECTO){
      $urlString="index.php?controller=".$controlador."&action=".$accion;
      return $urlString;
  }
}


?>
