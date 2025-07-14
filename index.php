<?php
session_start();
require_once './controller/AuthController.php';
require_once './controller/ClienteController.php';
require_once './controller/ProyectoController.php';
require_once './controller/ReporteController.php';

$accion = isset($_GET['accion']) ? $_GET['accion'] : '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username'], $_POST['password']) && (!isset($_GET['accion']) || $_GET['accion'] != 'guardarusuario')) {
    $auth = new AuthController();
    $auth->login();
    exit;
}

if (!isset($_SESSION['user']) && $accion != 'login' && $accion != 'registrarusuario' && $accion != 'guardarusuario') {
    ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login | TecnoSoluciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <?php if (isset($_SESSION['mensaje'])) { ?>
            <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                <div id="toastMensaje" class="toast align-items-center text-bg-primary border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            <?= $_SESSION['mensaje'] ?>
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>
            <?php unset($_SESSION['mensaje']); ?>
        <?php } ?>

        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="card-title mb-4 text-center">Login - TecnoSoluciones</h4>
                        <form method="post" action="">
                            <div class="mb-3">
                                <label for="username" class="form-label">Usuario</label>
                                <input type="text" name="username" id="username" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Ingresar</button>
                                <a href="index.php?accion=registrarusuario" class="btn btn-success">Registrar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        var toastEl = document.getElementById('toastMensaje');
        if (toastEl) {
            var toast = new bootstrap.Toast(toastEl);
            toast.show();
        }
    </script>
</body>
</html>
<?php
    exit;
}

switch($accion){
    case 'logout':
        $auth = new AuthController();
        $auth->logout();
        break;

    case 'registrarusuario':
        $auth = new AuthController();
        $auth->mostrarRegistro();
        break;

    case 'guardarusuario':
        $auth = new AuthController();
        $auth->register();
        break;

    case 'dashboard':
        require './view/dashboard.php';
        break;

    case 'guardarcliente':
        $controller = new ClienteController();
        $controller->guardar();
        break;

    case 'cargarcliente':
        $controller = new ClienteController();
        $controller->cargar();
        break;

    case 'editarcliente':
        $controller = new ClienteController();
        $controller->editar();
        break;

    case 'borrarcliente':
        $controller = new ClienteController();
        $controller->borrar();
        break;

    case 'guardarproyecto':
        $controller = new ProyectoController();
        $controller->guardar();
        break;

    case 'cargarproyecto':
        $controller = new ProyectoController();
        $controller->cargar();
        break;

    case 'editarproyecto':
        $controller = new ProyectoController();
        $controller->editar();
        break;

    case 'borrarproyecto':
        $controller = new ProyectoController();
        $controller->borrar();
        break;

    case 'cargarreporteproyectos':
        $reporteController = new ReporteController();
        $reporteController->cargarProyectosReporte();
        break;

    case 'generarPDFProyectos':
        $reporteController = new ReporteController();
        $reporteController->generarPDFProyectos();
        break;

    case 'cargarreporteclientes':
        $reporteController = new ReporteController();
        $reporteController->cargarClientesReporte();
        break;

    case 'generarPDFClientes':
        $reporteController = new ReporteController();
        $reporteController->generarPDFClientes();
        break;

    default:
        require './view/dashboard.php';
        break;
}
?>