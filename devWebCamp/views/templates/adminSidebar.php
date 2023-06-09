<aside class="dashboard__sidebar">
    <nav class="dashboard__menu">
        <a href="/admin/dashboard" class="dashboard__link <?= paginaActual('/dashboard') ? 'dashboard__link--actual' : ''?>">
            <i class="fa-solid fa-house dashboard__icon"></i>
            <span class="dashboard__menu-texto">Inicio</span>
        </a>
        <a href="/admin/ponentes" class="dashboard__link <?= paginaActual('/ponentes') ? 'dashboard__link--actual' : ''?>">
            <i class="fa-solid fa-microphone dashboard__icon"></i>
            <span class="dashboard__menu-texto">Ponentes</span>
        </a>
        <a href="/admin/eventos" class="dashboard__link <?= paginaActual('/eventos') ? 'dashboard__link--actual' : ''?>">
            <i class="fa-solid fa-calendar dashboard__icon"></i>
            <span class="dashboard__menu-texto">Eventos</span>
        </a>
        <a href="/admin/registrados" class="dashboard__link <?= paginaActual('/registrados') ? 'dashboard__link--actual' : ''?>">
            <i class="fa-solid fa-users dashboard__icon"></i>
            <span class="dashboard__menu-texto">Registrados</span>
        </a>
        <a href="/admin/regalos" class="dashboard__link <?= paginaActual('/regalos') ? 'dashboard__link--actual' : ''?>">
            <i class="fa-solid fa-gift dashboard__icon"></i>
            <span class="dashboard__menu-texto">Regalos</span>
        </a>
    </nav>
</aside>