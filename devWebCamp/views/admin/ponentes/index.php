<h2 class="dashboard__heading "><?= $titulo ?></h2>

<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/ponentes/crear">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir
    </a>
</div>

<div class="dashboard__contenedor">
    <?php if (!empty($ponentes)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Nombre</th>
                    <th scope="col" class="table__th">Ubicación</th>
                    <th scope="col" class="table__th"></th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach ($ponentes as $ponente) : ?>
                    <tr class="table__tr">
                        <td class="table__td"><?= $ponente->getNombre() . " " . $ponente->getApellido() ?></td>
                        <td class="table__td"><?= $ponente->getCiudad() . ", " . $ponente->getPais() ?></td>
                        <td class="table__td--actions">
                            <a class="table__action table__action--edit" href="/admin/ponentes/editar?id=<?= $ponente->getId()?>">
                                <i class="fa-solid fa-user-pen"></i>
                                Editar
                            </a>

                            <form action="/admin/ponentes/eliminar" method="post" class="table__form">
                                <input type="hidden" name="id" value="<?= $ponente->getId()?>">
                                <button class="table__action table__action--delete" type="submit">
                                    <i class="fa-solid fa-trash"></i>
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        
        <?php } else { ?>
        <p class="text-center">Aún no hay ponentes registrados</p>

        <?php } ?>
    </div>
    
    <?= $paginador->paginar()?>