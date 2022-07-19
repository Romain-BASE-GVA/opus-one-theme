<footer class="footer">
    <div class="footer__container">
        <div class="footer__item">
            <h3 class="footer-title">Raccourcis</h3>
            <nav class="nav nav--footer nav--footer--shortcuts">
                <?php wp_nav_menu(array('theme_location' => 'footer_navigation')); ?>
            </nav>
        </div>
        <?php if (have_rows('reseaux_sociaux', 'option')) : ?>
            <div class="footer__item">
                <h3 class="footer-title">Nos réseaux</h3>
                <nav class="nav nav--footer nav--footer--social">
                    <ul class="socials">
                        <?php while (have_rows('reseaux_sociaux', 'option')) : the_row();
                            $nom = get_sub_field('nom');
                            $lien = get_sub_field('lien');
                            $couleur = get_sub_field('couleur');
                            $lettres = get_sub_field('lettres');
                        ?>
                            <li class="socials__item socials__item--ig" style="--color: <?php echo $couleur;?>">
                                <a href="<?php echo $lien; ?>" target="_blank" title="<?php echo $nom ?>">
                                    <h4 class="socials_item__title"><?php echo $nom ?></h4>
                                    <span><?php echo $lettres; ?></span>
                                </a>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </nav>
            </div>
        <?php endif; ?>
        <div class="footer__bottom">
            <div class="logo logo--footer">
                <img src="https://c.tenor.com/tlceri6zsQMAAAAC/concert.gif" class="logo--footer__img" alt="">
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
            <div class="footer__footer">
                <?php if (get_field('strapline', 'option')) : ?>
                    <p class="footer__strapline"><?php echo get_field('strapline', 'option'); ?></p>
                <?php endif; ?>
                <?php if (get_field('copyright', 'option')) : ?>
                    <p class="footer__copyright"><?php echo get_field('copyright', 'option'); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</footer>
<div class="page-transition">
    <div class="page-transition__line"></div>
    <div class="page-transition__line"></div>
    <div class="page-transition__line"></div>
    <div class="page-transition__line"></div>
    <div class="page-transition__line"></div>
    <div class="page-transition__line"></div>
    <div class="page-transition__line"></div>
    <div class="page-transition__line"></div>
    <div class="page-transition__line"></div>
    <div class="page-transition__line"></div>
</div>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/main.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.matchHeight-min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/ajax.js"></script>

</body>
</html>