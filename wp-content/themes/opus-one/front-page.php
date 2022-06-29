<?php get_header(); ?>
<div data-barba="container" data-barba-namespace="home" data-bg="#000" data-text-color="#fff" data-logo-title="Présente">
    
    <main class="main">
        <?php get_template_part('template-parts/categories-loop-home'); ?>
    </main>

    <?php get_template_part('template-parts/agenda-cta'); ?>
    <?php get_template_part('template-parts/highlights-home'); ?>
</div>
<?php get_footer(); ?>