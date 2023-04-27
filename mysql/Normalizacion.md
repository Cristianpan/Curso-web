# Aplicando normalización de Db

- Tablas actuales
    ```MySQL
        SELECT * FROM reservaciones; 

        +----+-----------+-------------+----------+------------+-----------------------------------------+
        | id | nombre    | apellido    | hora     | fecha      | servicios                               |
        +----+-----------+-------------+----------+------------+-----------------------------------------+
        |  1 | Juan      | De la torre | 10:30:00 | 2021-06-28 | Corte de Cabello Adulto, Corte de Barba |
        |  2 | Antonio   | Hernandez   | 14:00:00 | 2021-07-30 | Corte de Cabello Niño                   |
        |  3 | Pedro     | Juarez      | 20:00:00 | 2021-06-25 | Corte de Cabello Adulto                 |
        |  4 | Mireya    | Perez       | 19:00:00 | 2021-06-25 | Peinado Mujer                           |
        |  5 | Jose      | Castillo    | 14:00:00 | 2021-07-30 | Peinado Hombre                          |
        |  6 | Maria     | Diaz        | 14:30:00 | 2021-06-25 | Tinte                                   |
        |  7 | Clara     | Duran       | 10:00:00 | 2021-07-01 | Uñas, Tinte, Corte de Cabello Mujer     |
        |  8 | Miriam    | Ibañez      | 09:00:00 | 2021-07-01 | Tinte                                   |
        |  9 | Samuel    | Reyes       | 10:00:00 | 2021-07-02 | Tratamiento Capilar                     |
        | 10 | Joaquin   | Muñoz       | 19:00:00 | 2021-06-28 | Tratamiento Capilar                     |
        | 11 | Julia     | Lopez       | 08:00:00 | 2021-06-25 | Tinte                                   |
        | 12 | Carmen    | Ruiz        | 20:00:00 | 2021-07-01 | Uñas                                    |
        | 13 | Isaac     | Sala        | 09:00:00 | 2021-07-30 | Corte de Cabello Adulto                 |
        | 14 | Ana       | Preciado    | 14:30:00 | 2021-06-28 | Corte de Cabello Mujer                  |
        | 15 | Sergio    | Iglesias    | 10:00:00 | 2021-07-02 | Corte de Cabello Adulto                 |
        | 16 | Aina      | Acosta      | 14:00:00 | 2021-07-30 | Uñas                                    |
        | 17 | Carlos    | Ortiz       | 20:00:00 | 2021-06-25 | Corte de Cabello Niño                   |
        | 18 | Roberto   | Serrano     | 10:00:00 | 2021-07-30 | Corte de Cabello Niño                   |
        | 19 | Carlota   | Perez       | 14:00:00 | 2021-07-01 | Uñas                                    |
        | 20 | Ana Maria | Igleias     | 14:00:00 | 2021-07-02 | Uñas, Tinte                             |
        | 21 | Jaime     | Jimenez     | 14:00:00 | 2021-07-01 | Corte de Cabello Niño                   |
        | 22 | Roberto   | Torres      | 10:00:00 | 2021-07-02 | Corte de Cabello Adulto                 |
        | 23 | Juan      | Cano        | 09:00:00 | 2021-07-02 | Corte de Cabello Niño                   |
        | 24 | Santiago  | Hernandez   | 19:00:00 | 2021-06-28 | Corte de Cabello Niño                   |
        | 25 | Berta     | Gomez       | 09:00:00 | 2021-07-01 | Uñas                                    |
        | 26 | Miriam    | Dominguez   | 19:00:00 | 2021-06-28 | Corte de Cabello Niño                   |
        | 27 | Antonio   | Castro      | 14:30:00 | 2021-07-02 | Corte de Cabello Adulti                 |
        | 28 | Hugo      | Alonso      | 09:00:00 | 2021-06-28 | Corte de Barba                          |
        | 29 | Victoria  | Perez       | 10:00:00 | 2021-07-02 | Uñas, Tinte                             |
        | 30 | Jimena    | Leon        | 10:30:00 | 2021-07-30 | Uñas, Corte de Cabello Mujer            |
        | 31 | Raquel    | Peña        | 20:30:00 | 2021-06-25 | Corte de Cabello Mujer                  |
        +----+-----------+-------------+----------+------------+-----------------------------------------+

         SELECT * FROM servicios;
        +----+-------------------------+--------+
        | id | nombre                  | precio |
        +----+-------------------------+--------+
        |  1 | Corte de Cabello Niño   |  60.00 |
        |  2 | Corte de Cabello Hombre |  80.00 |
        |  3 | Corte de Barba          |  60.00 |
        |  4 | Peinado Mujer           |  80.00 |
        |  5 | Peinado Hombre          |  60.00 |
        |  6 | Tinte                   | 300.00 |
        |  7 | Uñas                    | 400.00 |
        |  8 | Lavado de Cabello       |  50.00 |
        |  9 | Tratamiento Capilar     | 150.00 |
        +----+-------------------------+--------+
    ```
