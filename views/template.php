<!doctype html>
<html lang="es">
<head>
    <link rel="stylesheet" href="css/estilosInicio.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/0d3b043a5e.js" crossorigin="anonymous"></script>
    <title>Inicio</title>
</head>
<body>
    <header>
        <nav class="nav">
            <ul class="nav__ul">
                <li class="nav__li"><i class="fas fa-shopping-cart"></i><a href="index.php?action=pedidos">Pedidos</a></li>
                <li class="nav__li"><i class="fas fa-users"></i><a href="index.php?action=clientes">Clientes</a></li>
                <li class="nav__li"><i class="fas fa-tags"></i><a href="index.php?action=articulos">Articulos</a></li>
                <li class="nav__li"><i class="fas fa-store-alt"></i><a href="index.php?action=sucursales">Sucursales</a></li>
                <li class="nav__li"><i class="fas fa-industry"></i><a href="index.php?action=plantas">Plantas</a></li>
                <li class="nav__li"><i class="fas fa-file-invoice"></i><a href="index.php?action=plantas">Reportes</a></li>
            </ul>
        </nav>
    </header>
    <section>
        <?php
        $mvc = new MvcController();
        $mvc -> enlacesPaginasController();
        ?>
    </section>
    <footer>
        © Derechos Reservados, 2021
    </footer>
</body>
</html>
