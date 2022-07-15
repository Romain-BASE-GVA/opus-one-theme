<div class="categories">
    <?php
    $terms = get_terms(
        array(
            'taxonomy'   => 'taxonomy-types',
            'hide_empty' => true,
        )
    )
    ?>

    <?php if (!empty($terms) && is_array($terms)) : ?>
        <?php foreach ($terms as $term) : 
            $catName = $term->name;
            $catNameLower = strtolower($catName);
            $catImage = get_field('image', $term);
        ?>
            <div class="category category--<?php echo $catNameLower; ?>" id="<?php echo $catNameLower; ?>">
                <div class="category__bg">
                    <img src="<?php echo $catImage['url']; ?>" class="category__media" alt="<?php echo $catImage['alt']; ?>">
                </div>
                <div class="category__fg">
                    <h2 class="category__title">
                        <span class="category__word category__word--desktop">
                            <?php
                                $catLetters = str_split(ucfirst(stripAccents($catName)));

                                foreach ($catLetters as $catLetter) {
                                    echo '<span class="category__letter">' . $catLetter . '</span>';
                                }
                                ?>
                        </span>
                        <span class="category__word category__word--mobile"><?php echo $catName; ?></span>
                    </h2>
                    
                    <div class="category__bottom">
                        <a href="<?= get_term_link($term, 'taxonomy-types'); ?>" class="see-more"><span>+</span></a>
                        <?php $nextEvents = get_show_from_category_nb_types($term->term_id, 10);

                        if(!empty($nextEvents)){ ?>
                            <div class="shortly">
                                <span class="shortly__title"><?= __('Prochainement', 'opus-one') ?></span>
                                <div class="marquee3k shortly__marquee" data-speed="1" data-pausable="true">
                                    <div>
                                        <?php foreach ($nextEvents as $show): ?>
                                            <a href="<?php echo get_permalink($show['ID']); ?>" title="<?php echo get_the_title( $show['ID'] ) ?>"><?php echo get_the_title( $show['ID'] ) ?></a>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    <!--
    <div class="category category--concert" id="concerts">
        <div class="category__bg">
            <img src="/assets/img/cat-bg-concert.jpg" class="category__media" alt="">
        </div>
        <div class="category__fg">
            <h2 class="category__title">
                <span class="category__word category__word--desktop">
                    <span class="category__letter">C</span>
                    <span class="category__letter">o</span>
                    <span class="category__letter">n</span>
                    <span class="category__letter">c</span>
                    <span class="category__letter">e</span>
                    <span class="category__letter">r</span>
                    <span class="category__letter">t</span>
                    <span class="category__letter">s</span>
                </span>
                <span class="category__word category__word--mobile">
                    Con&shy;certs
                </span>
            </h2>
            <div class="category__bottom">
                <a href="agenda.html" class="see-more"><span>+</span></a>
                <div class="shortly">
                    <span class="shortly__title">Prochainement</span>
                    <div class="marquee3k shortly__marquee" data-speed="1" data-pausable="true">
                        <div>
                            <a href="single-event.html">Angèle </a>
                            <a href="single-event.html">Michael Jackson </a>
                            <a href="single-event.html">Hubert-Félix Thiéfaine</a>
                            <a href="single-event.html">Pogo Car Crash Control</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="category category--spectacles" id="spectacles">
        <div class="category__bg">
            <img src="/assets/img/cat-bg-spectacle.jpg" class="category__media" alt="">
        </div>
        <div class="category__fg">
            <h2 class="category__title">
                <span class="category__word category__word--desktop">
                    <span class="category__letter">S</span>
                    <span class="category__letter">p</span>
                    <span class="category__letter">e</span>
                    <span class="category__letter">c</span>
                    <span class="category__letter">t</span>
                    <span class="category__letter">a</span>
                    <span class="category__letter">c</span>
                    <span class="category__letter">l</span>
                    <span class="category__letter">e</span>
                </span>
                <span class="category__word category__word--mobile">
                    Spec&shy;tacle
                </span>
            </h2>
            <div class="category__bottom">
                <a href="agenda.html" class="see-more"><span>+</span></a>
                <div class="shortly">
                    <span class="shortly__title">Prochainement</span>
                    <div class="marquee3k shortly__marquee" data-speed="1" data-pausable="true">
                        <div>
                            <a href="single-event.html">Angèle </a>
                            <a href="single-event.html">Michael Jackson </a>
                            <a href="single-event.html">Hubert-Félix Thiéfaine</a>
                            <a href="single-event.html">Pogo Car Crash Control</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="category category--humour" id="humour">
        <div class="category__bg">
            <img src="/assets/img/cat-bg-humour.jpg" class="category__media" alt="">
        </div>
        <div class="category__fg">
            <h2 class="category__title">
                <span class="category__word category__word--desktop">
                    <span class="category__letter">H</span>
                    <span class="category__letter">u</span>
                    <span class="category__letter">m</span>
                    <span class="category__letter">o</span>
                    <span class="category__letter">u</span>
                    <span class="category__letter">r</span>
                </span>
                <span class="category__word category__word--mobile">
                    Hum&shy;our
                </span>
            </h2>
            <div class="category__bottom">
                <a href="agenda.html" class="see-more"><span>+</span></a>
                <div class="shortly">
                    <span class="shortly__title">Prochainement</span>
                    <div class="marquee3k shortly__marquee" data-speed="1" data-pausable="true">
                        <div>
                            <a href="single-event.html">Angèle </a>
                            <a href="single-event.html">Michael Jackson </a>
                            <a href="single-event.html">Hubert-Félix Thiéfaine</a>
                            <a href="single-event.html">Pogo Car Crash Control</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="category category--famille" id="famille">
        <div class="category__bg">
            <img src="/assets/img/cat-bg-famille.png" class="category__media" alt="">
        </div>
        <div class="category__fg">
            <h2 class="category__title">
                <span class="category__word category__word--desktop">
                    <span class="category__letter">F</span>
                    <span class="category__letter">a</span>
                    <span class="category__letter">m</span>
                    <span class="category__letter">i</span>
                    <span class="category__letter">l</span>
                    <span class="category__letter">l</span>
                    <span class="category__letter">e</span>
                </span>
                <span class="category__word category__word--mobile">
                    Fam&shy;ille
                </span>
            </h2>
            <div class="category__bottom">
                <a href="agenda.html" class="see-more"><span>+</span></a>
                <div class="shortly">
                    <span class="shortly__title">Prochainement</span>
                    <div class="marquee3k shortly__marquee" data-speed="1" data-pausable="true">
                        <div>
                            <a href="single-event.html">Angèle </a>
                            <a href="single-event.html">Michael Jackson </a>
                            <a href="single-event.html">Hubert-Félix Thiéfaine</a>
                            <a href="single-event.html">Pogo Car Crash Control</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="category category--expositions" id="expositions">
        <div class="category__bg">
            <img src="/assets/img/cat-bg-exposition.jpg" class="category__media" alt="">
        </div>
        <div class="category__fg">
            <h2 class="category__title">
                <span class="category__word category__word--desktop">
                    <span class="category__letter">E</span>
                    <span class="category__letter">x</span>
                    <span class="category__letter">p</span>
                    <span class="category__letter">o</span>
                    <span class="category__letter">s</span>
                    <span class="category__letter">i</span>
                    <span class="category__letter">t</span>
                    <span class="category__letter">i</span>
                    <span class="category__letter">o</span>
                    <span class="category__letter">n</span>
                    <span class="category__letter">s</span>
                </span>
                <span class="category__word category__word--mobile">
                    Expo&shy;sitions
                </span>
            </h2>
            <div class="category__bottom">
                <a href="agenda.html" class="see-more"><span>+</span></a>
                <div class="shortly">
                    <span class="shortly__title">Prochainement</span>
                    <div class="marquee3k shortly__marquee" data-speed="1" data-pausable="true">
                        <div>
                            <a href="single-event.html">Angèle </a>
                            <a href="single-event.html">Michael Jackson </a>
                            <a href="single-event.html">Hubert-Félix Thiéfaine</a>
                            <a href="single-event.html">Pogo Car Crash Control</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        -->
</div>