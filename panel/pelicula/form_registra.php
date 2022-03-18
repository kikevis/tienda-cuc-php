<?php
  session_start();
  if (!isset($_SESSION['usuario_info']) OR empty($_SESSION['usuario_info'])) {
    header('Location: index.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>KIKE JR MOVIE</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/estilos.css">
  </head>

  <body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">KIKE JR MOVIE</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav pull-right">
            <li>
              <a href="../pedidos/index.php" class="btn">Pedidos <span class="badge"></span></a>
            </li>
            <li class="active">
              <a href="index.php" class="btn">Pelicula <span class="badge"></span></a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                aria-haspopup="true" aria-expanded="false"><?php print $_SESSION['usuario_info']['nombre_usuario'] ?>
            </li>
            <li>
              <a href="../cerrar.php" class="btn">Salir <span class="badge"></span></a>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container" id="main">
      <div class="container" id="main" >
         <div class="row">
           <div class="col-md-12">
             <fieldset>
               <legend>Datos de la Pelicula</legend>
                <form method="POST" action="../acciones.php" enctype="multipart/form-data" >

                    <div class="row">
                     <div class="col-md-6">
                         <div class="form-group">
                             <label>Titulo</label>
                             <input type="text" class="form-control" name="titulo" required>
                         </div>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-md-12">
                         <div class="form-group">
                             <label>Descripción</label>
                             <textarea class="form-control" name="descripcion" id="" cols="3" required></textarea>
                         </div>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-md-4">
                         <div class="form-group">
                             <label>Categorias</label>
                             <select class="form-control" name="categoria_id" required>
                               <option selected>--SELECCIONE--</option>
                               <?php
                            require '../../vendor/autoload.php';
                             $categoria = new kike\Categorias;
                             $info_categoria = $categoria->mostrar();
                             $cantidad = count($info_categoria);
                               for($x =0; $x< $cantidad;$x++){
                                 $item = $info_categoria[$x];
                             ?>
                               <option value="<?php print $item['id'] ?>"
                              ><?php print $item['nombre'] ?></option>
                             <?php

                               }
                             ?>
                             </select>
                         </div>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-md-12">
                         <div class="form-group">
                             <label>Foto</label>
                             <input type="file" class="form-control" name="foto" required>
                         </div>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-md-3">
                         <div class="form-group">
                             <label>Precio</label>
                             <input type="number" class="form-control" name="precio" placeholder="0.00" required>
                         </div>
                     </div>
                 </div>
                 <input type="hidden" name="accion" class="btn btn-primary" value="Registrar">
                 <input type="submit" class="btn btn-primary" value="Registrar">
                 <a href="index.php" class="btn btn-default">Cancelar</a>
               </form>
             </fieldset>
           </div>
         </div>
    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
  </body>
</html>
