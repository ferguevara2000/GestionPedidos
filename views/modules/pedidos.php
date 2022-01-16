<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="jquery/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="jquery/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="jquery/themes/color.css">
    <script type="text/javascript" src="jquery/jquery.min.js"></script>
    <script type="text/javascript" src="jquery/jquery.easyui.min.js"></script>

</head>
<body>
<div style="text-align:center;">
    <h2 style="padding: 20px">Ingresar un pedido</h2>
    <br>
    <div class="panel datagrid panel-htop" style="width: 700px; margin: 0 auto">
        <table id="dg" title="Clientes" class="easyui-datagrid" style="width:700px;height: 250px"
               url="../gestionpedidos/models/pedidos/mostrarCabezeraPedidos.php"
               toolbar="#toolbar" pagination="true"
               rownumbers="true" fitColumns="true" singleSelect="true">
            <thead>
            <tr>
                <th field="id_ped" width="50">Id Pedido</th>
                <th field="fec_ped" width="50">Fecha Pedido</th>
                <th field="ped_suc_per" width="50">Sucursal</th>
            </tr>
            </thead>
        </table>
    </div>
</div>
<div id="toolbar">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Ingresar
        Cabezera</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Editar
        Cabezera</a>
</div>

<div id="dlg" class="easyui-dialog" style="width:400px"
     data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
    <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
        <h3 style="padding-bottom: 20px; padding-top: 0">Cabezera del Pedido</h3>
        <div style="margin-bottom:10px">
            <input name="id_ped" class="easyui-textbox" required="true" label="Id Pedido:" style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <input name="fec_ped" class="easyui-textbox" required="true" type="date" label="Fecha del Pedido:" style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <label>Sucursal:</label>
            <select name="id_suc" style="margin-left: 20px; padding:5px; width:175px; border-color: #64A0F9">
                <option value="0">Seleccione..</option>
                <?php
                include "../gestionPedidos/models/conexion.php";
                $sql = "SELECT * FROM sucursales";
                $result = mysqli_query($conn,$sql);
                while ($row = mysqli_fetch_array($result)) {
                    echo '<option value="'.$row['dir_suc'].' - '.$row['ciu_suc'].'">'.$row['dir_suc'].' - '.$row['ciu_suc'].'</option>';
                }
                $conn->close();
                ?>
            </select>
            <br>
        </div>
    </form>
</div>
<div id="dlg-buttons">
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Guardar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel"
       onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancelar</a>
</div>

<div style="text-align:center;">
    <br>
    <div class="panel datagrid panel-htop" style="width: 700px; margin: 0 auto">
        <table id="dg1" title="Detalle del Pedido" class="easyui-datagrid" style="width:700px;height: 250px"
               url="../gestionpedidos/models/pedidos/mostrarDetallePedido.php"
               toolbar="#toolbar1" pagination="true"
               rownumbers="true" fitColumns="true" singleSelect="true">
            <thead>
            <tr>
                <th field="id_ped_per" width="50">Pedido</th>
                <th field="cat_ped" width="50">Cantidad</th>
                <th field="id_art" width="50">Articulo</th>
            </tr>
            </thead>
        </table>
    </div>
</div>
<div id="toolbar1">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUserDetalle()">Ingresar
        Detalle</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUserDetalle()">Editar
        Detalle</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUserDetalle()">Remover
        Detalle</a>
</div>

<div id="dlg1" class="easyui-dialog" style="width:400px"
     data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
    <form id="fm1" method="post" novalidate style="margin:0;padding:20px 50px">
        <h3 style="padding-bottom: 20px; padding-top: 0">Detalle del Pedido</h3>
        <div style="margin-bottom:10px">
            <input name="id_ped_per" class="easyui-textbox" required="true" label="Id Pedido:" style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <input name="cat_ped" class="easyui-textbox" type="number" required="true" label="Cantidad:" style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <label>Articulo:</label>
            <select name="id_art" style="margin-left: 20px; padding:5px; width:175px; border-color: #64A0F9">
                <?php
                include "../gestionPedidos/models/conexion.php";
                $sql = "SELECT * FROM articulos";
                $result = mysqli_query($conn,$sql);
                while ($row = mysqli_fetch_array($result)) {
                    echo '<option value="'.$row['nom_art'].'">'.$row['nom_art'].'</option>';
                }
                $conn->close();
                ?>
            </select>
            <br>
        </div>
    </form>
</div>
<div id="dlg-buttons">
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUserDetalle()" style="width:90px">Guardar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel"
       onclick="javascript:$('#dlg1').dialog('close')" style="width:90px">Cancelar</a>
</div>

<script type="text/javascript">
    var url;

    function newUser() {
        $('#dlg').dialog('open').dialog('center').dialog('setTitle', 'Nueva Cabezera');
        $('#fm').form('clear');
        url = '../gestionPedidos/models/pedidos/agregarCabezeraPedido.php';
    }

    function editUser() {
        var row = $('#dg').datagrid('getSelected');
        if (row) {
            $('#dlg').dialog('open').dialog('center').dialog('setTitle', 'Editar Cabezera');
            $('#fm').form('load', row);
            url = '../gestionPedidos/models/pedidos/editarCabezeraPedido.php?id_ped=' + row.id_ped;
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
</script>
<script type="text/javascript">
    var url;

    function newUserDetalle() {
        $('#dlg1').dialog('open').dialog('center').dialog('setTitle', 'Nuevo Detalle');
        $('#fm1').form('clear');
        url = '../gestionPedidos/models/pedidos/agregarDetallePedidos.php';
    }

    function editUserDetalle() {
        var row = $('#dg1').datagrid('getSelected');
        if (row) {
            $('#dlg1').dialog('open').dialog('center').dialog('setTitle', 'Editar Detalle');
            $('#fm1').form('load', row);
            url = '../gestionPedidos/models/pedidos/editarDetallePedido.php?id_ped_per=' + row.id_ped_per;
        }
    }

    function saveUserDetalle() {
        $('#fm1').form('submit', {
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
                    $('#dlg1').dialog('close');        // close the dialog
                    $('#dg1').datagrid('reload');    // reload the user data
                }
            }
        });
    }

    function destroyUserDetalle() {
        var row = $('#dg1').datagrid('getSelected');
        if (row) {
            $.messager.confirm('Confirmar', 'Esta seguro que desea eliminar el detalle?', function (r) {
                if (r) {
                    $.post('../gestionPedidos/models/pedidos/eliminarDetallePedido.php', {id_ped_per: row.id_ped_per}, function (result) {
                        if (result.success) {
                            $('#dg1').datagrid('reload');    // reload the user data
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