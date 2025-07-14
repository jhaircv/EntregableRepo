<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Proyectos TecnoSoluciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container-fluid mt-5">
        <?php include 'menu.php'; ?>
        <h2>Reporte de Proyectos</h2>
        <a href="index.php?accion=cargarproyecto" class="btn btn-primary">Ir a Proyectos</a>
        <hr>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                </tr>
            </thead>
            <tbody>
                <?php if($proyectos) { foreach($proyectos as $p) { ?>
                <tr>
                    <td><?= $p->getIdproyecto() ?></td>
                    <td><?= $p->getNombre() ?></td>
                    <td><?= $p->getDescripcion() ?></td>
                    <td><?= $p->getFechainicio() ?></td>
                    <td><?= $p->getFechafin() ?></td>
                </tr>
                <?php }} else { ?>
                <tr><td colspan="5">No hay proyectos registrados.</td></tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="index.php?accion=generarPDFProyectos" class="btn btn-primary">Generar PDF</a>
    </div>
</body>
</html>
