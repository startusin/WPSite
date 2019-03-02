<?php if( have_rows('components') ): ?>

    <?php while ( have_rows('components') ) : the_row(); ?>

        <?php the_component(get_row_layout()); ?>

    <?php endwhile; ?>

<?php endif; ?>
