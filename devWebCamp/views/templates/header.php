<header class="header">
    <div class="header__container">
        <nav class="header__nav">
            <?php !isset($_SESSION) ? session_start() : '' ?>
            <?php if (isset($_SESSION['auth']) && $_SESSION['auth']) { ?>
                <form method="post" action="/logout" class="header__form">
                    <input type="submit" value="Cerrar Sesión" class="header__submit">
                </form>
            <?php } else { ?>
                <a href="/registro" class="header__link">Registro</a>
                <a href="/login" class="header__link">Iniciar Sesión</a>
            <?php } ?>
        </nav>

        <div class="header__content">
            <a href="/">
                <h1 class="header__logo">&#60;DevWebCamp/></h1>
            </a>
            <p class="header__text">Octubre 5-6 - 2023</p>
            <p class="header__text header__text--mode">En Linea - Presencial</p>

            <a href="/registro" class="header__button">Comprar Pase</a>
        </div>
    </div>
</header>

<div class="bar">
    <div class="bar__content">
        <a class="bar__logo" href="/">
            <h2>&#60;DevCampWeb/></h2>
        </a>
        <nav class="nav">
            <a href="/devwebcamp" class="nav__link <?= paginaActual('/devwebcamp') ? 'nav__link--actual' : '' ?>">Evento</a>
            <a href="/paquetes" class="nav__link <?= paginaActual('/paquetes') ? 'nav__link--actual' : '' ?>">Paquetes</a>
            <a href="/workshops" class="nav__link <?= paginaActual('/workshops') ? 'nav__link--actual' : '' ?> ">Workshops / Conferencias</a>
            <a href="/login" class="nav__link <?= paginaActual('/login') ? 'nav__link--actual' : '' ?>">Comprar Pase</a>
        </nav>
    </div>
</div>