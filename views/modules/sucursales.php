<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sucursales</title>
    <link rel="stylesheet" type="text/css" href="jquery/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="jquery/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="jquery/themes/color.css">
    <script type="text/javascript" src="jquery/jquery.min.js"></script>
    <script type="text/javascript" src="jquery/jquery.easyui.min.js"></script>

</head>
<body>
<div style="text-align:center;">
    <h2 style="padding: 20px">Tabla de Sucursales</h2>
    <br>
    <div class="panel datagrid panel-htop" style="width: 700px; margin: 0 auto">
        <table id="dg" title="Plantas" class="easyui-datagrid" style="width:700px;height: 250px"
               url="../gestionpedidos/models/sucursales/cargarSucursales.php"
               toolbar="#toolbar" pagination="true"
               rownumbers="true" fitColumns="true" singleSelect="true">
            <thead>
            <tr>
                <th field="id_suc" width="50">Id Sucursal</th>
                <th field="dir_suc" width="50">Direccion</th>
                <th field="tel_suc" width="50">Telèfono</th>
                <th field="ciu_suc" width="50">Ciudad</th>
            </tr>
            </thead>
        </table>
    </div>
</div>
<div id="toolbar">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newSucursal()">Ingresar
    Sucursal</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editSucursal()">Editar
    Sucursal</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroySucursal()">Remover
    Sucursal</a>
</div>

<div id="dlg" class="easyui-dialog" style="width:400px"
     data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
    <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
        <h3 style="padding-bottom: 20px; padding-top: 0">Informacion de Sucursal</h3>
        <div style="margin-bottom:10px">
            <input name="id_suc" class="easyui-textbox" required="true" label="Id Sucursal:" style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <input name="dir_suc" class="easyui-textbox" required="true" label="Direccion:" style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <input name="tel_suc" class="easyui-textbox" required="true" label="Telèfono:" style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <input name="ciu_suc" class="easyui-textbox" required="true" label="Ciudad:" style="width:100%">
        </div>
        </div>
        
    </form>
</div>
<div id="dlg-buttons">
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveSucursal()" style="width:90px">Guardar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel"
       onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancelar</a>
</div>
<script type="text/javascript">
    var url;

    function newSucursal() {
        $('#dlg').dialog('open').dialog('center').dialog('setTitle', 'Nueva Sucursal');
        $('#fm').form('clear');
        url = '../gestionPedidos/models/sucursales/agregarSucursal.php';
    }

    function editSucursal() {
        var row = $('#dg').datagrid('getSelected');
        if (row) {
            $('#dlg').dialog('open').dialog('center').dialog('setTitle', 'Editar Sucursal');
            $('#fm').form('load', row);
            url = '../gestionPedidos/models/sucursales/editarSucursal.php?id_suc=' + row.id_suc;
        }
    }

    function saveSucursal() {
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

    function destroySucursal() {
        var row = $('#dg').datagrid('getSelected');
        if (row) {
            $.messager.confirm('Confirmar', 'Esta seguro que desea eliminar la sucursal?', function (r) {
                if (r) {
                    $.post('../gestionPedidos/models/sucursales/eliminarSucursal.php', {id_suc: row.id_suc}, function (result) {
                        if (result.success) {
                            $('#dg').datagrid('reload');    // reload the user data
                        } else {
                            $.messager.show({    // show error message
                                title: 'Error',
                                msg: result.errorMsg
                            });
                        }
                    }, 'json');
                }
            });
        }
    }
</script>
</body>
</html>