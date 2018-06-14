<?php
    require "../Negocio/Persona.php";
    $arrayOpciones[0]= 'Jugador';
    $arrayOpciones[1]= 'Entrenador';
    $arrayOpciones[2]= 'Entren/Jugador';
    $arrayOpciones[3]= 'Otro';
?>

<html>
<head></head>
<body>
    
<h1>INSERTAR PERSONA DEL CLUB</h1>

<form action="InsertarPersona.php" method="post">
    <table border='2'>
        <tr><td>Nombre: </td><td><input type="text" name="BtNombre" placeholder="Nombre" required> </td></tr>
        <tr><td>DNI: </td><td><input type="text" name="BtDNI" required></td></tr>
        <tr><td>Apellido1: </td><td><input type="text" name="BtApellido1" required></td></tr>
        <tr><td>Apellido2: </td><td><input type="text" name="BtApellido2" required></td></tr>
        <tr><td>Fecha de Nacimiento: </td><td><input type="date" name="BtFecha_Nacimiento" required></td></tr>
        <tr><td>Telefono: </td><td><input type="tel" name="BtTelefono" required></td></tr>
        <tr><td>eMail: </td><td><input type="email" name="BteMail" required></td></tr>
        <tr><td>Direccion: </td><td><input type="text" name="BtDireccion" required></td></tr>
        <!-- <tr><td>Tipo: </td><td><input type="text" name="BtTipo" required></td></tr> -->
        <tr><td>Tipo: </td><td><select name="BtTipo" id="BtTipo" required>
        <option value="">Selecciona una opción</option>
        <?php
        foreach ($arrayOpciones as $opcion) 
        {?>
           <option value="<?php echo $opcion ?>"><?php echo $opcion ?></option>
<?php   } ?> 

    </select></td></tr>
        <tr><td>Categoria: </td><td><input type="text" name="BtCategoria" required></td></tr>
    </table>
    <br>
    <br>
    <!-- <select name="BtTipo" id="BtTipo">
        <option value="">Selecciona una opción</option>
        <?php
        foreach ($arrayOpciones as $opcion) 
        {?>
           <option value="<?php echo $opcion ?>"><?php echo $opcion ?></option>
<?php   } ?> 

    </select> -->
    <br>
    <input type="submit" value="INSERTAR" name="BtInsertar">
</form>

<a  href="ModificarPersona.php">Modificar Socio</a>
<a  href="EliminarPersona.php">Eliminar Socio</a>

<?php

// Para cambiar el formato de la fecha de: 29/12/1981 a: 1981/12/29  osea de d/m/a a: yyyy/m/d
// implode('/',array_reverse(explode('/',$_POST['BtFecha_Nacimiento'])));
if (isset($_POST['BtInsertar'])) {
   
    $error="";         
   $objPersona = new Persona(null, $_POST['BtDNI'], $_POST['BtNombre'], $_POST['BtApellido1'],$_POST['BtApellido2'],implode('/',array_reverse(explode('/',$_POST['BtFecha_Nacimiento']))),$_POST['BtTelefono'],$_POST['BteMail'],$_POST['BtDireccion'],$_POST['BtTipo'],$_POST['BtCategoria']);
   
   $resultado = $objPersona -> Insertar();

   // Mostrar el resultado de los registro de la base de datos
    if ($resultado)
        echo "Registro Insertado";
    else
        echo "Error en la Inserción";   
}

?>


    
</body>
</html>