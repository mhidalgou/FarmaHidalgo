<?php

class clientexservicioController extends cls_view
{
  public $view = "clientexservicio";
  function __construct()
  {
  }
  //metodo index
  public function index(){
    $myModel  = new cls_clientexservicio();
    $this->view(
      $this->view."Index",
      array(
        "all" =>null,
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
      $myModel  = new cls_clientexservicio();//$id,$nombre,$descripcion,$status,$action
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
    $myModel  = new cls_detalleservicio();//$id,$nombre,$descripcion,$status,$action
    $all1      = $myModel->getAllLibres();
    $myModel  = new cls_cliente();//$id,$nombre,$descripcion,$status,$action
    $all2      = $myModel->getAll();
    $this->view(
      $this->view."Add",
      array(
        "serviciosg" =>$all1,
        "clientesg" =>$all2,
        "Hola"=>"Endesa Electricidad"
      )
    );
  }
  //metodo show
  public function show(){
    $myModel  = new cls_clientexservicio();//$id,$nombre,$descripcion,$status,$action
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
    $myModel  = new cls_clientexservicio();
    $myModel->setIdCliente($values["idclienteggmae"]);
    $myModel->setIdDetalleServicio($values["idServicioggmae"]);
    $myModel->setStatus($values["statusSelect"]);

    $res = $myModel->insert($myModel);
    if ($res) {
   $this->redirect("clientexservicio", "show");
    //echo $res;
    }
  }
  public function valida(){
    $values = null;
    if (isset($_POST["idclientegg"]) && !empty($_POST["idclientegg"]) && !is_null($_POST["idclientegg"])) {
      $values['idclienteggmae'] = $_POST["idclientegg"];
    }else{
      $values['idclienteggmae'] = "";
    }
    if (isset($_POST["idServiciogg"]) && !empty($_POST["idServiciogg"]) && !is_null($_POST["idServiciogg"])) {
      $values['idServicioggmae'] = $_POST["idServiciogg"];
    }else{
      $values['idServicioggmae'] = "";
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
