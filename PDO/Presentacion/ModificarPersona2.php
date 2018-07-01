<?php
    require "../Negocio/Persona.php";
    $arrayOpciones[0]= 'Jugador';
    $arrayOpciones[1]= 'Entrenador';
    $arrayOpciones[2]= 'Entren/Jugador';
    $arrayOpciones[3]= 'Otro';
    
    session_start();
    if (!isset($_SESSION['Role'])){
    $_SESSION['Role'] = '0';
    }
 ?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Club Basquet Ciutat Vella Barcelona</title>
    <link rel="stylesheet" href="/CBCV/CBCiutatVella/style/reset.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
        crossorigin="anonymous">
    <link rel="stylesheet" href="/CBCV/CBCiutatVella/style/EliminarPersona.css">
    <link rel="icon" type="image/png" href="/CBCV/CBCiutatVella/public/favicon.png" />
</head>

<body id="Fondo">
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

<section>
            <?php
                if ($_SESSION['Role'] == '5'){
                 ?>   
                   <!-- <div class="container-fluid justify-content-center bg-dark">
                        <div class="container justify-content-center"><span class="badge badge-pill badge-success">FELLOWS</span></div>
                    </div>
                   
                   <div class="btn-toolbar justify-content-center bg-dark" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group mr-2" role="group" aria-label="First group">
                        <a class="btn btn-lg btn-success btn-block btn-sm" href="/CBCV/CBCiutatVella/PDO/Presentacion/InsertarPersona.php">New</a>
                    </div>
                    <div class="btn-group mr-2" role="group" aria-label="Second group">
                        <a class="btn btn-lg btn-primary btn-block btn-sm" href="/CBCV/CBCiutatVella/PDO/Presentacion/ModificarPersona.php">Edit</a>
                    </div>
                    <div class="btn-group" role="group" aria-label="Third group">
                        <a class="btn btn-lg btn-danger btn-block btn-sm" href="/CBCV/CBCiutatVella/PDO/Presentacion/EliminarPersona.php">Delete</a>
                    </div>
                    </div>
                    -->
                    <!-- Prueba -->
                    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <a class="navbar-brand" href="#">Administración</a>

                        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            
                            <li class="nav-item active dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Resultados 
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="/CBCV/CBCiutatVella/PDO/Presentacion/InsertarPersona.php">Añadir</a>
                                    <a class="dropdown-item" href="#">Modificar</a>
                                    <a class="dropdown-item" href="#">Eliminar</a>
                                </div>
                            </li>
                            <li class="nav-item active dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Socios 
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="/CBCV/CBCiutatVella/PDO/Presentacion/InsertarPersona.php">Añadir</a>
                                    <a class="dropdown-item" href="/CBCV/CBCiutatVella/PDO/Presentacion/ModificarPersona2.php">Modificar</a>
                                    <a class="dropdown-item" href="/CBCV/CBCiutatVella/PDO/Presentacion/EliminarPersona.php">Eliminar</a>
                                </div>
                            </li>
                            <li class="nav-item active dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Equipos
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Añadir</a>
                                    <a class="dropdown-item" href="#">Modificar</a>
                                    <a class="dropdown-item" href="#">Eliminar</a>
                                </div>
                            </li>
                            </ul>
                            <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                            </form>
                        </div>
                        </nav>
                    

                <?php
                }

            ?>
            <?php
                if ($_SESSION['Role'] == '2'){
                 ?>   
                   <!-- <div class="container-fluid justify-content-center bg-dark">
                        <div class="container justify-content-center"><span class="badge badge-pill badge-success">FELLOWS</span></div>
                    </div>
                   
                   <div class="btn-toolbar justify-content-center bg-dark" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group mr-2" role="group" aria-label="First group">
                        <a class="btn btn-lg btn-success btn-block btn-sm" href="/CBCV/CBCiutatVella/PDO/Presentacion/InsertarPersona.php">New</a>
                    </div>
                    <div class="btn-group mr-2" role="group" aria-label="Second group">
                        <a class="btn btn-lg btn-primary btn-block btn-sm" href="/CBCV/CBCiutatVella/PDO/Presentacion/ModificarPersona.php">Edit</a>
                    </div>
                    <div class="btn-group" role="group" aria-label="Third group">
                        <a class="btn btn-lg btn-danger btn-block btn-sm" href="/CBCV/CBCiutatVella/PDO/Presentacion/EliminarPersona.php">Delete</a>
                    </div>
                    </div>
                    -->
                    <!-- Prueba -->
                    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <a class="navbar-brand" href="#">Equipos</a>

                        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            
                            <li class="nav-item active dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Asistencia 
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Añadir</a>
                                    <a class="dropdown-item" href="#">Modificar</a>
                                    <a class="dropdown-item" href="#">Eliminar</a>
                                </div>
                            </li>
                           
                            <li class="nav-item active dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Resultados
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Añadir</a>
                                    <a class="dropdown-item" href="#">Modificar</a>
                                    <a class="dropdown-item" href="#">Eliminar</a>
                                </div>
                            </li>
                            </ul>
                            <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                            </form>
                        </div>
                        </nav>
                    

                <?php
                }

            ?>
        </section>
    
    <div id="Fondo" class="BoxBusca">

        <div id="BoxBuscaContent"class="BoxBuscaContent">
            <div>
                <h1 class='titulo'>ACTUALIZACIÓN DATOS DE SOCIOS</h1>
            </div>        
                <!-- <h1>Aquí también implemetar la busqueda por el primer apellido u otros campos</h1> -->
            <div>    
                <h2 class='titulo2'>Busca el socio que quieres MODIFICAR introduciendo su DNI.</h2>
            </div>        
            <div>
                    <form   action="ModificarPersona2.php" method="get" id="BtBuscaDNI">
                        <div id="formDNI" class="form-group">
                            <label for="BuscaDNI"> Introduce el DNI de la persona: </label>
                            <input type="text" value="" name="BuscaDNI" id="BuscaDNI" placeholder="00000000X" class="form-control sm-3 text-center col-lg-8" aria-describedby="DNIHelpInline" size="9">
                            <!-- <small id="DNIHelpInline" class="text-muted">
                                8 Números + 1 Letra: 00000000X .
                            </small> -->
                        </div>
                    
                        <div class="form-group">
                            <input type="submit" value="Busca DNI" name="BtBuscaDNI" id="BtBuscaDNI" class="btn btn-primary my-1">
                        </div>
                        
                        <div class="form-group">
                            <label for="BtMuestraSocios"> Si no conoces el DNI, aprieta en SOCIOS: </label>
                            <input type="submit" value="SOCIOS" name="BtMuestraSocios" id="BtSocios"class="btn btn-primary my-1 BtSocios">
                        </div>   
                    </form>
            </div>

        </div>
   

    <div class="Encontrado" id="Encontrado">

        <?php
        if (isset($_GET['BtBuscaDNI'])){

        // echo ($_GET['BuscaDNI']);
           $error="";
            $objPersona = new Persona();

            $persona = $objPersona -> buscarPorDNI($_GET['BuscaDNI']);

            if ($persona){
                // echo ($persona->getID_Persona());
                // print_r ($persona);
                // <script>
                
                // </script>
                $_SESSION["NumSocio"] = $persona->getID_Persona();
        ?>
                 <div class="d-flex justify-content-center">
    
    <div class="col-lg-7">
            <div class="card text-center">
                    <div id='Socio' class="card-header"> 
                        Vas a MODIFICAR los datos del socio número:<?php echo ($_SESSION["NumSocio"])?>
                    </div>    
                    <div class="card-body">
                        <form action="ModificarPersona2.php" method="post">

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






                    <!-- <form action="EliminarPersona.php" method="post">
                        <h3>Vas a Eliminar al socio número:<?php echo ($_SESSION["NumSocio"])?></h3>
                        <table border='2'>
                            <tr><td>Nombre: </td><td><input type="text" value="<?php echo ($persona->getNombre())?>" name="BtNombre_E" required> </td></tr>
                            <tr><td>DNI: </td><td><input type="text" value="<?php echo ($persona->getDNI())?>" name="BtDNI_E"required></td></tr>
                            <tr><td>Apellido1: </td><td><input type="text" value="<?php echo ($persona->getApellido1())?>" name="BtApellido1_E"required></td></tr>
                            <tr><td>Apellido2: </td><td><input type="text" value="<?php echo ($persona->getApellido2())?>" name="BtApellido2_E"required></td></tr>
                            <tr><td>Fecha de Nacimiento: </td><td><input type="date" value="<?php echo ($persona->getFecha_Nacimiento())?>" name="BtFecha_Nacimiento_E"required></td></tr>
                            <tr><td>Telefono: </td><td><input type="tel" value="<?php echo ($persona->getTelefono())?>" name="BtTelefono_E"required></td></tr>
                            <tr><td>eMail: </td><td><input type="email" value="<?php echo ($persona->geteMail())?>" name="BteMail_E"required></td></tr>
                            <tr><td>Direccion: </td><td><input type="text" value="<?php echo ($persona->getDireccion())?>" name="BtDireccion_E"required></td></tr>
                            <tr><td>Tipo: </td><td><input type="text" value="<?php echo ($persona->getTipo())?>" name="BtTipo_E"required></td></tr>
                            <tr><td>Categoria: </td><td><input type="text" value="<?php echo ($persona->getCategoria())?>" name="BtCategoria_E"required></td></tr>
                        </table>
                        <br>
            
                        <input type="submit" value="ELIMINA MIEMBRO" name="BtElimina">
                    </form>
     -->
        <?php
            }
        }
    ?> </div> 
    
    <!-- <div class="BoxTodoSocios"> -->
    <?php


    if (isset($_GET['BtMuestraSocios'])) {
        $error="";
        $objPersona = new Persona();

        $arrayPersonas = $objPersona -> Listar();
        // print_r($arrayPersonas);
    // if ($arrayPersonas)

    ?>
    
                
                    <div class="card-deck">
<?php

                foreach ($arrayPersonas as $objPersona) {
?>

                     <!-- <div class="d-flex justify-content-center"> -->
    
                    <div class="col-xl-4 col-lg-6 col-md-6 ">
                            <div class="card text-center " style="margin-bottom: 50px;" >
                                    <div class="card-header"> 
                                        SOCIO #   <?php echo ($objPersona->getID_Persona())?>
                                    </div>    
                                    <div class="card-body">
                                        <form action="ModificarPersona2.php" method="get">

                                            <div class="form-row">
                                                <label for="inputDNI" class="col-sm-4 col-form-label">DNI</label>
                                                <div class="form-group col-sm-8">
                                                <input type="text" value="<?php echo ($objPersona->getDNI())?>" name="BtDNI_E" class="form-control text-center" id="inputDNI" readonly>
                                                </div>
                                            </div>
                                             <div class="form-row">   
                                                <label for="inputNombre" class="col-sm-4 col-form-label">Nombre</label>
                                                <div class="form-group col-sm-8">
                                                    <input type="text" value="<?php echo ($objPersona->getNombre())?>" name="BtNombre_E" class="form-control text-center" id="inputNombre"readonly>
                                                </div>
                                            </div>    
                                            <div class="form-row">
                                                <label for="inputApellido1" class="col-sm-4 col-form-label">1er Apellido</label>
                                                <div class="form-group col-sm-8">
                                                    <input type="text" value="<?php echo ($objPersona->getApellido1())?>" name="BtApellido1_E"  class="form-control text-center" id="inputApellido1"  readonly>
                                                </div>
                                            </div>    
                                            <div class="form-row">   
                                                <label for="inputApellido2" class="col-sm-4 col-form-label">2o Apellido</label>
                                                <div class="form-group col-sm-8">
                                                    <input type="text" value="<?php echo ($objPersona->getApellido2())?>" name="BtApellido2_E"  class="form-control text-center" id="inputApellido2"  readonly>
                                                </div>
                                            </div>

                                            <p class="card-text">Accede a toda la info.</p>
                                           <!-- <h5 class="card-title">La acción de eliminar no es reversible.</h5> -->
                                            
                                            <input type="submit" form="FormBuscaDNI" value="VERIFICAR" name="BtEnviaEliminar" class="btn btn-warning EnviarEliminar">
                                        </form>
                                    </div>

                                    <div class="card-footer text-muted">
                                        © CBCV
                                    </div>
                            </div>
                        </div>
                <!-- </div> -->
                    
               
                    
  <?php                  
                    
                }
                echo "</div>";   //<!--  del card DECK -->
?>
        
    


<?php
} ?>

          

        <?php 
     

    

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
                        <!-- BOTONES ACCESO DIRECTO -->
                   <!-- <div class="d-flex justify-content-center">
                        <div class="btn-group" role="group" aria-label="Basic example">
                        <a   href="/CBCV/CBCiutatVella/PDO/Presentacion/InsertarPersona.php" class="btn btn-secondary">Añadir </a>
                        <a   href="/CBCV/CBCiutatVella/PDO/Presentacion/ModificarPersona.php" class="btn btn-secondary">Modificar</a>
                        <a   href="/CBCV/CBCiutatVella/PDO/Presentacion/EliminarPersona.php" class="btn btn-secondary">Eliminar</a>
                        
                        </div>
                    </div> -->
                    
                    
     <!-- </div> Es el cierre del DIV del TODO  -->

