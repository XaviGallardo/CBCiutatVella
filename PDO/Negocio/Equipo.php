<?php

require_once "../Datos/DA_Equipo.php";

class Equipo {

	private $ID_Equipo;
    private $Nombre;
    private $Genero;
    // private $Lista_Entrenadores = array();
    // private $Dorsales = array();
    // private $Lista_Jugadores = array();
    private $Categoria;

    public function __construct ($ID_Equipo=null,  $Nombre=null, $Genero=null, $Categoria=null) {
        $this->ID_Equipo = $ID_Equipo;
        $this->Nombre = $Nombre;
        $this->Genero = $Genero;
        
        $this->Categoria = $Categoria;
    }

// Creamos los GET
    public function getID_Equipo() {
        return $this->ID_Equipo;
    }
 
    public function getNombre() {
        return $this->Nombre;
    }

    public function getGenero() {
        return $this->Genero;
    }

   
    // public function getLista_Entrenadores() {
    //     return $this->Lista_Entrenadores;
    // }
    // public function getDorsales() {
    //     return $this->Dorsales;
    // }
    // public function getLista_Jugadores() {
    //     return $this->Lista_Jugadores;
    // }

    public function getCategoria() {
        return $this->Categoria;
    }

    // Creamos los SET
    public function setID_Equipo($ID_Equipo) {
        $this->ID_Equipo = $ID_Equipo;
    }

    public function setNombre($Nombre) {
        $this->Nombre = $Nombre;
    }

    public function setGenero($Genero) {
        $this->Genero = $Genero;
    }

    // public function setLista_Entrenadores($Lista_Entrenadores) {
    //     $this->Lista_Entrenadores = $Lista_Entrenadores;
    // }
    // public function setDorsales($Dorsales) {
    //     $this->Dorsales = $Dorsales;
    // }
    // public function setLista_Jugadores($Lista_Jugadores) {
    //     $this->Lista_Jugadores = $Lista_Jugadores;
    // }
   
    public function setCategoria($Categoria) {
        $this->Categoria = $Categoria;
    }
// Creamos las funciones básicas

    public function Insertar() {
        $objDataEquipo = new DataEquipo();
        $resultado = $objDataEquipo->Insertar($this->Nombre ,$this->Genero  ,$this->Categoria);
        return $resultado;
    }

    public function Modificar() {
        $objDataEquipo = new DataEquipo();
        $resultado = $objDataEquipo->Modificar($this->ID_Equipo ,$this->Nombre ,$this->Genero ,$this->Categoria);
        return $resultado;
    }
    
    public function Eliminar(){
        $objDataEquipo = new DataEquipo();
        $resultado = $objDataEquipo->Eliminar($this->ID_Equipo);
	    return $resultado;
    }

    public function buscarPorNombre($Nombre) {
        $objDataEquipo = new DataEquipo();
        $registro = $objDataEquipo->buscarPorNombre($Nombre);
        if ($registro)
            return new self($registro['ID_Equipo'], $Nombre,$registro['Genero'],$registro['Categoria']);
        else 
            return false;
    }

    public function Listar() {
        $objDataEquipo = new DataEquipo();
        $arrayRegistros = $objDataEquipo->Listar();

        if (!$arrayRegistros)
            return false;
        else {
            $arrayEquipos = array();
            foreach ($arrayRegistros as $registro) {
                $objgEquipo = new Equipo($registro['ID_Equipo'] ,$registro['Nombre'],$registro['Genero'],$registro['Categoria']);
                $arrayEquipos[] = $objgEquipo;
            }

            return $arrayEquipos;
        }
    }


}

?>