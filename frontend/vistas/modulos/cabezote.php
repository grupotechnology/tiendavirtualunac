<?php

    $servidor = Ruta::ctrRutaServidor();
    $url = Ruta::ctrRuta();

?>
<!-------------------------------------
                TOP
--------------------------------------->

<div class="container-fluid barraSuperior" id="top">
    <div class="container">
        <div class="row">
            <!--------------------
                    social
            --------------------->

            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 social">
                <ul>

                    <?php

                        $social = ControladorPlantilla::ctrEstiloPlantilla();

                        $jsonRedesSociales = json_decode($social["redesSociales"], true);
                        
                        foreach ($jsonRedesSociales as $key => $value) {
                            // var_dump($value["url"]);
                            echo '<li>
                                    <a href="'.$value["url"].'" target="_blank">
                                        <i class="fa '.$value["red"].' redSocial '.$value["estilo"].'" aria-hidden="true"></i>
                                    </a>
                                </li>';
                        }

                    ?>

                </ul>
            </div>


            <!--------------------
                    registro
            --------------------->
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 registro">
                <ul>
                    <li><a href="#modalIngreso" data-toggle="modal">Ingresar</a></li>
                    <li>|</li>
                    <li><a href="#modalRegistro" data-toggle="modal">Crear una cuenta</a></li>
                </ul>
            </div>

        </div>
    </div>
</div>

<!-------------------------------------
                HEADER
--------------------------------------->

<header class="container-fluid">
    <div class="container">
        <div class="row" id="cabezote">

            <!--------------------
                    logotipo
            --------------------->
            <div class="col-lg-3 col-md-3 col-sm-2 col-xs-12 registro" id="logotipo">
                <a href="<?php echo $url; ?>">
                    <img src="<?php echo $servidor.$social["logo"]; ?>" class="img-responsive">
                </a>
            </div>

            <!---------------------------
            bloque categorias y buscador
            ---------------------------->
            <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
                
                <!---------------------------
                        boton categorias
                ---------------------------->
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 backColor" id="btnCategorias">
                    <p>CATEGORÍAS
                        <span class="pull-right">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </span>
                    </p>
                </div>

                <!---------------------------
                            buscador
                ---------------------------->
                <div class="input-group col-lg-8 col-md-8 col-sm-8 col-xs-12" id="buscador">

                    <input type="search" name="buscar" class="form-control" placeholder="Buscar...">

                    <span class="input-group-btn">
                        <a href="<?php echo $url; ?>buscador/1/recientes">
                            <button class="btn btn-default backColor" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </a>
                    </span>
                </div>

            </div>

            <!---------------------------
                carrito de compras
            ---------------------------->
            <div class="col-lg-3 col-md-3 col-sm-2 col-xs-12" id="carrito">
                <a href="#">
                    <button class="btn btn-default pull-left backColor">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </button>
                </a>

                <p>TU CESTA <span class="cantidadCesta"></span> <br> PEN S/. <span class="sumaCesta"></span></p>
            </div>

        </div>

        <!---------------------------
                CATEGORIAS
        ---------------------------->
        <div class="col-xs-12 backColor" id="categorias">

            <?php

                $item = null;
                $valor = null;

                $categorias = ControladorProductos::ctrMostrarCategorias($item, $valor);

                // var_dump($categorias);

                foreach ($categorias as $key => $value) {
                    // var_dump($value["categoria"]);

                    echo '<div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                            <h4>
                                <a href="'.$url.$value["ruta"].'" class="pixelCategorias">'.$value["categoria"].'</a>
                            </h4>
            
                            <hr>
            
                            <ul>';

                            $item = "id_categoria";

                            $valor = $value["id"];

                            $subcategorias = ControladorProductos::ctrMostrarSubCategorias($item, $valor);
                            // var_dump($subcategorias);

                            foreach ($subcategorias as $key => $value) {
                                echo '<li><a href="'.$url.$value["ruta"].'" class="pixelSubCategorias">'.$value["subcategoria"].'</a></li>';
                            }

                        echo '</ul>

                        </div>';
                }

            ?>

        </div>

    </div>
</header>