# Comandos de SQL

- **Mostrar DB**: SHOW DATABASES;
- **Crear una DB**: CREATE DATABASE nombreDb;
- **Usar una DB**: USE nombreDb;
- **Mostrar tablas de una DB**: SHOW TABLES;
- **Crear tablas**:
  ```MySQL
      CREATE TABLE name (
          id INT(11) NOT NULL AUTO_INCREMENT,
          nameColumn DataType extras,
          PRIMARY KEY (id)
      );
  ```
- **Conocer estructura de una tabla**: DESCRIBE nameTable;
- **Agregar columnas a tabla existente**: ALTER TABLE nameTable ADD nameColum DataType extras;
- **Eliminar columnas de una tabla existente**: ALTER TABLE nameTable DROP nameColum;
- **Eliminar tabla**: DROP TABLE nameTable;
- **Funciones agregadoras**:
  - COUNT(value);
  - SUM(value);
  - MIN(value);
  - MAX(value);
- **Realizar busquedas**:
  - LIKE '%value': Retorna resultados que tengan el valor dado al final
  - LIKE 'value%': Retorna resultados que tengan el valor dado al inicio
  - LIKE '%value%': Retorna resultados que tengan el valor dado en algún lugar;
- **Concatenar columnas**: SELECT CONCAT(columnName, ' ', columnaName) AS alias FROM nameTable ;

## Operaciones CRUD

- **Insertar datos**: INSERT INTO nameTable (nameColumn1, nameColumn2) VALUES (value1, value2);
- **Leer datos de una tabla**: SELECT \* FROM nameTable;
- **Obtener campos especificos de una tabla**: SELECT column1, column2, column3 FROM nameTable;
- **Obtener un dato en dado un valor especifico**: SELECT \* FROM table WHERE columnName = value;
- **Actualizar un elemento**: UPDATE nameTable SET columnToUpdate = newValue WHERE columnName = value;

## Practica

- Crear tabla servicios

```MySQL
    CREATE TABLE servicios (
        id INT(11) NOT NULL AUTO_INCREMENT,
        nombre VARCHAR(60) NOT NULL,
        precio DECIMAL(6,2) NOT NULL,
        PRIMARY KEY (id)
    );
```

- Insertar elementos

  ```MySQL
      INSERT INTO servicios (nombre, precio) VALUES ("Corte de cabello de adulto", 80);

      INSERT INTO servicios (nombre, precio) VALUES ("Peinado de mujer, 80), ('Corte de Barba', 100);
  ```

- Leer Elementos

  ```MySQL
      SELECT * FROM servicios;

      SELECT nombre, precio FROM servicios;

      SELECT * FROM servicios ORDER BY precio ASC;

      SELECT * FROM servicios ORDER BY precio DESC;

      SELECT * FROM servicios LIMIT 3;

      SELECT * FROM servicios WHERE id = 1;
  ```

- Actualizar elementos

  ```MySQL
      UPDATE servicios SET precio = 70 WHERE id = 4;

      UPDATE servicios SET nombre = "Teñido de Cabello", precio = 150 WHERE id = 2;
  ```

- Eliminar elementos

  ```MySQL
      DELETE FROM servicios WHERE id = 1;

      DELETE FROM servicios WHERE id = 4;
  ```

- Agregar columna a tabla existente
  ```MySQL
      ALTER TABLE servcios ADD descripcion VARCHAR(100) NOT NULL;
  ```
- Eliminar columna de tabla existene
  ```MySQL
      ALTER TABLE servcios DROP descripcion;
  ```
- Eliminar tabla servicios

  ```MySQL
      DROP TABLE servicios;
  ```

- Crear tabla reservaciones
  ```MySQL
      CREATE TABLE reservaciones (
          id INT NOT NULL AUTO_INCREMENT,
          nombre VARCHAR(60) NOT NULL,
          apellido VARCHAR(60) NOT NULL,
          hora TIME DEFAULT NULL,
          fecha DATE DEFAULT NULL,
          servicios VARCHAR(255) NOT NULL,
          PRIMARY KEY (id)
  -   );
  ```
- Concatenación y busqueda

  ```MySQL
        SELECT * FROM reservaciones WHERE CONCAT(nombre, ' ', apellido) LIKE '%Ana Preciado%';

       SELECT hora, fecha, CONCAT(nombre, ' ', apellido) as 'Nombre Completo'
       FROM reservaciones
       WHERE CONCAT(nombre, ' ', apellido)
       LIKE '%Ana Preciado%';
  ```
