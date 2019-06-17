<?php

class ControladorPlantilla{

    /*--------------------------------------------
                Llamada a la Plantilla
    ----------------------------------------------*/

    public function plantilla(){
        include "vistas/plantilla.php";
    }

    /*--------------------------------------------
            Estilos dinámicos de la Plantilla
    ----------------------------------------------*/

    public function ctrEstiloPlantilla(){
        $tabla = "plantilla";

        $respuesta = ModeloPlantilla::mdlEstiloPlantilla($tabla);

        return $respuesta;
    }

}