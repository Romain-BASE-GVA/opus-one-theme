<?php /* Template Name: Agenda */ ?>
<?php get_header(); ?>

    <?php if (have_posts()) : while (have_posts()) :
    the_post();
    $colorBackground = get_field('couleur_de_fond') ? get_field('couleur_de_fond') : '#6E32FF';
    $colorText = get_field('couleur_du_texte') ? get_field('couleur_de_texte') : '#FFF';
    ?>
    <div data-barba="container" data-barba-namespace="agenda" data-bg="<?php echo $colorBackground; ?>"
         data-text-color="<?php echo $colorText; ?>" data-ajax-action="next_month"
         data-logo-title="Agenda">

    <main class="main main--agenda page-template-page-agenda">
    <div class="filter-bar">
        <div class="filter-events">
            <button class="event-cat-trigger">
                <span class="event-cat-trigger__label"><?= __('Catégories', 'opus-one') ?></span>
                <span class="event-cat-trigger__current-cat"><?= __('Tout', 'opus-one') ?></span>
            </button>
            <div class="event-cat-list">

                <!-- la liste des autres taxo, la taxo actuelle a la class="is-active" -->
                <ul>

                    <?php
                    $tmp_post = $post;
                    $taxonomies = array('taxonomy-types');
                    $args = array(
                        'orderby' => 'name',
                        'order' => 'ASC',
                        'exclude' => 99
                    );
                    $terms = get_terms($taxonomies, $args);
                    foreach ($terms as $term) {
                        $next_shows = get_show_from_category($term->term_id);
                        if (count($next_shows) != 0) { ?>
                            <li><a href="<?= get_term_link($term, "taxonomy-types"); ?>"
                                   title="<?= $term->name; ?>"><?= $term->name; ?></a></li><?php
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>

        <div class="search-events">
            <!-- Search input statique, la recherceh se fait sur tous les evenement donc le resulktat de la page rehcerche est la page agenda global, (sans taxonomie)  -->
            <div class="search-events__input-wrapper">
                <form role="search" method="get" action="<?php echo get_home_url(); ?>">
                    <input class="search-events__input" placeholder="Recherche" type="search" name="s"
                           autocomplete="off">
                </form>
            </div>
            <button class="search-events__submit" title="Rechercher">
                <span class="search-events__label">Rechercher</span>
                <span class="search-events__icon">
                                <svg class="search-events__svg" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 16.9 16.9">
                                    <defs>
                                        <style>
                                            .cls-1 {
                                                fill: #fff;
                                                fill-rule: evenodd;
                                            }
                                        </style>
                                    </defs>
                                    <path class="cls-1"
                                          d="M16.9,15.49l-4.3-4.3c.9-1.2,1.4-2.66,1.4-4.19,0-1.87-.73-3.63-2.05-4.95C10.62,.73,8.87,0,7,0S3.37,.73,2.05,2.05C-.68,4.78-.68,9.22,2.05,11.95c1.32,1.32,3.08,2.05,4.95,2.05,1.53,0,2.98-.5,4.19-1.4l4.3,4.3,1.41-1.41Zm-9.9-3.49c-1.34,0-2.59-.52-3.54-1.46-1.95-1.95-1.95-5.12,0-7.07,.94-.94,2.2-1.46,3.54-1.46s2.59,.52,3.54,1.46,1.46,2.2,1.46,3.54-.52,2.59-1.46,3.54-2.2,1.46-3.54,1.46Z"/>
                                </svg>
                            </span>
            </button>
        </div>

        <!--<div class="mobile-page-nav"></div>-->
    </div>

    <?php
    $first_show = get_first_show();
    $date_first_show = $first_show['meta_value'];
    $year_to_show = substr($date_first_show, 0, 4);
    $month_to_show = substr($date_first_show, 4, 2);
    $next_shows = get_next_show_two_months($year_to_show, $month_to_show);
    $date_show = $year_to_show . $month_to_show;
    $now = date_i18n('Y-m-d H:i');
    $array_show_multidate = array();
    $next = date("Ym", strtotime($year_to_show . "-" . $month_to_show . " +2 month"));
    $last_show = get_last_show();
    $month = date_i18n("F", strtotime($date_show . "01")); ?>

    <div class="next_request" data-next-year="<?php echo substr($next, 0, 4); ?>"
         data-next-month="<?php echo substr($next, 4, 2); ?>"
         data-last-date="<?php echo substr($last_show, 0, 6); ?>"></div>

    <div class="event-month" data-month-name="<?php echo ucfirst($month); ?>" id="<?= $month ?>-<?= $year_to_show ?>">
        <h3 class="event-month__title">
            <!-- @TODO : JS pour adpater le responsive (?) -->
            <span class="event-month__word event-month__word--mobile"><?php echo $month; ?></span>
            <!--MOBILE-->
            <!-- @TODO : END -->
            <span class="event-month__word event-month__word--desktop">
                            <!-- DESKTOP -->
                            <?php
                            $monthLetters = str_split(ucfirst(stripAccents($month)));

                            foreach ($monthLetters as $monthLetter) {
                                echo '<span class="event-month__letter">' . $monthLetter . '</span>';
                            }
                            ?>
                        </span>
        </h3>
        <ul class="event-list">

            <?php

            foreach ($next_shows

            as $show) {
            $the_id = $show['ID'];
            $date = $show['meta_value'];
            $next_date = substr($date, 0, 6);
            $post = get_post($show['ID']);
            $month = date_i18n("F", strtotime($next_date . "01"));
            if ($date_show != $next_date) { ?>

        </ul><!-- event-list -->
    </div><!-- one-month -->
    <div class="event-month" data-month-name="<?php echo ucfirst($month); ?>" id="<?= $month ?>-<?= $year_to_show ?>">
        <h3 class="event-month__title">
            <!-- @TODO : JS pour adpater le responsive (?) -->
            <span class="event-month__word event-month__word--mobile"><?php echo $month; ?></span>
            <!--MOBILE-->
            <!-- @TODO : END -->
            <span class="event-month__word event-month__word--desktop">
                            <!-- DESKTOP -->
                            <?php
                            $monthLetters = str_split(ucfirst(stripAccents($month)));

                            foreach ($monthLetters as $monthLetter) {
                                echo '<span class="event-month__letter">' . $monthLetter . '</span>';
                            }
                            ?>
                        </span>
        </h3>
        <ul class="event-list"><?php
            $date_show = $next_date;
            }

            if ($post) {

                $the_id = $show['ID'];
                $date = $show['meta_value'];
                $next_date = substr($date, 0, 6);
                $type = get_field("type", $post->ID);
                $post = get_post($show['ID']);
                $terms = wp_get_post_terms($post->ID, "taxonomy-representation");

                if ($type == "plusieurs_dates") {
                    $dates = get_field("date_unique_ou_separee", $post->ID);
                    $representation_info = search_representation($dates, $date);
                    if (!$representation_info) {
                        $representation_info = search_representation_report($dates, $date);
                    }
                    $date_sale = $representation_info['date_de_la_mise_en_vente'];
                    $time_sale = $representation_info['heure_de_la_mise_en_vente'];
                    $date_sale_formated = date_i18n('Y-m-d H:i', strtotime($date_sale . " " . $time_sale));
                    $avaibility = $representation_info['etat'];
                    $nb_futur_show = get_nb_representation_in_future($post->ID);

                    if ($nb_futur_show > 1) {
                        if ($representation_info['etat'] == "postponed") {
                            $url = get_permalink($post->ID) . $representation_info['date_de_report'] . "/";
                        } else {
                            $url = get_permalink($post->ID) . $representation_info['date_de_la_representation'] . "/";
                        }
                    } elseif ($representation_info['date_de_report'] == $date) {
                        $url = get_permalink($post->ID) . $representation_info['date_de_report'] . "/";
                    } elseif ($representation_info['date_de_report'] != $date && $representation_info['etat'] == "postponed") {
                        $url = get_permalink($post->ID) . $representation_info['date_de_la_representation'] . "/";
                    } else {
                        $url = get_permalink($post->ID);
                    }

                    $ticket_url = get_ticket_link($representation_info); ?>

                    <!-- Et Ensuite la liste des evenements, certaine info sont la 2x la version mobile et desktop sont legerement different et ne permettaient pas de faire un seul template -->
                    <li class="event">
                        <div class="event__call-back event__call-back--mobile">
                            <div class="double-buttons">
                                <a href="<?= get_permalink($post->ID); ?>"
                                    class="double-bouttons__btn double-bouttons__btn--info" title="">
                                    <?php
                                    if ($nb_futur_show <= 1) {
                                        _e("Informations", "opus-one");
                                    } else {
                                        _e("Informations tournée", "opus-one");
                                    }
                                    ?>
                                </a>
                                <?php if (!empty($ticket_url)) { ?>
                                    <a href="<?= $ticket_url ?>"
                                        class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="event__top">
                            <ul class="event__top-info">
                                <li class="event__top-info__item event__top-info__item--when">
                                    <time>
                                        <?php
                                        if ($representation_info['etat'] != "postponed") {
                                            echo ucfirst(date_i18n('d.m.y', strtotime($representation_info['date_de_la_representation'])));
                                        } else {
                                            if ($representation_info['date_de_report'] == $date) {
                                                echo ucfirst(date_i18n('d.m.y', strtotime($representation_info['date_de_report'])));
                                            } else {
                                                echo "<span class='line-through'>" . ucfirst(date_i18n('d.m.y', strtotime($representation_info['date_de_la_representation']))) . '</span>';
                                            }
                                        }
                                        ?>
                                    </time> <!-- date de l'event -->
                                    <span class="event__hashtag event__hashtag--mobile">
                                                <?php
                                                foreach ($terms as $term) {
                                                    echo '<span>#' . $term->name . '</span>';
                                                }
                                                ?>
                                            </span> <!-- categorie de l event -->
                                </li>
                                <li class="event__top-info__item event__top-info__item--where">
                                    <?php
                                    $location_type = $representation_info['choisir_un_lieu_existant'];

                                    if ($location_type == "oui") {
                                        $location_id = $representation_info['lieux'];
                                        $location = get_term($location_id, "taxonomy-lieu");
                                        $location_name = $location->name;
                                    } else {
                                        $location_name = $representation_info['nom_du_lieu'];
                                        $location_href = $representation_info['url_du_lieu'];
                                    }
                                    $new_location_id = $representation_info['nouveau_lieu'];
                                    if ($new_location_id != "") {
                                        $new_location = get_term($new_location_id, "taxonomy-lieu");
                                        $new_location_name = $new_location->name;
                                        $new_location_href = get_term_link($new_location_id, "taxonomy-lieu");
                                        $location_name = $new_location_name;
                                        $location_href = $new_location_href;
                                    } ?>
                                    <span>

                                    <?php if (!empty($location_href) && is_string($location_href) && $location_type != 'oui'){ ?>
                                    <a href="<?php if (!empty($location_href)) {
                                        echo $location_href;
                                    } ?>" <?php if ($location_type != "oui") {
                                        echo 'target="_blank"';
                                    } ?>>
                                        <?php }
                                        echo $location_name;
                                        if (!empty($location_href) && is_string($location_href) && $location_type != 'oui'){ ?>
                                    </a>
                                <?php } ?>
                                    </span>

                                </li> <!-- le lieux -->
                                <?php
                                if ($representation_info['etat'] != "postponed") {
                                    get_avaibility_txt($avaibility, $representation_info['date_de_report'], $post->ID, $representation_info);
                                } else {
                                    get_avaibility_txt($avaibility, $representation_info['date_de_report'], $post->ID, $representation_info);
                                } ?>
                                <!-- avaibality -->

                                <!-- la liste des reports -->
                                <li class="event__top-info__item">
                                    <ul class="event__postpone">
                                        <?php if ($representation_info['etat'] == "postponed" && $representation_info['date_de_report'] == $date) { ?>
                                            <li class="event__postpone__item">
                                                <svg id="Calque_1" xmlns="http://www.w3.org/2000/svg"
                                                     viewBox="0 0 164.24 128.77">
                                                    <path d="M121.31,128.77v-35.57H46.6c-12.92,0-23.91-4.55-32.99-13.66C4.54,70.43,0,59.45,0,46.6S4.54,22.77,13.61,13.66C22.69,4.56,33.68,0,46.6,0h2.38V14.71h-2.38c-8.88,0-16.41,3.11-22.6,9.34-6.19,6.23-9.29,13.75-9.29,22.55s3.1,16.33,9.29,22.55c6.19,6.23,13.73,9.34,22.6,9.34H121.31V42.92l42.92,42.92-42.92,42.92Z"/>
                                                </svg>
                                                <span><?php echo __(" Report du ") . ucfirst(date_i18n(get_option('date_format'), strtotime($representation_info['date_de_la_representation']))); ?></span>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            </ul>
                            <span class="event__hashtag event__hashtag--desktop">
                                        <?php
                                        foreach ($terms as $term) {
                                            echo '<span>#' . $term->name . '</span>';
                                        }
                                        ?>
                                    </span>
                        </div>
                        <div class="event__bottom">
                            <h3 class="event__title">
                                <?php
                                if ($representation_info['etat'] != "postponed" || ($representation_info['etat'] == "postponed" && $representation_info['date_de_report'] == $date)) { ?>
                                    <a href="<?php echo $url; ?>"
                                       title="<?= get_the_title($post->ID) ?>"> <?php echo get_the_title($post->ID); ?> </a> <?php
                                } else { ?>
                                    <div><?php echo get_the_title($post->ID); ?></div><?php
                                } ?>
                            </h3>
                            <div class="event__call-back event__call-back--desktop">
                                <div class="double-buttons">
                                    <a href="<?= $url ?>" class="double-bouttons__btn double-bouttons__btn--info"
                                       title="">
                                        <?php
                                        if ($nb_futur_show <= 1) {
                                            _e("Informations", "opus-one");
                                        } else {
                                            _e("Informations tournée", "opus-one");
                                        }
                                        ?>
                                    </a>
                                    <?php if (!empty($ticket_url)) { ?>
                                        <a href="<?= $ticket_url ?>"
                                           class="double-bouttons__btn double-bouttons__btn--ticket"
                                           title="">Tickets</a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php
                } elseif ($type == "multidates") {
                    $multidate_different_month = false;
                    $dates = get_field("date_de_la_representation_multidate", $the_id);
                    $nb_dates = count($dates);
                    $representation_info = search_representation($dates, $date);
                    if (!in_array($representation_info['date_de_la_representation'] . str_replace(":", "", $representation_info['heure_debut_de_la_representation']) . $the_id, $array_show_multidate) && $representation_info) {
                        $date_sale = $representation_info['date_de_la_mise_en_vente'];
                        $time_sale = $representation_info['heure_de_la_mise_en_vente'];
                        $date_sale_formated = date_i18n('Y-m-d H:i', strtotime($date_sale . " " . $time_sale));
                        $avaibility = $representation_info['etat']; ?>

                        <li class="event">
                            <div class="event__call-back event__call-back--mobile">
                                <div class="double-buttons">
                                    <a href="<?= get_permalink($post->ID); ?>"
                                        class="double-bouttons__btn double-bouttons__btn--info" title="">
                                        <?php
                                        if ($nb_futur_show <= 1) {
                                            _e("Informations", "opus-one");
                                        } else {
                                            _e("Informations tournée", "opus-one");
                                        }
                                        ?>
                                    </a>
                                    <?php if (!empty($ticket_url)) { ?>
                                        <a href="<?= $ticket_url ?>"
                                            class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="event__top">
                                <ul class="event__top-info">
                                    <li class="event__top-info__item event__top-info__item--when">
                                        <time>
                                            <?php
                                            $nb_representation = count($dates);
                                            $today = date("Ymd");
                                            foreach ($dates as $date) {
                                                if ($date['date_de_la_representation'] >= $today) {
                                                    $first_date = $date['date_de_la_representation'];
                                                    break;
                                                }
                                            }
                                            $last_date = $dates[$nb_representation - 1]['date_de_la_representation'];
                                            $month_first_date = date_i18n('M', strtotime($first_date));
                                            $month_last_date = date_i18n('M', strtotime($last_date));
                                            $year_first_date = date_i18n('Y', strtotime($first_date));
                                            $year_last_date = date_i18n('Y', strtotime($last_date));
                                            if ($first_date != $last_date) {
                                                if ($month_first_date == $month_last_date && $year_first_date == $year_last_date) {
                                                    echo __("Du ", "opus-one") . date_i18n('j', strtotime($first_date)) . __(" au ") . date_i18n('j F Y', strtotime($last_date));
                                                }
                                                if ($month_first_date != $month_last_date && $year_first_date == $year_last_date) {
                                                    echo __("Du ", "opus-one") . date_i18n('j M', strtotime($first_date)) . __(" au ") . date_i18n('j M Y', strtotime($last_date));
                                                }
                                                if ($month_first_date != $month_last_date && $year_first_date != $year_last_date) {
                                                    echo __("Du ", "opus-one") . date_i18n('j M Y', strtotime($first_date)) . __(" au ") . date_i18n('j M Y', strtotime($last_date));
                                                }
                                            } else {
                                                echo ucfirst(date_i18n('D j F Y', strtotime($first_date)));
                                            }
                                            ?>
                                        </time> <!-- date de l'event -->
                                        <span class="event__hashtag event__hashtag--mobile">
                                                    <?php
                                                    foreach ($terms as $term) {
                                                        echo '<span>#' . $term->name . '</span>';
                                                    }
                                                    ?>
                                                </span> <!-- categorie de l event -->
                                    </li>
                                    <li class="event__top-info__item event__top-info__item--where">
                                        <?php
                                        $location_type = $representation_info['choisir_un_lieu_existant'];

                                        if ($location_type == "oui") {
                                            $location_id = $representation_info['lieux'];
                                            $location = get_term($location_id, "taxonomy-lieu");
                                            $location_name = $location->name;
                                        } else {
                                            $location_name = $representation_info['nom_du_lieu'];
                                            $location_href = $representation_info['url_du_lieu'];
                                        }
                                        $new_location_id = $representation_info['nouveau_lieu'];
                                        if ($new_location_id != "") {
                                            $new_location = get_term($new_location_id, "taxonomy-lieu");
                                            $new_location_name = $new_location->name;
                                            $new_location_href = get_term_link($new_location_id, "taxonomy-lieu");
                                            $location_name = $new_location_name;
                                            $location_href = $new_location_href;
                                        } ?>
                                        <span>

                                                    <?php if (!empty($location_href) && is_string($location_href) && $location_type != 'oui'){ ?>
                                                        <a href="<?php if (!empty($location_href)) {
                                                            echo $location_href;
                                                        } ?>" <?php if ($location_type != "oui") {
                                                            echo 'target="_blank"';
                                                        } ?>>
                                                        <?php }
                                                        echo $location_name;

                                                        if (!empty($location_href) && is_string($location_href) && $location_type != 'oui'){ ?>
                                                        </a>
                                                    <?php } ?>
                                                </span>
                                    </li> <!-- le lieux -->
                                </ul>
                                <span class="event__hashtag event__hashtag--desktop">
                                            <?php
                                            foreach ($terms as $term) {
                                                echo '<span>#' . $term->name . '</span>';
                                            }
                                            ?>
                                        </span>
                            </div>
                            <div class="event__bottom">
                                <h3 class="event__title">
                                    <a href="<?= get_permalink($post->ID); ?>"
                                       title="<?= get_the_title($post->ID) ?>"> <?php echo get_the_title($post->ID); ?> </a>
                                </h3>
                                <div class="event__call-back event__call-back--desktop">
                                    <div class="double-buttons">
                                        <a href="<?= get_permalink($post->ID); ?>"
                                           class="double-bouttons__btn double-bouttons__btn--info" title="">
                                            <?php
                                            if ($nb_futur_show <= 1) {
                                                _e("Informations", "opus-one");
                                            } else {
                                                _e("Informations tournée", "opus-one");
                                            }
                                            ?>
                                        </a>
                                        <?php if (!empty($ticket_url)) { ?>
                                            <a href="<?= $ticket_url ?>"
                                               class="double-bouttons__btn double-bouttons__btn--ticket" title="">Tickets</a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </li>


                        <?php
                    }
                }
            }
            } ?>
        </ul>
    </div>
    <div class="next-dates"></div>
    <div class="loader-agenda">
        <svg

    viewBox="0 0 200 200"
    color="#3f51b5"
    fill="none"
    xmlns="http://www.w3.org/2000/svg"
    >
    <defs>
        <linearGradient id="spinner-secondHalf">
        <stop offset="0%" stop-opacity="0" stop-color="white" />
        <stop offset="100%" stop-opacity="0.5" stop-color="white" />
        </linearGradient>
        <linearGradient id="spinner-firstHalf">
        <stop offset="0%" stop-opacity="1" stop-color="white" />
        <stop offset="100%" stop-opacity="0.5" stop-color="white" />
        </linearGradient>
    </defs>

    <g stroke-width="8">
        <path stroke="url(#spinner-secondHalf)" d="M 4 100 A 96 96 0 0 1 196 100" />
        <path stroke="url(#spinner-firstHalf)" d="M 196 100 A 96 96 0 0 1 4 100" />

        <!-- 1deg extra path to have the round end cap -->
        <path
        stroke="white"
        stroke-linecap="round"
        d="M 4 100 A 96 96 0 0 1 4 98"
        />
    </g>
    </svg>
    </div>
    </main>
        </div>
<?php endwhile;
endif; ?>
    <?php get_footer(); ?>