<?php include("../template/copy.php");?>
<?php

$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtPrecio=(isset($_POST['txtPrecio']))?$_POST['txtPrecio']:"";
$txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

include("../config/bd.php");

switch ($accion) {
    case "Agregar":


        //INSERT INTO `fotografia` (`id`, `nombre`, `imagen`, `precio`) VALUES (NULL, 'SS', 'imagem.jpg', '240000');
        $sentenciaSQL= $conexion->prepare("INSERT INTO `fotografia` (nombre,imagen,precio ) VALUES (:nombre, :imagen,:precio);");
        $sentenciaSQL->bindParam(':nombre',$txtNombre);
        $sentenciaSQL->bindParam(':precio',$txtPrecio);

        $fecha= new DateTime();
        $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";

        $tmpImagen=$_FILES["txtImagen"]["tmp_name"];

        if($tmpImagen!=""){

            move_uploaded_file($tmpImagen,"../imagen/".$nombreArchivo);
        }

        $sentenciaSQL->bindParam(':imagen',$nombreArchivo);
        $sentenciaSQL->execute();

        header("Location:fotografia.php");
        
        break;
    
    case "Modificar":
        $sentenciaSQL= $conexion->prepare("UPDATE fotografia SET nombre=:nombre,precio=:precio WHERE id=:id ");
        $sentenciaSQL->bindParam(':nombre',$txtNombre);
        $sentenciaSQL->bindParam(':precio',$txtPrecio);
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();
        
     if($txtImagen!=""){

           $fecha= new DateTime();
           $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";
           $tmpImagen=$_FILES["txtImagen"]["tmp_name"];

           move_uploaded_file($tmpImagen,"../imagen/".$nombreArchivo);

            
           $sentenciaSQL= $conexion->prepare("SELECT imagen FROM fotografia WHERE id=:id");
           $sentenciaSQL->bindParam(':id',$txtID);
           $sentenciaSQL->execute();
           $fotografia=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

           if(isset($fotografia["imagen"]) &&($fotografia["imagen"]!="imagen.jpg") ){

               if(file_exists("../imagen/".$fotografia["imagen"])){

                   unlink("../imagen/".$fotografia["imagen"]);
                }


            }


            $sentenciaSQL= $conexion->prepare("UPDATE fotografia SET imagen=:imagen,precio=:precio WHERE id=:id ");
            $sentenciaSQL->bindParam(':imagen',$nombreArchivo);
            $sentenciaSQL->bindParam(':precio',$txtPrecio);
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->execute();
        }
        header("Location:fotografia.php");
        break;

     case "Cancelar":
        header("Location:fotografia.php");
     break;

     case "Seleccionar":
        
        $sentenciaSQL= $conexion->prepare("SELECT * FROM fotografia WHERE id=:id");
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();
        $fotografia=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

        $txtNombre=$fotografia['nombre'];
        $txtPrecio=$fotografia['precio'];
        $txtImagen=$fotografia['imagen'];
        
        //echo"presionado boton Seleccionar";
    break;

    case "Borrar":

        $sentenciaSQL= $conexion->prepare("SELECT imagen FROM fotografia WHERE id=:id");
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();
        $fotografia=$sentenciaSQL->fetch(PDO::FETCH_LAZY);



        if(isset($fotografia["imagen"]) &&($fotografia["imagen"]!="imagen.jpg") ){

            if(file_exists("../imagen/".$fotografia["imagen"])){

                unlink("../imagen/".$fotografia["imagen"]);
            }


        }



        $sentenciaSQL= $conexion->prepare("DELETE FROM fotografia WHERE id=:id");
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();
       // echo"presionado boton Borrar";

       header("Location:fotografia.php");

       break;
}

$sentenciaSQL= $conexion->prepare("SELECT * FROM fotografia");
$sentenciaSQL->execute();
$listafotografia=$sentenciaSQL->fetchALL(PDO::FETCH_ASSOC);

?>

<div class="col-md-5">
    <div class="card">
        <div class="card-head">
            Datos de la fotografia
</div>
<div class="card-body">

   <form method="POST" enctype="multipart/form-data">  
        

        <div class = "form-group">
   <label for="txtID"> ID: </label>
   <input type="text" required readonly class="form-control" value="<?php echo $txtID; ?>" name="txtID" id="txtID"  placeholder="ID">
   </div>

   <div class = "form-group">
   <label for="txtNombre"> Nombre: </label>
   <input type="text" required class="form-control" value="<?php echo $txtNombre;?>" name="txtNombre" id="txtNombre"  placeholder="Nombre de la fotografia">
   </div>

  <div class = "form-group">
   <label for="txtPrecio"> Precio: </label>
   <input type="text" required class="form-control" value="<?php echo $txtPrecio;?>"  name="txtPrecio" id="txtPrecio"  placeholder="Precio de la fotografia">
   </div>

   <div class = "form-group">
   <label for="txtImagen"> imagen: </label>
    
   <br/>
   <?php echo $txtImagen;?>
    
   <?php  if($txtImagen!=""){ ?>

    <img src="../imagen/<?php echo $txtImagen;?>" width="100" alt="" srcset="">


   <?php } ?>   


   <input type="file"  class="form-control" name="txtImagen" id="txtImagen"  placeholder="fotografia">
   </div>

 

  <div class="btn-group" role="group" aria-label="">
      <button type="sumbit" name="accion"  <?php echo ($accion=="Seleccionar")?"disabled":""; ?> value="Agregar" class="btn btn-succes"> Agregar </button>
      <button type="sumbit"  name="accion" <?php echo ($accion!="Seleccionar")?"disabled":""; ?> value="Modificar" class="btn btn-waring">Modificar </button>
      <button type="sumbit" name="accion"  <?php echo ($accion!="Seleccionar")?"disabled":""; ?> value="Cancelar"  class="btn btn-info"> Cancelar </button>
 </div>

   </form>
</div>

</div>
</div>
<div class="col-md-7">
 Tabla fotografia (mostrar los datos)

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre </th>
                <th>precio</th>
                <th>imagen</th>
                <th>acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listafotografia as $fotografia) { ?>
            <tr>
                <td><?php echo $fotografia['id'];?> </td>
                <td> <?php echo $fotografia['nombre']; ?> </td>
                <td><?php echo $fotografia['precio']; ?></td>
                <td>
                 
                <img src="../imagen/<?php echo $fotografia['imagen']; ?>" width="100" alt="" srcset="">

                
            
            
                </td>

                <td>

                <form method="post">
                    <input type="hidden" name="txtID" id="txtID" value="<?php echo $fotografia['id'];?>"> </input>

                    <button type="sumbit" name="accion" value="Seleccionar" class="btn btn-primary">Seleccionar</button>

                    <button onclick="return confirm('¿estas seguro de eliminar este dato?')" type="sumbit" name="accion" value="Borrar" class="btn btn-danger">Borrar</button>



                </form>
            
            
            </td>
              </tr>
            <?php } ?>


        </tbody>
    </table>


</div>

