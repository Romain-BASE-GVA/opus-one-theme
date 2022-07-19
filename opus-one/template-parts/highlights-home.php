<section class="section section--highlights" style="--section-color: #fff; --current-bg-color: #6E32FF;">
    <h3 class="section__title">Sous le feu des projecteurs</h3>
    <?php $nextFiveShows = get_next_shows(5); ?>
    <div class="highlights">
        <ul class="event-list">
            <?php
            foreach ($nextFiveShows as $show) {
                $date = $show['meta_value'];
                $post = get_post($show['ID']);
                $next_date = substr($date, 0, 6);
                $type = get_field("type", $post->ID);
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
                                <a href="<?= $url ?>" class="double-bouttons__btn double-bouttons__btn--info"
                                   title="<?= __('Informations') ?>"><?= __('Informations') ?></a>
                                <?php if (!empty($ticket_url)) { ?>
                                    <a href="<?= $ticket_url ?>"
                                       class="double-bouttons__btn double-bouttons__btn--ticket"
                                       title="<?= __('Tickets', 'opus-one') ?>"><?= __('Tickets', 'opus-one') ?></a>
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
                                    <?php $location_type = $representation_info['choisir_un_lieu_existant'];
                                    if ($location_type == "oui") {
                                        $location_id = $representation_info['lieux'];
                                        $location = get_term($location_id, "taxonomy-lieu");
                                        $location_name = $location->name;
                                        $location_href = get_term_link($location_id, "taxonomy-lieu");
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
                                        <?php if (!empty($location_href) && is_string($location_href) && $location_type != 'oui') { ?>
                                            <a href="<?php if (!empty($location_href)) {
                                                echo $location_href;
                                            } ?>" <?php if ($location_type != "oui") {
                                                echo 'target="_blank"';
                                            } ?>>
                                            <?php }
                                            echo $location_name;
                                            if (!empty($location_href) && is_string($location_href) && $location_type != 'oui') { ?>
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
                                <ul class="event__top-info__item event__postpone">
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
                                       title="<?= __('Informations') ?>">
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
                                           title="<?= __('Tickets', 'opus-one') ?>"><?= __('Tickets', 'opus-one') ?></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php
                }
            }
            ?>
        </ul>
    </div>
</section>