<?php
require_once __DIR__ . '/../middleware/Auth.php';
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard TecnoSoluciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<?php include 'menu.php'; ?>

<div class="container mt-5">
    <h3>Dashboard Principal</h3>
    <p>Bienvenido al sistema de gestión de TecnoSoluciones S.A.</p>

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-3">
                <div class="card-body">
                    <h5 class="card-title">Gestión de Clientes</h5>
                    <p class="card-text">Visualiza, registra y edita clientes.</p>
                    <a href="/tecno-1/index.php?accion=cargarcliente" class="btn btn-primary">Ir a Clientes</a>
                </div>
            </div>
        </div>

    <div class="col-md-6">
    <div class="card shadow mb-3">
        <div class="card-body">
            <h5 class="card-title">Gestión de Proyectos</h5>
            <p class="card-text">Visualiza, registra y edita proyectos.</p>
            <a href="index.php?accion=cargarproyecto" class="btn btn-primary">Ir a Proyectos</a>
        </div>
    </div>
</div>
    </div>
</div>

</body>
</html>
