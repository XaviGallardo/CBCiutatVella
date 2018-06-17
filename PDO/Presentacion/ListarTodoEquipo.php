<?php
    require "../Negocio/Equipo.php";
?>
<?php 
	session_start();
 ?>
<html>
<head></head>
<body>
    


<h1>LISTAR Equipos DEL CLUB</h1>

<form action="ListarTodoEquipo.php" method="post">
Apretando el botón se imprimen todos los Equipos:
    <br>
    <input type="submit" value="Muestrame los Equipos" name="BtMuestraEquipos">

</form>
<?php
if (isset($_POST['BtMuestraEquipos'])){

    $error="";
    $objEquipo = new Equipo();

    $arrayEquipos = $objEquipo -> Listar();

    // if ($arrayPersonas)

    ?>
<table border='2'>
<thead>
<tr>
	<td>Nombre</td>
	<td>Genero</td>
    <td>Categoria</td>
</tr>
</thead>

<?php

foreach ($arrayEquipos as $objEquipo) {
    echo "<tr>";
        echo "<td>" .$objEquipo->getNombre() . "</td>";
        echo "<td>" .$objEquipo->getGenero() . "</td>";
        echo "<td>" .$objEquipo->getCategoria() . "</td>";
    echo "</tr>";
}

}
?>

 



    
</body>
</html>