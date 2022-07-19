<?php /* Template Name: Contact */ ?>
<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post();
    $colorBackground = get_field('couleur_de_fond') ? get_field('couleur_de_fond') : '#6E32FF';
    $colorText = get_field('couleur_du_texte') ? get_field('couleur_de_texte') : '#FFF';
?>
    <div data-barba="container" data-barba-namespace="contact" data-bg="<?php echo $colorBackground; ?>" data-text-color="<?php echo $colorText; ?>" data-logo-title="<?php the_title(); ?>">
      <main class="main">
        <div class="screen-contact">
          <div class="screen-contact__layers">
            <div class="screen-contact__layer screen-contact__layer--back">
              <h1 class="screen-contact__title"><span>Hello</span></h1>
            </div>
            <div class="screen-contact__layer screen-contact__layer--front">
              <div class="screen-contact__cta">
                <?php if (get_field('adresse_e_mail', 'options')) : ?>
                  <a href="mailto:<?php echo get_field('adresse_e_mail', 'option'); ?>" class="btn" title="Mail">Mail</a>
                <?php endif; ?>
                <?php if (get_field('google_map_url', 'options')) : ?>
                  <a href="<?php echo get_field('google_map_url', 'option'); ?>" target="_blank" class="btn" title="Maps">Maps</a>
                <?php endif; ?>
                <?php if (get_field('telephone', 'options')) : ?>
                  <a href="tel:<?php echo get_field('telephone', 'option'); ?>" class="btn" title="Téléphone">Téléphone</a>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="screen-contact__infos">
            <?php if (get_field('adresse_e_mail', 'options')) : ?>
              <span><a href="mailto:<?php echo get_field('adresse_e_mail', 'options'); ?>" title="Envoyer un mail à Opus One"><?php echo get_field('adresse_e_mail', 'options'); ?></a></span>
            <?php endif; ?>
            <?php if (get_field('telephone', 'options')) : ?>
              <span><a href="tel:<?php echo get_field('telephone', 'options'); ?>" title="Téléphoner à Opus One"><?php echo get_field('telephone', 'options'); ?></a></span>
            <?php endif; ?>
            <?php if (have_rows('adresse', 'options')) : ?>
              <ul>
                <?php while (have_rows('adresse', 'options')) : the_row(); ?>
                  <li><?php echo get_sub_field('ligne'); ?></li>
                <?php endwhile; ?>
              </ul>
            <?php endif; ?>
          </div>
        </div>
      </main>
    </div>
<?php endwhile;
endif; ?>
<?php get_footer(); ?>