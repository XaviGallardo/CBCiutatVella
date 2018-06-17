<?php
    require "../Negocio/Equipo.php";
    $arrayOpciones[0]= 'Masculino';
    $arrayOpciones[1]= 'Femenino';
    $arrayOpciones[2]= 'Mixto';
   
?>

<html>
<head></head>
<body>
    
<h1>AÑADE EQUIPO AL CLUB</h1>

<form action="InsertarEquipo.php" method="post">
    <table border='2'>
        <tr><td>Nombre: </td><td><input type="text" name="BtNombre" placeholder="Nombre" required> </td></tr>
        <tr><td>Genero: </td><td><select name="BtGenero" id="BtGenero" required>
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
   $objEquipo = new Equipo(null, $_POST['BtNombre'], $_POST['BtGenero'],$_POST['BtCategoria']);
   
   $resultado = $objEquipo -> Insertar();

   // Mostrar el resultado de los registros de la base de datos
    if ($resultado)
        echo "Registro Insertado";
    else
        echo "Error en la Inserción";   
}

?>


    
</body>
</html>