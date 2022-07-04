<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div data-barba="container" data-barba-namespace="page-special" data-bg="#6E32FF" data-text-color="#fff" data-logo-title="<?php the_title(); ?>">

            <?php if (get_field('titre_header')) : ?>
                <header class="header header--regular">
                    <h1 class="header--regular__title"><?php echo get_field('titre_header'); ?></h1>
                    <?php if (get_field('sous-titre_header')) : ?>
                        <span class="header--regular__sub-title"><?php echo get_field('sous-titre_header'); ?></span>
                    <?php endif; ?>
                </header>
            <?php endif; ?>

            <main class="main main--page">

                <?php if (get_field('introduction')) : ?>

                    <div class="block block--text-full-width">
                        <div class="text-full-width"><?php echo get_field('introduction'); ?></div>
                    </div>

                <?php endif; ?>
                <?php if (have_rows('section')) : ?>
                    <?php while (have_rows('section')) : the_row();
                        $titre = get_sub_field('titre');
                        $titreId = get_sub_field('titre_minuscule');
                        $image = get_sub_field('image');
                    ?>
                        <?php if ($image) : ?>
                            <div class="block block--one-img">
                                <div class="one-img one-img--16-9">
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                </div>
                            </div>
                        <?php endif; ?>
                        <section class="section section--two-sides" id="<?php echo $titreId; ?>">

                            <div class="two-sides">
                                <div class="two-sides__side two-sides__side--left">
                                    <?php if ($titre) : ?>
                                        <h2 class="two-sides__title"><?php echo $titre; ?></h2>
                                    <?php endif; ?>
                                </div>
                                <div class="two-sides__side two-sides__side--right">
                                    <div class="two-side__content">
                                        <?php if (have_rows('contenu')) : ?>
                                            <?php while (have_rows('contenu')) : the_row(); ?>
                                                <?php if (get_row_layout() == 'titre') :
                                                    $titre = get_sub_field('titre');
                                                    $niveauDeTitre = get_sub_field('niveau_de_titre');
                                                    $styleDeTitre = get_sub_field('style_de_titre');
                                                ?>

                                                    <<?php echo $niveauDeTitre; ?> class="content-title content-title--<?php echo $styleDeTitre; ?>"><?php echo $titre; ?></<?php echo $niveauDeTitre; ?>>

                                                <?php elseif (get_row_layout() == 'contenu_texte') :
                                                    $contenu = get_sub_field('contenu');
                                                ?>
                                                    <div class="block block--text">
                                                        <div><?php echo $contenu; ?></div>
                                                    </div>
                                                <?php elseif (get_row_layout() == 'dropdowns') : ?>
                                                    <div class="block block--dropdowns">
                                                        <?php if (have_rows('dropdown')) : ?>
                                                            <ul class="dropdowns">
                                                                <?php while (have_rows('dropdown')) : the_row();
                                                                    $titre = get_sub_field('titre');
                                                                    $contenu = get_sub_field('contenu');
                                                                ?>
                                                                    <li class="dropdown dropdown--is-closed">
                                                                        <div class="dropdown__top">
                                                                            <button class="dropdown__trigger"><?php echo $titre; ?><span class="dropdown__plus"></span></button>
                                                                        </div>
                                                                        <div class="dropdown__content">
                                                                            <div><?php echo $contenu; ?></div>
                                                                        </div>
                                                                    </li>
                                                                <?php endwhile; ?>
                                                            </ul>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php elseif (get_row_layout() == 'slider_contenu') : ?>

                                                    <div class="block block--slider">
                                                        <?php if (have_rows('slide')) : ?>
                                                            <div class="slider">
                                                                <?php while (have_rows('slide')) : the_row();
                                                                    $couleurSlide = get_sub_field('couleur_de_slide');
                                                                    $typeSlide = get_sub_field('type_de_slide');
                                                                    $chiffre = get_sub_field('chiffre');
                                                                    $texte = get_sub_field('texte');
                                                                    $icone = get_sub_field('icone');
                                                                ?>
                                                                    <?php if ($typeSlide == 'dont') : ?>
                                                                        <div class="slide slide--<?php echo $typeSlide; ?> slide--<?php echo $couleurSlide; ?>">
                                                                            <div class="slide__in">
                                                                                <div class="slide--dont__icon">
                                                                                    <svg class="slide--dont__line" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 330.15 330.15">
                                                                                        <path d="M0,0V330.15H330.15V0H0ZM1.82,165.08c0-37.53,12.67-72.1,33.97-99.68l228.97,228.97c-27.58,21.29-62.14,33.97-99.68,33.97C74.91,328.33,1.82,255.24,1.82,165.08Zm292.55,99.68L65.4,35.79C92.97,14.5,127.54,1.82,165.08,1.82c90.16,0,163.26,73.09,163.26,163.26,0,37.53-12.67,72.1-33.97,99.68Z" />
                                                                                    </svg>
                                                                                    <div class="slide--dont__picto">
                                                                                    <img src="<?php echo esc_url($icone['url']); ?>" alt="<?php echo esc_attr($icone['alt']); ?>" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="slide--dont__text"><?php echo $texte; ?></div>
                                                                            </div>
                                                                        </div>
                                                                    <?php else : ?>
                                                                        <div class="slide slide--<?php echo $typeSlide; ?> slide--<?php echo $couleurSlide; ?>">
                                                                            <div class="slide__in">
                                                                                <?php if ($typeSlide == 'number') : ?>
                                                                                    <div class="slide--number__number"><?php echo $chiffre; ?></div>
                                                                                <?php endif; ?>
                                                                                <div class="slide--number__text"><?php echo $texte; ?></div>
                                                                            </div>
                                                                        </div>
                                                                    <?php endif; ?>

                                                                <?php endwhile; ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>

                                                <?php elseif (get_row_layout() == 'personne_de_contact') : 
                                                    $contacts = get_sub_field('membre_de_lequipe');    
                                                ?>
                                                    <div class="block block--contact-list">
                                                    <?php if( $contacts ): ?>
                                                    <ul class="contact-list">
                                                    <?php foreach( $contacts as $contact ): 
                                                        //$permalink = get_permalink( $featured_post->ID );
                                                        $nom = get_the_title( $contact->ID );
                                                        $photo = get_field('photo', $contact->ID);
                                                        $role = get_field( 'role', $contact->ID );
                                                        $mail = get_field('adresse_e_mail', $contact->ID );
                                                        $telephone = get_field( 'telephone', $contact->ID );
                                                    ?>
                                                        <li class="contact-person">
                                                            <a href="mailto:<?php echo $mail; ?>" title="Envoyer un mail a <?php echo $nom ?>"><span>Envoyer un mail a <?php echo $nom ?></span></a>
                                                            <div class="contact-person__side contact-person__side--img">
                                                                <?php if($photo): ?>
                                                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                                                <div class="img" style="background-image: url(<?php echo esc_url($image['url']); ?>)"></div>
                                                                <?php endif; ?>
                                                            </div>
                                                            <div class="contact-person__side contact-person__side--text">
                                                                <div>
                                                                    <h4 class="contact-person__person"><?php echo $nom; ?></h4>
                                                                    <span class="contact-person__role"><?php echo $role; ?></span>
                                                                    <?php if($telephone): ?>
                                                                        <span class="contact-person__cta"><?php echo $telephone; ?></span>
                                                                    <?php endif; ?>
                                                                    <span class="contact-person__cta">Envoyer un mail</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    <?php endforeach; ?>
                                                    </ul>
                                                    <?php endif; ?>
                                                </div>
                                                <?php endif; ?>
                                            <?php endwhile; ?>
                                        <?php endif; ?>

                                        

                                    </div>
                                </div>
                            </div>
                        </section>
                    <?php endwhile; ?>
                <?php endif; ?>
                <!--

            <div class="block block--one-img">
                <div class="one-img one-img--16-9">
                    <img src="assets/img/cat-bg-concert.jpg" alt="">
                </div>
            </div>

            <section class="section section--two-sides" id="production">

                <div class="two-sides">
                    <div class="two-sides__side two-sides__side--left">
                        <h2 class="two-sides__title">Produ&shy;ction</h2>
                    </div>
                    <div class="two-sides__side two-sides__side--right">
                        <div class="two-side__content">

                            <div class="block block--text">
                                <div>
                                    <p>Depuis 1993, nous produisons plus de 100 concerts et spectacles par an. Du stade de 50’000 places au club intimiste, il n’y a pas de limite à notre curiosité et notre envie de partager notre passion avec vous. Au-delà des artistes confirmés, nous nous engageons également à diffuser les talents émergents internationaux sur les scènes suisses.</p>
                                </div>
                            </div>

                            <div class="block block--dropdowns">

                                <ul class="dropdowns">

                                    <li class="dropdown dropdown--is-closed">
                                        <div class="dropdown__top">
                                            <button class="dropdown__trigger">Dropdown Title <span class="dropdown__plus"></span></button>
                                        </div>
                                        <div class="dropdown__content">
                                            <div>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum sequi mollitia nisi illum
                                                    quaerat vel aspernatur unde repellendus iusto beatae dolores excepturi deserunt dignissimos
                                                    inventore dicta, optio, blanditiis saepe cumque.</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <h3 class="content-title content-title--h3">Personne de contact</h3>

                            <div class="block block--contact-list">
                                <ul class="contact-list">
                                    <li class="contact-person">
                                        <a href="mailto:luc@basedesign.com" title="Envoyer un mail a Luc"><span>Envoyer un mail a Luc</span></a>
                                        <div class="contact-person__side contact-person__side--img">
                                            <img src="assets/img/cat-bg-concert.jpg" alt="Luc Patrick Vega">
                                            <div class="img" style="background-image: url(assets/img/cat-bg-concert.jpg)"></div>
                                        </div>
                                        <div class="contact-person__side contact-person__side--text">
                                            <div>
                                                <h4 class="contact-person__person">Luc Patrick Vega</h4>
                                                <span class="contact-person__role">Ceo</span>
                                                <span class="contact-person__cta">Envoyer un mail</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

            <div class="block block--one-img">
                <div class="one-img one-img--16-9">
                    <img src="assets/img/cat-bg-concert.jpg" alt="">
                </div>
            </div>

            <section class="section section--two-sides" id="evenementiel">

                <div class="two-sides">
                    <div class="two-sides__side two-sides__side--left">
                        <h2 class="two-sides__title">Événe&shy;mentiel</h2>
                    </div>
                    <div class="two-sides__side two-sides__side--right">
                        <div class="two-side__content">

                            <div class="block block--text">
                                <div>
                                    <p>Quelle que soit la nature, le thème ou la taille de votre événement, nous prenons en charge tous les aspects de son organisation. Grâce à notre expérience de 20 ans et un réseau international de partenaires, notre équipe propose des solutions sur mesure pour répondre aux exigences les plus élevées.</p>
                                </div>
                            </div>

                            <div class="block block--dropdowns">

                                <ul class="dropdowns">

                                    <li class="dropdown dropdown--is-closed">
                                        <div class="dropdown__top">
                                            <button class="dropdown__trigger">Dropdown Title <span class="dropdown__plus"></span></button>
                                        </div>
                                        <div class="dropdown__content">
                                            <div>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum sequi mollitia nisi illum
                                                    quaerat vel aspernatur unde repellendus iusto beatae dolores excepturi deserunt dignissimos
                                                    inventore dicta, optio, blanditiis saepe cumque.</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <h3 class="content-title content-title--h3">Selection</h3>

                            <div class="block block--slider">
                                <div class="slider">

                                    <div class="slide slide--number">
                                        <div class="slide__in">
                                            <div class="slide--number__number">01</div>
                                            <div class="slide--number__text">
                                                <p>Billet Carré Or</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="slide slide--number">
                                        <div class="slide__in">
                                            <div class="slide--number__number">02</div>
                                            <div class="slide--number__text">
                                                <p>Parking VIP (1 place pour 2)</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="slide slide--number">
                                        <div class="slide__in">
                                            <div class="slide--number__number">03</div>
                                            <div class="slide--number__text">
                                                <p>Vérifiez les conditions d’accès à l’événement</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="slide slide--number">
                                        <div class="slide__in">
                                            <div class="slide--number__number">04</div>
                                            <div class="slide--number__text">
                                                <p>Entrée séparée VIP & Vestiaire</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="slide slide--warning slide--just-text">
                                        <div class="slide__in">
                                            <p>La liste des principaux revendeurs non partenaires de l’événement et les conseils sont sur : <a href="#" title="">frc.ch/ticket</a></p>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <h3 class="content-title content-title--h3">Personne de contact</h3>

                            <div class="block block--contact-list">
                                <ul class="contact-list">
                                    <li class="contact-person">
                                        <a href="mailto:luc@basedesign.com" title="Envoyer un mail a Luc"><span>Envoyer un mail a Luc</span></a>
                                        <div class="contact-person__side contact-person__side--img">
                                            <img src="assets/img/cat-bg-concert.jpg" alt="Luc Patrick Vega">
                                            <div class="img" style="background-image: url(assets/img/cat-bg-concert.jpg)"></div>
                                        </div>
                                        <div class="contact-person__side contact-person__side--text">
                                            <div>
                                                <h4 class="contact-person__person">Luc Patrick Vega</h4>
                                                <span class="contact-person__role">Ceo</span>
                                                <span class="contact-person__cta">Envoyer un mail</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

            <div class="block block--one-img">
                <div class="one-img one-img--16-9">
                    <img src="assets/img/cat-bg-concert.jpg" alt="">
                </div>
            </div>

            <section class="section section--two-sides" id="expositions">

                <div class="two-sides">
                    <div class="two-sides__side two-sides__side--left">
                        <h2 class="two-sides__title">Expositions</h2>
                    </div>
                    <div class="two-sides__side two-sides__side--right">
                        <div class="two-side__content">

                            <div class="block block--text">
                                <div>
                                    <p>Depuis 2013, Opus One accueille en Suisse les plus grandes expositions internationales. De Titanic à Toutankhamon, nous disposons d’un savoir-faire spécifique pour l’accueil et l’organisation d’événements d’envergure destinés au grand public.</p>
                                </div>
                            </div>

                            <div class="block block--dropdowns">

                                <ul class="dropdowns">

                                    <li class="dropdown dropdown--is-closed">
                                        <div class="dropdown__top">
                                            <button class="dropdown__trigger">Dropdown Title <span class="dropdown__plus"></span></button>
                                        </div>
                                        <div class="dropdown__content">
                                            <div>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum sequi mollitia nisi illum
                                                    quaerat vel aspernatur unde repellendus iusto beatae dolores excepturi deserunt dignissimos
                                                    inventore dicta, optio, blanditiis saepe cumque.</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <h3 class="content-title content-title--h3">Selection</h3>

                            <div class="block block--slider">
                                <div class="slider">

                                    <div class="slide slide--number">
                                        <div class="slide__in">
                                            <div class="slide--number__number">01</div>
                                            <div class="slide--number__text">
                                                <p>Billet Carré Or</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="slide slide--number">
                                        <div class="slide__in">
                                            <div class="slide--number__number">02</div>
                                            <div class="slide--number__text">
                                                <p>Parking VIP (1 place pour 2)</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="slide slide--number">
                                        <div class="slide__in">
                                            <div class="slide--number__number">03</div>
                                            <div class="slide--number__text">
                                                <p>Vérifiez les conditions d’accès à l’événement</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="slide slide--number">
                                        <div class="slide__in">
                                            <div class="slide--number__number">04</div>
                                            <div class="slide--number__text">
                                                <p>Entrée séparée VIP & Vestiaire</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="slide slide--warning slide--just-text">
                                        <div class="slide__in">
                                            <p>La liste des principaux revendeurs non partenaires de l’événement et les conseils sont sur : <a href="#" title="">frc.ch/ticket</a></p>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <h3 class="content-title content-title--h3">Personne de contact</h3>

                            <div class="block block--contact-list">
                                <ul class="contact-list">
                                    <li class="contact-person">
                                        <a href="mailto:luc@basedesign.com" title="Envoyer un mail a Luc"><span>Envoyer un mail a Luc</span></a>
                                        <div class="contact-person__side contact-person__side--img">
                                            <img src="assets/img/cat-bg-concert.jpg" alt="Luc Patrick Vega">
                                            <div class="img" style="background-image: url(assets/img/cat-bg-concert.jpg)"></div>
                                        </div>
                                        <div class="contact-person__side contact-person__side--text">
                                            <div>
                                                <h4 class="contact-person__person">Luc Patrick Vega</h4>
                                                <span class="contact-person__role">Ceo</span>
                                                <span class="contact-person__cta">Envoyer un mail</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

            -->

            </main>

        </div>
<?php endwhile;
endif; ?>
<?php get_footer(); ?>