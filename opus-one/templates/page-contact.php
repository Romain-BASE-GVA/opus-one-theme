<?php /* Template Name: Contact */ ?>
<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div data-barba="container" data-barba-namespace="contact" data-bg="#6E32FF" data-text-color="#fff" data-logo-title="<?php the_title(); ?>">
      <main class="main">
        <div class="screen-contact">
          <div class="screen-contact__layer screen-contact__layer--back">
            <h1 class="screen-contact__title"><span>Bonjour</span> <span>Hello</span></h1>
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
      </main>
    </div>
<?php endwhile;endif; ?>
<?php get_footer(); ?>