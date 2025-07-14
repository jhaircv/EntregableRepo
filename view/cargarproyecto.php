<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Proyectos TecnoSoluciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container-fluid mt-5">
        <?php include 'menu.php'; ?>
        <h2>Lista de Proyectos</h2>
        <a href="index.php?accion=guardarproyecto" class="btn btn-success mb-3">Crear Nuevo</a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Fecha Asiganada</th>
                    <th>Fecha Entrega</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($proyectos as $p) { ?>
                <tr>
                    <td><?= $p->getIdproyecto() ?></td>
                    <td><?= $p->getNombre() ?></td>
                    <td><?= $p->getDescripcion() ?></td>
                    <td><?= $p->getFechainicio() ?></td>
                    <td><?= $p->getFechafin() ?></td>
                    <td>
                        <a href="index.php?accion=editarproyecto&idproyecto=<?= $p->getIdproyecto() ?>" class="btn btn-primary btn-sm">Editar</a>
                        <a href="index.php?accion=borrarproyecto&idproyecto=<?= $p->getIdproyecto() ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro de eliminar?')">Borrar</a>
                    </td>
                </tr>
                <?php 
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
