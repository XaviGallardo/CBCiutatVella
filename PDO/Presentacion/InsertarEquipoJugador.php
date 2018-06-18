<?php
    require "../Negocio/EquipoJugador.php";
    require "../Negocio/Equipo.php";
    require "../Negocio/Persona.php";
    // $arrayOpciones[0]= 'Masculino';
    // $arrayOpciones[1]= 'Femenino';
    // $arrayOpciones[2]= 'Mixto';
   
?>

<html>
<head></head>
<body>
    
<h1>AÑADE JUGADORES A LOS EQUIPOS DEL CLUB</h1>

<?php
$objEquipo = new Equipo();

$arrayEquipos = $objEquipo -> Listar();
?>


<form action="InsertarEquipoJugador.php" method="post">
    
    <select name="BtEquipo" id="BtEquipo" required>
        <option value="">Selecciona un Equipo</option>
        <?php
        foreach ($arrayEquipos as $equipo) 
        {?>
           <option value="<?php echo $equipo->getNombre() ?>"><?php echo $equipo->getNombre() ?></option>
<?php   } ?> 

    </select>
<br>
<br>
    <input type="submit" value="Seleccion Equipo" name="BtEquipo2">
</form>
<br>
<br>

<?php

if (isset($_POST['BtEquipo2'])){
?>
<table border='2'>
<thead>
<tr>
	<td>Nombre Equipo</td>
	<td>Genero</td>
    <td>Categoria</td>
</tr>
</thead>

<?php 

$objEquipo2 = new Equipo();

$Equipo2 = $objEquipo2 -> buscarPorNombre($_POST['BtEquipo']);



echo "<tr>";
         echo "<td>" .$Equipo2->getNombre() . "</td>";
         echo "<td>" .$Equipo2->getGenero() . "</td>";
         echo "<td>" .$Equipo2->getCategoria() . "</td>";
echo "</tr>";

?>





<table border='2'>
<thead>
<tr>
	<td>Dorsal</td>
	<td>Nombre</td>
    <td>Apellido 1</td>
    <td>Apellido 2</td>
</tr>
</thead>

<?php




$objEquipoJugador = new EquipoJugador();
$arrayEquipoJugadores = $objEquipoJugador -> buscarPorID_Equipo($Equipo2->getID_Equipo());

// $arrayEquipoJugadores = $objEquipoJugador -> Listar();
// echo ($Equipo2->getID_Equipo());
// print_r($arrayEquipoJugadores);

if (!$arrayEquipoJugadores){
    echo "Todavía no hay Jugador@s asignados al Equipo.";
}else{

 foreach ($arrayEquipoJugadores as $equipoJugador) {
    echo "<tr>";
         echo "<td>" .$equipoJugador->getDorsal() . "</td>";
         
         $IDpersona = $equipoJugador->getID_Jugador();
         $objPersona = new Persona();
         $objPersona = $objPersona->buscarPorID_Persona($IDpersona);

        echo "<td>" .$objPersona->getNombre() . "</td>";


         
        echo "<td>" .$objPersona->getApellido1() . "</td>";
        echo "<td>" .$objPersona->getApellido2() . "</td>";

     echo "</tr>";
 }
 }
 }
?>




    
</body>
</html>