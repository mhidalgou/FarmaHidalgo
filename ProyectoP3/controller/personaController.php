<?php
class personaController extends cls_view
{
  public $view = "persona";
  function __construct()
  {
  }
  //metodo index
  public function index(){
    $myModel  = new cls_persona();//$id,$nombre,$descripcion,$status,$action
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
    $myModel  = new cls_persona();
    $myModel->setIdPersona($values["IdPersona"]);
    $myModel->setCedula($values["Cedula"]);
    $myModel->setNombre($values["Nombre"]);
    $myModel->setApellidos($values["Apellidos"]);
    $myModel->setTelefono($values["Telefono"]);
    $myModel->setDireccion($values["Direccion"]);
    $myModel->setFecha_nacimiento($values["Fecha_nacimiento"]);
    $myModel->setEstado($values["EstadoSelect"]);
    $res = $myModel->update();
    if ($res) {
     $this->redirect("persona", "show");
    }
  }

  //metodo edit
  public function edit(){
    if (isset($_GET["IdPersona"])) {
      $IdPersona = $_GET["IdPersona"];
      $myModel  = new cls_persona();//$id,$nombre,$descripcion,$status,$action
      $all      = $myModel->getBy($IdPersona);
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
    $myModel  = new cls_persona();//$id,$nombre,$descripcion,$status,$action
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
    $myModel  = new cls_persona();//$id,$nombre,$descripcion,$status,$action
    $all      = $myModel->getAll();
    $this->view(
      $this->view."Show",
      array(
        "juan"=>$all,
        "Hola"=>"Endesa Electricidad"
      )
    );
  }

  //metodo insert
  public function insert(){//TODO CAMBIAR.
    $values   = $this->valida();
    $myModel  = new cls_persona();
    $myModel->setCedula($values["Cedula"]);
    $myModel->setNombre($values["Nombre"]);
    $myModel->setApellidos($values["Apellidos"]);
    $myModel->setTelefono($values["Telefono"]);
    $myModel->setDireccion($values["Direccion"]);
    $myModel->setFecha_nacimiento($values["Fecha_nacimiento"]);
    $myModel->setEstado($values["EstadoSelect"]);
    $exis = $myModel->existeCedula($values["Cedula"]);
    if ($exis){
     echo '<script languaje="javascript">alert("Ya existe persona con  esta cédula"); </script>';
     $this->redirect("persona","add");
    }else{
      $res = $myModel->insert($myModel);
      if ($res) {
        $this->redirect("persona", "show");
      }else{
        echo "error al guardar.";
      }
    }
  }

  public function valida(){
    $values = null;
   
    if (isset($_POST["IdPersona"]) && !empty($_POST["IdPersona"]) && !is_null($_POST["IdPersona"])) {
      $values['IdPersona'] = $_POST["IdPersona"];
    }else{
      $values['IdPersona'] = "";
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

    if (isset($_POST["Apellidos"]) && !empty($_POST["Apellidos"]) && !is_null($_POST["Apellidos"])) {
      $values['Apellidos'] = $_POST["Apellidos"];
    }else{
      $values['Apellidos'] = "";
    }

    if (isset($_POST["Telefono"]) && !empty($_POST["Telefono"]) && !is_null($_POST["Telefono"])) {
      $values['Telefono'] = $_POST["Telefono"];
    }else{
      $values['Telefono'] = "";
    }

    if (isset($_POST["Direccion"]) && !empty($_POST["Direccion"]) && !is_null($_POST["Direccion"])) {
      $values['Direccion'] = $_POST["Direccion"];
    }else{
      $values['Direccion'] = "";
    }

    if (isset($_POST["Fecha_nacimiento"]) && !empty($_POST["Fecha_nacimiento"]) && !is_null($_POST["Fecha_nacimiento"])) {
      $values['Fecha_nacimiento'] = $_POST["Fecha_nacimiento"];
    }else{
      $values['Fecha_nacimiento'] = "";
    }

    if (isset($_POST["EstadoSelect"])) {
      $values['EstadoSelect'] = $_POST["EstadoSelect"];
    }else{
      $values['EstadoSelect'] = "";
    }

    return $values;
  }

}

?>
