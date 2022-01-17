<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Reportes</title>
    <link rel="stylesheet" type="text/css" href="jquery/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="jquery/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="jquery/themes/color.css">
    <script type="text/javascript" src="jquery/jquery.min.js"></script>
    <script type="text/javascript" src="jquery/jquery.easyui.min.js"></script>
</head>
<body>
<div style="margin:40px">
<h2 style="padding: 20px, border-top=1px">Reportes por Cliente</h2>
<br>
<table title="Reportes por Cliente" class="easyui-datagrid" style="width:700px;height:500px"
       url="../gestionPedidos/models/reportes/cargarReportes.php" toolbar="#toolbar" pagination="true"
       rownumbers="true" fitColumns="true" singleSelect="true">
    <thead>
    <tr>
        <th field="id_cli_per" width="50">Cedula</th>
        <th field="nom_cli" width="50">Nombre</th>
        <th field="id_ped_per" width="50">Orden Num.</th>
        <th field="nom_art" width="50">Nom. Artículo</th>
        <th field="cat_ped" width="50">Catidad</th>
        <th field="fec_ped" width="50">Fecha</th>
        <th field="dir_suc" width="50">Dir. Sucursal</th>
    </tr>
    </thead>
</table>
</body>
</html>