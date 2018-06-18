<?php

require_once 'Conexion.php';


class dataEquipoJugador {

	const TABLA = 'Equipo_Jugador';

    public function Insertar($ID_Equipo, $ID_Jugador, $Dorsal) {
        // $fecha = date_create($Fecha_Nacimiento);
        // $fecha = date_format($fecha,"Y/m/d");

        // $fecha=$Fecha_Nacimiento;
        // echo $fecha;
        // $nuevaFecha=implode('/',array_reverse(explode('/',$fecha)));

        // echo $nuevaFecha;
        // echo $fecha;                                 (STR_TO_DATE(REPLACE('15/01/2005','/','.') ,GET_FORMAT(date,'EUR')))
        $conexion = new Conexion();
        
        $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' (ID_Equipo, ID_Jugador, Dorsal) VALUES (:ID_Equipo, :ID_Jugador, :Dorsal)');
		
		$consulta->bindParam(':ID_Equipo', $ID_Equipo);
        $consulta->bindParam(':ID_Jugador', $ID_Jugador);
        $consulta->bindParam(':Dorsal', $Dorsal);

        // echo $Fecha_Nacimiento;

        $resultado = $consulta->execute();

        if (!$resultado) {
            $error = $consulta->errorInfo()[2];
            echo $error;
        }
        $conexion = null;

	    return $resultado;
    }

    public function Modificar($ID_Equipo, $ID_Jugador, $Dorsal) {
        $conexion = new Conexion();

        $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET ID_Equipo =:ID_Equipo, ID_Jugador = :ID_Jugador, Dorsal = :Dorsal WHERE ID_Equipo = :ID_Equipo');

        $consulta->bindParam(':ID_Equipo', $ID_Equipo);
        $consulta->bindParam(':ID_Jugador', $ID_Jugador);
        $consulta->bindParam(':Dorsal', $Dorsal);
        

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

    public function buscarPorID_Equipo($ID_Equipo) {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE ID_Equipo = :ID_Equipo');
        $consulta->bindParam(':ID_Equipo', $ID_Equipo);
        $consulta->execute();
        $arrayRegistros = $consulta->fetchAll();
        // print($consulta->queryString);
        // echo " equipo= $ID_Equipo---";
         $conexion = null;

//        print_R($arrayRegistros);
      
        return $arrayRegistros;
    }


    public function Listar() {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT *  FROM ' . self::TABLA);
        $consulta->execute();
        $arrayRegistros = $consulta->fetchAll();
        $conexion = null;

        return $arrayRegistros;
    }

    //Metodo que verifica si es usuario o no.
    // public function esUsuario($ID_Equipo,$ID_Jugador){
    // 	$conexion = new Conexion();
    // 	$consulta=$conexion->prepare('SELECT COUNT(*) FROM '. self::TABLA . ' WHERE ID_Equipo=:ID_Equipo AND ID_Jugador=:ID_Jugador');

    //     $consulta->bindParam(':ID_Equipo', $ID_Equipo);
    //     $consulta->bindParam(':ID_Jugador', $ID_Jugador);

    //     $consulta->execute();

    //     $registro = $consulta->fetch();
    //     $conexion=null;

    //     foreach ($registro as $value) {
    //     	if($value[0]==1)
    //     		return 1;
	// 	}
    //     return 0;

    // }

}

?>