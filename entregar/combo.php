<?php

//Obtener Alumno

    function obtenerConexion(){
        $db = new mysqli('localhost', 'root', '', 'cosecha');

        if ($db->connect_errno > 0) {
            die('No se pudo conectar a la base de datos ['.$db->conncect_error.']');
        }
        return $db;
    }

    function cerrarConexion($db, $query){
        $query->free();
        $db->close();
    }

    function ejecutarQuery($db, $sql){
        if (!$resultado = $db->query($sql)) {
            die('A ocurrido un error al intentar la consulta ['.$db->error.']');
        }
        return $resultado;
    }
/*class alumno {
        public $pk_productor;
        public $nombre;
        public $apellidop;
        public $apellidom;

        function __construct($pk_productor, $nombre,$apellidop,$apellidom){
            $this->pk_productor = $pk_productor;
            $this->nombre = $nombre;
            $this->apellidop=$apellidop;
            $this->apellidom=$apellidom
        }
    }*/
    class Insiden {
      public $pk_productor;
        public $nombre;
        public $apellidop;
        public $rfc;
        public $apellidom;
        function __construct($pk_productor, $nombre,$apellidop,$apellidom,$rfc){
           $this->pk_productor = $pk_productor;
            $this->nombre = $nombre;
            $this->apellidop=$apellidop;
            $this->apellidom=$apellidom;
            $this->rfc=$rfc;

        }
    }

    //Esta funcion se va a llamar al cargar el primer combo
    function agregar_insiden() {
        $arreglo_salon = array();
        $sql = "SELECT pk_productor, nombre, apellidop,apellidom, rfc from productor";

        $db = obtenerConexion();

        //Obtenemos Todos los Alumnos
        $result = ejecutarQuery($db, $sql);

        //Creamos objetos de la clase compania y los agregamos al arreglo
        while ($row = $result->fetch_assoc()) {
            //$row['nombres'] = mb_convert_encoding($row['nombres']), 'UTF-8', mysqli_character_set_name($db);
            $salon = new salon($row['pk_productor'], $row['nombre'], $row['apellidop'], $row['apellidom'], $row['rfc']);
            array_push($arreglo_salon, $salon);
        }

        cerrarConexion($db, $result);

        //Devolvemos el arreglo
        return $arreglo_salon;
    }


    ?>