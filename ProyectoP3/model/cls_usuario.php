<?php
/**
 *
 */
class cls_usuario extends cls_conexion
{
  private $idusuario,$cedula, $nombre, $password, $fk_idrol, $estado, $correo;
  private $table = "usuario";

  function __construct()
  {
  }

  public function getIdUsuario(){return $this->idusuario;}
  public function setIdUsuario($param){$this->idusuario = $param;}

  public function getNombre(){return $this->nombre;}
  public function setNombre($param){$this->nombre = $param;}

  public function getEstado(){return $this->estado;}
  public function setEstado($param){$this->estado = $param;}

  public function getPassword(){return $this->password;}
  public function setPassword($param){$this->password = $param;}

  public function getCedula(){return $this->cedula;}
  public function setCedula($param){$this->cedula = $param;}

  public function getFk_idRol(){return $this->fk_idrol;}
  public function setFk_idRol($param){$this->fk_idrol = $param;}

  public function getCorreo(){return $this->correo;}
  public function setCorreo($param){$this->correo = $param;}

  public function login(){
    $query = "
    SELECT idusuario, cedula, nombre, password, fk_idrol, estado, correo
    FROM usuario where Estado=1 and Cedula = '".$this->getCedula()."' and password = '".$this->getPassword()."'";
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


    public function insert(){
    $ex   = false;
    $res  = null;
    $this->do_open();
    $query="
    INSERT INTO usuario (cedula,nombre,password, fk_idrol, estado, correo) VALUES(
    '".$this->getCedula()."',
    '".$this->getNombre()."',
    '".$this->getPassword()."',
    '".$this->getFk_idRol()."',
    '".$this->getEstado()."',
    '".$this->getCorreo()."'
    );";
    $actionlog = array(
      'query' => $query,
      'table' => $this->table,
      'action' => "insert"
    );
    $mylist[0]=$actionlog;
    $ex = false;
    $res = $this->do_actionLog($mylist);
    if ($res) {
      $ex = true;
    }
    $this->do_output(1213);
    $this->do_close();
    return $ex;
  }

  public function getBy($_idUsuario){
    $query = "
    SELECT IdUsuario, Cedula, Nombre, Password, fk_idrol, Estado, Correo
    FROM usuario
    WHERE
    idusuario = ".$_idUsuario;
    $this->do_open();
    var_dump($query);
    $res = $this->do_query($query);
    if ($res->num_rows > 0) {
      while ($row = $res->fetch_object()) {//para parsear el resultado del select
         $resultSet[]=$row;
      }
    }else{$resultSet = null;}
    $this->do_close();
    return $resultSet;
  }

  public function existeCedula($_Cedula){
    $existe = false;
    $query = "
    SELECT IdUsuario, Cedula, Nombre, Password, Fk_idRol, Estado, Correo
    FROM usuario|
    WHERE
    cedula = ".$_Cedula;
    $this->do_open();
    $res = $this->do_query($query);
    if ($res->num_rows > 0) {
      $existe=true;}
    $this->do_close();
    return $existe;
  }

public function update(){
    $ex = false;
    $query =
    " UPDATE usuario
     SET cedula   ='".$this->getCedula()."',
     nombre       ='".$this->getNombre()."',
     password     ='".$this->getPassword()."',
     fk_idrol     =".$this->getFk_idRol().",
     estado       =".$this->getEstado()." ,
     correo       ='".$this->getCorreo()."'
      WHERE idusuario  =".$this->getIdUsuario();
    $this->do_open();
    $res = $this->do_query($query);
    if ($res) {//todo bien
      $ex = true;
      $this->do_commit();
     //guardar en logs
    }

    $this->do_close();
    return  $query ;
  }

  public function getAll(){
    //$query = "SELECT * FROM ".$this->table;
    $query= "SELECT a.IdUsuario, a.Cedula, a.Nombre, a.Password, a.Fk_idRol, a.Estado ,b.NombreRol, c.descripcion as NombreEstado, a.Correo
    from usuario a, rol b, estado c 
    where a.Fk_idRol=b.idRol and  a.estado=c.IdEstado and".ROLL_STATUS;
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

  public function enviarcorreo($Correo,$nuevo){
    $destinatario = $Correo; 
    $asunto = "Recuperacion de contraseña Farmacias Hidalgo"; 
    $cuerpo = ' 
    <html> 
      <head> 
        <title>Recuperacion de Correo</title> 
      </head> 
      <body> 
        <h1>Hola estimado usuario!</h1> 
        <p> 
        <b>Usted recien solicitó la generacion de un nuevo password para uso de Control de Crónicos de Farmacias Hidalgo</b>. Su nuevo password es: '.$nuevo.'
        </p> 
      </body> 
    </html> ';

    //para el envío en formato HTML 
    $headers = "MIME-Version: 1.0\r\n"; 
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

    //dirección del remitente 
    $headers .= "From: Farmacias Hidalgo <hidalgourpi@gmail.com>\r\n"; 
    //ruta del mensaje desde origen a destino 
    //$headers .= "Return-path: holahola@desarrolloweb.com\r\n"; 

    mail($destinatario,$asunto,$cuerpo,$headers) ;

  }
}

 ?>
