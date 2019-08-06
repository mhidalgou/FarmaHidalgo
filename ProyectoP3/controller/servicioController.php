<?php
class servicioController extends cls_view
{
  public $view = "servicio";
  function __construct()
  {
  }
  //metodo index
  public function index(){
    $myModel  = new cls_servicio();//$id,$nombre,$descripcion,$status,$action
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
    $myModel  = new cls_servicio();
    $myModel->setId($values["id"]);
    $myModel->setNombre($values["nombre"]);
    $myModel->setDescripcion($values["descripcion"]);
    $myModel->setStatus($values["statusSelect"]);

    $res = $myModel->update();
    if ($res) {
     $this->redirect("servicio", "show");
    }
  }
  //metodo edit
  public function edit(){
    if (isset($_GET["id"])) {
      $id = $_GET["id"];
      $myModel  = new cls_servicio();//$id,$nombre,$descripcion,$status,$action
      $all      = $myModel->getBy($id);
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
    $myModel  = new cls_servicio();//$id,$nombre,$descripcion,$status,$action
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
    $myModel  = new cls_servicio();//$id,$nombre,$descripcion,$status,$action
    $all      = $myModel->getAll();
    $this->view(
      $this->view."Show",
      array(
        "juan" =>$all,
        "Hola"=>"Endesa Electricidad"
      )
    );
  }
  //metodo insert
  public function insert(){//TODO CAMBIAR.
    $values   = $this->valida();
    $myModel  = new cls_servicio();
    $myModel->setNombre($values["nombre"]);
    $myModel->setDescripcion($values["descripcion"]);
    $myModel->setStatus($values["statusSelect"]);

    $res = $myModel->insert($myModel);
    if ($res) {
     $this->redirect("servicio", "show");
   }else{
     echo "error al guardar.";
   }
  }
  public function valida(){
    $values = null;
    if (isset($_POST["id"]) && !empty($_POST["id"]) && !is_null($_POST["id"])) {
      $values['id'] = $_POST["id"];
    }else{
      $values['id'] = "";
    }
    if (isset($_POST["nombre"]) && !empty($_POST["nombre"]) && !is_null($_POST["nombre"])) {
      $values['nombre'] = $_POST["nombre"];
    }else{
      $values['nombre'] = "";
    }
    if (isset($_POST["descripcion"]) && !empty($_POST["descripcion"]) && !is_null($_POST["descripcion"])) {
      $values['descripcion'] = $_POST["descripcion"];
    }else{
      $values['descripcion'] = "";
    }
    if (isset($_POST["statusSelect"])) {
      $values['statusSelect'] = $_POST["statusSelect"];
    }else{
      $values['statusSelect'] = "";
    }

    return $values;
  }

}

?>
