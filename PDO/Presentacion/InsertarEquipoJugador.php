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
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Club Basquet Ciutat Vella Barcelona</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
        crossorigin="anonymous">
    <link rel="stylesheet" href="/main.css">
    <link rel="stylesheet" href="../../style/prueba.css">
    <link rel="icon" type="image/png" href="public/favicon.png" />
</head>
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
    $_SESSION['EquipoAñadeJugador'] = $Equipo2->getID_Equipo();


    echo "<tr>";
            echo "<td>" .$Equipo2->getNombre() . "</td>";
            echo "<td>" .$Equipo2->getGenero() . "</td>";
            echo "<td>" .$Equipo2->getCategoria() . "</td>";
    echo "</tr>";

?>


    <!-- <img class="mb-4" src="../../public/pelota-basquet.png" alt="" width="72" height="72"> -->
                
             
    <a href="InsertarJugadorEnEquipo.php" class="btn btn-lg btn-primary btn-block" type="submit" name="BtAddPlayer">+ Jugador</a>
    <a href="" class="btn btn-lg btn-primary btn-block" type="submit" name="BtModPlayert">Modifica Jugador</a>
                

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

     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
        crossorigin="anonymous"></script>
</html>