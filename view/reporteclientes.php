<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Clientes TecnoSoluciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container-fluid mt-5">
        <?php include 'menu.php'; ?>
        <h2>Reporte de Clientes</h2>
        <a href="/tecno-1/index.php?accion=cargarcliente" class="btn btn-primary">Ir a Clientes</a>
        <hr>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                </tr>
            </thead>
            <tbody>
                <?php if($clientes) { foreach($clientes as $cli) { ?>
                <tr>
                    <td><?= $cli->getIdcliente() ?></td>
                    <td><?= $cli->getNombre() ?></td>
                    <td><?= $cli->getCorreo() ?></td>
                    <td><?= $cli->getTelefono() ?></td>
                </tr>
                <?php }} else { ?>
                <tr><td colspan="4">No hay clientes registrados.</td></tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="index.php?accion=generarPDFClientes" class="btn btn-primary">Generar PDF</a>
    </div>
</body>
</html>
