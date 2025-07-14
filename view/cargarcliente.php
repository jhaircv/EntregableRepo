<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes TecnoSoluciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <?php include 'menu.php'; ?>

    <div class="container-fluid mt-5">
        <h1 class="mb-4">Lista de Clientes</h1>

        <a href="http://localhost/tecno-1/index.php?accion=guardarcliente" class="btn btn-primary mb-3">Crear Nuevo</a>
        <hr>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($clientes as $cli) { ?>
                <tr>
                    <td><?= $cli->getIdcliente() ?></td>
                    <td><?= $cli->getNombre() ?></td>
                    <td><?= $cli->getCorreo() ?></td>
                    <td><?= $cli->getTelefono() ?></td>
                    <td>
                        <a href="http://localhost/tecno-1/index.php?accion=editarcliente&idcliente=<?= $cli->getIdcliente() ?>" class="btn btn-sm btn-warning">Editar</a>
                        <a href="http://localhost/tecno-1/index.php?accion=borrarcliente&idcliente=<?= $cli->getIdcliente() ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro de eliminar?')">Borrar</a>
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
