<!doctype html>
<html lang="en">
  <head>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/productos.css">  

</head>
  <body>

<header> <h1>Fotografia</h1>


</header>
    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="nav navbar-nav">
          <a class="nav-item nav-link" href="welcome.php"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAMJJREFUSEvdldENwjAMRF83gU1gFCYBJgE2YRO6CehQUpUg69oo7UctVflIfc92ErtjYesW1md1wAE4A1pr7AlcAa1fKzN4Absa5ZGPxI8R4B2ApzL//MsMtg+4APoisyVytZZAnw5Ra2lNABKNIBaQf3CZZMijKFlTgCAn4D6KxgJc5FlAJZL48GKTYxPAz0stIrIA99BuKfLqa+oAU0s4dIjttYoW7Vo3bB+1aw0aHWTtTLADxx3i7P3VZ/LsCJ3DB77FMhmchYmbAAAAAElFTkSuQmCC"/>Salir</a>
        </div>
    </nav>

  <div class="container">
    <br>
       <div class="row">
    

    <?php include("../config/bd.php"); ?>
<?php  

$sentenciaSQL= $conexion->prepare("SELECT * FROM fotografia");
$sentenciaSQL->execute();
$listapintura=$sentenciaSQL->fetchALL(PDO::FETCH_ASSOC);


 foreach ($listapintura as $pintura){ ?>

<div class="contenedor">
  <figure>
    <img src="../imagen/<?php echo $pintura['imagen']; ?>" alt="">
    <div class="capa">
      <h3><?php echo $pintura['nombre']; ?></h3>
      <p><?php echo $pintura['precio']; ?> </p>
    </div>
  </figure>
 </div>

<?php } ?>

<style>
  *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: sans-serif;
  }
  .contenedor{
    float: left;
  }
  .contenedor figure{
    position: relative;
    height: 250px;
    width: 350px;
    overflow: hidden;
    border-radius: 6px;
    box-shadow: 0px 1px 25px rgba(0,0,0,0.50);
    cursor: pointer;
  }
  .contenedor figure img{
    width: 100%;
    height: 100%;
    transition: all 500ms ease-out;
  }
  .contenedor figure .capa{
    position: absolute;
    top: 0;
    width: 100%;
    height: 100%;
    background: rbga(0,103,123,0.6);
    opacity: 0;
    transition: all 500ms ease-out;
    visibility: hidden;
    text-align: center;
  }
  .contenedor figure:hover > .capa{
    opacity: 1;
    visibility: visible;
  }

  .contenedor figure:hover > .capa h3{
    margin-top: 70px;
    margin-bottom: 15px;
  }
  .contenedor figure .capa h3{
    color: #fff;
    font-size: 400;
    margin-bottom: 120px;
    transition: all 500ms ease-out;
    margin-top: 30px;
  }
  .contenedor figure:hover > img{
    transform: scale(1.3);
  }
  .contenedor figure .capa p{
    color: #fff;
    font-size: 15px;
    line-height: 1.5;
    width: 100%;
    max-width: 220px;
    margin: auto;
  }
</style>
</body>
</html>
