<h2 class="dashboard__heading "><?= $titulo ?></h2>

<div class="dashboard__contenedor">
    <?php if (!empty($registrados)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Nombre</th>
                    <th scope="col" class="table__th">Email</th>
                    <th scope="col" class="table__th">Plan</th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach ($registrados as $registrado) : ?>
                    <tr class="table__tr">
                        <td class="table__td"><?= $registrado->getUsuarioId()->getNombre() . " " . $registrado->getUsuarioId()->getApellido() ?></td>
                        <td class="table__td"><?= $registrado->getUsuarioId()->getEmail() ?></td>
                        <td class="table__td"><?= $registrado->getPaqueteId()->getNombre() ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>


    <?php } else { ?>
        <p class="text-center">Aún no hay registrados</p>

    <?php } ?>
</div>

<?= $paginador->paginar() ?>