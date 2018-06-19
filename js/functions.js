function Eliminiar($equip, $jug) {
    $objEquipoJugador = new EquipoJugador($equip, $jug);
    $objEquipoJugador->Eliminar();
}