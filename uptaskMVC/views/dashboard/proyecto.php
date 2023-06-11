<?php include_once __DIR__ . "/header-dashboard.php" ?>

    <div class="contenedor-sm">
        <ul id="task-list" class="task-list">

        </ul>

        <div class="aling-right">
            <button type="button" class="add-task" id="add-task">Nueva Tarea &#43;</button>
        </div>
    </div>

<?php include_once __DIR__ . "/footer-dashboard.php" ?>

<?php 
    $script = '<script src="/build/js/tasks.js"></script>'; 
?> 