<?php
    require "../Negocio/Persona.php";

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
    


    <h1>ELIMINA MIEMBRO DEL CLUB</h1>

        <!-- <h1>Aquí también implemetar la busqueda por el primer apellido u otros campos</h1> -->

    <h2>Busca la persona que quieres ELIMINAR introduciendo su DNI.</h2>

    <div>
            <form action="EliminarPersona.php" method="get" id="BtBuscaDNI">
                Introduce el DNI de la persona:
                <input type="text" value="" name="BuscaDNI" id="BuscaDNI"><br>
                <input type="submit" value="Busca DNI" name="BtBuscaDNI" id="BtBuscaDNI">
                <input type="submit" value="SOCIOS" name="BtMuestraSocios">
            </form>
    </div>

    <div>
        <?php
        if (isset($_GET['BtBuscaDNI'])){

        // echo ($_GET['BuscaDNI']);
           $error="";
            $objPersona = new Persona();

            $persona = $objPersona -> buscarPorDNI($_GET['BuscaDNI']);

            if ($persona){
                // print_r ($persona);
                $_SESSION["NumSocio"] = $persona->getID_Persona();
        ?>
                <div class="d-flex justify-content-center">
    
                    <div class="col-lg-7">
                            <div class="card text-center">
                                    <div class="card-header"> 
                                        Vas a Eliminar al socio número:<?php echo ($_SESSION["NumSocio"])?>
                                    </div>    
                                    <div class="card-body">
                                        <form action="EliminarPersona.php" method="post">

                                            <div class="form-row">
                                                <label for="inputDNI" class="col-md-4 col-form-label">DNI</label>
                                                <div class="form-group col-md-4">
                                                <input type="text" value="<?php echo ($persona->getDNI())?>" name="BtDNI_E" class="form-control text-center" id="inputDNI" readonly>
                                                </div>
                                            </div>
                                             <div class="form-row">   
                                                <label for="inputNombre" class="col-md-4 col-form-label">Nombre</label>
                                                <div class="form-group col-md-4">
                                                    <input type="text" value="<?php echo ($persona->getNombre())?>" name="BtNombre_E" class="form-control text-center" id="inputNombre"readonly>
                                                </div>
                                            </div>    
                                            <div class="form-row">
                                                <label for="inputApellido" class="col-md-4 col-form-label">Apellidos</label>
                                                <div class="form-group col-md-4">
                                                    <input type="text" value="<?php echo ($persona->getApellido1())?>" name="BtApellido1_E"  class="form-control text-center" id="inputApellido"  readonly>
                                                </div>
                                                 
                                                <div class="form-group col-md-4">
                                                    <input type="text" value="<?php echo ($persona->getApellido2())?>" name="BtApellido2_E"  class="form-control text-center" id="inputApellido"  readonly>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <label for="inputTelefono" class="col-md-4 col-form-label">Telefono</label>
                                                <div class="form-group col-md-3">
                                                    <input type="tel" value="<?php echo ($persona->getTelefono())?>" name="BtTelefono_E" required class="form-control text-center" id="inputTelefono" readonly>
                                                </div>
                                                <label for="nputFechaNacimiento" class="col-md-2 col-form-label">Birthdate</label>
                                                <div class="form-group col-md-3">
                                                    <input type="date" value="<?php echo ($persona->getFecha_Nacimiento())?>" name="BtFecha_Nacimiento_E" class="form-control text-center" id="inputFechaNacimiento" readonly>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <label for="inputeMail" class="col-md-4 col-form-label">email</label>
                                                <div class="form-group col-md-8">
                                                    <input type="email" value="<?php echo ($persona->geteMail())?>" name="BteMail_E"  class="form-control text-center" id="inputeMail" readonly>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <label for="inputDireccion" class="col-md-4 col-form-label">Direccion</label>
                                                <div class="form-group col-md-8">
                                                    <input type="text" value="<?php echo ($persona->getDireccion())?>" name="BtDireccion_E"  class="form-control text-center" id="inputDireccion" readonly>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <label for="inputTipo" class="col-md-4 col-form-label">Tipo</label>
                                                <div class="form-group col-md-3">
                                                    <input type="text" value="<?php echo ($persona->getTipo())?>" name="BtTipo_E"  class="form-control text-center" id="inputTipo" readonly>
                                                </div>
                                                <label for="inputCategoria" class="col-md-2 col-form-label">Categoria</label>
                                                <div class="form-group col-md-3">
                                                    <input type="text" value="<?php echo ($persona->getCategoria())?>" name="BtCategoria_E" class="form-control text-center" id="inputCategoria" readonly>
                                                </div>
                                            </div>
                   
                                            <p class="card-text">Procederas a eliminar por completo los datos del socio.</p>
                                            <h5 class="card-title">GRACIAS</h5>

                                            <input type="submit" value="ELIMINAR SOCIO" name="BtElimina" class="btn btn-danger">
                                        </form>
                                    </div>

                                    <div class="card-footer text-muted">
                                        © CBCV
                                    </div>
                            </div>
                        </div>
                </div>






                    <form action="EliminarPersona.php" method="post">
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
    
        <?php
            }
        }
    ?> </div> 
    
    <div>
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
    
                    <div class="col-xl-3 col-lg-6 col-md-6 ">
                            <div class="card text-center " style="margin-bottom: 50px;" >
                                    <div class="card-header"> 
                                        SOCIO #   <?php echo ($objPersona->getID_Persona())?>
                                    </div>    
                                    <div class="card-body">
                                        <form action="EliminarPersona.php" method="get">

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

                                            <p class="card-text">¿Quieres eliminar al socio?</p>
                                            <h5 class="card-title">DANGER</h5>
                                            
                                            <input type="submit" form="FormBuscaDNI" value="ELIMINAR ???" name="BtEnviaEliminar" class="btn btn-danger EnviarEliminar">
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
if (isset($_GET['BtElimina'])) {
//    print ($_POST['BtDNI_M']);
    $error="";   
       
   $objPersona2 = new Persona($_SESSION["NumSocio"], $_POST['BtDNI_E'], $_POST['BtNombre_E'], $_POST['BtApellido1_E'],$_POST['BtApellido2_E'],implode('/',array_reverse(explode('/',$_POST['BtFecha_Nacimiento_E']))),$_POST['BtTelefono_E'],$_POST['BteMail_E'],$_POST['BtDireccion_E'],$_POST['BtTipo_E'],$_POST['BtCategoria_E']);
   //print_r($objPersona2);
   $resultado2 = $objPersona2 -> Eliminar();

   // Motrar el resultado de los registro de la base de datos
    if ($resultado2)
        echo "Registro Eliminado";
    else
        echo "Error en la Eliminación";   
}

