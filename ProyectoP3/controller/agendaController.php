

<?php
include ('model/cls_agendadetalle.php');
class agendaController extends cls_view
{
  public $view = "agenda";
  function __construct()
  {
  }
  //metodo index
  public function index(){
    $myModel  = new cls_agenda();//$id,$nombre,$descripcion,$status,$action
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
    $myModel  = new cls_agenda();
    $myModel->setIdAgenda($values["IdAgenda"]);
    $myModel->setFk_idCliente($values["idclienteggmae"]);
    $myModel->setFk_idDoctor($values["iddoctorggmae"]);
    $myModel->setFecha($values["Fecha"]);
    $myModel->setClientellamado($values["ClientellamadoSelect"]);
    $myModel->setServicioExpress($values["ServicioExpressSelect"]);
    $myModel->setFk_idUsuario($values["Fk_idUsuario"]);
    $myModel->setEstado($values["EstadoSelect"]);
    //var_dump($_GET['IdAgenda']);
    $res = $myModel->update();
    if ($res) {
     $this->redirect("agenda", "show");
    }
  }
//metodo edit
  public function getlastid(){
     
      $myModel  = new cls_agenda();//$id,$nombre,$descripcion,$status,$action
      $last      = $myModel->getlastid();
      //$all2     = $myModel->getDetIdAgenda($IdAgenda);
      $this->view(
        $this->view."Edit",
        array(
          "all" =>$last
        )
      );
    
  }
  //metodo edit
  public function edit(){
    if (isset($_GET["IdAgenda"])) {
      $IdAgenda = $_GET["IdAgenda"];
      $myModel  = new cls_agenda();//$id,$nombre,$descripcion,$status,$action
      $all      = $myModel->getBy($IdAgenda);
      //$all2     = $myModel->getDetIdAgenda($IdAgenda);
      $this->view(
        $this->view."Edit",
        array(
          "all" =>$all
        )
      );
    }
  }

  //metodo add
  public function add(){
    $myModel  = new cls_agenda();
    $allA     = $myModel->getAll();
    $allM     = $myModel->getAllMedicamentos();
    $myModel  = new cls_cliente();
    $allC     = $myModel->getAll();
    $myModel  = new cls_doctor();
    $allD     = $myModel->getAll();

    $this->view(
      $this->view."Add",
      array(
        "agendasg" =>$allA,
        "clientesg"=>$allC,
        "doctoresg"=>$allD,
        "medicamentosg"=>$allM
      )
    );
  }

  //metodo show
  public function show(){
    $myModel  = new cls_agenda();
    $all      = $myModel->getAll();
    $this->view(
      $this->view."Show",
      array(
        "juan"=>$all
       )
    );
  }

  //metodo insert
  public function insert(){//TODO CAMBIAR.
    $values   = $this->valida();
    $myModel  = new cls_agenda();
    $myModelLat  = new cls_agenda();
    $myModel->setFk_idCliente($values["idclienteggmae"]);
    $myModel->setFk_idDoctor($values["iddoctorggmae"]);
    $myModel->setFecha($values["Fecha"]);
    $myModel->setClientellamado($values["ClientellamadoSelect"]);
    $myModel->setServicioExpress($values["ServicioExpressSelect"]);
    $myModel->setFk_idUsuario($values["Fk_idUsuario"]);
    $myModel->setEstado($values["EstadoSelect"]);
    $res = $myModel->insert($myModel);

      if ($res) {
         $last      = $myModelLat->getlastid();
         $arr_cantidad =$_POST['Cantidad'];
         $micantidad = count($arr_cantidad);
         $values=$this->valida2($micantidad);
         // var_dump($values);
         var_dump($micantidad);
         for ($i=0; $i <= $micantidad ; $i++) { 
           $myModel = new cls_agendadetalle();
           $myModel->setFk_IdAgenda($last[0]->id_agenda);
           //var_dump($last[$i]->id_agenda);
           $myModel->setFk_Medicamento($values["idmedicamentoggmae"][$i]);
           $myModel->setCantidad($values["Cantidad"][$i]);
           $myModel->setDosis($values["Dosis"][$i]);
           $myModel->setFacturar("1");
           $myModel->setEstado("1");
           $res=$myModel->insert($myModel);
           if ($res){
              //$this->do_commit();
              //$this->redirect("agenda", "show");
           }else{
              //$this->do_roolback();
           }
         }
        $this->redirect("agenda", "show");
      }else{
        echo "error al guardar.";
      }
    }
   

