<h2 class="dashboard__heading "><?= $titulo ?></h2>
<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/eventos/crear">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir
    </a>
</div>

<div class="dashboard__contenedor">
    <?php if (!empty($eventos)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Evento</th>
                    <th scope="col" class="table__th">Categoria</th>
                    <th scope="col" class="table__th">Día y Hora</th>
                    <th scope="col" class="table__th">Ponente</th>
                    <th scope="col" class="table__th"></th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach ($eventos as $evento) : ?>
                    <tr class="table__tr">
                        <td class="table__td"><?= $evento->getNombre()?></td>
                        <td class="table__td"><?= $evento->getCategoriaId()?></td>
                        <td class="table__td"><?= $evento->getHoraId() . " , " . $evento->getDiaId()?></td>
                        <td class="table__td"><?= $evento->getPonenteId()?></td>
                        <td class="table__td--actions">
                            <a class="table__action table__action--edit" href="/admin/eventos/editar?id=<?= $evento->getId()?>">
                                <i class="fa-solid fa-user-pen"></i>
                                Editar
                            </a>

                            <form action="/admin/eventos/eliminar" method="post" class="table__form">
                                <input type="hidden" name="id" value="<?= $evento->getId()?>">
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
        <p class="text-center">Aún no hay eventos registrados</p>

        <?php } ?>
    </div>
    
    <?= $paginador->paginar()?>