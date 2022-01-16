<?php

class EnlacesPagina
{
    public static function enlacesPaginasModel($enlacesModel)
    {
        if ($enlacesModel == "pedidos" || $enlacesModel == "clientes" || $enlacesModel == "sucursales" ||
            $enlacesModel == "articulos" || $enlacesModel == "plantas" || $enlacesModel == "reportes")
        {
            $module = "views/modules/".$enlacesModel.".php";
        }else if ($enlacesModel == "index"){
            $module = "views/modules/pedidos.php";
        }else{
            $module = "views/modules/pedidos.php";
        }
        return $module;
    }
}