- Crear nuevas tablas: 
    - Tabla clientes: 
        ```MySQL
            CREATE TABLE clientes (
                id INT(11) NOT NULL AUTO_INCREMENT,
                nombre VARCHAR(60) NOT NULL,
                apellido VARCHAR(60) NOT NULL,
                telefono VARCHAR(10) NOT NULL,
                email VARCHAR(30) NOT NULL UNIQUE,
                PRIMARY KEY (id)
            );
            SELECT * FROM clientes;
                +----+----------+-----------------+------------+-------------------------------+
                | id | nombre   | apellido        | telefono   | email                         |
                +----+----------+-----------------+------------+-------------------------------+
                |  1 | Cristian | Pan Zaldivar    | 9993981242 | panzaldivarcristian@gmail.com |
                |  2 | Mauricio | Carrillo Romero | 9993981242 | correo@correo                 |
                +----+----------+-----------------+------------+-------------------------------+
        ```


    - Tabla de citas con foreign key 
        ```MySQL
            CREATE TABLE citas (
                id INT(11) NOT NULL AUTO_INCREMENT,
                fecha DATE NOT NULL,
                hora TIME NOT NULL,
                clienteId INT(11) NOT NULL,
                PRIMARY KEY (id),
                KEY clienteId (clienteId),
                CONSTRAINT cliente_FK
                FOREIGN KEY (clienteId)
                REFERENCES clientes (id)
            );
            
            SELECT * FROM citas;
                +----+------------+----------+-----------+
                | id | fecha      | hora     | clienteId |
                +----+------------+----------+-----------+
                |  1 | 2023-06-28 | 10:30:00 |         1 |
                +----+------------+----------+-----------+
        ```
    - Tabla de citasServicios con dos foreign keys (tabla pivote)
        ```MySQL 
            CREATE TABLE citasServicios (
                id INT(11) AUTO_INCREMENT,
                citaId INT(11) NOT NULL,
                servicioId INT(11) NOT NULL,
                PRIMARY KEY (id),
                KEY citaId (citaId),
                CONSTRAINT citas_FK
                FOREIGN KEY (citaId)
                REFERENCES citas (id),
                KEY servicioId (servicioId),
                CONSTRAINT servicios_FK
                FOREIGN KEY (servicioId)
                REFERENCES servicios (id)
            );

            SELECT * FROM citasServicios;
                +----+--------+------------+
                | id | citaId | servicioId |
                +----+--------+------------+
                |  1 |      1 |          2 |
                +----+--------+------------+
        ```

- JOINS
    - INNER: Equivale a un A intersección B.
        ```MySQL
            SELECT * FROM citas INNER JOIN clientes ON clientes.id = citas.clienteId;
            +----+------------+----------+-----------+----+----------+--------------+------------+-------------------------------+
            | id | fecha      | hora     | clienteId | id | nombre   | apellido     | telefono   | email                         |
            +----+------------+----------+-----------+----+----------+--------------+------------+-------------------------------+
            |  1 | 2023-06-28 | 10:30:00 |         1 |  1 | Cristian | Pan Zaldivar | 9993981242 | panzaldivarcristian@gmail.com |
            +----+------------+----------+-----------+----+----------+--------------+------------+-------------------------------+
        ``` 
    - LEFT: Equivale a un A
        ```MySQL
            SELECT * FROM citas LEFT JOIN clientes ON clientes.id = citas.clienteId;
            +----+------------+----------+-----------+----+----------+--------------+------------+-------------------------------+
            | id | fecha      | hora     | clienteId | id | nombre   | apellido     | telefono   | email                         |
            +----+------------+----------+-----------+----+----------+--------------+------------+-------------------------------+
            |  1 | 2023-06-28 | 10:30:00 |         1 |  1 | Cristian | Pan Zaldivar | 9993981242 | panzaldivarcristian@gmail.com |
            +----+------------+----------+-----------+----+----------+--------------+------------+-------------------------------+
        ``` 
    - RIGHT: Equivale a B
        ```MySQL
            SELECT * FROM citas RIGHT JOIN clientes ON clientes.id = citas.clienteId;
            +------+------------+----------+-----------+----+----------+-----------------+------------+-------------------------------+
            | id   | fecha      | hora     | clienteId | id | nombre   | apellido        | telefono   | email                         |
            +------+------------+----------+-----------+----+----------+-----------------+------------+-------------------------------+
            |    1 | 2023-06-28 | 10:30:00 |         1 |  1 | Cristian | Pan Zaldivar    | 9993981242 | panzaldivarcristian@gmail.com |
            | NULL | NULL       | NULL     |      NULL |  2 | Mauricio | Carrillo Romero | 9993981242 | correo@correo                 |
            +------+------------+----------+-----------+----+----------+-----------------+------------+-------------------------------+
        ```
- Multiples JOINS 
    ```MySQL
        SELECT * FROM citasServicios
        INNER JOIN citas ON citas.id = citasServicios.citaId
        INNER JOIN servicios on servicios.id = citasServicios.servicioId;
        +----+--------+------------+----+------------+----------+-----------+----+-------------------------+--------+
        | id | citaId | servicioId | id | fecha      | hora     | clienteId | id | nombre                  | precio |
        +----+--------+------------+----+------------+----------+-----------+----+-------------------------+--------+
        |  1 |      1 |          2 |  1 | 2023-06-28 | 10:30:00 |         1 |  2 | Corte de Cabello Hombre |  80.00 |
        |  2 |      1 |          3 |  1 | 2023-06-28 | 10:30:00 |         1 |  3 | Corte de Barba          |  60.00 |
        +----+--------+------------+----+------------+----------+-----------+----+-------------------------+--------+
    ```
