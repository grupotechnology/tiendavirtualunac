<!--------------------------------------------
                    SLIDE
--------------------------------------------->

<div class="container-fluid" id="slide">
    <div class="row">

        <!--------------------------------------------
                        DIAPOSITIVAS
        --------------------------------------------->
        <ul>

            <?php
                
                $servidor = Ruta::ctrRutaServidor();
            
                $slide = ControladorSlide::ctrMostrarSlide();
                // var_dump($slide);

                foreach ($slide as $key => $value) {

                    $estiloImgProducto = json_decode($value["estiloImgProducto"], true);
                    $estiloTextoSlide = json_decode($value["estiloTextoSlide"], true);
                    $titulo1 = json_decode($value["titulo1"], true);
                    $titulo2 = json_decode($value["titulo2"], true);
                    $titulo3 = json_decode($value["titulo3"], true);

                    // var_dump($estiloTextoSlide);

                    echo '<li>

                            <img src="'.$servidor.$value["imgFondo"].'">

                            <div class="slideOpciones '.$value["tipoSlide"].'">';

                            if($value["imgProducto"] != ""){
                                                        
                                echo '<img src="'.$servidor.$value["imgProducto"].'" class="imgProducto" style="top:'.$estiloImgProducto["top"].'; right:'.$estiloImgProducto["right"].'; width:'.$estiloImgProducto["width"].'; left:'.$estiloImgProducto["left"].'">';
                            }
                            
                            echo '<div class="textosSlide" style="top:'.$estiloTextoSlide["top"].'; right:'.$estiloTextoSlide["right"].'; width:'.$estiloTextoSlide["width"].'; left:'.$estiloTextoSlide["left"].'">

                                    <h1 style="color:'.$titulo1["color"].'">'.$titulo1["texto"].'</h1>

                                    <h2 style="color: '.$titulo2["color"].'">'.$titulo2["texto"].'</h2>

                                    <h3 style="color: '.$titulo3["color"].'">'.$titulo3["texto"].'</h3>

                                    <a href="'.$value["url"].'">

                                        '.$value["boton"].'

                                    </a>

                                </div>

                            </div>

                        </li>';
                }
            ?>

        </ul>

        <!--------------------------------------------
                        PAGINACIÓN
        --------------------------------------------->
        <ol id="paginacion">

            <?php

                // var_dump(count($slide));
                for ($i=1; $i <= count($slide); $i++) { 
                    echo '<li item="'.$i.'"><span class="fa fa-circle"></span></li>';
                }

            ?>
            
        </ol>

        <!--------------------------------------------
                            FLECHAS
        --------------------------------------------->
        <div class="flechas" id="retroceder"><span class="fa fa-chevron-left"></span></div>
        <div class="flechas" id="avanzar"><span class="fa fa-chevron-right"></span></div>
    
    </div>

</div>

<center>

    <button id="btnSlide" class="backColor">
        <i class="fa fa-angle-up"></i>
    </button>

</center>