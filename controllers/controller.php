<?php

class MvcController
{
    public function plantilla()
    {
        include "views/template.php";
    }

    public function enlacesPaginasController()
    {
        if (isset($_GET["action"]))
        {
            $enlacesController = $_GET["action"];
        }else{
            $enlacesController = "pedidos.php";
        }

        $respuesta = EnlacesPagina::enlacesPaginasModel($enlacesController);

        include $respuesta;
    }
}

?>
