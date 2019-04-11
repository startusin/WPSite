<div class="banner d-flex flex-row justify-content-center align-items-center" style="background-image: url(<?php echo wp_get_attachment_image_src(get_sub_field('com_banner_background'), 'full')[0]; ?>)">
    <div class="container padd">
        <div class="description col-lg-6"><?php the_sub_field('com_banner_title'); ?></div>
        <?php if (get_sub_field('com_banner_subtitle')): ?>
            <div class="subdescription col-lg-6"><?php the_sub_field('com_banner_subtitle'); ?></div>
        <?php endif; ?>
        <?php if (get_sub_field('com_banner_link_text')): ?>
            <div class="more col-lg-6">
                <a href="<?php the_sub_field('com_banner_link_url'); ?>">
                    <?php the_sub_field('com_banner_link_text'); ?>
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>
<div class="clearfix"></div>
