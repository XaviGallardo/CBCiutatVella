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
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Club Basquet Ciutat Vella Barcelona</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
        crossorigin="anonymous">
    <link rel="stylesheet" href="/main.css">
    <link rel="icon" type="image/png" href="public/favicon.png" />
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-warning">
            <a class="navbar-brand text-primary" href="/CBCV/CBCiutatVella"><img src="public/logo-cbcv.jpg" width="80" height="90"  alt="logo CBCiutatVella">    CB Ciutat Vella</a>
            <button class="navbar-toggler  btn-link" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
                aria-expanded="false" aria-label="Toggle navigation">
                <span ><img src="public/favicon.png" alt=""></span>
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
    <main>
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
                                    <a class="dropdown-item" href="/CBCV/CBCiutatVella/PDO/Presentacion/ModificarPersona.php">Modificar</a>
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
    </main>

    
    </div>


<div class="d-flex justify-content-center">
    
    <div class="col-lg-7">
            <div class="card text-center">
                    <div class="card-header">
                        NUEVO SOCIO
                    </div>
                    <div class="card-body">
                        <form action="InsertarPersona.php" method="post">
                            
                                <div class="form-group ">
                                    <input type="text" name="BtDNI" required class="form-control" id="inputDNI" placeholder="DNI">
                                </div>
                                <div class="form-group ">
                                    <input type="text" name="BtNombre" required class="form-control" id="inputNombre" placeholder="Nombre">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="text" name="BtApellido1" required class="form-control" id="inputApellido1" placeholder="Apellido1">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" name="BtApellido2" required class="form-control" id="inputApellido2" placeholder="Apellido2">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <label for="inpuinputFechaNacimiento" class="col-sm-3 col-form-label">Fecha Nacimiento</label>
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
                        
                        
                        
                        
                        <p class="card-text">Asegurate de cumplimentar todos los campos y que sean correctos.</p>
                        <h5 class="card-title">GRACIAS</h5>
                        <input type="submit" value="INSERTAR" name="BtInsertar" class="btn btn-primary">
                        </form>
                        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                    </div>
                    <div class="card-footer text-muted">
                        © CBCV
                    </div>
                </div>
        </div>
    
</div>














    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
        crossorigin="anonymous"></script>
</body>

</html>