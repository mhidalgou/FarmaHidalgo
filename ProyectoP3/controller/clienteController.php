<?php
class clienteController extends cls_view
{
  public $view = "cliente";
  function __construct()
  {
  }
  //metodo index
  public function index(){
    $myModel  = new cls_cliente();//$id,$nombre,$descripcion,$status,$action
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
    $myModel  = new cls_cliente();
    $myModel->setIdCliente($values["IdCliente"]);
    $myModel->setIdPersona($values["IdPersona"]);
    $myModel->setEstado($values["EstadoSelect"]);
    $res = $myModel->update();
    if ($res) {
     $this->redirect("cliente", "show");
    }
  }

  //metodo edit
  public function edit(){
    if (isset($_GET["IdCliente"])) {
      $IdCliente = $_GET["IdCliente"];
      $myModel  = new cls_cliente();//$id,$nombre,$descripcion,$status,$action
      $all      = $myModel->getBy($IdCliente);
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
    $myModel  = new cls_cliente();
    $all      = $myModel->getAllPersonas();
    $this->view(
      $this->view."Add",
      array(
        "clientesg" =>$all,
        "Hola"=>"Endesa Electricidad"
      )
    );
  }

  //metodo show
  public function show(){
    $myModel  = new cls_cliente();
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
    $myModel  = new cls_cliente();
    $myModel->setIdPersona($values["idclienteggmae"]);
    $myModel->setEstado($values["EstadoSelect"]);
    $exis = $myModel->existeCedula($values["idclienteggmae"]);
    if ($exis){
     echo '<script languaje="javascript">alert("Ya existe cliente almacenado"); </script>';
     $this->redirect("cliente","add");
    }else{
      $res = $myModel->insert($myModel);
      if ($res) {
        $this->redirect("cliente", "show");
      }else{
        echo "error al guardar.";
      }
    }
  }

  public function valida(){
    $values = null;
   
    if (isset($_POST["idclientegg"]) && !empty($_POST["idclientegg"]) && !is_null($_POST["idclientegg"])) {
      $values['idclienteggmae'] = $_POST["idclientegg"];
    }else{
      $values['idclienteggmae'] = "";
    }

  if (isset($_POST["IdCliente"]) && !empty($_POST["IdCliente"]) && !is_null($_POST["IdCliente"])) {
      $values['IdCliente'] = $_POST["IdCliente"];
    }else{
      $values['IdCliente'] = "";
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