<!-- <div>
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
</div> -->

    


</div>

<footer id="footer">
                <div class="footerContent">
                    <div class="BoxLista">
                    
                        <ul>
                            <li class="boxtitle"><h5>HORARIOS de PISTA</h5></li>
                            <li>Lunes: 17:00 - 23:00</li>
                            <li>Martes: 17:00 - 23:00</li>
                            <li>Miercoles: 17:00 - 23:00</li>
                            <li>Jueves: 17:00 - 23:00</li>
                            <li>Viernes: 17:00 - 23:00</li>
                            <li>Sabado: 08:00 - 19:00</li>
                            <li>Domingo: 08:00 - 19:00</li>
                        
                        </ul>

                    
                    </div>

                    <div class="BoxLista">
                        
                        <ul>
                            <li class="boxtitle"><h5>CONTACTO</h5></li>
                            <li>Dirección: Passeig de la Circumval.lació, 1 08003 Barcelona</li>
                            <li>Tel:  <a href="tel:+34 686 56 21 00"> +34 686 56 21 00</a></li>
                           <li>Email: <a href="mailto:cemciutadella@cemciutadella.cat">cemciutadella@cemciutadella.cat</a></li>
                        
                        </ul>

                        
                    </div>

                

                    <div class="BoxLista BoxListaUbi">
                        
                        <ul>
                            <li class="boxtitle"><h5>UBICACIÓN</h5></li>
                            <div class="map-responsive">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3796.4048814659805!2d2.1843374514412557!3d41.38561497916251!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a4a30220aac2ef%3A0xf6241494bbf180b5!2sCEM+Parc+de+la+Ciutadella!5e1!3m2!1ses!2ses!4v1529970568597" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>        
                        </ul>
                    </div>

                    <div class="BoxLista BoxListaSig">
                    
                        <ul>
                            <li class="boxtitle"><h5>SÍGUENOS</h5></li>
                            <li> Facebook</li>
                            <li> Instagram</li>
                        
                        </ul>
                    
                    </div>
                
                </div>






        <!-- <div class="pos-f-t">
            <div class="collapse" id="navbarToggleExternalContent">
                <div class="bg-dark p-4">
                    <h5 class="text-white h4">Collapsed content</h5>
                    <span class="text-muted">Toggleable via the navbar brand.</span>
                </div>
            </div>
            <nav class="navbar navbar-dark bg-dark">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>
        </div> -->
    </footer>
    
  
  
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
        crossorigin="anonymous"></script> 
    <script src="/CBCV/CBCiutatVella/js/functions2.js"> </script>
    
</body>
</html>