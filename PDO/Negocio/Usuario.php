<?php

require_once "../Datos/DA_Usuario.php";

class Usuario {

	private $User;
    private $Pswd;
    private $Role;

    public function __construct ($User=null, $Pswd=null, $Role=null) {
        $this->User = $User;
        $this->Pswd = $Pswd;
        $this->Role = $Role;
       
    }

// Creamos los GET
    public function getUser() {
        return $this->User;
    }

    public function getPswd() {
        return $this->Pswd;
    }
 
    public function getRole() {
        return $this->Role;
    }

    // Creamos los SET
    public function setUser($User) {
        $this->User = $User;
    }

    public function setPswd($Pswd){
        $this->Pswd = $Pswd;
    }

    public function setRole($Role) {
        $this->Role = $Role;
    }

// Creamos las funciones básicas

    public function Insertar() {
        $objDataUsuario = new DataUsuario();
        $resultado = $objDataUsuario->Insertar($this->User ,$this->Pswd ,$this->Role);
        return $resultado;
    }

    public function Modificar() {
        $objDataUsuario = new DataUsuario();
        $resultado = $objDataUsuario->Modificar($this->User ,$this->Pswd ,$this->Role);
        return $resultado;
    }
    
    public function Eliminar(){
        $objDataUsuario = new DataUsuario();
        $resultado = $objDataUsuario->Eliminar($this->User);
	    return $resultado;
    }

    public function buscarPorUser($User) {
        $objDataUsuario = new DataUsuario();
        $registro = $objDataUsuario->buscarPorUser($User);
        if ($registro)
            return new self($registro['User'],$registro['Pswd'],$registro['Role']);
        else 
            return false;
    }

    public function Listar() {
        $objDataUsuario = new DataUsuario();
        $arrayRegistros = $objDataUsuario->Listar();

        if (!$arrayRegistros)
            return false;
        else {
            $arrayUsuarios = array();
            foreach ($arrayRegistros as $registro) {
                $objgUsuario = new Usuario($registro['User'] ,$registro['Pswd'] ,$registro['Role']);
                $arrayUsuarios[] = $objgUsuario;
            }

            return $arrayUsuarios;
        }
    }

    public function esUsuario($User,$Pswd){
        $objDataUsuario = new DataUsuario();
        $registro = $objDataUsuario->esUsuario($User,$Pswd);
        return $registro;
    }
    
}

?>