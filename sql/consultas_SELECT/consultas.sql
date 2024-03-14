--• Consulta básica
--Devuelve todos los registros de una tabla específica.
SELECT
    *
FROM
    Usuarios;

--Devuelve el nombre y apellido de la tabla Usuarios
SELECT
    nombre,
    apellido
FROM
    Usuarios;


--• Filtrado de resultados: Utiliza la cláusula WHERE para filtrar los resultados de la consulta según ciertos criterios, como una condición de igualdad, desigualdad o comparación.
--Por igualdad
SELECT
    *
FROM
    Usuarios
WHERE
    saldo = 200.00; --Selecciona todos los datos de los usuarios cuyo saldo es específicamente 200.00

--Por desigualdad
SELECT
    *
FROM
    Usuarios
WHERE
    saldo <> 200.00; --Selecciona todos los datos de los usuarios cuyo saldo no sea 200.00

--Condiciones combinadas (BETWEEN AND/ AND)
SELECT
    *
FROM
    Usuarios
WHERE
    fecha_nacimiento BETWEEN '1990-01-01'
    AND '1999-12-31'
    AND saldo > 100.00; --Selecciona todos los datos de los usuarios nacidos entre el 90 y 99 y que tienen mas de 100.00 de saldo

--Uso de OR
SELECT
    *
FROM
    Usuarios
WHERE
    saldo = 200.00
    OR saldo = 150.75; --Selecciona todos los datos de los usuarios cuyo saldo es 200.00 o 150.75

--Excluir un rango con NOT
SELECT
    *
FROM
    Usuarios
WHERE
    NOT (
        saldo BETWEEN 100.00
        AND 200.00
    ); --Selecciona todos los datos de los usuarios cuayo saldo no está entre 100.00 y 200.00


--• Ordenación de resultados: Utiliza la cláusula ORDER BY para ordenar los resultados de la consulta según uno o más campos, ya sea de forma ascendente o descendente.
--Ordenar por un campo
SELECT
    *
FROM
    Usuarios
ORDER BY
    apellido ASC; --Selecciona todos los datos de los usuarios ordenados por su apellido de la A a la Z

--Ordenar por un campo en orden descendente
SELECT
    *
FROM
    Usuarios
ORDER BY
    apellido DESC; --Selecciona todos los datos de los usuarios ordenados por su apellido de la Z a la A

--Ordenar por múltiples campos
SELECT
    *
FROM
    Usuarios
ORDER BY
    apellido ASC,
    nombre ASC; --Si hay múltiples usuarios con el mismo apellido, sus nombres se ordenarán de la A a la Z

--Combinar orden ascendente y descendente
SELECT
    *
FROM
    Usuarios
ORDER BY
    saldo DESC,
    nombre ASC; --Ordena por el saldo de mayor a menor, si los hay con mismo saldo, se ordena por el nombre de la A a la Z


--• Agrupación de resultados: Utiliza la cláusula GROUP BY junto con funciones de agregación como COUNT(), SUM(), AVG(), etc., para realizar cálculos sobre grupos de datos.
--Contar registros por grupo
SELECT
    fecha_nacimiento,
    COUNT(*) AS numero_de_usuarios
FROM
    Usuarios
GROUP BY
    fecha_nacimiento; --Agrupa a los usuarios por su fecha de nacimiento y contará cuántos usuarios hay en cada grupo de fecha de nacimiento

--Sumar valores de un grupo
SELECT
    apellido,
    SUM(saldo) AS saldo_total
FROM
    Usuarios
GROUP BY
    apellido; --Muestra el saldo total para cada apellido presente en la tabla Usuarios

--Calcular el promedio de un grupo
SELECT
    AVG(saldo) AS saldo_promedio
FROM
    Usuarios; --Saldo promedio entre todos los usuarios.

--Saldo promedio pero agrupado por años de nacimiento
SELECT
    YEAR(fecha_nacimiento) AS año_nacimiento,
    AVG(saldo) AS saldo_promedio
FROM
    Usuarios
GROUP BY
    YEAR(fecha_nacimiento); --Agrupa los usuarios por el año de nacimiento y calcula el saldo promedio en cada grupo de año.

--Combinar GROUP BY con ORDER BY
SELECT
    apellido,
    COUNT(*) AS numero_de_usuarios
FROM
    Usuarios
GROUP BY
    apellido
ORDER BY
    numero_de_usuarios DESC; --Cuenta el número de usuarios por apellido y luego ordena los resultados en orden descendente según el número de usuarios, mostrando los apellidos más comunes primero.