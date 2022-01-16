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
<input name="ced_cli" class="easyui-textbox" required="true" label="Cedula:" style="width:20%">
<a href="javascript:void(0)" class="easyui-linkbutton" onclick="buscar()" style="width:60px">Buscar</a>
</div>
<div style="margin:40px">
<table id="dg" title="Reportes" class="easyui-datagrid" style="width:700px;height:200px"
       url="" toolbar="#toolbar" pagination="true"
       rownumbers="true" fitColumns="true" singleSelect="true">
    <thead>
    <tr>
        <th field="id_art" width="1">Orden Num.</th>
        <th field="nom_art" width="1">Fecha</th>
        <th field="nom_art" width="1">Dir. Sucursal</th>
    </tr>
    </thead>
</table>
</div> 
</div>
<div id="toolbar">
    <a href="javascript:void(0)" class="easyui-linkbutton" plain="true" onclick="">Ver Reporte</a>
</div>
<div style="margin:40px">
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
</div>
<script type="text/javascript">
    function buscar(){
        var row = $('#dg').datagrid('getSelected');
        if (row){
            $('#dlg').dialog('open').dialog('center').dialog('setTitle','Editar Estudiante');
            $('#fm').form('load',row);
            url = '../gestionPedidos/models/articulos/editarArticulo.php?id_art=' + row.id_art;
        }
    }
</script>
</body>
</html>