<nav class="nav nav--main nav--main--is-closed">
    <div class="nav--main__bg" style="background-color: #ee3b3b;"></div>
    <div class="nav--main__bg" style="background-color: #ff5765;"></div>
    <div class="nav--main__bg" style="background-color: #ebb335;"></div>
    <div class="nav--main__bg" style="background-color: #2d7949;"></div>
    <div class="nav--main__bg" style="background-color: #0C557F;"></div>
    <div class="nav--main__bg" style="background-color: #190549;"></div>
    <div class="nav--main__bg" style="background-color: #7b6ca0;"></div>
    <div class="nav--main__bg" style="background-color: #e07df4;">
        <div class="nav--main__wrapper">
            <header class="nav-header">
                <div class="logo logo--topbar">
                    <a href="<?php echo get_home_url(); ?>" title="OPUS ONE">
                        <span class="logo__letter">O</span>
                        <span class="logo__letter">P</span>
                        <span class="logo__letter">U</span>
                        <span class="logo__letter">S</span>
                        <span class="logo__letter">O</span>
                        <span class="logo__letter">N</span>
                        <span class="logo__letter">E</span>
                    </a>
                </div>
                <button class="close-nav" title="Fermer la navigation">
                    <span class="burger">
                        <span class="burger__bar burger__bar--top"></span>
                        <span class="burger__bar burger__bar--bottom"></span>
                    </span>
                </button>
            </header>
            <!--
            <ul class="nav--main__list">
                <li>
                    <a href="#">Agenda</a>
                    <ul>
                        <li><a href="agenda.html" title="Tous nos événements">Tous nos événements</a></li>
                        <li><a href="agenda-humour.html" title="Concerts">Concerts</a></li>
                        <li><a href="agenda-humour.html" title="Spectacles">Spectacles</a></li>
                        <li><a href="agenda-humour.html" title="Humour">Humour</a></li>
                        <li><a href="agenda-humour.html" title="Famille">Famille</a></li>
                        <li><a href="agenda-humour.html" title="Exposition">Exposition</a></li>
                        <li><a href="archives.html" title="Historique">Historique</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Opus One</a>
                    <ul>
                        <li><a href="manifesto.html" title="Manifesto">Manifesto</a></li>
                        <li><a href="artists.html" title="Nos Artistes">Nos Artistes</a></li>
                        <li><a href="services.html" title="Services">Services</a></li>
                        <li><a href="nous.html" title="Nous!">Nous!</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Infos pratiques</a>
                    <ul>
                        <li><a href="help.html" title="Toutes les infos">Toutes les infos</a></li>
                        <li><a href="help.html" title="Covid">Covid</a></li>
                        <li><a href="help.html" title="Billeterie">Billeterie</a></li>
                        <li><a href="help.html" title="PMR">PMR</a></li>
                        <li><a href="help.html" title="Sécurité">Sécurité</a></li>
                        <li><a href="help.html" title="VIP">VIP</a></li>
                        <li><a href="help.html" title="Lieux">Lieux</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Contact</a>
                    <ul>
                        <li><a href="contact.html" title="Nous contacter">Nous contacter</a></li>
                        <li><a href="help.html" title="Press">Covid</a></li>
                    </ul>
                </li>
            </ul>
            -->
            <?php wp_nav_menu(array(
                'theme_location' => 'main_navigation',
                'menu_class' => 'nav--main__list'
                )); ?>
        </div>
    </div>
</nav>