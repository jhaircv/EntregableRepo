CREATE DATABASE IF NOT EXISTS tecnosoluciones;
USE tecnosoluciones;

CREATE TABLE usuario (
    idusuario INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

INSERT INTO usuario (username, password) VALUES ('admin', '$2y$10$cahy1oJg7gOrZrVS3EcjE.8L6ZaDP9njp4U8MlnJ8MTICypPTDp1G');

select * from usuario;

CREATE TABLE cliente (
    idcliente INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL,
    telefono VARCHAR(20) NOT NULL
);

INSERT INTO cliente (nombre, correo, telefono) VALUES
('Juan Perez', 'juan@example.com', '999888777'),
('Ana Torres', 'ana@example.com', '988777666');

CREATE TABLE IF NOT EXISTS proyecto (
    idproyecto INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT NOT NULL,
    fechainicio TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fechafin DATE
);

INSERT INTO proyecto (nombre, descripcion, fechafin) VALUES
('Sistema Web Inventario', 'Desarrollo de un sistema web para inventarios.', '2025-08-30'),
('App Movil Clientes', 'Aplicación móvil para registro de clientes.', '2025-09-15');
