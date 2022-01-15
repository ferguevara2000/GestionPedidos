<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Plantas</title>
    <link rel="stylesheet" type="text/css" href="jquery/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="jquery/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="jquery/themes/color.css">
    <script type="text/javascript" src="jquery/jquery.min.js"></script>
    <script type="text/javascript" src="jquery/jquery.easyui.min.js"></script>

</head>
<body>
<div style="text-align:center;">
    <h2 style="padding: 20px">Tabla de Plantas</h2>
    <br>
    <div class="panel datagrid panel-htop" style="width: 700px; margin: 0 auto">
        <table id="dg" title="Plantas" class="easyui-datagrid" style="width:700px;height: 250px"
               url="../gestionpedidos/models/plantas/cargarPlantas.php"
               toolbar="#toolbar" pagination="true"
               rownumbers="true" fitColumns="true" singleSelect="true">
            <thead>
            <tr>
                <th field="id_pla" width="50">Id Planta</th>
                <th field="nom_pla" width="50">Nombre</th>
                <th field="dir_pla" width="50">Direccion</th>
                <th field="tel_pla" width="50">Teléfono</th>
            </tr>
            </thead>
        </table>
    </div>
</div>
<div id="toolbar">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newPlanta()">Ingresar
    Planta</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editPlanta()">Editar
    Planta</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyPlanta()">Remover
    Planta</a>
</div>

<div id="dlg" class="easyui-dialog" style="width:400px"
     data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
    <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
        <h3 style="padding-bottom: 20px; padding-top: 0">Informacion de Planta</h3>
        <div style="margin-bottom:10px">
            <input name="id_pla" class="easyui-textbox" required="true" label="Id Planta:" style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <input name="nom_pla" class="easyui-textbox" required="true" label="Nombre Planta:" style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <input name="dir_pla" class="easyui-textbox" required="true" label="Direccion:" style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <input name="tel_pla" class="easyui-textbox" required="true" label="Telèfono:" style="width:100%">
        </div>
    </form>
</div>
<div id="dlg-buttons">
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="savePlanta()" style="width:90px">Guardar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel"
       onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancelar</a>
</div>
<script type="text/javascript">
    var url;

    function newPlanta() {
        $('#dlg').dialog('open').dialog('center').dialog('setTitle', 'Nueva Planta');
        $('#fm').form('clear');
        url = '../gestionPedidos/models/plantas/agregarPlanta.php';
    }

    function editPlanta() {
        var row = $('#dg').datagrid('getSelected');
        if (row) {
            $('#dlg').dialog('open').dialog('center').dialog('setTitle', 'Editar Planta');
            $('#fm').form('load', row);
            url = '../gestionPedidos/models/plantas/editarPlanta.php?id_pla=' + row.id_pla;
        }
    }

    function savePlanta() {
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

    function destroyPlanta() {
        var row = $('#dg').datagrid('getSelected');
        if (row) {
            $.messager.confirm('Confirmar', 'Esta seguro que desea eliminar la planta?', function (r) {
                if (r) {
                    $.post('../gestionPedidos/models/plantas/eliminarPlanta.php', {id_pla: row.id_pla}, function (result) {
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