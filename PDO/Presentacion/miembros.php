<?php
    require "../Negocio/Persona.php";
?>

<html>
<head></head>
<body>
    
<h1>INSERTAR MIEMBRO DEL CLUB</h1>

<form action="miembros.php" method="post">
    <table border='2'>
        <tr><td>Nombre: </td><td><input type="text" name="BtNombre"> </td></tr>
        <tr><td>DNI: </td><td><input type="number" name="BtDNI"></td></tr>
        <tr><td>Apellido1: </td><td><input type="text" name="BtApellido1"></td></tr>
        <tr><td>Apellido2: </td><td><input type="text" name="BtApellido2"></td></tr>
        <tr><td>Fecha de Nacimeinto: </td><td><input type="text" name="BtFecha_Nacimiento"></td></tr>
        <tr><td>Telefono: </td><td><input type="number" name="BtTelefono"></td></tr>
        <tr><td>eMAil: </td><td><input type="text" name="BteMail"></td></tr>
        <tr><td>Direccion: </td><td><input type="text" name="BtDireccion"></td></tr>
        <tr><td>Tipo: </td><td><input type="text" name="BtTipo"></td></tr>
        <tr><td>Categoria: </td><td><input type="text" name="BtCategoria"></td></tr>
    </table>
    <br>
    <input type="submit" value="INSERTAR" name="BtInsertar">
</form>

<?php

// Para cambiar el formato de la fecha de: 29/12/1981 a: 1981/12/29  osea de d/m/a a: yyyy/m/d
// implode('/',array_reverse(explode('/',$_POST['BtFecha_Nacimiento'])));
if (isset($_POST['BtInsertar'])) {
   $error="";         
   $objPersona = new Persona(null, $_POST['BtDNI'], $_POST['BtNombre'], $_POST['BtApellido1'],$_POST['BtApellido2'],implode('/',array_reverse(explode('/',$_POST['BtFecha_Nacimiento']))),$_POST['BtTelefono'],$_POST['BteMail'],$_POST['BtDireccion'],$_POST['BtTipo'],$_POST['BtCategoria']);
   
   $resultado = $objPersona -> Insertar();

   // Motrar el resultado de los registro de la base de datos
    if ($resultado)
        echo "Registro Insertado";
    else
        echo "Error en la Inserción";   
}

?>
    
</body>
</html>