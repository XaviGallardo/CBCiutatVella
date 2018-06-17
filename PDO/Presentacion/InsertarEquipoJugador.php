<?php
    require "../Negocio/EquipoJugador.php";
    require "../Negocio/Equipo.php";
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


}

// foreach ($arrayPersonas as $objPersona) {
//     echo "<tr>";
//         echo "<td>" .$objPersona->getNombre() . "</td>";
//         echo "<td>" .$objPersona->getDNI() . "</td>";
//         echo "<td>" .$objPersona->getApellido1() . "</td>";
//         echo "<td>" .$objPersona->getApellido2() . "</td>";
//         echo "<td>" .$objPersona->getFecha_Nacimiento() . "</td>";
//         echo "<td>" .$objPersona->getTelefono() . "</td>";
//         echo "<td>" .$objPersona->geteMail() . "</td>";
//         echo "<td>" .$objPersona->getDireccion() . "</td>";
//         echo "<td>" .$objPersona->getTipo() . "</td>";
//         echo "<td>" .$objPersona->getCategoria() . "</td>";
//     echo "</tr>";
// }
?>




    
</body>
</html>