<?php
require_once './middleware/Auth.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Proyecto TecnoSoluciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h3>Editar Proyecto</h3>
    <form action="index.php?accion=editarproyecto" method="POST">
        <input type="hidden" name="idproyecto" value="<?= htmlspecialchars($proyecto['idproyecto']) ?>">

        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="<?= htmlspecialchars($proyecto['nombre']) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control" required><?= htmlspecialchars($proyecto['descripcion']) ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Fecha Fin</label>
            <input type="date" name="fechafin" class="form-control" value="<?= htmlspecialchars($proyecto['fechafin']) ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="index.php?accion=cargarproyecto" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

</body>
</html>
