<?php

require_once "../Datos/DA_EquipoJugador.php";

class EquipoJugador {

	private $ID_Equipo;
    private $ID_Jugador;
    private $Dorsal;

    public function __construct ($ID_Equipo=null, $ID_Jugador=null, $Dorsal=null) {
        $this->ID_Equipo = $ID_Equipo;
        $this->ID_Jugador = $ID_Jugador;
        $this->Dorsal = $Dorsal;
       
    }

// Creamos los GET
    public function getID_Equipo() {
        return $this->ID_Equipo;
    }

    public function getID_Jugador() {
        return $this->ID_Jugador;
    }
 
    public function getDorsal() {
        return $this->Dorsal;
    }

    // Creamos los SET
    public function setID_Equipo($ID_Equipo) {
        $this->ID_Equipo = $ID_Equipo;
    }

    public function setID_Jugador($ID_Jugador){
        $this->ID_Jugador = $ID_Jugador;
    }

    public function setDorsal($Dorsal) {
        $this->Dorsal = $Dorsal;
    }

// Creamos las funciones básicas

    public function Insertar() {
        $objDataEquipoJugador = new DataEquipoJugador();
        $resultado = $objDataEquipoJugador->Insertar($this->ID_Equipo ,$this->ID_Jugador ,$this->Dorsal);
        return $resultado;
    }

    public function Modificar() {
        $objDataEquipoJugador = new DataEquipoJugador();
        $resultado = $objDataEquipoJugador->Modificar($this->ID_Equipo ,$this->ID_Jugador ,$this->Dorsal);
        return $resultado;
    }
    
    public function Eliminar( ){
        $objDataEquipoJugador = new DataEquipoJugador();
        $resultado = $objDataEquipoJugador->Eliminar($this->ID_Equipo ,$this->ID_Jugador);
	    return $resultado;
    }

    public function buscarPorID_Equipo($ID_Equipo) {
        $objDataEquipoJugador = new DataEquipoJugador();
        $arrayRegistros = $objDataEquipoJugador->buscarPorID_Equipo($ID_Equipo);
        if (!$arrayRegistros)
            return false;
        else {
            $arrayEquipoJugadores = array();
            foreach ($arrayRegistros as $registro) {
                $objgEquipoJugador = new EquipoJugador($registro['ID_Equipo'] ,$registro['ID_Persona'] ,$registro['Dorsal']);
                $arrayEquipoJugadores[] = $objgEquipoJugador;
            }
        return $arrayEquipoJugadores;
        }
            
    }

    public function Listar() {
        $objDataEquipoJugador = new DataEquipoJugador();
        $arrayRegistros = $objDataEquipoJugador->Listar();

        if (!$arrayRegistros)
            return false;
        else {
            $arrayEquipoJugadores = array();
            foreach ($arrayRegistros as $registro) {
                $objgEquipoJugador = new EquipoJugador($registro['ID_Equipo'] ,$registro['ID_Persona'] ,$registro['Dorsal']);
                $arrayEquipoJugadores[] = $objgEquipoJugador;
            }

            return $arrayEquipoJugadores;
        }
    }

    public function esEquipoJugador($ID_Equipo,$ID_Jugador){
        $objDataEquipoJugador = new DataEquipoJugador();
        $registro = $objDataEquipoJugador->esEquipoJugador($ID_Equipo,$ID_Jugador);
        return $registro;
    }
    
}

?>