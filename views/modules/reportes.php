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
<div id="dlg" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
<form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
<div style="margin-bottom:10px">    
    <input name="cedula" class="easyui-textbox" required="true" label="Cedula:" style="width:100%">
</div>
</form>
</div>
<div id="dlg-buttons">
<a href="javascript:void(0)" class="easyui-linkbutton c6" onclick="confirmar()" style="width:90px;">Confirmar</a>
</div>
<br>
<table title="Reportes por Cliente" class="easyui-datagrid" style="width:700px;height:500px"
       url="../gestionPedidos/models/reportes/cargarReportes.php" toolbar="#toolbar" pagination="true"
       rownumbers="true" fitColumns="true" singleSelect="true">
    <thead>
    <tr>
        <th field="id_cli_per" width="50">Cedula</th>
        <th field="nom_cli" width="50">Nombre</th>
        <th field="id_ped_per" width="50">Orden Num.</th>
        <th field="fec_ped" width="50">Fecha</th>
        <th field="dir_suc" width="50">Dir. Sucursal</th>
    </tr>
    </thead>
</table>
</div>
<div id="toolbar">
    <a href="javascript:void(0)" class="easyui-linkbutton" plain="true" onclick="buscar()">Buscar</a>
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
</div>-->
<script type="text/javascript">
    var url;
    function buscar(){
        $('#dlg').dialog('open').dialog('center').dialog('setTitle','Buscar');
        $('#fm').form('clear');
        url = '../gestionPedidos/models/reportes/buscarReportes.php';
    }

    function confirmar() {
        $('#fm').form('submit', {
            url: url,
            iframe: false,
            onSubmit: function () {
                return $(this).form('validate');
            },
            success: function (result) {
                var result = eval('(' + result + ')');
                if (result.errorMsg) {
                    $.messager.show({
                        title: 'Error',
                        msg: result.errorMsg
                    });
                } else {
                    $('#dlg').dialog('close');        // close the dialog
                    $('#dg').datagrid('reload');    // reload the user data
                }
            }
        });
    }
</script>
</body>
</html>