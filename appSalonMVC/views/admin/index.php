<h1 class="nombre-pagina">Panel de Administración</h1>
<?php include_once __DIR__ . '/../components/barra.php' ?>



<h2>Buscar Citas</h2>
<div class="busqueda">
    <form class="form">
        <div class="field">
            <label for="fecha">Fecha</label>
            <input type="date" id="fecha" name="fecha" value="<?php echo $fecha?>">
        </div>
    </form>

</div>

<div id="citas-admin">
    <?php 
        if (!count($citas)){
            echo "<h3>No hay citas registradas para la fecha seleccionada</h3>";
        }
    ?>

    <ul class="citas">
        <?php
        $idCita = 0;
        foreach ($citas as $key => $cita) {
            if ($idCita !== $cita->getId()) {
                $idCita = $cita->getId();
                $total = 0;
        ?>
                <li>
                    <p>ID: <span><?php echo $cita->getId() ?></span></p>
                    <p>Hora: <span><?php echo $cita->getHora() ?></span></p>
                    <p>Cliente: <span><?php echo $cita->getCliente() ?></span></p>
                    <p>Email: <span><?php echo $cita->getEmail() ?></span></p>
                    <p>Telefono: <span><?php echo $cita->getTelefono() ?></span></p>
                    <h3>Servicios</h3>
                <?php } //fin if 
                ?>

                <p class="servicio"><?php echo $cita->getServicio() . " : " . $cita->getPrecio() ?></p>
                <?php
                $total += $cita->getPrecio();
                $actual = $cita->getId();
                $proximo = 0;

                if (isset($citas[$key+1])){
                    $proximo = $citas[$key + 1]->getId();
                }

                if (esUltimo($actual, $proximo)) { ?>
                    <p class="total"> Total: <span>$ <?php echo $total ?></span></p>
                    <form action="/api/eliminar" method="POST" class="align-right">
                        <input type="hidden" name="id" value="<?php echo $cita->getId()?>">
                        <input type="submit" class="boton-eliminar" value="Eliminar cita">
                    </form>
            <?php
                }
            } // fin foreach
            ?>
    </ul>
</div>


<?php 
    $script = "<script src='build/js/buscador.js'></script>";
?>