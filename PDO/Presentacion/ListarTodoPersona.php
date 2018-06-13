<?php
    require "../Negocio/Persona.php";
?>
<?php 
	session_start();
 ?>
<html>
<head></head>
<body>
    


<h1>LISTAR MIEMBROS DEL CLUB</h1>

<form action="ListarTodoPersona.php" method="post">
Apretando el botón se imprimen todos los usuarios:
    <br>
    <input type="submit" value="Muestrame los Socios" name="BtMuestraSocios">

</form>
<?php
if (isset($_POST['BtMuestraSocios'])){

    $error="";
    $objPersona = new Persona();

    $arrayPersonas = $objPersona -> Listar();

    // if ($arrayPersonas)

    ?>
<table border='2'>
<thead>
<tr>
	<td>Nombre</td>
	<td>DNI</td>
    <td>Apellido1</td>
    <td>Apellido2</td>
    <td>Fecha de Nacimiento</td>
    <td>Telefono</td>
    <td>eMail</td>
    <td>Direccion</td>
    <td>Tipo</td>
    <td>Categoria</td>
</tr>
</thead>

<?php

foreach ($arrayPersonas as $objPersona) {
    echo "<tr>";
        echo "<td>" .$objPersona->getNombre() . "</td>";
        echo "<td>" .$objPersona->getDNI() . "</td>";
        echo "<td>" .$objPersona->getApellido1() . "</td>";
        echo "<td>" .$objPersona->getApellido2() . "</td>";
        echo "<td>" .$objPersona->getFecha_Nacimiento() . "</td>";
        echo "<td>" .$objPersona->getTelefono() . "</td>";
        echo "<td>" .$objPersona->geteMail() . "</td>";
        echo "<td>" .$objPersona->getDireccion() . "</td>";
        echo "<td>" .$objPersona->getTipo() . "</td>";
        echo "<td>" .$objPersona->getCategoria() . "</td>";
    echo "</tr>";
}

}
?>

 



    
</body>
</html>