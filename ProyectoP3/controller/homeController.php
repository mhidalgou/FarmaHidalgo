<?php
class homeController extends cls_view
{
  public $view = "home";
  function __construct()
  {
  }
  //metodo index
  public function index(){
    $this->view(
      $this->view,
      array(
        "Hola"=>"Endesa Electricidad"
      )
    );
  }
}

?>