  public function valida(){
    $values = null;
   
    if (isset($_POST["Fk_idCliente"]) && !empty($_POST["Fk_idCliente"]) && !is_null($_POST["Fk_idCliente"])) {
      $values['idclienteggmae'] = $_POST["Fk_idCliente"];
    }else{
      $values['idclienteggmae'] = "";
    }

    if (isset($_POST["Fk_idDoctor"]) && !empty($_POST["Fk_idDoctor"]) && !is_null($_POST["Fk_idDoctor"])) {
      $values['iddoctorggmae'] = $_POST["Fk_idDoctor"];
    }else{
      $values['iddoctorggmae'] = "";
    }

  if (isset($_POST["Fecha"]) && !empty($_POST["Fecha"]) && !is_null($_POST["Fecha"])) {
      $values['Fecha'] = $_POST["Fecha"];
    }else{
      $values['Fecha'] = "";
    }
  
  if (isset($_POST["ClientellamadoSelect"]) && !empty($_POST["ClientellamadoSelect"]) && !is_null($_POST["ClientellamadoSelect"])) {
      $values['ClientellamadoSelect'] = $_POST["ClientellamadoSelect"];
    }else{
      $values['ClientellamadoSelect'] = "1";
    }
    
  if (isset($_POST["ServicioExpressSelect"]) && !empty($_POST["ServicioExpressSelect"]) && !is_null($_POST["ServicioExpressSelect"])) {
      $values['ServicioExpressSelect'] = $_POST["ServicioExpressSelect"];
    }else{
      $values['ServicioExpressSelect'] = "1";
    }

  if (isset($_POST["Fk_idUsuario"]) && !empty($_POST["Fk_idUsuario"]) && !is_null($_POST["Fk_idUsuario"])) {
      $values['Fk_idUsuario'] = $_POST["Fk_idUsuario"];
    }else{
      $values['Fk_idUsuario'] = "";
    }

    if (isset($_POST["Fk_idCliente"]) && !empty($_POST["Fk_idCliente"]) && !is_null($_POST["Fk_idCliente"])) {
      $values['Fk_idCliente'] = $_POST["Fk_idCliente"];
    }else{
      $values['Fk_idCliente'] = "";
    }

    if (isset($_POST["Fk_idDoctor"]) && !empty($_POST["Fk_idDoctor"]) && !is_null($_POST["Fk_idDoctor"])) {
      $values['Fk_idDoctor'] = $_POST["Fk_idDoctor"];
    }else{
      $values['Fk_idDoctor'] = "";
    }


    if (isset($_POST["IdAgenda"]) && !empty($_POST["IdAgenda"]) && !is_null($_POST["IdAgenda"])) {
      $values['IdAgenda'] = $_POST["IdAgenda"];
    }else{
      $values['IdAgenda'] = "";
    }

    if (isset($_POST["EstadoSelect"])) {
      $values['EstadoSelect'] = $_POST["EstadoSelect"];
    }else{
      $values['EstadoSelect'] = "";
    }
    return $values;
  }

 

  public function valida2($veces){
    $values = null;
   
    for ($i = 0; $i <= $veces; $i++){
    

      if (isset($_POST["idmedicamentogg"][$i]) && !empty($_POST["idmedicamentogg"][$i]) && !is_null($_POST["idmedicamentogg"][$i])) {
        $values['idmedicamentoggmae'][$i] = $_POST["idmedicamentogg"][$i];
      }else{
        $values['idmedicamentoggmae'][$i] = "";
      }

      if (isset($_POST["Cantidad"][$i]) && !empty($_POST["Cantidad"][$i]) && !is_null($_POST["Cantidad"][$i])) {
        $values['Cantidad'][$i] = $_POST["Cantidad"][$i];
      }else{
        $values['Cantidad'][$i] = "";
      }

      if (isset($_POST["Dosis"][$i]) && !empty($_POST["Dosis"][$i]) && !is_null($_POST["Dosis"][$i])) {
        $values['Dosis'][$i] = $_POST["Dosis"][$i];
      }else{
        $values['Dosis'][$i] = "";
      }
    }   
  return $values;

  } 

}

?>
