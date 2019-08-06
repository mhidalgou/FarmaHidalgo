<?php
class usuarioController extends cls_view
{
  public $view = "usuario";
  function __construct()
  {
  }
  public function salir(){
    session_start();
    unset($_SESSION['usuario']);
    $this->redirect();
  }

  //metodo index
  public function index(){
    $myModel  = new cls_usuario();//$id,$nombre,$descripcion,$status,$action
    $all      = $myModel->getAll();
    $this->view(
      $this->view."Index",
      array(
        "all" =>$all,
        "Hola"=>"Endesa Electricidad"
      )
    );
  }
  //metodo update
  public function update(){
    $values   = $this->valida();
    $myModel  = new cls_usuario();
    $myModel->setIdUsuario($values["IdUsuario"]);
    $myModel->setCedula($values["Cedula"]);
    $myModel->setNombre($values["Nombre"]);
    $myModel->setPassword($values["Password"]);
    $myModel->setFk_idRol($values["Fk_idRolSelect"]);
    $myModel->setEstado($values["EstadoSelect"]);
    $myModel->setCorreo($values["Correo"]);
    $res = $myModel->update();
    if ($res) {
     $this->redirect("usuario", "show");
    }
  }
  //metodo edit
  public function edit(){
    if (isset($_GET["IdUsuario"])) {
      $IdUsuario = $_GET["IdUsuario"];
      $myModel  = new cls_usuario();//$id,$nombre,$descripcion,$status,$action
      $all      = $myModel->getBy($IdUsuario);
      $this->view(
        $this->view."Edit",
        array(
          "all" =>$all,
          "Hola"=>"Endesa Electricidad"
        )
      );
    }
  }
  //metodo add
  public function add(){
    $myModel  = new cls_usuario();//$id,$nombre,$descripcion,$status,$action
    $all      = $myModel->getAll();
    $this->view(
      $this->view."Add",
      array(
        "all" =>$all,
        "Hola"=>"Endesa Electricidad"
      )
    );
  }
  //metodo show
  public function show(){
    $myModel  = new cls_usuario();//$id,$nombre,$descripcion,$status,$action
    $all      = $myModel->getAll();
    $this->view(
      $this->view."Show",
      array(
        "all" =>$all,
        "Hola"=>"Endesa Electricidad"
      )
    );
  }
  //metodo insert
  public function insert(){//TODO CAMBIAR.
    $values   = $this->valida();
    $myModel  = new cls_usuario();
    $myModel->setCedula($values["Cedula"]);
    $myModel->setNombre($values["Nombre"]);
    $myModel->setPassword($values["Password"]);
    $myModel->setFk_idRol($values["Fk_idRolSelect"]);
    $myModel->setEstado($values["EstadoSelect"]);
    $myModel->setCorreo($values["Correo"]);
    $res = $myModel->insert($myModel);
    if ($res) {
     $this->redirect("usuario", "show");
    }
  }
  public function valida(){
    $values = null;
    if (isset($_POST["IdUsuario"]) && !empty($_POST["IdUsuario"]) && !is_null($_POST["IdUsuario"])) {
      $values['IdUsuario'] = $_POST["IdUsuario"];
    }else{
      $values['IdUsuario'] = "";
    }

    if (isset($_POST["Cedula"]) && !empty($_POST["Cedula"]) && !is_null($_POST["Cedula"])) {
      $values['Cedula'] = $_POST["Cedula"];
    }else{
      $values['Cedula'] = "";
    }

    if (isset($_POST["Nombre"]) && !empty($_POST["Nombre"]) && !is_null($_POST["Nombre"])) {
      $values['Nombre'] = $_POST["Nombre"];
    }else{
      $values['Nombre'] = "";
    }

    if (isset($_POST["Password"]) && !empty($_POST["Password"]) && !is_null($_POST["Password"])) {
      $values['Password'] = $_POST["Password"];
    }else{
      $values['Password'] = "";
    }

    if (isset($_POST["Fk_idRolSelect"]) && !empty($_POST["Fk_idRolSelect"]) && !is_null($_POST["Fk_idRolSelect"])) {
      $values['Fk_idRolSelect'] = $_POST["Fk_idRolSelect"];
    }else{
      $values['Fk_idRolSelect'] = "";
    }

    if (isset($_POST["EstadoSelect"]) && !empty($_POST["EstadoSelect"]) && !is_null($_POST["EstadoSelect"])) {
      $values['EstadoSelect'] = $_POST["EstadoSelect"];
    }else{
      $values['EstadoSelect'] = "";
    }
    
    if (isset($_POST["Correo"]) && !empty($_POST["Correo"]) && !is_null($_POST["Correo"])) {
      $values['Correo'] = $_POST["Correo"];
    }else{
      $values['Correo'] = "";
    }

    return $values;
  }

}

?>
