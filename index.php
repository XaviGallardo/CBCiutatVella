
<?php 
    session_start();
    
    if (!isset($_SESSION['Role'])){
    $_SESSION['Role'] = '0';
    }
 ?>
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
    <link rel="icon" type="image/png" href="public/favicon.png" />
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-warning">
            <a class="navbar-brand text-primary" href="#"><img src="public/logo-cbcv.jpg" width="80" height="90"  alt="logo CBCiutatVella">    CB Ciutat Vella</a>
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
                    <a class="nav-item nav-link text-right" href="/CBCV/CBCiutatVella/PDO/Presentacion/Prueba.php">Log In</a>
                    <?php } ?>




                    <!-- <a class="nav-item nav-link text-right" href="/Applications/XAMPP/xamppfiles/htdocs/CBCV/CBCiutatVella/PDO/Presentacion/Prueba.php">Log In</a> -->
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
                   <div class="container-fluid justify-content-center bg-dark">
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
                   
                    
                    
                    

                <?php
                }

            ?>
        </section>
    </main>


    <div>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="public/basket.jpg" alt="First slide basket">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>...</h5>
                        <p>...</p>
                        <a class="btn btn-primary" href="#" role="button">Quieres Jugar con Nosotros?</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="public/pista.jpg" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>...</h5>
                        <p>...</p>
                        <a class="btn btn-primary" href="#" role="button">Quieres Jugar con Nosotros?</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="public/pista2.jpg" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>...</h5>
                        <p>...</p>
                        <a class="btn btn-primary" href="#" role="button">Quieres Jugar con Nosotros?</a>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </div>
    
    <footer>
        <div class="pos-f-t">
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
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
        crossorigin="anonymous"></script>
</body>

</html>