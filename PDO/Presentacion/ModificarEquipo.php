<?php
    require "../Negocio/Equipo.php";
    $arrayOpciones[0]= 'Masculino';
    $arrayOpciones[1]= 'Femenino';
    $arrayOpciones[2]= 'Mixto';
   
?>
<?php 
	session_start();
 ?>
<html>
<head></head>
<body>
    


<h1>MODIFICA EQUIPO DEL CLUB</h1>

<!-- <h1>Aquí también implemetar la busqueda por el primer apellido u otros campos</h1> -->

<h2>Busca el equipo que quieres modificar.</h2>

<form action="ModificarEquipo.php" method="post">
Introduce el Nombre del Equipo:
    <input type="text" name="BuscaNombre" placeholder="Nombre Equipo" required><br>
    <input type="submit" value="Busca Equipo" name="BtBuscaEquipo">

</form>

<?php
if (isset($_POST['BtBuscaEquipo'])){

    $error="";
    $objEquipo = new Equipo();

    $equipo = $objEquipo -> buscarPorNombre($_POST['BuscaNombre']);

    if ($equipo){
    // print_r ($equipo);
    $_SESSION["NumEquipo"] = $equipo->getID_Equipo();
 }   








?>
<form action="ModificarEquipo.php" method="post">
        <h3>Vas a modificar el Equipo número:<?php echo ($_SESSION["NumEquipo"])?></h3>
    <table border='2'>
        <tr><td>Nombre: </td><td><input type="text" value="<?php echo ($equipo->getNombre())?>" name="BtNombre_M" required> </td></tr>
        <tr><td>Genero: </td><td><select name="BtGenero_M" id="BtGenero_M" required>
        <option value=""><?php echo ($equipo->getGenero())?></option>
        <?php
        foreach ($arrayOpciones as $opcion) 
        {?>
           <option value="<?php echo $opcion ?>"><?php echo $opcion ?></option>
        <?php   } ?> 

        </select></td></tr>
    
        <tr><td>Categoria: </td><td><input type="text" value="<?php echo ($equipo->getCategoria())?>" name="BtCategoria_M"required></td></tr>
    </table>
    <br>
    <input type="submit" value="MODIFICA EQUIPO" name="BtModifica">
</form>

<?php
}

// Para cambiar el formato de la fecha de: 29/12/1981 a: 1981/12/29  osea de d/m/a a: yyyy/m/d
// implode('/',array_reverse(explode('/',$_POST['BtFecha_Nacimiento'])));
if (isset($_POST['BtModifica'])) {
//    print ($_POST['BtDNI_M']);
    $error="";   
       
   $objEquipo2 = new Equipo($_SESSION["NumEquipo"], $_POST['BtNombre_M'], $_POST['BtGenero_M'],$_POST['BtCategoria_M']);
   //print_r($objPersona2);
   $resultado2 = $objEquipo2 -> Modificar();

   // Motrar el resultado de los registro de la base de datos
    if ($resultado2)
        echo "Registro Modificado";
    else
        echo "Error en la Modificación";   
}

?>
    
</body>
</html>