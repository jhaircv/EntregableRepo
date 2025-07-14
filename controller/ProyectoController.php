<?php
require_once './config/DB.php';
require_once './model/Proyecto.php';

class ProyectoController {

    public function cargarProyectos() {
    $db = new DB();
    $pdo = $db->connect();

    $sql = "SELECT * FROM proyecto";
    $stmt = $pdo->query($sql);
    $proyectos = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $proyecto = new Proyecto();
        $proyecto->setIdproyecto($row['idproyecto']);
        $proyecto->setNombre($row['nombre']);
        $proyecto->setDescripcion($row['descripcion']);
        $proyecto->setFechainicio($row['fechainicio']);
        $proyecto->setFechafin($row['fechafin']);
        $proyectos[] = $proyecto;
    }
    return $proyectos;
}

    public function cargar() {
    $db = new DB();
    $pdo = $db->connect();

    $sql = "SELECT * FROM proyecto";
    $stmt = $pdo->query($sql);
    $proyectos = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $proyecto = new Proyecto();
        $proyecto->setIdproyecto($row['idproyecto']);
        $proyecto->setNombre($row['nombre']);
        $proyecto->setDescripcion($row['descripcion']);

        $fechainicio = new DateTime($row['fechainicio']); 
        $proyecto->setFechaInicio($fechainicio->format('Y-m-d'));

        $fechafin = new DateTime($row['fechafin']); 
        $proyecto->setFechaFin($fechafin->format('Y-m-d'));

        $proyectos[] = $proyecto;
    }

    require './view/cargarproyecto.php';
}


    public function guardar() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $db = new DB();
        $pdo = $db->connect();

        $sql = "INSERT INTO proyecto (nombre, descripcion, fechafin)
                VALUES (:nombre, :descripcion, :fechafin)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'nombre' => $_POST['nombre'],
            'descripcion' => $_POST['descripcion'],
            'fechafin' => $_POST['fechafin']
        ]);

        header('Location: index.php?accion=cargarproyecto');
        exit();
    } else {
        require './view/guardarproyecto.php';
    }
}

public function editar() {
    require_once './config/DB.php';
    $db = new DB();
    $pdo = $db->connect();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $idproyecto = $_POST['idproyecto'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $fechafin = $_POST['fechafin'];

        $sql = "UPDATE proyecto SET nombre = :nombre, descripcion = :descripcion, fechafin = :fechafin WHERE idproyecto = :idproyecto";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute([
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'fechafin' => $fechafin,
            'idproyecto' => $idproyecto
        ]);

        if ($result) {
            header('Location: index.php?accion=cargarproyecto');
            exit();
        } else {
            echo "Error al actualizar el proyecto.";
        }

    } else {
        $idproyecto = $_GET['idproyecto'];
        $sql = "SELECT * FROM proyecto WHERE idproyecto = :idproyecto";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['idproyecto' => $idproyecto]);
        $proyecto = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($proyecto) {
            require './view/editarproyecto.php';
        } else {
            echo "Proyecto no encontrado.";
        }
    }
}

    public function borrar() {
    if (isset($_GET['idproyecto'])) {
        $db = new DB();
        $pdo = $db->connect();

        $sql = "DELETE FROM proyecto WHERE idproyecto = :idproyecto";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['idproyecto' => $_GET['idproyecto']]);

        header('Location: index.php?accion=cargarproyecto');
        exit();
    }
  }
}
?>
