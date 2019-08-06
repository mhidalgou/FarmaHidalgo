<?php
/**
 *
 */
class cls_cliente extends cls_conexion
{
  private $id,$nombre,$apellido,$status,$logueado,$id_roll,$pass,$cedula,$nickname;
  private $table = "cliente";
  function __construct()
  {
  }
  public function getPass(){return $this->pass;}
  public function setPass($param){$this->pass = $param;}
  public function getNickname(){return $this->nickname;}
  public function setNickname($param){$this->nickname = $param;}
  public function getId_roll(){return $this->id_roll;}
  public function setId_roll($param){$this->id_roll = $param;}

  public function login(){
    $query = "
    SELECT `id`, `status`, `logueado`, `id_roll`, `nombre`, `apellido`, `pass`, `cedula`, `nickname`
    FROM usuario where nickname = '".$this->getNickname()."' and pass = '".$this->getPass()."' and status = 0";
    $this->do_open();
    $res = $this->do_query($query);
    if ($res->num_rows > 0) {
      while ($row = $res->fetch_object()) {//para parsear el resultado del select
         $resultSet[]=$row;
      }
    }else{$resultSet = null;}
    $this->do_close();
    return $resultSet;
  }
  public function getAll(){
    $query = "SELECT * FROM ".$this->table." WHERE ".ROLL_STATUS;
    $this->do_open();
    $res = $this->do_query($query);
    if ($res->num_rows > 0) {
      while ($row = $res->fetch_object()) {//para parsear el resultado del select
         $resultSet[]=$row;
      }
    }else{$resultSet = null;}
    $this->do_close();
    return $resultSet;

  }
}

 ?>
