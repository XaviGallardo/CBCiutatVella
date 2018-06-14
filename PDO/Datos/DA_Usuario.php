<?php

require_once 'Conexion.php';


class dataUsuario {

	const TABLA = 'usuarios';

    public function Insertar($User, $Pswd, $Role) {
        // $fecha = date_create($Fecha_Nacimiento);
        // $fecha = date_format($fecha,"Y/m/d");

        // $fecha=$Fecha_Nacimiento;
        // echo $fecha;
        // $nuevaFecha=implode('/',array_reverse(explode('/',$fecha)));

        // echo $nuevaFecha;
        // echo $fecha;                                 (STR_TO_DATE(REPLACE('15/01/2005','/','.') ,GET_FORMAT(date,'EUR')))
        $conexion = new Conexion();
        
        $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' (User, Pswd, Role) VALUES (:User, :Pswd, :Role)');
		
		$consulta->bindParam(':User', $User);
        $consulta->bindParam(':Pswd', $Pswd);
        $consulta->bindParam(':Role', $Role);

        // echo $Fecha_Nacimiento;

        $resultado = $consulta->execute();

        if (!$resultado) {
            $error = $consulta->errorInfo()[2];
            echo $error;
        }
        $conexion = null;

	    return $resultado;
    }

    public function Modificar($User, $Pswd, $Role) {
        $conexion = new Conexion();

        $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET User =:User, Pswd = :Pswd, Role = :Role WHERE User = :User');

        $consulta->bindParam(':User', $User);
        $consulta->bindParam(':Pswd', $Pswd);
        $consulta->bindParam(':Role', $Role);
        

        $resultado = $consulta->execute();
        
        if (!$resultado) {
            $error = $consulta->errorInfo()[2];
            echo $error;
        }
        
        $conexion = null;

		return $resultado;
    }

    public function Eliminar($User){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE User = :User');
        $consulta->bindParam(':User', $User);
        $resultado=$consulta->execute();
        $conexion = null;

        return $resultado;
    }

    public function buscarPorUser($User) {

    	$conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE User = :User');
        $consulta->bindParam(':User', $User);
        $consulta->execute();
        $registro = $consulta->fetch();
        $conexion = null;
      
        return $registro;
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
    public function esUsuario($User,$Pswd){
    	$conexion = new Conexion();
    	$consulta=$conexion->prepare('SELECT COUNT(*) FROM '. self::TABLA . ' WHERE User=:User AND Pswd=:Pswd');

        $consulta->bindParam(':User', $User);
        $consulta->bindParam(':Pswd', $Pswd);

        $consulta->execute();

        $registro = $consulta->fetch();
        $conexion=null;

        foreach ($registro as $value) {
        	if($value[0]==1)
        		return 1;
		}
        return 0;

    }

}

?>