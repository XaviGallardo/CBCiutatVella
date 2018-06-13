<?php

require_once 'Conexion.php';


class dataPersona {

	const TABLA = 'personas';

    public function Insertar($DNI, $Nombre, $Apellido1, $Apellido2, $Fecha_Nacimiento, $Telefono, $eMail, $Direccion, $Tipo, $Categoria) {
        // $fecha = date_create($Fecha_Nacimiento);
        // $fecha = date_format($fecha,"Y/m/d");

        // $fecha=$Fecha_Nacimiento;
        // echo $fecha;
        // $nuevaFecha=implode('/',array_reverse(explode('/',$fecha)));

        // echo $nuevaFecha;
        // echo $fecha;                                 (STR_TO_DATE(REPLACE('15/01/2005','/','.') ,GET_FORMAT(date,'EUR')))
        $conexion = new Conexion();
        
        $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' (DNI, Nombre, Apellido1, Apellido2, Fecha_Nacimiento, Telefono, eMail, Direccion, Tipo, Categoria) VALUES (:DNI, :Nombre, :Apellido1, :Apellido2, :Fecha_Nacimiento, :Telefono, :eMail, :Direccion, :Tipo, :Categoria )');
		
		$consulta->bindParam(':DNI', $DNI);
        $consulta->bindParam(':Nombre', $Nombre);
        $consulta->bindParam(':Apellido1', $Apellido1);
        $consulta->bindParam(':Apellido2', $Apellido2);
        $consulta->bindParam(':Fecha_Nacimiento', $Fecha_Nacimiento);
        $consulta->bindParam(':Telefono', $Telefono);
        $consulta->bindParam(':eMail', $eMail);
        $consulta->bindParam(':Direccion', $Direccion);
        $consulta->bindParam(':Tipo', $Tipo);
        $consulta->bindParam(':Categoria', $Categoria);

        // echo $Fecha_Nacimiento;

        $resultado = $consulta->execute();

        if (!$resultado) {
            $error = $consulta->errorInfo()[2];
            echo $error;
        }
        $conexion = null;

	    return $resultado;
    }

    public function Modificar($ID_Persona,  $DNI, $Nombre, $Apellido1, $Apellido2, $Fecha_Nacimiento, $Telefono, $eMail, $Direccion, $Tipo, $Categoria) {
        $conexion = new Conexion();

        $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET DNI =:DNI, Nombre = :Nombre, Apellido1 = :Apellido1, Apellido2 = :Apellido2, Fecha_Nacimiento = :Fecha_Nacimiento, Telefono = :Telefono, eMail = :eMail, Direccion = :Direccion, Tipo = :Tipo, Categoria = :Categoria WHERE ID_Persona = :ID_Persona');

        $consulta->bindParam(':ID_Persona', $ID_Persona);
        $consulta->bindParam(':DNI', $DNI);
        $consulta->bindParam(':Nombre', $Nombre);
        $consulta->bindParam(':Apellido1', $Apellido1);
        $consulta->bindParam(':Apellido2', $Apellido2);
        $consulta->bindParam(':Fecha_Nacimiento', $Fecha_Nacimiento);
        $consulta->bindParam(':Telefono', $Telefono);
        $consulta->bindParam(':eMail', $eMail);
        $consulta->bindParam(':Direccion', $Direccion);
        $consulta->bindParam(':Tipo', $Tipo);
        $consulta->bindParam(':Categoria', $Categoria);

        $resultado = $consulta->execute();
        
        if (!$resultado) {
            $error = $consulta->errorInfo()[2];
            echo $error;
        }
        
        $conexion = null;

		return $resultado;
    }

    public function Eliminar($DNI){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE DNI = :DNI');
        $consulta->bindParam(':DNI', $DNI);
        $resultado=$consulta->execute();
        $conexion = null;

        return $resultado;
    }

    public function buscarPorDNI($DNI) {

    	$conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE DNI = :DNI');
        $consulta->bindParam(':DNI', $DNI);
        $consulta->execute();
        $registro = $consulta->fetch();
        $conexion = null;
      
        return $registro;
    }


    public function Listar() {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT ID_Persona,DNI ,Nombre ,Apellido1 ,Apellido2 ,Fecha_Nacimiento ,Telefono ,eMAil ,Direccion, Tipo, Categoria  FROM ' . self::TABLA);
        $consulta->execute();
        $arrayRegistros = $consulta->fetchAll();
        $conexion = null;

        return $arrayRegistros;
    }


}

?>