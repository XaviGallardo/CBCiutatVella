<?php
 
    session_start();
    
    if (!isset($_SESSION['Role'])){
    $_SESSION['Role'] = '0';
    }
 
    require "../Negocio/Persona.php";
    $arrayOpciones[0]= 'Jugador';
    $arrayOpciones[1]= 'Entrenador';
    $arrayOpciones[2]= 'Entren/Jugador';
    $arrayOpciones[3]= 'Otro';
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
    <link rel="icon" type="image/png" href="/CBCV/CBCiutatVella/public/favicon.png" />
</head>

<body>
<header>
        <nav class="navbar navbar-expand-lg navbar-light bg-warning">
            <a class="navbar-brand text-primary" href="/CBCV/CBCiutatVella"><img src="/CBCV/CBCiutatVella/public/logo-cbcv.jpg" width="80" height="90"  alt="logo CBCiutatVella">    CB Ciutat Vella</a>
            <button class="navbar-toggler  btn-link" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
                aria-expanded="false" aria-label="Toggle navigation">
                <span ><img src="/CBCV/CBCiutatVella/public/favicon.png" alt=""></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link text-right active" href="PDO/Presentacion/InsertarPersona.php">Home
                        <span class="sr-only">(current)</span>
                    </a>
                    <a class="nav-item nav-link text-right" href="#">Features</a>
                    <a class="nav-item nav-link text-right" href="#">Pricing</a>
                    
                    <?php if(isset($_SESSION['id'])){ ?>
                    <a class="nav-item nav-link text-right" href="/CBCV/CBCiutatVella/PDO/Presentacion/LogOut.php">Log Out</a>
                    <?php }else{ ?>
                    <a class="nav-item nav-link text-right" href="/CBCV/CBCiutatVella/PDO/Presentacion/LogIn.php">Log In</a>
                    <?php } ?>




                    <!-- <a class="nav-item nav-link text-right" href="/Applications/XAMPP/xamppfiles/htdocs/CBCV/CBCiutatVella/PDO/Presentacion/LogIn.php">Log In</a> -->
                </div>
            </div>
        </nav>
        <!-- Anterior -->
        
    </header>
    
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

<a  href="/CBCV/CBCiutatVella/PDO/Presentacion/ModificarPersona.php">Modificar Socio</a>
<a  href="/CBCV/CBCiutatVella/PDO/Presentacion/EliminarPersona.php">Eliminar Socio</a>
                    

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

    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <a class="navbar-brand" href="#">Administración</a>

                        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            
                                                        <li class="nav-item active dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Socios 
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="/CBCV/CBCiutatVella/PDO/Presentacion/InsertarPersona.php">Añadir</a>
                                    <a class="dropdown-item" href="/CBCV/CBCiutatVella/PDO/Presentacion/ModificarPersona.php">Modificar</a>
                                    <a class="dropdown-item" href="/CBCV/CBCiutatVella/PDO/Presentacion/EliminarPersona.php">Eliminar</a>
                                </div>
                            </li>
                            
                            </ul>
                            
                        </div>
                    </nav>



   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
        crossorigin="anonymous"></script> 
</body>
</html>