<?php
require_once './model/Cliente.php';
require_once './config/DB.php';

class ClienteController {

    private $pdo;

    public function __construct() {
        $db = new DB();
        $this->pdo = $db->connect();
    }

    public function cargarClientes() {
    $db = new DB();
    $pdo = $db->connect();

    $sql = "SELECT * FROM cliente";
    $stmt = $pdo->query($sql);
    $clientes = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $cli = new Cliente();
        $cli->setIdcliente($row['idcliente']);
        $cli->setNombre($row['nombre']);
        $cli->setCorreo($row['correo']);
        $cli->setTelefono($row['telefono']);
        $clientes[] = $cli;
    }
    return $clientes;
}

    public function cargar() {
        $clientes = $this->cargarClientes();
        require './view/cargarcliente.php';
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $sql = "INSERT INTO cliente (nombre, correo, telefono) VALUES (:nombre, :correo, :telefono)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                'nombre' => $_POST['nombre'],
                'correo' => $_POST['correo'],
                'telefono' => $_POST['telefono']
            ]);
            header('Location: index.php?accion=cargarcliente');
            exit();
        } else {
            require './view/guardarcliente.php';
        }
    }

    public function editar() {
    require_once './config/DB.php';
    $db = new DB();
    $pdo = $db->connect();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $idcliente = $_POST['idcliente'];
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];

        $sql = "UPDATE cliente SET nombre = :nombre, correo = :correo, telefono = :telefono WHERE idcliente = :idcliente";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'nombre' => $nombre,
            'correo' => $correo,
            'telefono' => $telefono,
            'idcliente' => $idcliente
        ]);

        header('Location: index.php?accion=cargarcliente');
        exit();
    } else {
        $idcliente = $_GET['idcliente'];

        $sql = "SELECT * FROM cliente WHERE idcliente = :idcliente";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['idcliente' => $idcliente]);
        $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

        require './view/editarcliente.php';
    }
}

    public function borrar() {
        if (isset($_GET['idcliente'])) {
            $sql = "DELETE FROM cliente WHERE idcliente = :idcliente";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['idcliente' => $_GET['idcliente']]);
            header('Location: index.php?accion=cargarcliente');
            exit();
        }
    }
}
?>