?>
                        
                   <div class="d-flex justify-content-center">
                        <div class="btn-group" role="group" aria-label="Basic example">
                        <a   href="/CBCV/CBCiutatVella/PDO/Presentacion/InsertarPersona.php" class="btn btn-secondary">Añadir </a>
                        <a   href="/CBCV/CBCiutatVella/PDO/Presentacion/ModificarPersona.php" class="btn btn-secondary">Modificar</a>
                        <a   href="/CBCV/CBCiutatVella/PDO/Presentacion/EliminarPersona.php" class="btn btn-secondary">Eliminar</a>
                        
                        </div>
                    </div>
                    
                    


<div>
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
</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
        crossorigin="anonymous"></script> 

        <script> 
        var boton = $('.EnviarEliminar');
        // var allowSubmit = false; 
        // function cogerDNI() {
        //      var DNI = $(this).parent()[0][0].value;
        //     console.log(DNI);
        //     $('#BuscaDNI').val(DNI);

        // }

        boton.click(function (e) {
            e.preventDefault();
            // var DNI = $(this).parent()[0][0].val();
            var DNI = $(this).parent().find('#inputDNI').val();
            console.log(DNI);
            // $('#BuscaDNI').val(DNI);
            // document.getElementById('BuscaDNI').value = DNI;
            document.getElementById("BuscaDNI").setAttribute('value',DNI);
            $('#BtBuscaDNI')[0][1];
            console.log($('#BtBuscaDNI')[0][0]);
            console.log($('#BtBuscaDNI')[0][1]);
            // $('#BtBuscaDNI').submit();
            // document.getElementById('BtBuscaDNI').submit();
            pasarvariable(DNI);
        });
            
            
        
       function pasarvariable(DNI)
        {
        location.href="EliminarPersona.php?BuscaDNI="+DNI+"&BtBuscaDNI=Busca+DNI";
        }
        

       



        // boton.click(cogerDNI());

        // function clickEvent(e) {

        //     if  (!allowSubmit){
        //         e.preventDefault();
        //     }

        //     cogerDNI();
        //     allowSubmit = true;
        //     clickEvent(e);
            
        // }

        // boton.click(clickEvent(e));

        // function PasarDNI() {
        //         var allowSubmit = false;

        //         $('#FormBuscaDNI').on("submit",function(event){

        //             if (!allowSubmit){
        //                 event.preventDefault();
                        
        //                 cogerDNI();
        //                 allowSubmit = true;
                    



        //             }
        //         });

        // };
        // PasarDNI();



        </script>
    
</body>
</html>