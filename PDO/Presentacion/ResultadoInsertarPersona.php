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
    <link rel="stylesheet" href="/CBCV/CBCiutatVella/style/InsertarPersona.css">
    <link rel="stylesheet" href="/CBCV/CBCiutatVella/style/footer.css">
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


                    <!-- <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary">
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
                    </nav> -->

    

<div id="Fondo" class="d-flex justify-content-center">

    <?php
   // echo ($_SESSION['DNI']);
        if ($_SESSION['DNI'] != '-'){
         $objPersona = new Persona();
         $persona = $objPersona -> buscarPorDNI($_SESSION['DNI']);

    ?>

    <div class="col-xs-7 col-sm-10 col-md-7 col-lg-5">
            <div class="card text-center">
                    <div class="card-header">
                        NUEVO SOCIO NUMERO <?php echo ($persona->getID_Persona())?>
                    </div>
                    <div class="card-body">
                        

                            <div class="form-row">
                                <label for="inputID_Persona" class="col-md-4 col-form-label">Numero de SOCIO</label>
                                <div class="form-group col-md-4 ">
                                    <input type="text" value="<?php echo ($persona->getID_Persona())?>" name="BtID_Persona" required class="form-control  text-center" id="inputID_Persona" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <label for="inputDNI" class="col-md-4 col-form-label">DNI</label>
                                <div class="form-group col-md-4 ">
                                    <input type="text" value="<?php echo ($persona->getDNI())?>" name="BtDNI" required class="form-control  text-center" id="inputDNI"readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <label for="inputNombre" class="col-md-4 col-form-label">Nombre</label>
                                <div class="form-group col-md-4 ">
                                    <input type="text" value="<?php echo ($persona->getNombre())?>" name="BtNombre" required class="form-control  text-center" id="inputNombre"readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <label for="inputApellido" class="col-md-4 col-form-label">Apellidos</label>
                                <div class="form-group col-md-4">
                                <input type="text" value="<?php echo ($persona->getApellido1())?>" name="BtApellido1_M"  class="form-control text-center" id="inputApellido" readonly>
                                </div>
                                                    
                                <div class="form-group col-md-4">
                                <input type="text" value="<?php echo ($persona->getApellido2())?>" name="BtApellido2_M"  class="form-control text-center" id="inputApellido" readonly>
                                </div>
                            </div>
                               <!--
                                <div class="form-row">
                                    <label for="inpuinputFechaNacimiento" class="col-md-3 col-form-label">Fecha Nacimiento</label>
                                    <div class="form-group col-md-3">
                                        <input type="date" name="BtFecha_Nacimiento" required class="form-control" id="inputFechaNacimiento" placeholder="Fecha Nacimiento">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="tel" name="BtTelefono" required class="form-control" id="inputTelefono" placeholder="Telefono">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <input type="email" name="BteMail" required class="form-control" id="inputeMail" placeholder="eMail">
                                </div>
                                <div class="form-group ">
                                    <input type="text" name="BtDireccion" required class="form-control" id="inputDireccion" placeholder="Direccion">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <select class="custom-select mr-sm-2" name="BtTipo" required id="inlineFormTipoSelect">
                                            <option selected>Selecciona un tipo</option>
                                            <?php
                                                foreach ($arrayOpciones as $opcion) 
                                            {?>
                                            <option value="<?php echo $opcion ?>"><?php echo $opcion ?></option>
                                    <?php   } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" name="BtCategoria" required class="form-control" id="inputCategoria" placeholder="Categoria">
                                    </div>
                                </div>                
                        
                                -->
                        
                        
                        <p class="card-text">INSERTADO CORRECTAMENTE.</p>
                        <h5 class="card-title">SELECCIONA QUE QUIERES HACER AHORA</h5>
                       <!--  <input type="submit" value="INSERTAR" name="BtInsertar" class="btn btn-primary"> -->
                        
                         <a href="/CBCV/CBCiutatVella/PDO/Presentacion/InsertarPersona.php" class="btn btn-primary">INSERTAR NUEVO SOCIO</a>
                         <a href="/CBCV/CBCiutatVella/" class="btn btn-primary">INICIO</a>
                    </div>
                    <div class="card-footer text-muted">
                        © CBCV
                    </div>
                </div>
        </div>
    
</div>

<!-- <a  href="/CBCV/CBCiutatVella/PDO/Presentacion/ModificarPersona.php">Modificar Socio</a>
<a  href="/CBCV/CBCiutatVella/PDO/Presentacion/EliminarPersona.php">Eliminar Socio</a>
                     -->

<?php
        }else{
?>
            <div class="col-xs-7 col-sm-10 col-md-7 col-lg-5">
            <div class="card text-center">
                    <div class="card-header">
                        NUEVO SOCIO NUMERO:  ERROR AL INSERTAR, VERIFICA LOS DATOS
                    </div>
                    <div class="card-body">
                        

                            <div class="form-row">
                                <label for="inputID_Persona" class="col-md-4 col-form-label">Numero de SOCIO</label>
                                <div class="form-group col-md-4 ">
                                    <input type="text" placeholder="ERROR" name="BtID_Persona" required class="form-control  text-center" id="inputID_Persona" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <label for="inputDNI" class="col-md-4 col-form-label">DNI</label>
                                <div class="form-group col-md-4 ">
                                    <input type="text" placeholder="ERROR" name="BtDNI" required class="form-control  text-center" id="inputDNI"readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <label for="inputNombre" class="col-md-4 col-form-label">Nombre</label>
                                <div class="form-group col-md-4 ">
                                    <input type="text" placeholder="ERROR" name="BtNombre" required class="form-control  text-center" id="inputNombre"readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <label for="inputApellido" class="col-md-4 col-form-label">Apellidos</label>
                                <div class="form-group col-md-4">
                                <input type="text" placeholder="ERROR" name="BtApellido1_M"  class="form-control text-center" id="inputApellido" readonly>
                                </div>
                                                    
                                <div class="form-group col-md-4">
                                <input type="text" placeholder="ERROR" name="BtApellido2_M"  class="form-control text-center" id="inputApellido" readonly>
                                </div>
                            </div>
                               <!--
                                <div class="form-row">
                                    <label for="inpuinputFechaNacimiento" class="col-md-3 col-form-label">Fecha Nacimiento</label>
                                    <div class="form-group col-md-3">
                                        <input type="date" name="BtFecha_Nacimiento" required class="form-control" id="inputFechaNacimiento" placeholder="Fecha Nacimiento">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="tel" name="BtTelefono" required class="form-control" id="inputTelefono" placeholder="Telefono">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <input type="email" name="BteMail" required class="form-control" id="inputeMail" placeholder="eMail">
                                </div>
                                <div class="form-group ">
                                    <input type="text" name="BtDireccion" required class="form-control" id="inputDireccion" placeholder="Direccion">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <select class="custom-select mr-sm-2" name="BtTipo" required id="inlineFormTipoSelect">
                                            <option selected>Selecciona un tipo</option>
                                            <?php
                                                foreach ($arrayOpciones as $opcion) 
                                            {?>
                                            <option value="<?php echo $opcion ?>"><?php echo $opcion ?></option>
                                    <?php   } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" name="BtCategoria" required class="form-control" id="inputCategoria" placeholder="Categoria">
                                    </div>
                                </div>                
                        
                                -->
                        
                        
                        <p class="card-text">NO SE HA PODIDO INSERTAR EL REGISTRO VERIFICA LOS DATOS.</p>
                        <h5 class="card-title">SELECCIONA QUE QUIERES HACER AHORA</h5>
                       <!--  <input type="submit" value="INSERTAR" name="BtInsertar" class="btn btn-primary"> -->
                        
                         <a href="/CBCV/CBCiutatVella/PDO/Presentacion/InsertarPersona.php" class="btn btn-primary">INSERTAR NUEVO SOCIO</a>
                         <a href="/CBCV/CBCiutatVella/" class="btn btn-primary">INICIO</a>
                    </div>
                    <div class="card-footer text-muted">
                        © CBCV
                    </div>
                </div>
        </div>
    
</div>



  <?php      }


?>

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
</body>
</html>