<?php

require_once 'Conexion.php';


class dataPersona {

	const TABLA = 'personas';

	public function Insertar($ID_Persona, $DNI, $Nombre, $Apellido1, $Apellido2, $Fecha_Nacimiento, $Telefono, $eMail, $Direccion, $Tipo, $Categoria) {
    	$conexion = new Conexion();
        
        $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' (ID_Persona, DNI, Nombre, Apellido1, Apellido2, Fecha_Nacimiento, Telefono, eMail, Direccion, Tipo, Categoria) VALUES(:ID_Persona, :DNI, :Nombre, :Apellido1, :Apellido2, :Fecha_Nacimiento, :Telefono, :eMail, :Direccion, :Tipo, :Categoria)');
		
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
        $conexion = null;

	    return $resultado;
    }

    public function Modificar($ID_Persona, $DNI, $Nombre, $Apellido1, $Apellido2, $Fecha_Nacimiento, $Telefono, $eMail, $Direccion, $Tipo, $Categoria) {
        $conexion = new Conexion();

        $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET ID_Persona = :ID_Persona, Nombre = :Nombre, Apellido1 = :Apellido1, Apellido2 = :Apellido2, Fecha_Nacimineto = :Fecha_Nacimineto, Telefono = :Telefono, eMail = :eMail, Direccion = :Direccion, Tipo = :Tipo, Categoria = :Categoria WHERE DNI = :DNI');

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

        $resultado= $consulta->execute();
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
        $consulta = $conexion->prepare('SELECT ID_Persona, Nombre ,Apellido1 ,Apellido2 ,Fecha_Nacimiento ,Telefono ,eMAil ,Direccion ,Tipo, Categoria  FROM ' . self::TABLA . ' WHERE DNI = :DNI');
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