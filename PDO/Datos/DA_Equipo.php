<?php

require_once 'Conexion.php';


class dataEquipo {

	const TABLA = 'equipos';

    public function Insertar( $Nombre, $Genero, $Categoria) {
        // $fecha = date_create($Lista_Entrenadores);
        // $fecha = date_format($fecha,"Y/m/d");

        // $fecha=$Lista_Entrenadores;
        // echo $fecha;
        // $nuevaFecha=implode('/',array_reverse(explode('/',$fecha)));

        // echo $nuevaFecha;
        // echo $fecha;                                 (STR_TO_DATE(REPLACE('15/01/2005','/','.') ,GET_FORMAT(date,'EUR')))
        $conexion = new Conexion();
        
        $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' ( Nombre, Genero , Categoria) VALUES ( :Nombre, :Genero,  :Categoria )');
		
        $consulta->bindParam(':Nombre', $Nombre);
        $consulta->bindParam(':Genero', $Genero);
        // $consulta->bindParam(':Lista_Entrenadores', $Lista_Entrenadores);
        // $consulta->bindParam(':Dorsales', $Dorsales);
        // $consulta->bindParam(':Lista_Jugadores', $Lista_Jugadores);
        $consulta->bindParam(':Categoria', $Categoria);

        // echo $Lista_Entrenadores;

        $resultado = $consulta->execute();

        if (!$resultado) {
            $error = $consulta->errorInfo()[2];
            echo $error;
        }
        $conexion = null;

	    return $resultado;
    }

    public function Modificar($ID_Equipo, $Nombre, $Genero, $Categoria) {
        $conexion = new Conexion();

        $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET  Nombre = :Nombre, Genero = :Genero, Categoria = :Categoria WHERE ID_Equipo = :ID_Equipo');

        $consulta->bindParam(':ID_Equipo', $ID_Equipo);
        $consulta->bindParam(':Nombre', $Nombre);
        $consulta->bindParam(':Genero', $Genero);
        // $consulta->bindParam(':Lista_Entrenadores', $Lista_Entrenadores);
        // $consulta->bindParam(':Dorsales', $Dorsales);
        // $consulta->bindParam(':Lista_Jugadores', $Lista_Jugadores);
        $consulta->bindParam(':Categoria', $Categoria);

        $resultado = $consulta->execute();
        
        if (!$resultado) {
            $error = $consulta->errorInfo()[2];
            echo $error;
        }
        
        $conexion = null;

		return $resultado;
    }

    public function Eliminar($ID_Equipo){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE ID_Equipo = :ID_Equipo');
        $consulta->bindParam(':ID_Equipo', $ID_Equipo);
        $resultado=$consulta->execute();
        $conexion = null;

        return $resultado;
    }

    public function buscarPorNombre($Nombre) {

    	$conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE Nombre = :Nombre');
        $consulta->bindParam(':Nombre', $Nombre);
        $consulta->execute();
        $registro = $consulta->fetch();
        $conexion = null;
      
        return $registro;
    }


    public function Listar() {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT ID_Equipo,Nombre ,Genero  , Categoria  FROM ' . self::TABLA);
        $consulta->execute();
        $arrayRegistros = $consulta->fetchAll();
        $conexion = null;

        return $arrayRegistros;
    }


}

?>