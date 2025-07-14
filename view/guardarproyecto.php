<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Proyecto TecnoSoluciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<?php include 'menu.php'; ?>

<div class="container mt-5">
    <h3>Registrar Proyecto</h3>
    <form method="post" action="index.php?accion=guardarproyecto">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Proyecto</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="fechafin" class="form-label">Fecha de Entrega</label>
            <input type="date" name="fechafin" id="fechafin" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Proyecto</button>
        <a href="index.php?accion=cargarproyecto" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

</body>
</html>
