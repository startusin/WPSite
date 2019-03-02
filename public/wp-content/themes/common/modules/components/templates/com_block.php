<?php $text_type = get_sub_field('com_block_type'); ?>
<?php $left_type = get_sub_field('com_block_left'); ?>

<?php if(get_sub_field('com_block_layout') === 'testimonials'): ?>
    <div class="container layout-testimonials">
        <div class="clear"></div>
        <h1 class="p-header"><?php the_sub_field('com_block_title'); ?></h1>
        <?php if(get_sub_field('com_block_description')): ?>
            <h2 class="p-description"><?php the_sub_field('com_block_description'); ?></h2>
        <?php endif; ?>
        <div class="clear"></div>
        <div class="block-center">
            <?php if( get_sub_field('com_block_testimonials') ): ?>
                <?php foreach( get_sub_field('com_block_testimonials') as $i => $testimonial ): ?>
                    <div class="col-md-4">
                        <div class="block-margin<?php if($left_type): ?> left-content<?php endif; ?>">
                            <a href="<?php the_permalink($testimonial); ?>">
                                <?php if(get_field('testimonials_basic_image', $testimonial)): ?>
                                    <?php echo wp_get_attachment_image(get_field('testimonials_basic_image', $testimonial), 'wp-blog'); ?>
                                <?php endif; ?>

                                <div class="title"><?php echo get_the_title($testimonial); ?></div>
                            </a>
                            <div class="description"><?php the_field('testimonials_basic_short_testimonial', $testimonial); ?></div>
                        </div>
                    </div>
                    <?php if(($i+1) % 3 === 0): ?><div class="clearfix"></div><?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if(get_sub_field('com_block_button_title') && get_sub_field('com_block_button_link')): ?>
                <div class="clear"></div>
                <div class="clearfix"></div>
                <a href="<?php the_sub_field('com_block_button_link'); ?>" class="learn-more">
                    <?php the_sub_field('com_block_button_title'); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
    <div class="clear"></div>
<?php endif; ?>

<?php if(get_sub_field('com_block_layout') === 'three'): ?>
    <div class="container layout-three">
        <div class="clear"></div>
        <h1 class="p-header"><?php the_sub_field('com_block_title'); ?></h1>
        <?php if(get_sub_field('com_block_description')): ?>
            <h2 class="p-description"><?php the_sub_field('com_block_description'); ?></h2>
        <?php endif; ?>
        <div class="clear"></div>
        <div class="block-center">
            <?php $counter = 0; ?>
            <?php if( have_rows('com_block_items') ): ?>
                <?php while( have_rows('com_block_items') ): the_row(); $counter++; ?>
                    <div class="col-md-4">
                        <div class="block-margin<?php if($left_type): ?> left-content<?php endif; ?>">
                            <?php if(get_sub_field('com_block_items_icon')): ?>
                                <?php echo wp_get_attachment_image(get_sub_field('com_block_items_icon'), 'full'); ?>
                            <?php endif; ?>

                            <?php if(get_sub_field('com_block_items_title')): ?>
                                <div class="title<?php if($text_type === 'items'): ?> type-items<?php endif; ?>"><?php the_sub_field('com_block_items_title'); ?></div>
                            <?php endif; ?>

                            <?php if($text_type === 'text' && get_sub_field('com_block_items_text')): ?>
                                <div class="description"><?php the_sub_field('com_block_items_text'); ?></div>
                            <?php endif; ?>

                            <?php if($text_type === 'items' && have_rows('com_block_items_items')): ?>
                                <ul class="pg-b-li">
                                <?php while( have_rows('com_block_items_items') ): the_row(); ?>
                                    <li><?php the_sub_field('com_block_items_items_title'); ?></li>
                                <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if($counter % 3 === 0): ?><div class="clearfix"></div><?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>

            <?php if(get_sub_field('com_block_button_title') && get_sub_field('com_block_button_link')): ?>
            <div class="clear"></div>
            <div class="clearfix"></div>
            <a href="<?php the_sub_field('com_block_button_link'); ?>" class="learn-more">
                <?php the_sub_field('com_block_button_title'); ?>
            </a>
            <?php endif; ?>
        </div>
    </div>
    <div class="clear"></div>
<?php endif; ?>

<?php if(get_sub_field('com_block_layout') === 'vertical'): ?>
    <div class="container layout-vertical">
        <div class="clear"></div>
        <h1 class="p-header"><?php the_sub_field('com_block_title'); ?></h1>
        <?php if(get_sub_field('com_block_description')): ?>
            <h2 class="p-description"><?php the_sub_field('com_block_description'); ?></h2>
        <?php endif; ?>
        <div class="clear"></div>
        <div class="how-it-works" style="background-image: url('<?php the_sub_field('com_block_background'); ?>');">
            <div class="col-md-6"></div>
            <div class="col-md-6">
                <ul class="how-it-works-li">
                    <?php $counter = 0; ?>
                    <?php if( have_rows('com_block_items') ): ?>
                        <?php while( have_rows('com_block_items') ): the_row(); $counter++; ?>
                            <li<?php if($counter % 2 === 0): ?> class="p-right"<?php endif; ?>>
                                <div class="col-md-3 line">
                                    <?php echo wp_get_attachment_image(get_sub_field('com_block_items_icon'), 'full'); ?>
                                </div>

                                <div class="col-md-9">
                                    <?php if(get_sub_field('com_block_items_title')): ?>
                                        <div class="how-it-works-top"><?php the_sub_field('com_block_items_title'); ?></div>
                                    <?php endif; ?>

                                    <?php if(get_sub_field('com_block_items_text')): ?>
                                        <div class="how-it-works-bottom"><?php the_sub_field('com_block_items_text'); ?></div>
                                    <?php endif; ?>
                                </div>
                            </li>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="clear"></div>
