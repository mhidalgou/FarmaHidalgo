<?php
/**
 *
 */
 class cls_conexion{
    private $driver;
    private $host, $user, $pass, $database, $charset;
    private $db;

    public function __construct() {
    }
    public function cargarDatabase(){
      //echo getcwd();
      if (is_dir('../config/')) {
        $db_cfg = include('../config/database.php');
      }elseif(is_dir('config/')){
        $db_cfg = include('config/database.php');
      }

      $this->driver    = $db_cfg["driver"];
      $this->host      = $db_cfg["host"];
      $this->user      = $db_cfg["user"];
      $this->pass      = $db_cfg["pass"];
      $this->database  = $db_cfg["database"];
      $this->charset   = $db_cfg["charset"];
    }
    public function conexion(){
      $this->cargarDatabase();
     if($this->driver=="mysql" || $this->driver==null){
       $this->db = new mysqli($this->host, $this->user, $this->pass, $this->database);
       $this->db->autocommit(FALSE);
     }
    }
    public function db(){
      return $this->db;
    }
    public function do_open(){
      $this->conexion();
    }
    public function do_close(){
      $this->db->close();
    }
    public function do_commit(){
      $this->db->commit();
    }
    public function do_rollback(){
      $this->db->rollback();
    }
    public function do_query($query){
      var_dump($query);
      $res = $this->db->query($query);
      return $res;
    }
    public function do_output($line){
      $fp = fopen('output.txt', 'a');
      fwrite($fp, $line);
      fclose($fp);
    }
    public function do_actionLog($args){
      $usuario = $_SESSION['usuario']['idusuario'];
      $ex   = false;
      
      foreach ($args as $value) {
        //var_dump($value);
        $description = base64_encode($value['query']);
        $table = $value['table'];
        $action = $value['action'];
        $res = $this->do_query($value['query']);
        if ($res) {//todo bien
         $query="
         INSERT INTO `logs`
         (`descripcion`, `tabla`, `accion`, `fecha`, `status`, `id_usuario`)
         VALUES ('".$description."','".$table."','".$action."',now(),0,".$usuario.")";
         $res = $this->do_query($query);
           if ($res) {//todo bien
             $ex = true;
           }else{
             break;
           }
         }else{
           break;
         }
      }
      if ($ex) {
       $this->do_commit();
      }else{
       $this->do_rollback();
      }
      return $ex;
    }
  }

?>
