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
<h2 style="padding: 20px, border-top=1px">Buscar Reportes por Cedula de Cliente</h2>
<br>
<input class="easyui-textbox" class="light-table-filter" required="true" label="Cedula:" style="width:20%" data-table="order-table">
<a href="" class="easyui-linkbutton" style="width:60px">Buscar</a>
</div>
<div style="margin:40px">
<table title="Reportes por Cliente" class="easyui-datagrid" class="order-table table" style="width:700px;height:500px"
       url="../gestionPedidos/models/reportes/cargarReportes.php" toolbar="#toolbar" pagination="true"
       rownumbers="true" fitColumns="true" singleSelect="true">
    <thead>
    <tr>
        <th field="id_cli" width="50">Cedula</th>
        <th field="nom_cli" width="50">Nombre</th>
        <th field="id_ped_per" width="50">Orden Num.</th>
        <th field="fec_ped" width="50">Fecha</th>
        <th field="dir_suc" width="50">Dir. Sucursal</th>
    </tr>
    </thead>
</table>
</div> 
</div>
<div id="toolbar">
    <a href="" class="easyui-linkbutton" plain="true" onclick="">Ver Reporte</a>
</div>
<!--<div style="margin:40px">
<table id="dg" title="Reporte de Pedido" class="easyui-datagrid" style="width:650px;height:105px"
       url="" fitColumns="true" singleSelect="true">
    <thead>
    <tr>
        <th field="id_art" width="50">Orden Num.</th>
        <th field="nom_art" width="50">Fecha</th>
    </tr>
    </thead>
</table>
<table id="dg" class="easyui-datagrid" style="width:650px;height:200px"
       url="" rownumbers="true" fitColumns="true" singleSelect="true">
    <thead>
    <tr>
        <th field="id_art" width="50">Cod. Artículo</th>
        <th field="nom_art" width="50">Nom. Artículo</th>
        <th field="col_art" width="50">Cantidad</th>
    </tr>
    </thead>
</table>
</div>-->>
</script>
</body>
</html>