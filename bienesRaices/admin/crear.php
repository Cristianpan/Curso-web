<?php
    require '../includes/config/database.php';
    require '../includes/funciones.php';
    incluirTemplate('header', false, true);
    $db = getDbConnection(); 

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       printObjetc($_POST); 

       $titulo = $_POST['titulo']; 
    }
?>

<main class="container section centered-content">
    <h1>Crear</h1>
    <a href="index.php" class="button-green">Volver</a>

    <form class="form" method="post" action="crear.php">
        <fieldset>
            <legend>Información General</legend>

            <label for="titulo">Titulo</label>
            <input type="text" id="titulo" name="titulo" placeholder="Propiedad">

            <label for="precio">Precio</label>
            <input type="number" id="precio" name="precio" placeholder="Precio propiedad">

            <label for="imagen">Imagen</label>
            <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png">

            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion"></textarea>
        </fieldset>

        <fieldset>
            <legend>Información Propiedad</legend>

            <label for="habitaciones">Habitaciones:</label>
            <input type="number" id="habitaciones" name="habitaciones" min="1" max="9" placeholder="3">

            <label for="wc">Baños:</label>
            <input type="number" id="wc" min="1" max="9" name="wc" placeholder="3">

            <label for="estacionamiento">Estacionamiento:</label>
            <input type="number" id="estacionamiento" name="estacionamiento" min="1" max="9" placeholder="3">
        </fieldset>

        <fieldset>
            <legend for="vendedor">Vendedor</legend>
            <select id="vendedor" name="vendedor">
                <option value="" default disabled>Seleccionar</option>
                <option value="1">Cristian</option>
                <option value="2">Diana</option>
            </select>

        </fieldset>

        <div class="submit">
            <input type="submit" class="button-green" value="Enviar" />
        </div>
    </form>


</main>

<?php
incluirTemplate('footer', false, true);
?>