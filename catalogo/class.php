<?php class catalogo
{
	protected $_db;

	public function __construct()
	{
		$this ->_db = new mysqli("localhost", "root", "", "cosecha");
		if($this ->_db->connect_errno)
		{
			echo "Error en la conexión:". $this->_db->connect_errno;
			return;
		}
		$this->_db->set_charset("utf-8");
	}
}

class catalogoModelo extends catalogo
{
	public function __construct()
	{
		parent::__construct();
	}
	public function get_catalogo()
	{
		
		$result = $this->_db->query("SELECT x.pk_nombre_producto, x.descripcion, x.costo_compra, x.costo_venta, x.imagen, y.categoria, x.status from catalogo x, categoria y where x.fk_categoria=y.pk_categoria ");
		$catalogo =$result->fetch_all(MYSQLI_ASSOC);
		return $catalogo;

	}
} ?>