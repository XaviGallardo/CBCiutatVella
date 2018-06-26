<?php
    require "../Negocio/Persona.php";
    $arrayOpciones[0]= 'Jugador';
    $arrayOpciones[1]= 'Entrenador';
    $arrayOpciones[2]= 'Entren/Jugador';
    $arrayOpciones[3]= 'Otro';

    if (!isset($_SESSION['Role'])){
    $_SESSION['Role'] = '0';
    }
	session_start();
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
// echo $_POST['BuscaDNI'];
    $persona = $objPersona -> buscarPorDNI($_POST['BuscaDNI']);

    if ($persona){
 //print_r ($persona);
    $_SESSION["NumSocio"] = $persona->getID_Persona();
?>
<!-- <form action="ModificarPersona.php" method="post"> -->
        
        <div class="d-flex justify-content-center">
    
                    <div class="col-lg-7">
                            <div class="card text-center">
                                    <div class="card-header"> 
                                        Vas a MODIFICAR los datos del socio número:<?php echo ($_SESSION["NumSocio"])?>
                                    </div>    
                                    <div class="card-body">
                                        <form action="ModificarPersona.php" method="post">

                                            <div class="form-row">
                                                <label for="inputDNI" class="col-md-4 col-form-label">DNI</label>
                                                <div class="form-group col-md-4">
                                                <input type="text" value="<?php echo ($persona->getDNI())?>" name="BtDNI_M" class="form-control text-center" id="inputDNI"  required>
                                                </div>
                                            </div>
                                             <div class="form-row">   
                                                <label for="inputNombre" class="col-md-4 col-form-label">Nombre</label>
                                                <div class="form-group col-md-4">
                                                    <input type="text" value="<?php echo ($persona->getNombre())?>" name="BtNombre_M" class="form-control text-center" id="inputNombre" required>
                                                </div>
                                            </div>    
                                            <div class="form-row">
                                                <label for="inputApellido" class="col-md-4 col-form-label">Apellidos</label>
                                                <div class="form-group col-md-4">
                                                    <input type="text" value="<?php echo ($persona->getApellido1())?>" name="BtApellido1_M"  class="form-control text-center" id="inputApellido"  required >
                                                </div>
                                                 
                                                <div class="form-group col-md-4">
                                                    <input type="text" value="<?php echo ($persona->getApellido2())?>" name="BtApellido2_M"  class="form-control text-center" id="inputApellido"  required >
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <label for="inputTelefono" class="col-md-4 col-form-label">Telefono</label>
                                                <div class="form-group col-md-3">
                                                    <input type="tel" value="<?php echo ($persona->getTelefono())?>" name="BtTelefono_M" required class="form-control text-center" id="inputTelefono" required  >
                                                </div>
                                                <label for="nputFechaNacimiento" class="col-md-2 col-form-label">Birthdate</label>
                                                <div class="form-group col-md-3">
                                                    <input type="date" value="<?php echo ($persona->getFecha_Nacimiento())?>" name="BtFecha_Nacimiento_M" class="form-control text-center" id="inputFechaNacimiento"  required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <label for="inputeMail" class="col-md-4 col-form-label">email</label>
                                                <div class="form-group col-md-8">
                                                    <input type="email" value="<?php echo ($persona->geteMail())?>" name="BteMail_M"  class="form-control text-center" id="inputeMail" required >
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <label for="inputDireccion" class="col-md-4 col-form-label">Direccion</label>
                                                <div class="form-group col-md-8">
                                                    <input type="text" value="<?php echo ($persona->getDireccion())?>" name="BtDireccion_M"  class="form-control text-center" id="inputDireccion" required >
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <label for="inputTipo" class="col-md-4 col-form-label">Tipo</label>
                                                <div class="form-group col-md-3">
                                                    <select class="custom-select mr-sm-2" name="BtTipo_M" required id="inlineFormTipoSelect">
                                                        <option selected><?php echo ($persona->getTipo())?></option>
                                                        <?php
                                                        foreach ($arrayOpciones as $opcion) 
                                                        {?>
                                                            <option value="<?php echo $opcion ?>"><?php echo $opcion ?></option>
                                                <?php   } ?>
                                                    </select>
                                                
                                                
                                                
                                                
                                                
                                                
                                                    <!-- <input type="text" value="<?php echo ($persona->getTipo())?>" name="BtTipo_M"  class="form-control text-center" id="inputTipo" required > -->
                                                </div>
                                                <label for="inputCategoria" class="col-md-2 col-form-label">Categoria</label>
                                                <div class="form-group col-md-3">
                                                    <input type="text" value="<?php echo ($persona->getCategoria())?>" name="BtCategoria_M" class="form-control text-center" id="inputCategoria" required >
                                                </div>
                                            </div>
                   
                                            <p class="card-text">Procederas a ACTUALIZAR los datos del socio.</p>
                                            <h5 class="card-title">GRACIAS</h5>

                                            <input type="submit" value="ACTUALIZAR DATOS SOCIO" name="BtModifica" class="btn btn-danger">
                                        </form>
                                    </div>

                                    <div class="card-footer text-muted">
                                        © CBCV
                                    </div>
                            </div>
                        </div>
                </div>





<?php
}
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