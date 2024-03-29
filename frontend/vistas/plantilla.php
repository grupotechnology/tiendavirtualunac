<!DOCTYPE html>
<html lang="en">
    
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <meta name="title" content="Tienda Virtual">

    <meta name="description" content="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi sapiente veniam magnam">

    <meta name="keyword" content="Lorem ipsum, dolor sit, amet consectetur, adipisicing elit, Sequi sapiente">
    
    <title>Tienda Virtual - Identidad Unacina</title>

    <?php
        error_reporting(0);

        session_start();

        $servidor = Ruta::ctrRutaServidor();

        $icono = ControladorPlantilla::ctrEstiloPlantilla();

        echo '<link rel="icon" href="'.$servidor.$icono["icono"].'">';

        /*-------------------------------------
        Mantener la ruta fija del Proyecto
        ---------------------------------------*/
        $url = Ruta::ctrRuta();

        // var_dump($url);

    ?>

    <!-------------------------------------
                PLUGINS DE CSS
    -------------------------------------->

    <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/bootstrap.min.css">

    <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css?family=Ubuntu|Ubuntu+Condensed" rel="stylesheet">

    <!-------------------------------------
        HOJAS DE ESTILOS PERSONALIZADAS
    -------------------------------------->

    <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plantilla.css">

    <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/cabezote.css">

    <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/slide.css">

    <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/productos.css">

    <!-------------------------------------
            PLUGINS DE JAVASCRIPT
    -------------------------------------->

    <script src="<?php echo $url; ?>vistas/js/plugins/jquery.min.js"></script>

    <script src="<?php echo $url; ?>vistas/js/plugins/bootstrap.min.js"></script>

    <script src="<?php echo $url; ?>vistas/js/plugins/jquery.easing.js"></script>

    <script src="<?php echo $url; ?>vistas/js/plugins/jquery.scrollUp.js"></script>

</head>

<body>

<?php

/*-------------------------------------
                CABEZOTE
---------------------------------------*/

include "modulos/cabezote.php";

/*-------------------------------------
        CONTENIDO DINÁMICO
---------------------------------------*/
$rutas = array();
$ruta = null;
$infoProducto = null;

if (isset($_GET["ruta"])) {

    $rutas = explode("/", $_GET["ruta"]);

    $item = "ruta";
    $valor = $rutas[0];

    /*-------------------------------------
        URL'S AMIGABLES DE CATEGORÍAS
    ---------------------------------------*/

    $rutaCategorias = ControladorProductos::ctrMostrarCategorias($item, $valor);

    if($rutas[0] == $rutaCategorias["ruta"]){

        $ruta = $rutas[0];

    }


    /*-------------------------------------
        URL'S AMIGABLES DE SUBCATEGORÍAS
    ---------------------------------------*/
    $rutaSubCategorias = ControladorProductos::ctrMostrarSubCategorias($item, $valor);
    // var_dump($rutaSubCategorias["ruta"]);

    foreach ($rutaSubCategorias as $key => $value) {

        if($rutas[0] == $value["ruta"]){

            $ruta = $rutas[0];
    
        }

    }


    /*-------------------------------------
        URL'S AMIGABLES DE PRODUCTOS
    ---------------------------------------*/
    $rutaProductos = ControladorProductos::ctrMostrarInfoProducto($item, $valor);
    // var_dump($rutaProductos["ruta"]);

    if($rutas[0] == $rutaProductos["ruta"]){

        $infoProducto = $rutas[0];

    }


    /*-------------------------------------
        LISTA BLANCA DE URL'S AMIGABLES
    ---------------------------------------*/
    if($ruta != null || $rutas[0] == "articulos-gratis" || $rutas[0] == "lo-mas-vendido" || $rutas[0] == "lo-mas-visto"){

        include "modulos/productos.php";

    }else if($infoProducto != null){
        
        include "modulos/infoproducto.php";

    }else if($rutas[0] == "buscador"){
        
        include "modulos/buscador.php";

    }else{

        include "modulos/error404.php";

    }
    
}else{

    include "modulos/slide.php";

    include "modulos/destacados.php";

}

?>

<input type="hidden" value="<?php echo $url; ?>" id="rutaOculta">

<!-------------------------------------
        JAVASCRIPT PERSONALIZADO
-------------------------------------->

<script src="<?php echo $url; ?>vistas/js/cabezote.js"></script>
<script src="<?php echo $url; ?>vistas/js/plantilla.js"></script>
<script src="<?php echo $url; ?>vistas/js/slide.js"></script>
<script src="<?php echo $url; ?>vistas/js/buscador.js"></script>

</body>
</html>