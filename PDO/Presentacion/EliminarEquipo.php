<?php
    require "../Negocio/Equipo.php";
?>
<?php 
	session_start();
 ?>
<html>
<head></head>
<body>
    


<h1>ELIMINA EQUIPO DEL CLUB</h1>

<!-- <h1>Aquí también implemetar la busqueda por el primer apellido u otros campos</h1> -->

<h2>Busca el equipo que quieres ELIMINAR .</h2>

<form action="EliminarEquipo.php" method="post">
Introduce el Nombre del Equipo:
    <input type="text" name="BuscaNombre" placeholder="Nombre Equipo" required><br>
    <input type="submit" value="Busca Equipo" name="BtBuscaEquipo">

</form>
<?php
if (isset($_POST['BtBuscaEquipo'])){

    $error="";
    $objEquipo = new Equipo();

    $equipo = $objEquipo -> buscarPorNombre($_POST['BuscaNombre']);
}
    if ($equipo){
// print_r ($equipo);
    $_SESSION["NumEquipo"] = $equipo->getID_Equipo();
?>
<form action="EliminarEquipo.php" method="post">
        <h3>Vas a Eliminar al Equipo número:<?php echo ($_SESSION["NumEquipo"])?></h3>
    <table border='2'>
        <tr><td>Nombre: </td><td><input type="text" value="<?php echo ($equipo->getNombre())?>" name="BtNombre_E" required> </td></tr>
        <tr><td>Genero: </td><td><input type="text" value="<?php echo ($equipo->getGenero())?>" name="BtGenero_E"required></td></tr>
        <tr><td>Categoria: </td><td><input type="text" value="<?php echo ($equipo->getCategoria())?>" name="BtCategoria_E"required></td></tr>
    </table>
    <br>
    <input type="submit" value="ELIMINA Equipo" name="BtElimina">
</form>

<?php
}
// Para cambiar el formato de la fecha de: 29/12/1981 a: 1981/12/29  osea de d/m/a a: yyyy/m/d
// implode('/',array_reverse(explode('/',$_POST['BtFecha_Nacimiento'])));
if (isset($_POST['BtElimina'])) {
//    print ($_POST['BtDNI_M']);
    $error="";   
    echo "ENTRO?";   
   $objEquipo2 = new Equipo($_SESSION["NumEquipo"], $_POST['BtNombre_E'], $_POST['BtGenero_E'], $_POST['BtCategoria_E']);
   print_r($objEquipo2);
   echo "ENTRO2?";
   $resultado2 = $objEquipo2 -> Eliminar();
    echo "ENTRO3?";
   // Motrar el resultado de los registro de la base de datos
    if ($resultado2)
        echo "Registro Eliminado";
    else
        echo "Error en la Eliminación";   
}

?>
    
</body>
</html>