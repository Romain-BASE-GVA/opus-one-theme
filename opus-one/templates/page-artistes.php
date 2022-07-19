<?php /* Template Name: Artistes */ ?>
<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post();
    $colorBackground = get_field('couleur_de_fond') ? get_field('couleur_de_fond') : '#6E32FF';
    $colorText = get_field('couleur_du_texte') ? get_field('couleur_de_texte') : '#FFF';
?>
    <div data-barba="container" data-barba-namespace="artists" data-bg="<?php echo $colorBackground; ?>" data-text-color="<?php echo $colorText; ?>" data-logo-title="<?php the_title(); ?>">
      <main class="main main--top-padding">
        <section class="section section--artist-list section--no-padding-x" style="--current-bg-color: transparent">
          <h3 class="section__title">Nous les choisissons parce qu’ils nous plaisent à nous, mais aussi et surtout parce que nous sommes persuadés qu’ils-elles vous plairont à vous <span>contact Antoine Grenon Responsable Booking <a href="mailto:antoine.grenon@opus-one.ch" title="contact Antoine Grenon Responsable Booking">antoine.grenon@opus-one.ch</a></span></h3>
          <?php
          $terms = get_terms(
            array(
              'taxonomy'   => 'taxonomy-artistes',
              'hide_empty' => true,
              'meta_query' => array(
                array(
                    'key'   => 'artiste_represente_par_opus_one',
                    'value' => true,
                )
              )
            )
          )
          ?>
          <div class="artists">
            <?php if (!empty($terms) && is_array($terms)) : ?>
              <ul class="event-list">
                <?php foreach ($terms as $term) : 
                  $artistImg = get_field('artiste_photo', $term);  
                ?>
                  <li class="event event--artist">
                    <div class="event--artist__img-wrapper">
                      <img src="<?php echo esc_url($artistImg['url']); ?>" class="event--artist__img" alt="<?php echo esc_attr($artistImg['alt']); ?>" />
                    </div>

                    <div>
                      <div class="event__top">
                        <span class="event__hashtag">#concert</span>
                      </div>
                      <div class="event__bottom">
                        <h3 class="event__title">
                          <!--
                          <a href="<?= get_term_link($term, 'taxonomy-artistes'); ?>" title="<?php echo $term->name ?>"><?php echo $term->name; ?></a>
                          -->
                          <span><?php echo $term->name; ?></span>
                        </h3>
                      </div>
                    </div>
                    <a class="link-arrow" href="<?= get_term_link($term, 'taxonomy-artistes'); ?>">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 199.81 181.64">
                        <polygon points="154.4 45.41 108.98 0 108.98 72.66 0 72.66 0 108.98 108.98 108.98 108.98 181.64 154.4 136.23 199.81 90.82 154.4 45.41" />
                      </svg>
                    </a>
                  </li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
          </div>

        </section>
        <div class="represented-artist-img">
          <div class="represented-artist-img__img">
            <img src="" alt="">
          </div>
        </div>
        <!--
        <section class="section section--artist-grid section--no-padding-x" style="--section-bg-color: transparent">
          <h3 class="section__title">We book and/or promote the following artists:</h3>
          <?php
          $terms = get_terms(
            array(
              'taxonomy'   => 'taxonomy-artistes',
              'hide_empty' => true,
              'meta_query' => array(
                array(
                    'key'   => 'artiste_booke_par_opus_one',
                    'value' => true,
                )
            )
            )
          )
          ?>
          <?php if (!empty($terms) && is_array($terms)) : ?>
          <div class="card-grid">
          <?php foreach ($terms as $term) : 
            $artistImg = get_field('artiste_photo', $term);   
          ?>
            <div class="card card--artist">
              <a href="<?= get_term_link($term, 'taxonomy-artistes'); ?>" class="card__link"></a>
              <div class="card__img">
                <img src="<?php echo esc_url($artistImg['url']); ?>" alt="<?php echo esc_attr($artistImg['alt']); ?>">
                <div class="img" style="background-image: url(<?php echo esc_url($artistImg['url']); ?>)">
                </div>
              </div>
              <h3 class="card__title"><?php echo $term->name; ?></h3>
              <ul class="card__date-list">
                <li class="card__date">02.03.22</li>
                <li class="card__date">02.03.22</li>
                <li class="card__date">02.03.22</li>
              </ul>
              <span class="card__category">#Concert</span>
            </div>
          <?php endforeach; ?>
          </div>
          <?php endif; ?>
        </section>
          -->
      </main>
    </div>
<?php endwhile;
endif; ?>
<?php get_footer(); ?>