<?php endif; ?>

<?php if(get_sub_field('com_block_layout') === 'four'): ?>
    <div class="container layout-four">
        <div class="clear"></div>
        <h1 class="p-header"><?php the_sub_field('com_block_title'); ?></h1>
        <?php if(get_sub_field('com_block_description')): ?>
            <h2 class="p-description"><?php the_sub_field('com_block_description'); ?></h2>
        <?php endif; ?>
        <div class="clear"></div>
        <div class="block-center">
            <?php $counter = 0; ?>
            <?php if( have_rows('com_block_items') ): ?>
                <?php while( have_rows('com_block_items') ): the_row(); $counter++; ?>
                    <div class="col-md-3">
                        <div class="block-margin<?php if($left_type): ?> left-content<?php endif; ?>">
                            <?php if(get_sub_field('com_block_items_icon')): ?>
                                <?php echo wp_get_attachment_image(get_sub_field('com_block_items_icon'), 'full'); ?>
                            <?php endif; ?>

                            <?php if(get_sub_field('com_block_items_title')): ?>
                                <div class="title<?php if($text_type === 'items'): ?> type-items<?php endif; ?>"><?php the_sub_field('com_block_items_title'); ?></div>
                            <?php endif; ?>

                            <?php if($text_type === 'text' && get_sub_field('com_block_items_text')): ?>
                                <div class="description"><?php the_sub_field('com_block_items_text'); ?></div>
                            <?php endif; ?>

                            <?php if($text_type === 'items' && have_rows('com_block_items_items')): ?>
                                <ul class="pg-b-li">
                                    <?php while( have_rows('com_block_items_items') ): the_row(); ?>
                                        <li><?php the_sub_field('com_block_items_items_title'); ?></li>
                                    <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if($counter % 4 === 0): ?><div class="clearfix"></div><?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>

            <?php if(get_sub_field('com_block_button_title') && get_sub_field('com_block_button_link')): ?>
                <div class="clear"></div>
                <div class="clearfix"></div>
                <a href="<?php the_sub_field('com_block_button_link'); ?>" class="learn-more">
                    <?php the_sub_field('com_block_button_title'); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
    <div class="clear"></div>
<?php endif; ?>

<?php if(get_sub_field('com_block_layout') === 'imagebottom'): ?>
    <div class="container layout-imagebottom">
        <div class="clear"></div>
        <h1 class="p-header"><?php the_sub_field('com_block_title'); ?></h1>
        <?php if(get_sub_field('com_block_description')): ?>
            <h2 class="p-description"><?php the_sub_field('com_block_description'); ?></h2>
        <?php endif; ?>
        <div class="clear"></div>
        <div class="block-center">
            <?php $counter = 0; ?>
            <?php if( have_rows('com_block_items') ): ?>
                <?php while( have_rows('com_block_items') ): the_row(); $counter++; ?>
                    <div class="col-md-3">
                        <div class="block-margin<?php if($left_type): ?> left-content<?php endif; ?>">
                            <?php if(get_sub_field('com_block_items_title')): ?>
                                <div class="title<?php if($text_type === 'items'): ?> type-items<?php endif; ?>"><?php the_sub_field('com_block_items_title'); ?></div>
                            <?php endif; ?>

                            <?php if($text_type === 'text' && get_sub_field('com_block_items_text')): ?>
                                <div class="description"><?php the_sub_field('com_block_items_text'); ?></div>
                            <?php endif; ?>

                            <?php if($text_type === 'items' && have_rows('com_block_items_items')): ?>
                                <ul class="pg-b-li">
                                    <?php while( have_rows('com_block_items_items') ): the_row(); ?>
                                        <li><?php the_sub_field('com_block_items_items_title'); ?></li>
                                    <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>

                            <?php if(get_sub_field('com_block_items_icon')): ?>
                                <?php echo wp_get_attachment_image(get_sub_field('com_block_items_icon'), 'full'); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if($counter % 4 === 0): ?><div class="clearfix"></div><?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>

            <?php if(get_sub_field('com_block_button_title') && get_sub_field('com_block_button_link')): ?>
                <div class="clear"></div>
                <div class="clearfix"></div>
                <a href="<?php the_sub_field('com_block_button_link'); ?>" class="learn-more">
                    <?php the_sub_field('com_block_button_title'); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
    <div class="clear"></div>
<?php endif; ?>