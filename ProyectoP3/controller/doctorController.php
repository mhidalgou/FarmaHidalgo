<?php
class doctorController extends cls_view
{
  public $view = "doctor";
  function __construct()
  {
  }
  //metodo index
  public function index(){
    $myModel  = new cls_doctor();//$id,$nombre,$descripcion,$status,$action
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
    $myModel  = new cls_doctor();
    $myModel->setIdDoctor($values["IdDoctor"]);
    $myModel->setIdPersona($values["IdPersona"]);
    $myModel->setEstado($values["EstadoSelect"]);
    $res = $myModel->update();
    if ($res) {
     $this->redirect("doctor", "show");
    }
  }

  //metodo edit
  public function edit(){
    if (isset($_GET["IdDoctor"])) {
      $IdDoctor = $_GET["IdDoctor"];
      $myModel  = new cls_doctor();//$id,$nombre,$descripcion,$status,$action
      $all      = $myModel->getBy($IdDoctor);
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
    $myModel  = new cls_doctor();
    $all      = $myModel->getAllPersonas();
    $this->view(
      $this->view."Add",
      array(
        "doctoresg" =>$all,
        "Hola"=>"Endesa Electricidad"
      )
    );
  }

  //metodo show
  public function show(){
    $myModel  = new cls_doctor();
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
    $myModel  = new cls_doctor();
    $myModel->setIdPersona($values["iddoctorggmae"]);
    $myModel->setEstado($values["EstadoSelect"]);
    $exis = $myModel->existeCedula($values["iddoctorggmae"]);
    if ($exis){
     echo '<script languaje="javascript">alert("Ya existe doctor almacenado"); </script>';
     $this->redirect("doctor","add");
    }else{
      $res = $myModel->insert($myModel);
      if ($res) {
        $this->redirect("doctor", "show");
      }else{
        echo "error al guardar.";
      }
    }
  }

  public function valida(){
    $values = null;
   
    if (isset($_POST["iddoctorgg"]) && !empty($_POST["iddoctorgg"]) && !is_null($_POST["iddoctorgg"])) {
      $values['iddoctorggmae'] = $_POST["iddoctorgg"];
    }else{
      $values['iddoctorggmae'] = "";
    }

  if (isset($_POST["IdDoctor"]) && !empty($_POST["IdDoctor"]) && !is_null($_POST["IdDoctor"])) {
      $values['IdDoctor'] = $_POST["IdDoctor"];
    }else{
      $values['IdDoctor'] = "";
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
