<?php get_header();
while ( have_posts() ) : the_post();
    $current_post = $post;
    $show_in_sidebar = false;
    $today = date_i18n("Ymd");
    $date = get_query_var('date');
    $type = get_field("type");
    $catType = get_the_terms( $post->ID , 'taxonomy-types' );
    $couleur = get_field('couleur', 'taxonomy-types_' . $catType[0]->term_id);
    $tournee = get_field("nom_de_la_tournee");
    $post_artists = get_posts($args_post_artists);
    if($type == "plusieurs_dates"){
        $dates = get_field("date_unique_ou_separee");
    }elseif($type == "multidates"){
        $dates = get_field("date_de_la_representation_multidate");
    }
    if(!$date){
        $representation_info = get_next_show($post->ID);
        if($representation_info['etat'] == "postponed"){
            $date = $representation_info['date_de_report'];
        }else{
            $date = $representation_info['date_de_la_representation'];
        }
        if(!$representation_info){
            $terms = wp_get_post_terms($post->ID, "taxonomy-artistes");
            if($terms){
                $args_post_artists = array(
                    'posts_per_page' => -1,
                    'taxonomy-artistes' => $terms[0]->slug,
                    'post_type' => 'representation'
                );
                $dates = get_artists_show($post_artists, $date);
                foreach($dates as $representation){
                    if($representation['date_de_la_representation'] >= $today){
                        $representation_info = $representation;
                        break;
                    }
                }
            }
        }
    }else{
        $representation_info = search_representation($dates, $date);
        if(!$representation_info){
            $representation_info = get_next_show($post->ID);
        }
    }
    if($type == "plusieurs_dates"){
        $location_type =  isset($representation_info['choisir_un_lieu_existant'] ) ? $representation_info['choisir_un_lieu_existant'] : NULL;
        if($location_type == "oui"){
            $location_id = $representation_info['lieux'];
            $location = get_term($location_id, "taxonomy-lieu");
            $location_name = $location->name;
            $location_href = get_term_link($location_id, "taxonomy-lieu");
        }else{
            $location_name = isset($representation_info['nom_du_lieu']) ? $representation_info['nom_du_lieu'] : NULL;
            $location_href = isset($representation_info['url_du_lieu']) ? $representation_info['url_du_lieu'] : NULL;
        }
    }elseif($type == "multidates"){
        $location_type = get_field("choisir_un_lieu_existant");
        if($location_type == "oui"){
            $location_id = get_field("lieu");
            $location = get_term($location_id, "taxonomy-lieu");
            if($location){
                $location_name = isset($location->name) ? $location->name : NULL;
                $location_href = get_term_link($location_id, "taxonomy-lieu");
            }
        }else{
            $location_name = get_field("nom_du_lieu");
            $location_href = get_field("url_du_lieu");
        }
    }
    $avaibility = $representation_info['etat'];
    if(!$date){
        $date = $representation_info['date_de_la_representation'];
    }
    $date_sale = $representation_info['date_de_la_mise_en_vente'];
    $time_sale = $representation_info['heure_de_la_mise_en_vente'];
    $date_sale_formated = date_i18n( 'Y-m-d H:i', strtotime($date_sale." ".$time_sale));
    $now = date_i18n( 'Y-m-d H:i');
    $date_de_report =  isset($representation_info['date_de_report'] ) ? $representation_info['date_de_report'] : NULL;
?>

