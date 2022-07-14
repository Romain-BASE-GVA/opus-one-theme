<section class="section section--agenda-cta" style="--section-color: #fff; --current-bg-color: #10CF72;">
    <h3 class="section__title">Émotions, vibrations, révélations</h3>
    <div class="agenda-cta">
        <h4>Agenda</h4>
        <?php 
            $pageAgenda = get_field('page_agenda', 'option');
            
            if($pageAgenda):

            $pageAgendaUrl = $pageAgenda['url'];
        ?>
        <a href="<?php echo esc_url( $pageAgendaUrl ); ?>" class="see-more" title="Découvrir toute notre programmation">Découvrir toute notre programmation</a>
        <?php endif; ?>
    </div>
</section>