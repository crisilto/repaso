--• Crear una tabla: Escribe una consulta SQL para crear una tabla simple con varios campos, incluyendo diferentes tipos de datos como texto, 
--  número entero, fecha, etc.
CREATE TABLE Usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(50),
  apellido VARCHAR(50),
  email VARCHAR(100) UNIQUE,
  fecha_nacimiento DATE,
  saldo DECIMAL(10, 2) -- 10 dígitos en total, 2 de ellos son decimales
);

--• Insertar datos: Inserta algunos datos de muestra en la tabla que creaste utilizando la instrucción INSERT INTO.
INSERT INTO Usuarios (nombre, apellido, email, fecha_nacimiento, saldo) VALUES 
('Laura', 'García', 'laura.garcia@example.com', '1995-08-15', 100.50),
('Carlos', 'Martínez', 'carlos.martinez@example.com', '1992-04-22', 150.75),
('Ana', 'López', 'ana.lopez@example.com', '1998-11-30', 200.00);


--• Actualizar datos: Actualiza algunos registros en la tabla utilizando la instrucción UPDATE.
UPDATE Usuarios
SET saldo = 250.75, email = 'nuevo.email@example.com'
WHERE nombre = 'Laura' AND apellido = 'García';

--• Eliminar datos: Elimina registros específicos de la tabla utilizando la instrucción DELETE FROM.
DELETE FROM Usuarios
WHERE nombre = 'Carlos' AND apellido = 'Martínez';