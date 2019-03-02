<div class="banner" id="home" style="background-image: url(<?php echo wp_get_attachment_image_src(get_sub_field('com_banner_background'), 'full')[0]; ?>)">
    <?php if (get_sub_field('com_banner_background_video')): ?>
        <div class="video-holder">
            <iframe src="<?php the_sub_field('com_banner_background_video'); ?>" frameborder="0"></iframe>
        </div>
    <?php endif; ?>

    <div class="video-holder-bg"></div>
    <div class="container inner-content">
        <div class="banner-btm">
            <div id="top" class="callbacks_container">
                <div class="rslides callbacks callbacks1">
                    <div class="banner-bottom">
                        <div class="banner-slider owl-carousel">
                            <?php while (have_rows('com_banner_items')) : the_row(); ?>
                                <div>
                                    <h1><?php the_sub_field('com_banner_items_title'); ?></h1>
                                </div>
                            <?php endwhile; ?>
                        </div>

                        <p><?php the_sub_field('com_banner_description'); ?></p>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <img class="mouse-icon animated bounce infinite" src="<?php echo get_module_img('components/mouse.svg'); ?>">
</div>
