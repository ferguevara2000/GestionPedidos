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
<h2 style="padding: 20px">Tabla de Artículos</h2>
<br>
<div class="panel datagrid panel-htop" style="width: 700px; margin: 0 auto">
<table id="dg" title="Artículos" class="easyui-datagrid" style="width:700px;height:600px"
       url="../gestionpedidos/models/articulos/cargarArticulos.php"
       toolbar="#toolbar" pagination="true"
       rownumbers="true" fitColumns="true" singleSelect="true">
    <thead>
    <tr>
        <th field="id_art" width="50">Nro Artículo</th>
        <th field="nom_art" width="50">Nombre</th>
        <th field="col_art" width="50">Color</th>
        <th field="pes_art" width="50">Peso</th>
        <th field="exi_art" width="50">Capacidad</th>
        <th field="nom_pla" width="50">Planta Fabricación</th>
        <th field="niv_rie_art" width="50">Nivel de Riesgo</th>
    </tr>
    </thead>
</table>
</div> 
</div>

<div id="toolbar">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Ingresar Artículo</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Editar Artículo</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Remover Artículo</a>
</div>

<div id="dlg" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
    <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
        <h3>Información del Artículo</h3>
        <br>
        <div style="margin-bottom:10px">
            <input name="id_art" class="easyui-textbox" required="true" label="Nro Artículo:" style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <input name="nom_art" class="easyui-textbox" required="true" label="Nombre:" style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <input name="col_art" class="easyui-textbox" required="true" label="Color:" style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <input name="pes_art" class="easyui-textbox" required="true" label="Peso:" style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <input name="cap_art" class="easyui-textbox" required="true" label="Capacidad:" style="width:100%">
        </div>
        <br>
        <div style="margin-bottom:10px">
            <label>Planta Fabricación:</label>
            <select name="pla_fab" style="padding:5px; width:175px; border-color: #64A0F9">
                <option value="0">Seleccione..</option>
                <?php
                    include "../gestionPedidos/models/conexion.php";
                    $sql = "SELECT * FROM plantas";
                    $result = mysqli_query($conn,$sql);
                    while ($row = mysqli_fetch_array($result)) {
                        echo '<option value="'.$row['nom_pla'].'">'.$row['nom_pla'].'</option>';
                    }
                    $conn->close();
                ?>
            </select>
            <br>
            <br>
            <br>
            <div style="margin-bottom:10px">
            <input name="niv_rie" class="easyui-textbox" required="true" label="Nivel de Riesgo:" style="width:100%">
        </div>
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
        $('#dlg').dialog('open').dialog('center').dialog('setTitle','Nuevo Artículo');
        $('#fm').form('clear');
        url = '../gestionPedidos/models/articulos/agregarArticulo.php';
    }
    function editUser(){
        var row = $('#dg').datagrid('getSelected');
        if (row){
            $('#dlg').dialog('open').dialog('center').dialog('setTitle','Editar Estudiante');
            $('#fm').form('load',row);
            url = '../gestionPedidos/models/articulos/editarArticulo.php?id_art=' + row.id_art;
        }
    }
    function saveUser() {
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
    function destroyUser(){
        var row = $('#dg').datagrid('getSelected');
        if (row){
            $.messager.confirm('Confirmar','Esta seguro que desea eliminar el articulo?',function(r){
                if (r){
                    $.post('../gestionPedidos/models/articulos/eliminarArticulo.php',{id_art:row.id_art,nom_pla:row.nom_pla},function(result){
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