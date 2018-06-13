<?php
    require "../Negocio/Persona.php";
?>

<html>
<head></head>
<body>
    
<h1>INSERTAR PERSONA DEL CLUB</h1>

<form action="InsertarPersona.php" method="post">
    <table border='2'>
        <tr><td>Nombre: </td><td><input type="text" name="BtNombre"required> </td></tr>
        <tr><td>DNI: </td><td><input type="text" name="BtDNI"required></td></tr>
        <tr><td>Apellido1: </td><td><input type="text" name="BtApellido1"required></td></tr>
        <tr><td>Apellido2: </td><td><input type="text" name="BtApellido2"required></td></tr>
        <tr><td>Fecha de Nacimiento: </td><td><input type="date" name="BtFecha_Nacimiento"required></td></tr>
        <tr><td>Telefono: </td><td><input type="tel" name="BtTelefono"required></td></tr>
        <tr><td>eMAil: </td><td><input type="email" name="BteMail"required></td></tr>
        <tr><td>Direccion: </td><td><input type="text" name="BtDireccion"required></td></tr>
        <tr><td>Tipo: </td><td><input type="text" name="BtTipo"required></td></tr>
        <tr><td>Categoria: </td><td><input type="text" name="BtCategoria"required></td></tr>
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

<h1>MODIFICA MIEMBRO DEL CLUB</h1>

<form action="miembros.php" method="post">
    <table border='2'>
        <tr><td>Nombre: </td><td><input type="text" name="BtNombre_M"required> </td></tr>
        <tr><td>DNI: </td><td><input type="number" name="BtDNI_M"required></td></tr>
        <tr><td>Apellido1: </td><td><input type="text" name="BtApellido1_M"required></td></tr>
        <tr><td>Apellido2: </td><td><input type="text" name="BtApellido2_M"required></td></tr>
        <tr><td>Fecha de Nacimiento: </td><td><input type="date" name="BtFecha_Nacimiento_M"required></td></tr>
        <tr><td>Telefono: </td><td><input type="tel" name="BtTelefono_M"required></td></tr>
        <tr><td>eMAil: </td><td><input type="email" name="BteMail_M"required></td></tr>
        <tr><td>Direccion: </td><td><input type="text" name="BtDireccion_M"required></td></tr>
        <tr><td>Tipo: </td><td><input type="text" name="BtTipo_M"required></td></tr>
        <tr><td>Categoria: </td><td><input type="text" name="BtCategoria_M"required></td></tr>
    </table>
    <br>
    <input type="submit" value="MODIFICA MIEMBRO" name="BtModifica">
</form>

<?php

// Para cambiar el formato de la fecha de: 29/12/1981 a: 1981/12/29  osea de d/m/a a: yyyy/m/d
// implode('/',array_reverse(explode('/',$_POST['BtFecha_Nacimiento'])));
if (isset($_POST['BtModifica'])) {
   
    $error="";         
   $objPersona = new Persona(null, $_POST['BtDNI_M'], $_POST['BtNombre_M'], $_POST['BtApellido1_M'],$_POST['BtApellido2_M'],implode('/',array_reverse(explode('/',$_POST['BtFecha_Nacimiento_M']))),$_POST['BtTelefono_M'],$_POST['BteMail_M'],$_POST['BtDireccion_M'],$_POST['BtTipo_M'],$_POST['BtCategoria_M']);
   
   $resultado = $objPersona -> Modificar();

   // Motrar el resultado de los registro de la base de datos
    if ($resultado)
        echo "Registro Modificado";
    else
        echo "Error en la Modificación";   
}

?>
    
</body>
</html>