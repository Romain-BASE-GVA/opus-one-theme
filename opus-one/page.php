<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); 
    $colorBackground = get_field('couleur_de_fond') ? get_field('couleur_de_fond') : '#6E32FF';
    $colorText = get_field('couleur_du_texte') ? get_field('couleur_de_texte') : '#FFF';
?>
        <div data-barba="container" data-barba-namespace="page-special" data-bg="<?php echo $colorBackground; ?>" data-text-color="<?php echo $colorText; ?>" data-logo-title="<?php the_title(); ?>">

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

                                                <?php elseif (get_row_layout() == 'slider_evenement') : ?>

                                                    <div class="block block--slider">
                                                        <?php if (have_rows('slide')) : ?>
                                                            <div class="slider">
                                                                <?php while (have_rows('slide')) : the_row();
                                                                    $nomEvenement = get_sub_field('nom_de_levenement');
                                                                    $image = get_sub_field('image');
                                                                    $date = get_sub_field('date');
                                                                    $lien = get_sub_field('lien');
                                                                ?>

                                                                    <div class="slide slide--event">
                                                                        <div class="slide__in">
                                                                            <div class="slide--event__img">
                                                                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                                                            </div>
                                                                            <div class="slide--event__bottom">
                                                                                <?php if ($date) : ?>
                                                                                    <span class="slide__date"><?php echo $date; ?></span>
                                                                                <?php endif; ?>
                                                                                <div class="slide__titre"><?php echo $nomEvenement; ?></div>
                                                                                <?php if ($lien) : ?>
                                                                                    <a class="slide__cta" href="<?php echo esc_url($link); ?>">En savoir plus</a>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                <?php endwhile; ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>

                                                <?php elseif (get_row_layout() == 'personne_de_contact') :
                                                    $contacts = get_sub_field('membre_de_lequipe');
                                                ?>
                                                    <div class="block block--contact-list">
                                                        <?php if ($contacts) : ?>
                                                            <ul class="contact-list">
                                                                <?php foreach ($contacts as $contact) :
                                                                    //$permalink = get_permalink( $featured_post->ID );
                                                                    $nom = get_the_title($contact->ID);
                                                                    $photo = get_field('photo', $contact->ID);
                                                                    $role = get_field('role', $contact->ID);
                                                                    $mail = get_field('adresse_e_mail', $contact->ID);
                                                                    $telephone = get_field('telephone', $contact->ID);
                                                                ?>
                                                                    <li class="contact-person">
                                                                        <a href="mailto:<?php echo $mail; ?>" title="Envoyer un mail a <?php echo $nom ?>"><span>Envoyer un mail a <?php echo $nom ?></span></a>
                                                                        <div class="contact-person__side contact-person__side--img">
                                                                            <?php if ($photo) : ?>
                                                                                <img src="<?php echo esc_url($photo['url']); ?>" alt="<?php echo esc_attr($photo['alt']); ?>" />
                                                                                <div class="img" style="background-image: url(<?php echo esc_url($photo['url']); ?>)"></div>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                        <div class="contact-person__side contact-person__side--text">
                                                                            <div>
                                                                                <h4 class="contact-person__person"><?php echo $nom; ?></h4>
                                                                                <span class="contact-person__role"><?php echo $role; ?></span>
                                                                                <?php if ($telephone) : ?>
                                                                                    <!--
                                                                                    <span class="contact-person__cta"><?php echo $telephone; ?></span>
                                                                                -->
                                                                                <?php endif; ?>
                                                                                <span class="contact-person__cta">Envoyer un mail</span>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                <?php endforeach; ?>
                                                            </ul>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php elseif (get_row_layout() == 'liste_de_lieux') : ?>
                                                    <div class="block block--list">
                                                        <?php if (have_rows('lieux')) : ?>
                                                            <ul class="list">
                                                                <?php while (have_rows('lieux')) : the_row();
                                                                    $nom = get_sub_field('nom');
                                                                    $url = get_sub_field('lien_google_map');
                                                                ?>
                                                                    <li class="list__item list__item--area"><a href="<?php echo $url; ?>" class="list__link" target="_blank"><span><?php echo $nom; ?></span></a></li>
                                                                <?php endwhile; ?>
                                                            </ul>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php elseif (get_row_layout() == 'equipe') : ?>
                                                    <div class="block block--equipe">
                                                        <?php
                                                        $team = new WP_Query(
                                                            array(
                                                                'post_type' => 'equipe',
                                                                'posts_per_page' => -1
                                                            )
                                                        );
                                                        ?>
                                                        <?php if ($team->have_posts()) : ?>
                                                            <div>
                                                                <ul class="team-list">
                                                                    <?php while ($team->have_posts()) : $team->the_post();
                                                                        $memberImg = get_field('photo');
                                                                        $memberRole = get_field('role');
                                                                        $memberTag = get_field('equipe');
                                                                        $memberEmail = get_field('adresse_e_mail');
                                                                    ?>
                                                                        <li class="member">
                                                                            <?php if ($memberEmail) : ?>
                                                                                <a href="mailto:<?php echo $memberEmail ?>" title="Envoyer un mail a <?php the_title(); ?>">
                                                                                <?php endif; ?>
                                                                                <div class="member__img">
                                                                                    <img src="<?php echo esc_url($memberImg['url']); ?>" alt="<?php echo esc_attr($memberImg['alt']); ?>" />
                                                                                </div>
                                                                                <div class="member__info">
                                                                                    <span class="member__name"><?php the_title(); ?></span>
                                                                                    <?php if ($memberRole) : ?>
                                                                                        <span class="member__role"><?php echo $memberRole; ?></span>
                                                                                    <?php endif; ?>
                                                                                    <?php if ($memberTag) : ?>
                                                                                        <span class="member__tag">#<?php echo $memberTag; ?></span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                                <?php if ($memberEmail) : ?>
                                                                                </a>
                                                                            <?php endif; ?>
                                                                        </li>
                                                                    <?php endwhile; ?>
                                                                </ul>
                                                            </div>
                                                        <?php endif;
                                                        wp_reset_postdata(); ?>
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

            </main>
            
            <?php if (have_rows('voir_plus')) : ?>
                <div class="block block--see-more" style="--current-txt-color: #6E32FF; --current-bg-color: #fff;">
                    <?php  if(get_field('voir_plus_titre')): ?>
                    <h2 class="block--see-more__title"><?php echo get_field('voir_plus_titre'); ?></h2>
                    <?php endif; ?>
                    <ul class="see-more-list">
                        <?php while (have_rows('voir_plus')) : the_row();
                            $lien = get_sub_field('lien');
                            $lienUrl = $lien['url'];
                            $lienTitle = $lien['title'];
                            $lienTarget = $lien['target'] ? $link['target'] : '_self';

                        ?>
                            <li class="see-more-item">
                                <a class="our-sevices-link" href="<?php echo esc_url($lienUrl); ?>" title="<?php echo esc_html($lienTitle); ?>" target="<?php echo esc_attr($lienTarget); ?>">
                                    <?php echo esc_html($lienTitle); ?>
                                    <span class="link-arrow">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 199.81 181.64">
                                            <polygon points="154.4 45.41 108.98 0 108.98 72.66 0 72.66 0 108.98 108.98 108.98 108.98 181.64 154.4 136.23 199.81 90.82 154.4 45.41" />
                                        </svg>
                                    </span>
                                </a>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            <?php endif; ?>
        
        </div>
<?php endwhile;
endif; ?>
<?php get_footer(); ?>