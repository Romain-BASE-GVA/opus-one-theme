<?php /* Template Name: Manifesto */ ?>
<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <div data-barba="container" data-barba-namespace="manifesto" data-bg="#6E32FF" data-text-color="#fff" data-logo-title="<?php echo the_title(); ?>">
  <?php if (have_rows('manifesto')) : ?>
    <main class="main main--manifesto">
    <?php while (have_rows('manifesto')) : the_row();
      $titre = get_sub_field('titre');
      $contenu = get_sub_field('contenu');
      $typeAnimation = get_sub_field('type_danimation') == 'lettre' ? 'chars' : 'words';
      $nomAnimation = get_sub_field('nom_de_lanimation');
    ?>
      <div class="manifesto-item" id="manifesto-0<?php echo get_row_index(); ?>" data-index="0<?php echo get_row_index(); ?>">
        <div class="manifesto-item__header">
          <h2 data-split="<?php echo $typeAnimation; ?>" data-anim="<?php echo $nomAnimation; ?>"><?php echo $titre; ?></h2>
        </div>
        <div class="manifesto-item__content">
          <div class="manifesto-item__title">
            <span><?php echo $titre; ?></span>
            <span class="manifesto-item__index">0<?php echo get_row_index(); ?></span>
          </div>
          <div class="manifesto-item__text text-full-width"><?php echo $contenu; ?></div>
        </div>
      </div>
      <?php endwhile; ?>
    </main>
    <?php endif; ?>
  </div>
  <?php endwhile; endif; ?>
<?php get_footer(); ?>