<div data-barba="container" data-barba-namespace="representation" data-bg="<?php echo $couleur; ?>" data-text-color="#fff" data-logo-title="Présente" data-event-title="<?php the_title(); ?>">
    <header class="header header--single-event">
        <div class="header-tickets">
            <div class="one-ticket">
                <a href="" title="Angele : Geneve - Palexpo"><span>Angele : Geneve - Palexpo</span></a>
                <time datetime="" class="one-ticket__date">10.02.22</time>
                <div class="">
                    <div><span>Angele : Geneve - Palexpo</span></div>
                </div>
                <div class="one-ticket__price">
                    Dès 49.-
                    <span class="one-ticket__icon">
              <svg id="Calque_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 210 100">
                <defs>
                  <style>
                    .cls-1 {
                        fill: #fff;
                        fill-rule: evenodd;
                    }
                  </style>
                </defs>
                <path class="cls-1"
                      d="M210,0h-70.04V22.82h-13.05V0H0V100H126.91v-22.82h13.05v22.82h70.04V0ZM127.39,38.61v22.77h12.94v-22.77h-12.94Z" />
              </svg>
            </span>
                </div>
            </div>
            <button class="header-tickets__trigger" title="Voir les autres dates">Voir les autres dates</button>
            <div class="header-tickets__list">
                <ul class="ticket-list">
                    <li class="one-ticket">
                        <a href="" title="Angele : Geneve - Palexpo"><span>Angele : Geneve - Palexpo</span></a>
                        <time datetime="" class="one-ticket__date">10.02.22</time>
                        <div class="">
                            <div><span>Angele : Geneve - Palexpo</span></div>
                        </div>
                        <div class="one-ticket__price">
                            Dès 49.-
                            <span class="one-ticket__icon">
                  <svg id="Calque_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 210 100">
                    <defs>
                      <style>
                        .cls-1 {
                            fill: #fff;
                            fill-rule: evenodd;
                        }
                      </style>
                    </defs>
                    <path class="cls-1"
                          d="M210,0h-70.04V22.82h-13.05V0H0V100H126.91v-22.82h13.05v22.82h70.04V0ZM127.39,38.61v22.77h12.94v-22.77h-12.94Z" />
                  </svg>
                </span>
                        </div>
                    </li>
                    <li class="one-ticket">
                        <a href="" title="Angele : Geneve - Palexpo"><span>Angele : Geneve - Palexpo</span></a>
                        <time datetime="" class="one-ticket__date">10.02.22</time>
                        <div class="">
                            <div><span>Angele : Geneve - Palexpo</span></div>
                        </div>
                        <div class="one-ticket__price">
                            Dès 49.-
                            <span class="one-ticket__icon">
                  <svg id="Calque_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 210 100">
                    <defs>
                      <style>
                        .cls-1 {
                            fill: #fff;
                            fill-rule: evenodd;
                        }
                      </style>
                    </defs>
                    <path class="cls-1"
                          d="M210,0h-70.04V22.82h-13.05V0H0V100H126.91v-22.82h13.05v22.82h70.04V0ZM127.39,38.61v22.77h12.94v-22.77h-12.94Z" />
                  </svg>
                </span>
                        </div>
                    </li>
                    <li class="one-ticket">
                        <a href="" title="Angele : Geneve - Palexpo"><span>Angele : Geneve - Palexpo</span></a>
                        <time datetime="" class="one-ticket__date">10.02.22</time>
                        <div class="">
                            <div><span>Angele : Geneve - Palexpo</span></div>
                        </div>
                        <div class="one-ticket__price">
                            Dès 49.-
                            <span class="one-ticket__icon">
                  <svg id="Calque_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 210 100">
                    <defs>
                      <style>
                        .cls-1 {
                            fill: #fff;
                            fill-rule: evenodd;
                        }
                      </style>
                    </defs>
                    <path class="cls-1"
                          d="M210,0h-70.04V22.82h-13.05V0H0V100H126.91v-22.82h13.05v22.82h70.04V0ZM127.39,38.61v22.77h12.94v-22.77h-12.94Z" />
                  </svg>
                </span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="header-carousel">
            <!-- @TODO : L'ancien site n'a qu'une seule image en "banner", donc pas de caroussel -->
            <?php
                $banner = get_field('banner');
            ?>
            <div class="header-carousel__item">
                <img class="header-carousel__img" src="<?= $banner['url'] ?>" alt="">
            </div>
        </div>
    </header>
    <main class="main main--single-event">
        <div class="single-event">
            <div class="single-event__side single-event__side--main">
                <div class="single-event__main-content">
                    <header class="single-event__header">
                        <h1 class="single-event__title"><?php the_title(); ?></h1>
                        <?php if(!empty($tournee)) { ?>
                            <div class="single-event__tour"><?= $tournee ?></div>
                        <?php } ?>
                        <div class="single-event__style">
                            <span><?= __('Style', 'opus-one') ?></span>
                            <?php
                                $terms = wp_get_post_terms($post->ID, "taxonomy-representation");
                                foreach($terms as $key => $value){
                                    if($value->name != "VIP"){
                                        echo '<span class="single-event__hashtag">#'.$value->name.'</span>';
                                        $term = isset($terms[intval($key)+1] ) ? $terms[intval($key)+1]  : NULL;
                                        if($term != ""){
                                            echo "<br/>";
                                        }
                                    }
                                }
                            ?>
                        </div>
                    </header>

                    <ul class="event-card-list">

                        <li class="event-card">
                            <?php if($representation_info['etat'] != "postponed"){
                                $date_de_report = isset($representation_info['date_de_report'] ) ? $representation_info['date_de_report']  : NULL;
                                get_avaibility_txt($avaibility, $date_de_report, $post->ID, $representation_info, true);
                            }else{
                                if($representation_info['date_de_report'] == $date){
                                    echo '<span class="icon-postponement" style="color:#FFF;"></span><span style="color:#FFF;" class="txt-postponed">'.__(" Report du "). ucfirst(date_i18n(get_option('date_format' ), strtotime($representation_info['date_de_la_representation']))).'</span>';
                                }else{
                                    get_avaibility_txt($avaibility, $representation_info['date_de_report'], $post->ID, $representation_info, true);
                                }
                            } ?>
                            <time class="event-card__date">
                                <?php
                                if($representation_info['etat'] == "postponed"){
                                    if($representation_info['date_de_report'] == $date){
                                        echo ucfirst(date_i18n('D d M Y', strtotime($representation_info['date_de_report'])));
                                    }else{
                                        echo "<span class='line-through'>".ucfirst(date_i18n('D d M Y', strtotime($representation_info['date_de_la_representation']))).'</span>';
                                    }
                                }else{
                                    $post_id = isset($representation_info['post_id'] ) ? $representation_info['post_id'] : NULL;
                                    if(get_field("nom_de_la_tournee") == get_field("nom_de_la_tournee", $post_id)){
                                        echo ucfirst(date_i18n('D d M Y', strtotime($representation_info['date_de_la_representation'])));
                                    }else{ ?>
                                        <span class="start"><?php echo __(" Aucune représentation prévue pour l'instant");?></span><?php
                                    }
                                }
                                ?>
                            </time>
                            <div class="event-card__door">
                                <?php
                                if($representation_info['etat'] != "postponed" || $representation_info['date_de_report'] == $date){
                                    if($representation_info['heure_douverture_des_portes']){
                                        $hour_door = $representation_info['heure_douverture_des_portes'];
                                        echo '<span>'.__("Portes ").$hour_door."</span>";
                                    }
                                    if($representation_info['heure_debut_de_la_representation']){
                                        echo '<span>'.__("Début ").$representation_info['heure_debut_de_la_representation'].'</span>';
                                    }
                                }
                                ?>
                            </div>

                            <!-- @TODO : Le lieux est un lien, il est donc maintenant surligné à enlever dans le CSS --->
                            <?php if(is_string($location_name)){ ?>
                                <a class="event-card__where" href="<?= $location_href ?>"><?= $location_name ?></a>
                            <?php } ?>

                            <?php
                            if(($avaibility == 'available' && $date >= $today) || ($avaibility == 'postponed' && $date >= $today)){
                                if(!$representation_info['fnac_ch'] && !$representation_info['autre_billeterie'] && $representation_info['vip'] == "non"){
                                    if($representation_info['prix_le_plus_eleve']){
                                        echo '<a href="'.$representation_info['ticketcorner'].'" target="_blank" class="event-card__cta">'.__("Réserver Dès ", "opus-one").$representation_info['prix_le_plus_bas'].'.-</a>';
                                    }else{
                                        if($representation_info['prix_le_plus_bas']){
                                            echo '<a href="'.$representation_info['ticketcorner'].'" target="_blank" class="event-card__cta">'.__("Réserver Dès ", "opus-one").$representation_info['prix_le_plus_bas'].'.-</a>';
                                        }else{
                                            _e("à venir", "opus-one");
                                        }
                                    }
                                }else{
                                    /** @TODO : Ajouter moyen de payement autre billeterie Tooltip */
                                }
                            }
                            ?>
                        </li>

                    </ul>

                    <!-- @TODO: J'ai echo les différents fields existant, à toi de voir comment appliquer ton style dessus -->

                    <?php
                    $title_h2 = get_field('titre_h2');
                    $chapo = get_field('chapo');
                    $content = get_the_content();
                    ?>

                    <div class="block block--title">
                        <p><?= $title_h2 ?></p>
                    </div>
                    <div class="block block--chapo">
                        <?= $chapo ?>
                    </div>
                    <div class="block block--text">
                        <p><?= $content ?></p>
                    </div>

                    <div class="block block--list-of-list">
                        <ul class="list-of-list">

                            <?php
                            $prod = get_field("production");
                            if($prod){ ?>
                                <li class="list-of-list__item">
                                    <span class="list-of-list__title"><?= __('Productions', 'opus-one') ?></span>
                                    <ul class="list-of-list__sub-list"><?php
                                        foreach($prod as $key => $value){
                                            echo '<li class="list-of-list__sub-item"><span>'.$value['nom_prod'].'</span></li>';
                                            $nom_prod = isset($prod[intval($key)+1] ) ? $prod[intval($key)+1]  : NULL;
                                        } ?>
                                    </ul>
                                </li>
                            <?php } ?>

                            <?php
                            $partners = get_field("partenaire");
                            if($partners && !empty($partners[0]['nom'])){ ?>
                                <li class="list-of-list__item">
                                    <span class="list-of-list__title"><?= __('Partenaires', 'opus-one') ?></span>
                                    <ul class="list-of-list__sub-list"><?php
                                        foreach($partners as $key => $value){
                                            echo '<li class="list-of-list__sub-item"><span>'.$value['nom'].'</span></li>';
                                            $partner = isset($partners[intval($key)+1] ) ? $partners[intval($key)+1]  : NULL;
                                        } ?>
                                    </ul>
                                </li>
                            <?php } ?>

                            <?php
                            $website = get_field("url_artist");
                            if($website){ ?>
                                <li class="list-of-list__item">
                                    <span class="list-of-list__title"><?= __('Site Officiel', 'opus-one') ?></span>
                                    <ul class="list-of-list__sub-list">
                                        <li class="list-of-list__sub-item"><a href="<?= $website ?>" target="_blank "><?= $website ?></a></li>
                                    </ul>
                                </li>
                            <?php }
                                $my_artist_id = get_field("artistes");
                                $my_artist = get_term_by("id", $my_artist_id, 'taxonomy-artistes');
                                $facebook_artist = get_field("facebook", $my_artist);
                                $youtube_artist = get_field("youtube", $my_artist);
                                $instagram_artist = get_field("instagram", $my_artist);
                                $google_artist = get_field("google+", $my_artist);
                                $twitter_artist = get_field("twitter", $my_artist);
                                $snapchat_artist = get_field("snapchat", $my_artist);
                                $spotify_artist = get_field("spotify", $my_artist);

                                if($facebook_artist || $youtube_artist || $instagram_artist || $google_artist || $twitter_artist || $snapchat_artist || $spotify_artist){ ?>
                                    <li class="list-of-list__item">
                                        <span class="list-of-list__title"><?= __('Réseaux Sociaux', 'opus-one') ?></span>
                                        <ul class="list-of-list__sub-list">
                                            <?php if($facebook_artist){ ?>
                                                <li class="list-of-list__sub-item"><a href="<?php echo $facebook_artist; ?>">Facebook</a></li><?php
											} ?>
                                            <?php if($youtube_artist){ ?>
                                                <li class="list-of-list__sub-item"><a href="<?php echo $youtube_artist; ?>">Youtube</a></li><?php
											} ?>
                                            <?php if($instagram_artist){ ?>
                                                <li class="list-of-list__sub-item"><a href="<?php echo $instagram_artist; ?>">Instagram</a></li><?php
											} ?>
                                            <?php if($google_artist){ ?>
                                                <li class="list-of-list__sub-item"><a href="<?php echo $google_artist; ?>">Google</a></li><?php
											} ?>
                                            <?php if($twitter_artist){ ?>
                                                <li class="list-of-list__sub-item"><a href="<?php echo $twitter_artist; ?>">Twitter</a></li><?php
											} ?>
                                            <?php if($snapchat_artist){ ?>
                                                <li class="list-of-list__sub-item"><a href="<?php echo $snapchat_artist; ?>">Snapchat</a></li><?php
											} ?>
                                            <?php if($spotify_artist){ ?>
                                                <li class="list-of-list__sub-item"><a href="<?php echo $spotify_artist; ?>">Spotify</a></li><?php
											} ?>
                                        </ul>
                                    </li>
                                <?php } ?>
                        </ul>
                    </div>
                    <div class="block block--other-dates">
                        <span><?php
                        $first_date = array();
                        if($type == "plusieurs_dates" && count($dates) < 1){
                            _e("Autres dates disponibles");
                        }elseif($type == "multidates" && count($dates) < 1){
                            $nb_representation = count($dates);
                            $today = date("Ymd");
                            foreach($dates as $date){
                                if($date['date_de_la_representation'] >= $today){
                                    $first_date = $date['date_de_la_representation'];
                                    break;
                                }
                            };
                            $index = 0;
                            foreach($dates as $date){
                                if($date['date_de_la_representation'] <= $today && $date['date_de_report'] <= $today){
                                    unset($dates[$index]);
                                }
                                $index++;
                            };
                            $dates = array_values($dates);
                            $last_element = count($dates);
                            $last_date = isset($dates[$last_element-1]['date_de_la_representation'] ) ? $dates[$last_element-1]['date_de_la_representation']  : NULL;
                            if(!$first_date){
                                $first_date = isset($dates[0]['date_de_la_representation'] ) ? $dates[0]['date_de_la_representation']  : NULL;
                            }
                            $month_first_date = date_i18n('M', strtotime($first_date));
                            $month_last_date = date_i18n('M', strtotime($last_date));
                            $year_first_date = date_i18n('Y', strtotime($first_date));
                            $year_last_date = date_i18n('Y', strtotime($last_date));
                            if($first_date != $last_date){
                                if(count($post_artists) > 1){
                                    if($month_first_date == $month_last_date && $year_first_date == $year_last_date){
                                        echo __("Du ","ergopix").date_i18n('j', strtotime($first_date)).__(" au ").date_i18n('j F Y', strtotime($last_date));
                                    }
                                    if($month_first_date != $month_last_date && $year_first_date == $year_last_date){
                                        echo __("Du ","ergopix").date_i18n('j M', strtotime($first_date)).__(" au ").date_i18n('j M Y', strtotime($last_date));
                                    }
                                    if($month_first_date != $month_last_date && $year_first_date != $year_last_date){
                                        echo __("Du ","ergopix").date_i18n('j M Y', strtotime($first_date)).__(" au ").date_i18n('j M Y', strtotime($last_date));
                                    }
                                }else{
                                    if($month_first_date == $month_last_date && $year_first_date == $year_last_date){
                                        echo __("Du ","ergopix").date_i18n('j', strtotime($first_date)).__(" au ").date_i18n('j F Y', strtotime($last_date));
                                    }
                                    if($month_first_date != $month_last_date && $year_first_date == $year_last_date){
                                        echo __("Du ","ergopix").date_i18n('j M', strtotime($first_date)).__(" au ").date_i18n('j M Y', strtotime($last_date));
                                    }
                                    if($month_first_date != $month_last_date && $year_first_date != $year_last_date){
                                        echo __("Du ","ergopix").date_i18n('j M Y', strtotime($first_date)).__(" au ").date_i18n('j M Y', strtotime($last_date));
                                    }
                                }
                            }
                        }
                        $index = 0;
                        $datestotestarray = $dates;?>
                        </span>
                            <ul class="event-card-list">

                                    <?php
									$tmp_post = $post;
									$location_href_tmp = $location_href;
									// SUPPRESSION DE DOUBLONS
									$array_for_test = array();
									$index = 0;
									foreach($dates as $date1){
										$array_for_test[$index] = $date1['date_de_la_representation'].$date1['heure_debut_de_la_representation'];
										$index++;
									}
									$new_array_date = array();
									$array_to_unset = array();
									$index = 0;
									foreach($array_for_test as $value){
										if(!in_array($value,$new_array_date)){
											$new_array_date[] = $value;
										}else{
											$array_to_unset[] = $index;
										}
										$index++;
									}
									foreach($array_to_unset as $index_to_unset){
										unset($dates[$index_to_unset]);
									}
									// END
									foreach($dates as $key => $value){
										$today = date("Ymd");
										if(($value['date_de_la_representation'] != $date) && $value['date_de_la_representation'] >= $today || ($value['heure_debut_de_la_representation'] != $representation_info['heure_debut_de_la_representation'] && $value['date_de_la_representation'] >= $today) || $value['date_de_report'] >= $today){
											$avaibility = $value['etat']; ?>

											<li class="event-card <?php if($avaibility != 'available'){ echo 'not-available'; } ?>">
												<div class="avaibility"><?php
													$date_de_report= isset($value['date_de_report'] ) ? $value['date_de_report'] : NULL;
													get_avaibility_txt($avaibility, $date_de_report, $post->ID, $value, true); ?>
												</div><!-- .avaibility -->

                                                <time class="event-card__date"><?php
													if(count($post_artists) > 1){
														$post_id = isset($value['post_id'] ) ? $value['post_id'] : NULL;
														$post = get_post($post_id);
														setup_postdata($post);
														if($value['etat'] == "postponed"){ ?>
															<?php echo ucfirst(date_i18n('D d M Y', strtotime($value['date_de_la_representation'])));
														}else{ ?>
															<?php echo ucfirst(date_i18n('D d M Y', strtotime($value['date_de_la_representation'])));
														}
														$post = $tmp_post;
														setup_postdata($post);
													}else{ ?>
														<a href="<?php echo get_permalink($post->ID).$value['date_de_la_representation']."/"?>"><?php echo ucfirst(date_i18n(get_option('date_format' ), strtotime($value['date_de_la_representation']))); ?></a><?php
													} ?>
												</time><!-- .date -->

												<div class="event-card__door">
													<?php
														if(count($post_artists) > 1){
															$post_id = isset($value['post_id'] ) ? $value['post_id'] : NULL;
															$post = get_post($post_id);
															setup_postdata($post);
															if($value['heure_douverture_des_portes']){
																$hour_door = $value['heure_douverture_des_portes'];
																echo '<span>'.__("Portes ").$hour_door.'</span>';
															}
															if($value['heure_debut_de_la_representation']){
																echo '<span>'.__("Début ").$value['heure_debut_de_la_representation'].'</span>';
															}
															$post = $tmp_post;
															setup_postdata($post);
														}else{
															if($value['heure_douverture_des_portes']){
																$hour_door = $value['heure_douverture_des_portes'];
																echo '<span>'.__("Portes ").$hour_door."</span>";
															}
															if($value['heure_debut_de_la_representation']){
																echo '<span>'.__("Début ").$value['heure_debut_de_la_representation'].'</span>';
															}
														}
													?>
												</div><!-- .start -->
												<div class="location"><?php
													if(count($post_artists) > 1){
														$post_id = isset($value['post_id'] ) ? $value['post_id'] : NULL;
														$post = get_post($post_id);
														setup_postdata($post);
														$type = get_field("type");
														$location_name_tmp = $location_name;
														if($type == "plusieurs_dates"){
															$location_type = $value['choisir_un_lieu_existant'];
															if($location_type == "oui"){
																$nouveau_lieu = $value['nouveau_lieu'];
																if($nouveau_lieu){
																	$location_id_new = $value['nouveau_lieu'];
																	$location_new = get_term($location_id_new, "taxonomy-lieu");
																	$location_name_new = $location_new->name;
																	$location_href_new = get_term_link($location_id_new, "taxonomy-lieu");
																}
																$location_id = $value['lieux'];
																$location = get_term($location_id, "taxonomy-lieu");
																$location_name = $location->name;
																$location_href = get_term_link($location_id, "taxonomy-lieu");
															}else{
																$location_name = $value['nom_du_lieu'];
																$location_href = $value['url_du_lieu'];
															}
														}elseif($type == "multidates"){
															$location_type = get_field("choisir_un_lieu_existant");
															if($location_type == "oui"){
																$location_id = get_field("lieu");
																$location = get_term($location_id, "taxonomy-lieu");
																$location_name = $location->name;
																$location_href = get_term_link($location_id, "taxonomy-lieu");
															}else{
																$location_name = get_field("nom_du_lieu");
																$location_href = get_field("url_du_lieu");
															}
														}
														$post = $tmp_post;
														setup_postdata($post);
													}else{
														$location_name_tmp = $location_name;
														if($type == "plusieurs_dates"){
															$location_type = $value['choisir_un_lieu_existant'];
															if($location_type == "oui"){
																$location_id = $value['lieux'];
																$location = get_term($location_id, "taxonomy-lieu");
																$location_name = $location->name;
																$location_href = get_term_link($location_id, "taxonomy-lieu");
															}else{
																$location_name = $value['nom_du_lieu'];
																$location_href = $value['url_du_lieu'];
															}
														}elseif($type == "multidates"){
															$location_type = get_field("choisir_un_lieu_existant");
															if($location_type == "oui"){
																$location_id = get_field("lieu");
																$location = get_term($location_id, "taxonomy-lieu");
																$location_name = $location->name;
																$location_href = get_term_link($location_id, "taxonomy-lieu");
															}else{
																$location_name = get_field("nom_du_lieu");
																$location_href = get_field("url_du_lieu");
															}
														}
														}
													if($nouveau_lieu && is_string($location_name_new)){ ?>
                                                        <div class="event-card__where"><a href="<?php echo $location_href_new; ?>"><?php echo $location_name_new; $location_name = $location_name_new; ?></a></div> <?php
													}elseif(is_string($location_name)){ ?>
                                                        <div class="event-card__where"><a href="<?= $location_href ?>" <?php if($location_type != "oui"){echo 'target="_blank"';}?>><?php echo $location_name; $location_name = $location_name_tmp; ?></a></div> <?php
													} ?>
												</div><!-- .location --><?php
												$date_sale = $value['date_de_la_mise_en_vente'];
												$time_sale = $value['heure_de_la_mise_en_vente'];
												$date_sale_formated = date_i18n( 'Y-m-d H:i', strtotime($date_sale." ".$time_sale));
												if($now >= $date_sale_formated){
													if($avaibility == 'available' || $avaibility == 'postponed'){
                                                        $ticket_link = get_ticket_link($value);
                                                        if($ticket_link != null){ ?>
                                                            <a class="event-card__cta" href="<?php echo $ticket_link ?>" target="_blank">
                                                                <span class="btn-reservation-sidebar <?php if(!$value['prix_le_plus_bas']){echo "no-price";} if($post->ID == 22663 && $value["date_de_report"] == "20200509"){echo " hidden";} ?>"><?php
                                                                if($value['prix_le_plus_eleve']){
                                                                    echo __("Réserver")." <span class='from'>".__("Dès ")."</span><span class='price'>".$value['prix_le_plus_bas'];
                                                                    if(!is_float($value['prix_le_plus_bas'])){
                                                                        echo ".-";
                                                                    }
                                                                    echo "</span>";
                                                                }else {
                                                                    if ($value['prix_le_plus_bas']) {
                                                                        echo __("Réserver") . " / <span class='price'>" . $value['prix_le_plus_bas'];
                                                                        if (!is_float($value['prix_le_plus_bas'])) {
                                                                            echo ".-";
                                                                        }
                                                                    } else {
                                                                        _e("à venir", "opus-one");
                                                                    }
                                                                }?>
                                                            </a><?php
                                                        }
												    }
                                                }?>
											</li><!-- .sidebar-block --><?php
										}
									}
									$post = $tmp_post;
									setup_postdata($post);?>
                            </ul>
                    </div>
                </div>
            </div>

            <aside class="single-event__side single-event__side--ticket">
                <div>
                    <ul class="ticket-list">
                        <?php
                        foreach($dates as $key => $value){
                            $today = date("Ymd");
                            if($value['date_de_la_representation'] >= $today || ($value['heure_debut_de_la_representation'] != $representation_info['heure_debut_de_la_representation'] && $value['date_de_la_representation'] >= $today) || $value['date_de_report'] >= $today){
                                $avaibility = $value['etat'];

                                if($avaibility == 'available'){

                                    echo '<li class="one-ticket">';

                                    $date_sale = $value['date_de_la_mise_en_vente'];
                                    $time_sale = $value['heure_de_la_mise_en_vente'];
                                    $date_sale_formated = date_i18n( 'Y-m-d H:i', strtotime($date_sale." ".$time_sale));
                                    if($now >= $date_sale_formated){
                                        if($avaibility == 'available' || $avaibility == 'postponed'){
                                            $ticket_link = get_ticket_link($value); ?>
                                            <a href="<?php echo $ticket_link ?>" target="_blank"></a>
                                        <time datetime class="one-ticket__date"><?php
                                            if(count($post_artists) > 1){
                                                $post_id = isset($value['post_id'] ) ? $value['post_id'] : NULL;
                                                $post = get_post($post_id);
                                                setup_postdata($post);
                                                if($value['etat'] == "postponed"){ ?>
                                                    <?php echo ucfirst(date_i18n('d.m.y', strtotime($value['date_de_la_representation'])));
                                                }else{ ?>
                                                    <?php echo ucfirst(date_i18n('d.m.y', strtotime($value['date_de_la_representation'])));
                                                }
                                                $post = $tmp_post;
                                                setup_postdata($post);
                                            }else{ ?>
                                                <?php echo ucfirst(date_i18n('d.m.y', strtotime($value['date_de_la_representation'])));
                                            } ?>
                                        </time><!-- .date -->

                                   <?php
                                        if(count($post_artists) > 1){
                                            $post_id = isset($value['post_id'] ) ? $value['post_id'] : NULL;
                                            $post = get_post($post_id);
                                            setup_postdata($post);
                                            $type = get_field("type");
                                            $location_name_tmp = $location_name;
                                            if($type == "plusieurs_dates"){
                                                $location_type = $value['choisir_un_lieu_existant'];
                                                if($location_type == "oui"){
                                                    $nouveau_lieu = $value['nouveau_lieu'];
                                                    if($nouveau_lieu){
                                                        $location_id_new = $value['nouveau_lieu'];
                                                        $location_new = get_term($location_id_new, "taxonomy-lieu");
                                                        $location_name_new = $location_new->name;
                                                        $location_href_new = get_term_link($location_id_new, "taxonomy-lieu");
                                                    }
                                                    $location_id = $value['lieux'];
                                                    $location = get_term($location_id, "taxonomy-lieu");
                                                    $location_name = $location->name;
                                                }else{
                                                    $location_name = $value['nom_du_lieu'];
                                                    $location_href = $value['url_du_lieu'];
                                                }
                                            }elseif($type == "multidates"){
                                                $location_type = get_field("choisir_un_lieu_existant");
                                                if($location_type == "oui"){
                                                    $location_id = get_field("lieu");
                                                    $location = get_term($location_id, "taxonomy-lieu");
                                                    $location_name = $location->name;
                                                }else{
                                                    $location_name = get_field("nom_du_lieu");
                                                    $location_href = get_field("url_du_lieu");
                                                }
                                            }
                                            $post = $tmp_post;
                                            setup_postdata($post);
                                        }else{
                                            $location_name_tmp = $location_name;
                                            if($type == "plusieurs_dates"){
                                                $location_type = $value['choisir_un_lieu_existant'];
                                                if($location_type == "oui"){
                                                    $location_id = $value['lieux'];
                                                    $location = get_term($location_id, "taxonomy-lieu");
                                                    $location_name = $location->name;
                                                }else{
                                                    $location_name = $value['nom_du_lieu'];
                                                    $location_href = $value['url_du_lieu'];
                                                }
                                            }elseif($type == "multidates"){
                                                $location_type = get_field("choisir_un_lieu_existant");
                                                if($location_type == "oui"){
                                                    $location_id = get_field("lieu");
                                                    $location = get_term($location_id, "taxonomy-lieu");
                                                    $location_name = $location->name;
                                                }else{
                                                    $location_name = get_field("nom_du_lieu");
                                                    $location_href = get_field("url_du_lieu");
                                                }
                                            }
                                        }
                                    }
                                }else{
                                    /* @TODO : Prévoir affichage vente à venir, lorsque la date de mise en vente n'est pas encore atteinte mais que le prix est connu cf. grand corps malade le 22 juillet 2022 */
                                    echo __('Pas en vente', 'opus-one');
                                } ?>
                                    <div class="marquee3k one-ticket__marquee" data-speed="1">
                                        <div><span> <?= $post->post_title ?>&nbsp;<?php if(is_string($location_name)){ echo ': '. $location_name; } ?>&nbsp;</span></div>
                                    </div>
                                    <div class="one-ticket__price"><?php

                                        if(!$value['fnac_ch'] && !$value['autre_billeterie'] && $value['vip'] == "non"){

                                            if($value['prix_le_plus_eleve']){
                                                echo __("Dès ")." ".$value['prix_le_plus_bas'];
                                                if(!is_float($value['prix_le_plus_bas'])){
                                                    echo ".-";
                                                }
                                            }else{
                                                if($value['prix_le_plus_bas']){
                                                    echo __("Dès "). $value['prix_le_plus_bas'];
                                                    if(!is_float($value['prix_le_plus_bas'])){
                                                        echo ".-";
                                                    }
                                                }else{
                                                    _e("à venir", "opus-one");
                                                }
                                            }
                                        }else{
                                            $post_id = isset($value['post_id'] ) ? $value['post_id'] : NULL;
                                            if($post_id){
                                                $the_id_for_buy = $value['post_id'];
                                            }else{
                                                $the_id_for_buy = $post->ID;
                                            }
                                                if($value['prix_le_plus_eleve']){
                                                    echo __("Dès ").$value['prix_le_plus_bas'];
                                                    if(!is_float($value['prix_le_plus_bas'])){
                                                        echo ".-";
                                                    }
                                                    echo "</span>";
                                                }else{
                                                    if($value['prix_le_plus_bas']){
                                                        echo __("Dès ") . $value['prix_le_plus_bas'];
                                                        if(!is_float($value['prix_le_plus_bas'])){
                                                            echo ".-";
                                                        }
                                                    }else{
                                                        _e("à venir", "opus-one");
                                                    }
                                                } ?>
                                            </a><!-- .btn-reservation-sidebar tooltip-sidebar -->
                                        <!-- .reservation-btn --><?php
                                        } ?>
                                        <span class="one-ticket__icon">
                                            <svg id="Calque_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 210 100">
                                            <defs>
                                            <style>
                                              .cls-1 {
                                                  fill: #fff;
                                                  fill-rule: evenodd;
                                              }
                                            </style>
                                            </defs>
                                            <path class="cls-1"
                                                  d="M210,0h-70.04V22.82h-13.05V0H0V100H126.91v-22.82h13.05v22.82h70.04V0ZM127.39,38.61v22.77h12.94v-22.77h-12.94Z" />
                                            </svg>
                                        </span>
                                    </div>
                                </li><!-- .sidebar-block --><?php
                                }
                            }
                        }
                        $post = $tmp_post;
                        setup_postdata($post);?>
                    </ul><?php

                    $affiche = get_field("affiches");

                    if($affiche){ ?>
                        <div class="single-event__poster">
                            <img src="<?php echo $affiche['url']; ?>" alt="">
                        </div>
                    <?php } ?>
                </div>
            </aside>
        </div>
    </main>
    <section class="section section--highlights" style="--section-color: #fff; --current-bg-color: #000;">
        <h3 class="section__title">
            <?php echo __('Si vous aimez '. get_the_title() .' vous aimerez aussi :', 'opus-one') ?>
        </h3>
        <div class="highlights">
            <ul class="event-list">
                <?php

                $terms = get_the_terms($post, 'taxonomy-representation');
                $shows = get_show_from_category_nb($terms[0]->term_id, 5, $post->ID);

                foreach ($shows as $show){
                    $date = $show['meta_value'];
                    $post = get_post( $show['ID']);
                    $next_date = substr($date,0,6);
                    $type = get_field("type",$post->ID);
                    $terms = wp_get_post_terms($post->ID, "taxonomy-representation");

                    if($type == "plusieurs_dates"){
                        $dates = get_field("date_unique_ou_separee", $post->ID);
                        $representation_info = search_representation($dates, $date);
                        if(!$representation_info){
                            $representation_info = search_representation_report($dates, $date);
                        }
                        $date_sale = $representation_info['date_de_la_mise_en_vente'];
                        $time_sale = $representation_info['heure_de_la_mise_en_vente'];
                        $date_sale_formated = date_i18n( 'Y-m-d H:i', strtotime($date_sale." ".$time_sale));
                        $avaibility =	$representation_info['etat'];
                        $nb_futur_show = get_nb_representation_in_future($post->ID);

                        if($nb_futur_show > 1){
                            if($representation_info['etat'] == "postponed"){
                                $url = get_permalink($post->ID).$representation_info['date_de_report']."/";
                            }else{
                                $url = get_permalink($post->ID).$representation_info['date_de_la_representation']."/";
                            }
                        }elseif($representation_info['date_de_report'] == $date){
                            $url = get_permalink($post->ID).$representation_info['date_de_report']."/";
                        }elseif($representation_info['date_de_report'] != $date && $representation_info['etat'] == "postponed"){
                            $url = get_permalink($post->ID).$representation_info['date_de_la_representation']."/";
                        }else{
                            $url = get_permalink($post->ID);
                        }

                        $ticket_url = get_ticket_link($representation_info);?>

                        <!-- Et Ensuite la liste des evenements, certaine info sont la 2x la version mobile et desktop sont legerement different et ne permettaient pas de faire un seul template -->
                        <li class="event">
                            <div class="event__call-back event__call-back--mobile">
                                <div class="double-buttons">
                                    <a href="<?= $url ?>" class="double-bouttons__btn double-bouttons__btn--info"
                                       title="<?= __('Informations') ?>"><?= __('Informations') ?></a>
                                    <?php if(!empty($ticket_url)){ ?>
                                        <a href="<?= $ticket_url ?>" class="double-bouttons__btn double-bouttons__btn--ticket" title="<?= __('Tickets', 'opus-one') ?>"><?= __('Tickets', 'opus-one') ?></a>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="event__top">
                                <ul class="event__top-info">
                                    <li class="event__top-info__item event__top-info__item--when">
                                        <time>
                                            <?php
                                            if($representation_info['etat'] != "postponed"){
                                                echo ucfirst(date_i18n('d.m.y', strtotime($representation_info['date_de_la_representation'])));
                                            }else{
                                                if($representation_info['date_de_report'] == $date){
                                                    echo ucfirst(date_i18n('d.m.y', strtotime($representation_info['date_de_report'])));
                                                }else{
                                                    echo "<span class='line-through'>".ucfirst(date_i18n( 'd.m.y', strtotime($representation_info['date_de_la_representation']))).'</span>';
                                                }
                                            }
                                            ?>
                                        </time> <!-- date de l'event -->
                                        <span class="event__hashtag event__hashtag--mobile">
                                                    <?php
                                                    foreach ($terms as $term){
                                                        echo '<span>#' . $term->name . '</span>';
                                                    }
                                                    ?>
                                                </span> <!-- categorie de l event -->
                                    </li>
                                    <li class="event__top-info__item event__top-info__item--where">
                                        <?php $location_type = $representation_info['choisir_un_lieu_existant'];
                                        if($location_type == "oui"){
                                            $location_id = $representation_info['lieux'];
                                            $location = get_term($location_id, "taxonomy-lieu");
                                            $location_name = $location->name;
                                            $location_href = get_term_link($location_id, "taxonomy-lieu");
                                        }else{
                                            $location_name = $representation_info['nom_du_lieu'];
                                            $location_href = $representation_info['url_du_lieu'];
                                        }
                                        $new_location_id = $representation_info['nouveau_lieu'];
                                        if($new_location_id != ""){
                                            $new_location = get_term($new_location_id, "taxonomy-lieu");
                                            $new_location_name = $new_location->name;
                                            $new_location_href = get_term_link($new_location_id, "taxonomy-lieu");
                                            $location_name = $new_location_name;
                                            $location_href = $new_location_href;
                                        }?>
                                        <span>
                                                    <?php if(!empty($location_href) && is_string($location_href)){ ?>
                                                        <a href="<?php if(!empty($location_href)){ echo $location_href; }?>" <?php if($location_type != "oui"){echo 'target="_blank"';} ?>>
                                                    <?php }
                                                    echo $location_name;
                                                    if(!empty($location_href) && is_string($location_href)){ ?>
                                                        </a>
                                                    <?php } ?>
                                                </span>
                                    </li> <!-- le lieux -->
                                    <?php
                                    if($representation_info['etat'] != "postponed"){
                                        get_avaibility_txt($avaibility, $representation_info['date_de_report'], $post->ID, $representation_info);
                                    }else{
                                        get_avaibility_txt($avaibility, $representation_info['date_de_report'], $post->ID, $representation_info);
                                    } ?><!-- avaibality -->

                                    <!-- la liste des reports -->
                                    <li class="event__top-info__item event__top-info__item--postpone">
                                        <ul class="event__postpone">
                                            <?php if($representation_info['etat'] == "postponed" && $representation_info['date_de_report'] == $date){ ?>
                                                <li class="event__postpone__item">
                                                    <svg id="Calque_1" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 164.24 128.77">
                                                        <path
                                                                d="M121.31,128.77v-35.57H46.6c-12.92,0-23.91-4.55-32.99-13.66C4.54,70.43,0,59.45,0,46.6S4.54,22.77,13.61,13.66C22.69,4.56,33.68,0,46.6,0h2.38V14.71h-2.38c-8.88,0-16.41,3.11-22.6,9.34-6.19,6.23-9.29,13.75-9.29,22.55s3.1,16.33,9.29,22.55c6.19,6.23,13.73,9.34,22.6,9.34H121.31V42.92l42.92,42.92-42.92,42.92Z" />
                                                    </svg>
                                                    <span><?php echo __(" Report du "). ucfirst(date_i18n(get_option('date_format' ), strtotime($representation_info['date_de_la_representation']))); ?></span>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </li>

                                </ul>
                                <span class="event__hashtag event__hashtag--desktop">
                                             <?php
                                             foreach ($terms as $term){
                                                echo '<span>#' . $term->name . '</span>';
                                             }
                                             ?>
                                        </span>
                            </div>
                            <div class="event__bottom">
                                <h3 class="event__title">
                                    <?php
                                    if($representation_info['etat'] != "postponed" || ($representation_info['etat'] == "postponed" && $representation_info['date_de_report'] == $date)){ ?>
                                        <a href="<?php echo $url; ?>" title="<?= get_the_title($post->ID) ?>"> <?php echo get_the_title($post->ID); ?> </a> <?php
                                    }else{ ?>
                                        <div><?php echo get_the_title($post->ID); ?></div><?php
                                    } ?>
                                </h3>
                                <div class="event__call-back event__call-back--desktop">
                                    <div class="double-buttons">
                                        <a href="<?= $url ?>" class="double-bouttons__btn double-bouttons__btn--info"
                                           title="<?= __('Informations') ?>">
                                            <?php
                                            if($nb_futur_show <= 1){
                                                _e("Informations", "opus-one");
                                            }else{
                                                _e("Informations tournée", "opus-one");
                                            }
                                            ?>
                                        </a>
                                        <?php if(!empty($ticket_url)){ ?>
                                            <a href="<?= $ticket_url ?>" class="double-bouttons__btn double-bouttons__btn--ticket" title="<?= __('Tickets', 'opus-one') ?>"><?= __('Tickets', 'opus-one') ?></a>
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
    <?php get_template_part('template-parts/agenda-cta'); ?>
</div>

<?php
endwhile;
get_footer();?>