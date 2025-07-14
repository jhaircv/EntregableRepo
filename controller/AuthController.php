<?php
require_once __DIR__.'/../config/DB.php';

class AuthController {
    private $pdo;

    public function __construct() {
        $db = new DB();
        $this->pdo = $db->connect();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM usuario WHERE username = :username";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['username' => $username]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                // Login correcto
                $_SESSION['user'] = $user['username'];
                header('Location: index.php?accion=dashboard');
                exit;
            } else {
                echo "Credenciales incorrectas";
            }
        }
    }

    public function mostrarRegistro() {
    require __DIR__ . '/../view/registro.php';
    }

public function register() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $sql_check = "SELECT * FROM usuario WHERE username = :username";
        $stmt_check = $this->pdo->prepare($sql_check);
        $stmt_check->execute(['username' => $username]);
        $UsuarioExistente = $stmt_check->fetch(PDO::FETCH_ASSOC);

        if ($UsuarioExistente) {
            $_SESSION['mensaje'] = "❌ Error: El usuario ya existe.";
            header('Location: index.php');
            exit();
        }

        $sql = "INSERT INTO usuario (username, password) VALUES (:username, :password)";
        $stmt = $this->pdo->prepare($sql);

        try {
            $stmt->execute(['username' => $username, 'password' => $password]);
            $_SESSION['mensaje'] = "✅ Usuario registrado correctamente";
            header('Location: index.php');
            exit();
        } catch (PDOException $e) {
            $_SESSION['mensaje'] = "❌ Error al registrar usuario: " . $e->getMessage();
            header('Location: index.php');
            exit();
        }
    } else {
        $_SESSION['mensaje'] = "⚠️ No es POST";
        header('Location: index.php');
        exit();
    }
}

    public function logout() {
        session_destroy();
        header('Location: index.php');
        exit;
    }
}
?>
