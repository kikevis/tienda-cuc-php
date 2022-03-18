<?php
require '../vendor/autoload.php';

$pelicula = new kike\Pelicula;

if($_SERVER['REQUEST_METHOD'] ==='POST'){

    if ($_POST['accion']==='Registrar'){

        if(empty($_POST['titulo']))
            exit('Completar titulo');

        if(empty($_POST['descripcion']))
            exit('Completar titulo');

        if(empty($_POST['categoria_id']))
            exit('Seleccionar una Categoria');

        if(!is_numeric($_POST['categoria_id']))
            exit('Seleccionar una Categoria válida');

        $_params = array(
            'titulo'=>$_POST['titulo'],
            'descripcion'=>$_POST['descripcion'],
            'foto'=> subirFoto(),
            'precio'=>$_POST['precio'],
            'categoria_id'=>$_POST['categoria_id'],
            'fecha'=> date('Y-m-d')
        );

        $rpt = $pelicula->registrar($_params);

        if($rpt)
            header('Location: pelicula/index.php');
        else
            print 'Error al registrar una pelicula';
    }

    if ($_POST['accion']==='Actualizar'){

    if(empty($_POST['titulo']))
        exit('Completar titulo');

    if(empty($_POST['descripcion']))
        exit('Completar titulo');

    if(empty($_POST['categoria_id']))
        exit('Seleccionar una Categoria');

    if(!is_numeric($_POST['categoria_id']))
        exit('Seleccionar una Categoria válida');


    $_params = array(
        'titulo'=>$_POST['titulo'],
        'descripcion'=>$_POST['descripcion'],
        'precio'=>$_POST['precio'],
        'categoria_id'=>$_POST['categoria_id'],
        'fecha'=> date('Y-m-d'),
        'id'=>$_POST['id'],
    );

    if(!empty($_POST['foto_temp']))
        $_params['foto'] = $_POST['foto_temp'];

    if(!empty($_FILES['foto']['name']))
        $_params['foto'] = subirFoto();

    $rpt = $pelicula->actualizar($_params);
    if($rpt)
        header('Location: pelicula/index.php');
    else
        print 'Error al actualizar una pelicula';
    }
}

if($_SERVER['REQUEST_METHOD'] ==='GET'){

    $id = $_GET['id'];
    $rpt = $pelicula->eliminar($id);

    if($rpt)
        header('Location: pelicula/index.php');
    else
        print 'Error al eliminar una pelicula';
}

function subirFoto() {
    $carpeta = __DIR__.'/../upload/';
    $archivo = $carpeta.$_FILES['foto']['name'];

    move_uploaded_file($_FILES['foto']['tmp_name'],$archivo);
    return $_FILES['foto']['name'];
}
