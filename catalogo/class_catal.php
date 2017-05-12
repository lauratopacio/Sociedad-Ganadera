<?php class catalogo{
  protected $_db;
  public function __construct(){
    $this->_db=new mysqli("localhost","root","","cosecha");
    if ($this ->_db->connect_errno) {
      echo "Error en la conexion: ". $this->_db->connect_errno;
      return;
      # code...
    }
    $this->_db->set_charset("utf-8");
  }
}
class catalogoModelo extends catalogo{
  public function __construct(){
    parent::__construct();
  }
  public function get_catalogo(){
    $result=$this->_db->query("SELECT pk_nombre_producto,descripcion,costo_compra,costo_venta,x.categoria,imagen, status from catalogo y, categoria x where x.pk_categoria=y.fk_categoria");
    $catalogo =$result->fetch_all(MYSQLI_ASSOC);
return $catalogo;
  }
}

 ?>