<?php
$conexion=mysqli_connect('localhost','root','','cosecha');

abstract class DBAbstractModel
{
	private static $SERVER = 'localhost';
	private static $USER = 'root';
	private static $PASS = '';
	protected $DATABASE = 'cosecha';
	protected $query;
	protected $rows = array();
	private $conn;

	//Métodos Abstractos
	abstract protected function get();
	abstract protected function set();
	abstract protected function edit();
	abstract protected function delete();
	abstract protected function update_estado();

	//Conectar la base de datos
	private function open_connection(){
		$this -> conn = new mysqli(self::$SERVER, self::$USER, self::$PASS, $this -> DATABASE);
	}

	//Desconectar la base de datos
	private function close_connection(){
		$this -> conn -> close();
	}

	//EJecutar un query simple de tipo INSERT, DELECTE o UPDATE
	protected  function execute_single_query(){
		$this -> open_connection();
		$this -> conn -> query($this -> query);
		$this -> close_connection();
	}

	//Traer resultados de una consulta
	protected function get_result_from_query(){
		$this ->open_connection();
		$result = $this -> conn -> query($this -> query);
		while($this -> rows[] = $result ->fetch_assoc());
		$result -> close();
		$this -> close_connection();
		array_pop($this -> rows); // Extraé y devuelve el último valor
	}
}
?>