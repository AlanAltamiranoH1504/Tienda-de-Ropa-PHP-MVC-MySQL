-- Usamos la base de datos Tienda
USE Tienda;

-- Creamos la tabla Usuarios
CREATE TABLE Usuarios(
    id        INT         NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    nombre    VARCHAR(45) NOT NULL,
    apellidos VARCHAR(45) NOT NULL,
    email     VARCHAR(45) NOT NULL UNIQUE ,
    password  VARCHAR(45) NOT NULL,
    rol       VARCHAR(45) NOT NULL,
    imagen    boolean     NOT NULL
);

-- Creamos la tabla Categorias
CREATE TABLE Categorias(
    id     INT         NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    nombre VARCHAR(45) NOT NULL
);

-- Creamos la tabla Pedidos
CREATE TABLE Pedidos(
    id         INT         NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    usuario_id INT         NOT NULL,
    provincia  VARCHAR(45) NOT NULL,
    localidad  VARCHAR(45) NOT NULL,
    direccion  VARCHAR(45) NOT NULL,
    coste      DOUBLE      NOT NULL,
    estado     VARCHAR(45) NOT NULL ,
    fecha      DATE        NOT NULL,
    hora       DATETIME    NOT NULL ,

    -- Configuramos FK
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON UPDATE CASCADE ON DELETE CASCADE
);

-- Creamos la tabla Productos
CREATE TABLE Productos(
    id           INT         NOT NULL AUTO_INCREMENT PRIMARY KEY,
    categoria_id INT         NOT NULL ,
    nombre       VARCHAR(45) NOT NULL ,
    descripcion  VARCHAR(60) NOT NULL ,
    precio       DOUBLE      NOT NULL ,
    stock        INT         NOT NULL ,
    oferta       VARCHAR(45) NULL,
    fecha        DATE        NOT NULL ,
    imagen       BOOLEAN     NULL ,

    -- Configuracion FK
    FOREIGN KEY (categoria_id) REFERENCES categorias(id) ON UPDATE CASCADE ON DELETE CASCADE
);

-- Creamos tabla Lineas_Pedido
CREATE TABLE Lineas_Pedido(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    pedido_id INT NOT NULL,
    producto_id INT NOT NULL ,
    unidades INT,

    -- Configuramos las FK
    FOREIGN KEY (pedido_id) REFERENCES pedidos(id) ON UPDATE CASCADE ON DELETE CASCADE ,
    FOREIGN KEY (producto_id) REFERENCES productos(id) ON UPDATE CASCADE ON DELETE CASCADE
);

-- Insertamos un usuario
INSERT INTO usuarios(nombre, apellidos, email, password, rol, imagen)
VALUES ("Admin", "Admin", "admin@gmail.com", "contraseña", "administrador", true);

-- Insertamos en categorias
INSERT INTO categorias(nombre)
VALUES ("Manga Corta"),
       ("Tirantes"),
       ("Manga larga"),
       ("Sudaderas");

-- Consultamos la tabla Usuarios
SELECT * FROM usuarios;
SELECT * FROM categorias;

SELECT * FROM Productos INNER JOIN Categorias ON Productos.categoria_id = Categorias.id WHERE Categorias.id = 15;