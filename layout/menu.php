<?php
$userType = (isset($_SESSION['usertype'])) ? $_SESSION['usertype'] : null;
include(__DIR__ . '/../funcs/path.php');
?>

<!-- Navigation-->

<a class="menu-toggle rounded" href="#"><i class="fas fa-bars"></i></a>
<nav id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand text-white">
            Sistema de quejas
            <?php
            if (!is_null($userType)) {
                $userMode = ($userType == 1) ? "Administrador" : "Usuario";
                $nombre = $_SESSION['name'];
                echo "<div class='nombre'>Bienvenido, <span class='fw-bold'>$nombre ($userMode)</span></div>";
            }
            ?>
        </li>
        <?php
        echo "<li class='sidebar-nav-item'><a href='$rootProjectPath/'>Inicio</a></li>";
        if (!is_null($userType) && $userType == 0) {
            echo "<li class='sidebar-nav-item'><a href='$rootProjectPath/reports/createReport.php'>Crear queja</a></li>";
        }
        echo "<li class='sidebar-nav-item'><a href='$rootProjectPath/reports/listReports.php'>Listar quejas</a></li>";
        if ($userType == 1) {
            echo "<li class='sidebar-nav-item'><a href='$rootProjectPath/dashboard.php'>Panel de control</a></li>";
        }
        echo "<li class='sidebar-nav-item'><a href='$rootProjectPath/about.php'>Acerca de nosotros</a></li>";
        echo "<hr class='bg-white'>";

        if (is_null($userType)) {
            echo "<li class='sidebar-nav-item'><a href='$rootProjectPath/auth/userLogin.php'>Iniciar sesion</a></li>";
            echo "<li class='sidebar-nav-item'><a href='$rootProjectPath/auth/crearUsuario.php'>Crear nueva cuenta</a></li>";
        } else {
            echo "<li class='sidebar-nav-item'><a href='$rootProjectPath/auth/changePassword.php'>Cambiar contraseña</a></li>";
            echo "<li class='sidebar-nav-item'><a href='$rootProjectPath/auth/salir.php'>Cerrar sesion</a></li>";
        }
        ?>
    </ul>
</nav>