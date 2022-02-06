-- 1. Crear un usuario
CREATE USER 'sqluser'@'localhost' IDENTIFIED BY 'password123';

-- 2. Asignar permisos al usuario
GRANT ALL PRIVILEGES ON * . * TO 'sqluser'@'localhost';

-- 3. Cargar los permisos
FLUSH PRIVILEGES;

-- 4. Crear la Base de Datos sistema
CREATE DATABASE IF NOT EXISTS sistema;

-- 5. Crear la tabla datos
CREATE TABLE IF NOT EXISTS datos 
( 
    id int(10) not null,
    nombre varchar (25),
    password varchar(25),
    direccion varchar(25),
    telefono varchar(15),
    PRIMARY KEY (id) 
) Engine=InnoDB default charset=latin1; 
