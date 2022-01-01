<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Articulos</title>
    <link rel="stylesheet" type="text/css" href="jquery/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="jquery/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="jquery/themes/color.css">
    <script type="text/javascript" src="jquery/jquery.min.js"></script>
    <script type="text/javascript" src="jquery/jquery.easyui.min.js"></script>

</head>
<body>
<div style="text-align:center;">
<h2>Tabla de Articulos</h2>
<br>

<table id="dg" title="Articulos" class="easyui-datagrid" style="width:700px;height:250px"
       url="../gestionpedidos/models/cargarArticulos.php"
       toolbar="#toolbar" pagination="true"
       rownumbers="true" fitColumns="true" singleSelect="true">
    <thead>
    <tr>
        <th field="id_art" width="50">Id</th>
        <th field="nom_art" width="50">Nombre</th>
        <th field="col_art" width="50">Color</th>
        <th field="pes_art" width="50">Peso</th>
        <th field="cap_art" width="50">Capacidad</th>
    </tr>
    </thead>
</table>
</div> 
<div id="toolbar">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Ingresar Articulo</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Editar Articulo</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Remover Articulo</a>
</div>

<div id="dlg" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
    <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
        <h3>Informacion del Articulo</h3>
        <div style="margin-bottom:10px">
            <input name="id_art" class="easyui-textbox" required="true" label="Cedula:" style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <input name="nom_art" class="easyui-textbox" required="true" label="Nombre:" style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <input name="col_art" class="easyui-textbox" required="true" label="Apellido:" style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <input name="pes_art" class="easyui-textbox" required="true" label="Direccion:" style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <input name="cap_art" class="easyui-textbox" required="true" label="Telefono:" style="width:100%">
        </div>
    </form>
</div>
<div id="dlg-buttons">
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Guardar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancelar</a>
</div>
<script type="text/javascript">
    var url;
    function newUser(){
        $('#dlg').dialog('open').dialog('center').dialog('setTitle','Nuevo Estudiante');
        $('#fm').form('clear');
        url = '../soauta/models/guardar.php';
    }
    function editUser(){
        var row = $('#dg').datagrid('getSelected');
        if (row){
            $('#dlg').dialog('open').dialog('center').dialog('setTitle','Editar Estudiante');
            $('#fm').form('load',row);
            url = '../soauta/models/editar.php?id='+row.EST_CEDULA;
        }
    }
    function saveUser(){
        $('#fm').form('submit',{
            url: url,
            iframe: false,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success: function(result){
                var result = eval('('+result+')');
                if (result.errorMsg){
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
    function destroyUser(){
        var row = $('#dg').datagrid('getSelected');
        if (row){
            $.messager.confirm('Confirmar','Esta seguro que desea eliminar el estudiante?',function(r){
                if (r){
                    $.post('../soauta/models/eliminar.php',{id:row.EST_CEDULA},function(result){
                        if (result.success){
                            $('#dg').datagrid('reload');    // reload the user data
                        } else {
                            $.messager.show({    // show error message
                                title: 'Error',
                                msg: result.errorMsg
                            });
                        }
                    },'json');
                }
            });
        }
    }
</script>
</body>
</html>