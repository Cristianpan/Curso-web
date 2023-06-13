<?php include_once __DIR__ . "/header-dashboard.php" ?>

<div class="contenedor-sm">
    
    <div id="filters" class="filters">
        <div class="input-filters">
            <h2>Filtros: </h2>
            <div class="field">
                <label for="all">Todas</label>
                <input type="radio" id="all" name="filter" value="" checked>
            </div>
            <div class="field">
                <label for="completed">Completadas</label>
                <input type="radio" id="completed" name="filter" value="1">
            </div>
            <div class="field">
                <label for="pending">Pendientes</label>
                <input type="radio" id="pending" name="filter" value="0">
            </div>
        </div>
    </div>

    <ul id="task-list" class="task-list"></ul>

    <button type="button" class="add-task" id="add-task">+</button>

</div>

<?php include_once __DIR__ . "/footer-dashboard.php" ?>

<?php
$script = '<script src="/build/js/tasks.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>            
    ';
?>