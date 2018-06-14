<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Club Basquet Ciutat Vella Barcelona</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
        crossorigin="anonymous">
    <link rel="stylesheet" href="/main.css">
    <link rel="stylesheet" href="../../style/prueba.css">
    <link rel="icon" type="image/png" href="public/favicon.png" />
</head>
<?php 
    require "/Applications/XAMPP/xamppfiles/htdocs/CBCV/CBCiutatVella/PDO/Negocio/Usuario.php";
    session_start();
    
    
 ?>

    
    
    <main>
        <!-- FORMULARIO DE LOG IN -->
            <body class="text-center">
                <form class="form-signin" action="Prueba.php" method="post">
                <img class="mb-4" src="../../public/pelota-basquet.png" alt="" width="72" height="72">
                <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
                <label for="inputEmail" class="sr-only">User</label>
                <input type="text" id="inputEmail" class="form-control" placeholder="Usuario" name="BtUser" required autofocus>
                <label for="inputPassword" class="sr-only">Pswd</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="BtPswd" required>
                <div class="checkbox mb-3">
                    <label>
                    <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="BtSign">Sign in</button>
                <p class="mt-5 mb-3 text-muted">&copy; 2017-2018 CBCV</p>
                </form>
            </body>
        
        <?php 
        if (isset($_POST['BtSign'])) {
            
            $user = new Usuario();
            $var = $user->esUsuario($_POST['BtUser'],$_POST['BtPswd']);
            //echo $var;


            $error="";         
            
   
            

            // Mostrar el resultado de los registro de la base de datos
            if ($var == '1'){
                $user = $user->buscarPorUser($_POST['BtUser']) ;
                $_SESSION["Usuario"] = $user->getUser();
                $_SESSION["Role"] = $user->getRole();
                header('Location: InsertarPersona.php');
                echo "El usuario:" . $_SESSION['Usuario'] . "y su Role es:" . $_SESSION['Role'] . "existe";
            }else
                echo "NO TIENES CREDENCIALES";   
        }
    
    
 ?>


    </main>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
        crossorigin="anonymous"></script>

    

</html>