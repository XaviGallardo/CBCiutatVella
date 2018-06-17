<?php

require_once "../Datos/DA_Persona.php";

class Persona {

	private $ID_Persona;
    private $DNI;
    private $Nombre;
    private $Apellido1;
    private $Apellido2;
    private $Fecha_Nacimiento;
    private $Telefono;
    private $eMail;
    private $Direccion;
    private $Tipo;
    private $Categoria;

    public function __construct ($ID_Persona=null, $DNI=null, $Nombre=null, $Apellido1=null, $Apellido2=null, $Fecha_Nacimiento=null, $Telefono=null, $eMail=null, $Direccion=null, $Tipo=null, $Categoria=null) {
        $this->ID_Persona = $ID_Persona;
        $this->DNI = $DNI;
        $this->Nombre = $Nombre;
        $this->Apellido1 = $Apellido1;
        $this->Apellido2 = $Apellido2;
        $this->Fecha_Nacimiento = $Fecha_Nacimiento; 
        $this->Telefono = $Telefono;
        $this->eMail = $eMail;
        $this->Direccion = $Direccion;
        $this->Tipo = $Tipo;
        $this->Categoria = $Categoria;
    }

// Creamos los GET
    public function getID_Persona() {
        return $this->ID_Persona;
    }

    public function getDNI() {
        return $this->DNI;
    }
 
    public function getNombre() {
        return $this->Nombre;
    }

    public function getApellido1() {
        return $this->Apellido1;
    }

    public function getApellido2() {
        return $this->Apellido2;
    }
    public function getFecha_Nacimiento() {
        return $this->Fecha_Nacimiento;
    }
    public function getTelefono() {
        return $this->Telefono;
    }
    public function geteMail() {
        return $this->eMail;
    }
    public function getDireccion() {
        return $this->Direccion;
    }
    public function getTipo() {
        return $this->Tipo;
    }
    public function getCategoria() {
        return $this->Categoria;
    }

    // Creamos los SET
    public function setID_Persona($ID_Persona) {
        $this->ID_Persona = $ID_Persona;
    }

    public function setDNI($DNI){
        $this->DNI = $DNI;
    }

    public function setNombre($Nombre) {
        $this->Nombre = $Nombre;
    }

    public function setApellido1($Apellido1) {
        $this->Apellido1 = $Apellido1;
    }

    public function setApellido2($Apellido2) {
        $this->Apellido2 = $Apellido2;
    }
    public function setFecha_Nacimiento($Fecha_Nacimiento) {
        $this->Fecha_Nacimiento = $Fecha_Nacimiento;
    }
    public function setTelefono($Telefono) {
        $this->Telefono = $Telefono;
    }
    public function seteMail($eMail) {
        $this->eMAil = $eMail;
    }
    public function setDireccion($Direccion) {
        $this->Direccion = $Direccion;
    }
    public function setTipo($Tipo) {
        $this->Tipo = $Tipo;
    }
    public function setCategoria($Categoria) {
        $this->Categoria = $Categoria;
    }
// Creamos las funciones básicas

    public function Insertar() {
        $objDataPersona = new DataPersona();
        $resultado = $objDataPersona->Insertar($this->DNI ,$this->Nombre ,$this->Apellido1 ,$this->Apellido2 ,$this->Fecha_Nacimiento ,$this->Telefono ,$this->eMail ,$this->Direccion ,$this->Tipo ,$this->Categoria);
        return $resultado;
    }

    public function Modificar() {
        $objDataPersona = new DataPersona();
        $resultado = $objDataPersona->Modificar($this->ID_Persona,$this->DNI ,$this->Nombre ,$this->Apellido1 ,$this->Apellido2 ,$this->Fecha_Nacimiento ,$this->Telefono ,$this->eMail ,$this->Direccion,$this->Tipo,$this->Categoria);
        return $resultado;
    }
    
    public function Eliminar(){
        $objDataPaciente = new DataPersona();
        $resultado = $objDataPaciente->Eliminar($this->DNI);
	    return $resultado;
    }

    public function buscarPorDNI($DNI) {
        $objDataPersona = new DataPersona();
        $registro = $objDataPersona->buscarPorDNI($DNI);
        if ($registro)
            return new self($registro['ID_Persona'], $DNI,$registro['Nombre'],$registro['Apellido1'],$registro['Apellido2'],$registro['Fecha_Nacimiento'],$registro['Telefono'],$registro['eMail'],$registro['Direccion'],$registro['Tipo'],$registro['Categoria']);
        else 
            return false;
    }

    public function ListarPorTipo($Tipo) {
        $objDataPersona = new DataPersona();
        $arrayRegistros = $objDataPersona->ListarPorTipo($Tipo);

        if (!$arrayRegistros)
            return false;
        else {
            $arrayPersonas = array();
            foreach ($arrayRegistros as $registro) {
                $objgPersona = new Persona($registro['ID_Persona'] ,$registro['DNI'] ,$registro['Nombre'],$registro['Apellido1'],$registro['Apellido2'],$registro['Fecha_Nacimiento'],$registro['Telefono'],$registro['eMAil'],$registro['Direccion'],$Tipo,$registro['Categoria']);
                $arrayPersonas[] = $objgPersona;
            }

            return $arrayPersonas;
        }
    }

    public function Listar() {
        $objDataPersona = new DataPersona();
        $arrayRegistros = $objDataPersona->Listar();

        if (!$arrayRegistros)
            return false;
        else {
            $arrayPersonas = array();
            foreach ($arrayRegistros as $registro) {
                $objgPersona = new Persona($registro['ID_Persona'] ,$registro['DNI'] ,$registro['Nombre'],$registro['Apellido1'],$registro['Apellido2'],$registro['Fecha_Nacimiento'],$registro['Telefono'],$registro['eMAil'],$registro['Direccion'],$registro['Tipo'],$registro['Categoria']);
                $arrayPersonas[] = $objgPersona;
            }

            return $arrayPersonas;
        }
    }


}

?>