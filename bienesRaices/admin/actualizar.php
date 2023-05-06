<?php
require '../includes/funciones.php';
require '../includes/config/database.php'; 
 require '../includes/backend/index.php';
require '../includes/validators/index.php';
require '../includes/utils/utileria.php';
incluirTemplate('header', false, true);

$id = $_GET['id']; 
$id = filter_var($id, FILTER_VALIDATE_INT); 

if(!$id) {
    header("Location: index.php"); 
}

$vendedores = obtenerVendedores(); 
$datosPropiedad = obtenerPropiedadPorId($id);

if (empty($datosPropiedad)) {
    header('Location: index.php');
  }
$imagenAnterior = $datosPropiedad['imagen'];  
$errores = []; 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $datosPropiedad['titulo'] = $_POST['titulo'];
    $datosPropiedad['precio'] = $_POST['precio'];
    $datosPropiedad['descripcion'] = $_POST['descripcion'];
    $datosPropiedad['habitaciones'] = $_POST['habitaciones'];
    $datosPropiedad['wc'] = $_POST['wc'];
    $datosPropiedad['estacionamiento'] = $_POST['estacionamiento'];
    $datosPropiedad['vendedorId'] = $_POST['vendedor'];
    $datosPropiedad['imagen'] = $_FILES['imagen']; 

    $errores = validarDatos($datosPropiedad);    
    
    if($datosPropiedad['imagen']['name']) {
        echo "Hola"; 
        eliminarArchivo($imagenAnterior); 
    }
    printObjetc($imagenAnterior); 
    
    if (empty($errores)) {
        //insertar en la base de datos  
        actualizarPropiedad($datosPropiedad, $imagenAnterior);
        //redireccionar al usuario
        header('Location: index.php?resultado=2'); 
    }
}


?>

<main class="container section centered-content">
<h1>Actualizar Propiedad</h1>
    <a href="index.php" class="button-green">Volver</a>

    <form class="form" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Información General</legend>

            <label for="titulo">Titulo</label>
            <?php echo isset($errores['titulo']) ? "<p class='error'>".$errores['titulo']."</p>" : '';?>
            <input type="text" id="titulo" name="titulo" placeholder="Propiedad" value="<?php echo $datosPropiedad['titulo'];?>">
            
            <label for="precio">Precio</label>
            <?php echo isset($errores['precio']) ? "<p class='error'>".$errores['precio']."</p>" : '';?>
            <input type="number" id="precio" name="precio" placeholder="Precio propiedad" value="<?php echo $datosPropiedad['precio'];?>">
            
            <label for="imagen">Imagen</label>
            <?php echo isset($errores['imagen']) ? "<p class='error'>".$errores['imagen']."</p>" : '';?>
            <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png" name="imagen">

            <img src="<?php echo "../imagenes/" . $datosPropiedad['imagen']?>" alt="imagen propiedad" class="imagen-propiedad">
            
            <label for="descripcion">Descripción</label>
            <?php echo isset($errores['descripcion']) ? "<p class='error'>".$errores['descripcion']."</p>" : '';?>
            <textarea id="descripcion" name="descripcion"><?php echo $datosPropiedad['descripcion'];?></textarea>
        </fieldset>
        
        <fieldset>
            <legend>Información Propiedad</legend>
            
            <label for="habitaciones">Habitaciones:</label>
            <?php echo isset($errores['habitaciones']) ? "<p class='error'>".$errores['habitaciones']."</p>" : '';?>
            <input type="number" id="habitaciones" name="habitaciones" min="1" max="9" placeholder="3" value="<?php echo $datosPropiedad['habitaciones'];?>">
            
            <label for="wc">Baños:</label>
            <?php echo isset($errores['wc']) ? "<p class='error'>".$errores['wc']."</p>" : '';?>
            <input type="number" id="wc" min="1" max="9" name="wc" placeholder="3" value="<?php echo $datosPropiedad['wc'];?>">
            
            <label for="estacionamiento">Estacionamiento:</label>
            <?php echo isset($errores['estacionamiento']) ? "<p class='error'>".$errores['estacionamiento']."</p>" : '';?>
            <input type="number" id="estacionamiento" name="estacionamiento" min="1" max="9" placeholder="3" value="<?php echo $datosPropiedad['estacionamiento'];?>">
        </fieldset>
        
        <fieldset>
            <legend for="vendedor">Vendedor</legend>
            <?php echo isset($errores['vendedor']) ? "<p class='error'>".$errores['vendedor']."</p>" : '';?>
            <select id="vendedor" name="vendedor">
                <option value=" " selected>Seleccionar</option>
                <?php 
                    foreach($vendedores as $vendedor) {
                        echo "<option value ='" .$vendedor['id']. "'" . ($datosPropiedad['vendedorId'] === $vendedor['id'] ? 'selected' : '') . ">" . $vendedor['nombre'] . " " .$vendedor['apellido']; 
                    }
                ?>
            </select>
        </fieldset>

        <div class="submit">
            <input type="submit" class="button-green" value="Actualizar Propiedad" />
        </div>
    </form>
</main>

<?php
incluirTemplate('footer', false, true);
?>