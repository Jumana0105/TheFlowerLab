-- CREACION TABLA USUARIOS
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    email VARCHAR(150) NOT NULL UNIQUE,
    telefono VARCHAR(20),
    password VARCHAR(255) NOT NULL
);

--AGREGAR TIPO DE USUARIO A TABLA USUARIOS
ALTER TABLE USUARIOS ADD tipo_usuario VARCHAR(20) DEFAULT 'cliente';

-- MODIFICAR USUARIO CON ACCESO ADMIN
UPDATE usuarios
SET tipo_usuario = 'admin'
WHERE email = 'fflores@flowerlab.com';

--CREACION TABLA CATEGORIA
CREATE TABLE categoria (
    id_categoria INT AUTO_INCREMENT PRIMARY KEY,
    nombre_categoria VARCHAR(100) NOT NULL
);

--INSERTAR CATEGORIAS

INSERT INTO categoria (nombre_categoria) VALUES
('Plantas Medicinales'),
('Ramos de Flores'),
('Plantas de Interior');

--CREACION TABLA PRODUCTO
CREATE TABLE producto (
    id_producto INT AUTO_INCREMENT PRIMARY KEY,
    nombre_producto VARCHAR(100) NOT NULL,
    descripcion TEXT NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    disponibilidad BOOLEAN DEFAULT 1,
    id_categoria INT,
    imagen VARCHAR(255),
    FOREIGN KEY (id_categoria) REFERENCES categoria(id_categoria)
);

-- Crear tabla inventario
CREATE TABLE inventario (
    id_inventario INT AUTO_INCREMENT PRIMARY KEY,
    id_producto INT NOT NULL,
    cantidad_disponible INT DEFAULT 0,
    fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_producto) REFERENCES producto(id_producto)
);

-- Crear tabla orden
CREATE TABLE orden (
    id_orden INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(150) NOT NULL,
    total DECIMAL(10,2),
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Crear tabla orden detallada
CREATE TABLE detalle_orden (
    id_detalle INT AUTO_INCREMENT PRIMARY KEY,
    id_orden INT,
    id_producto INT,
    cantidad INT,
    precio_unitario DECIMAL(10,2),
    FOREIGN KEY (id_orden) REFERENCES orden(id_orden),
    FOREIGN KEY (id_producto) REFERENCES producto(id_producto)
);

