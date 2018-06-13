<?php
    require "../Negocio/Persona.php";
?>
<?php 
	session_start();
 ?>
<html>
<head></head>
<body>
    


<h1>MODIFICA MIEMBRO DEL CLUB</h1>

<!-- <h1>Aquí también implemetar la busqueda por el primer apellido u otros campos</h1> -->

<h2>Busca la persona que quieres modificar introduciendo su DNI.</h2>

<form action="ModificarPersona.php" method="post">
Introduce el DNI de la persona:
    <input type="text" name="BuscaDNI"required><br>
    <input type="submit" value="Busca DNI" name="BtBuscaDNI">

</form>
<?php
if (isset($_POST['BtBuscaDNI'])){

    $error="";
    $objPersona = new Persona();

    $persona = $objPersona -> buscarPorDNI($_POST['BuscaDNI']);

    if ($persona)
// print_r ($persona);
    $_SESSION["NumSocio"] = $persona->getID_Persona();
?>
<form action="ModificarPersona.php" method="post">
        <h3>Vas a modificar al socio número:<?php echo ($_SESSION["NumSocio"])?></h3>
    <table border='2'>
        <tr><td>Nombre: </td><td><input type="text" value="<?php echo ($persona->getNombre())?>" name="BtNombre_M" required> </td></tr>
        <tr><td>DNI: </td><td><input type="text" value="<?php echo ($persona->getDNI())?>" name="BtDNI_M"required></td></tr>
        <tr><td>Apellido1: </td><td><input type="text" value="<?php echo ($persona->getApellido1())?>" name="BtApellido1_M"required></td></tr>
        <tr><td>Apellido2: </td><td><input type="text" value="<?php echo ($persona->getApellido2())?>" name="BtApellido2_M"required></td></tr>
        <tr><td>Fecha de Nacimiento: </td><td><input type="date" value="<?php echo ($persona->getFecha_Nacimiento())?>" name="BtFecha_Nacimiento_M"required></td></tr>
        <tr><td>Telefono: </td><td><input type="tel" value="<?php echo ($persona->getTelefono())?>" name="BtTelefono_M"required></td></tr>
        <tr><td>eMail: </td><td><input type="email" value="<?php echo ($persona->geteMail())?>" name="BteMail_M"required></td></tr>
        <tr><td>Direccion: </td><td><input type="text" value="<?php echo ($persona->getDireccion())?>" name="BtDireccion_M"required></td></tr>
        <tr><td>Tipo: </td><td><input type="text" value="<?php echo ($persona->getTipo())?>" name="BtTipo_M"required></td></tr>
        <tr><td>Categoria: </td><td><input type="text" value="<?php echo ($persona->getCategoria())?>" name="BtCategoria_M"required></td></tr>
    </table>
    <br>
    <input type="submit" value="MODIFICA MIEMBRO" name="BtModifica">
</form>

<?php
}
// Para cambiar el formato de la fecha de: 29/12/1981 a: 1981/12/29  osea de d/m/a a: yyyy/m/d
// implode('/',array_reverse(explode('/',$_POST['BtFecha_Nacimiento'])));
if (isset($_POST['BtModifica'])) {
//    print ($_POST['BtDNI_M']);
    $error="";   
       
   $objPersona2 = new Persona($_SESSION["NumSocio"], $_POST['BtDNI_M'], $_POST['BtNombre_M'], $_POST['BtApellido1_M'],$_POST['BtApellido2_M'],implode('/',array_reverse(explode('/',$_POST['BtFecha_Nacimiento_M']))),$_POST['BtTelefono_M'],$_POST['BteMail_M'],$_POST['BtDireccion_M'],$_POST['BtTipo_M'],$_POST['BtCategoria_M']);
   //print_r($objPersona2);
   $resultado2 = $objPersona2 -> Modificar();

   // Motrar el resultado de los registro de la base de datos
    if ($resultado2)
        echo "Registro Modificado";
    else
        echo "Error en la Modificación";   
}

?>
    
</body>
</html>