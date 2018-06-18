<?php
    require "../Negocio/EquipoJugador.php";
    require "../Negocio/Equipo.php";
    require "../Negocio/Persona.php";
    // $arrayOpciones[0]= 'Masculino';
    // $arrayOpciones[1]= 'Femenino';
    // $arrayOpciones[2]= 'Mixto';
   session_start();
?>

<html>
<head></head>
<body>
    
<h1>AÑADE JUGADOR AL EQUIPO</h1>

<?php
echo "Vas a añadir 1 Jugador al Equipo: ". $_SESSION['EquipoAñadeJugador'];

$objJugador = new Persona();
$Tipo ='Jugador';
$arrayJugadores = $objJugador -> ListarPorTipo($Tipo);


?>


<form action="InsertarJugadorEnEquipo.php" method="post">
    
    <select name="BtJugador" id="BtJugador" required>
        <option value="">Selecciona un Jugador</option>
        <?php
        foreach ($arrayJugadores as $Jugador) 
        {?>
           <option value="<?php echo $Jugador->getNombre() ?>"><?php echo $Jugador->getNombre() ." ". $Jugador->getApellido1() ." ". $Jugador->getApellido2()  ?></option>
<?php   } ?> 

    </select>
<br>
<br>
    <input type="number" name="BtDorsal" placeholder="Dorsal" required>
<br>
<br>
    <input type="submit" value="Selecciona Jugador" name="BtJugador2">
</form>
<br>
<br>

<?php

if (isset($_POST['BtJugador2'])){

    $objEquipoJugador = new EquipoJugador($_SESSION['EquipoAñadeJugador'],$Jugador->getID_Persona() ,$_POST['BtDorsal']);
print_r($objEquipoJugador);
    $resultado = $objEquipoJugador -> Insertar();
     
  
   

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

<!-- <form class="form-signin" action="InsertarEquipoJugador.php" method="post"> -->
    <!-- <img class="mb-4" src="../../public/pelota-basquet.png" alt="" width="72" height="72"> -->
                
               
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="BtAddPlayer">+ Jugador</button>
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="BtModPlayert">Modifica Jugador</button>
                
<!-- </form> -->

<?php
    if (isset($_POST['BtAddPlayer'])) 
    {

    echo '<script type="text/javascript">
           window.location = "InsertarJugadorEnEquipo.php"
      </script>';

    }?>
        <form  action="InsertarJugadorEnEquipo.php" method="post">
    
    
        

    <?php }

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
 
?>




    
</body>
</html>





+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<select name="BtJugador" id="BtJugador" required>
        <option value="">Selecciona un Jugador</option>
        <?php

        $objJugador = new Persona();
        $arrayJugadores = $objJugador->ListarPorTipo('Jugador');

        foreach ($arrayJugadores as $Jugador) 
        {?>
           <option value="<?php echo $Jugador->getNombre() ?>"><?php echo $Jugador->getNombre() . $Jugador->getApellido1() . $Jugador->getApellido2()?></option>
<?php   } ?> 

    </select>
<br>
<br>
    <input type="submit" value="Añade Jugador" name="BtConfirmPlayer">
</form>
<br>