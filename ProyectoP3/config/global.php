<?php
define("CONTROLADOR_DEFECTO", "home");
define("ACCION_DEFECTO", "index");
if (isset($_SESSION['usuario'])) {
  if ($_SESSION['usuario']['fk_idrol'] == 1) {//MASTER
    define("ROLL_STATUS", " a.estado in(1,2) ");
  }if ($_SESSION['usuario']['fk_idrol'] == 2) {//ADMIN
    define("ROLL_STATUS", " a.estado in(1) ");
  }if ($_SESSION['usuario']['fk_idrol'] == 3) {//CLIENTE
    define("ROLL_STATUS", " a.estado in(1) ");
  }
}

?>
