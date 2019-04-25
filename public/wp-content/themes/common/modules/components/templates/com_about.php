<div class="pharmacists_block" style="background-image: url('<?php echo wp_get_attachment_image_src(get_sub_field('com_about_image'), 'full')[0]; ?>');">
    <div class="container">
        <div class="row">
            <div class="white-bg">
                <div class="pretitle"><?php echo i18nString('Spotlight'); ?></div>
                <div class="title"><?php the_sub_field('com_about_title'); ?></div>
                <div class="pharmacists_text open_sans"><?php the_sub_field('com_about_text'); ?></div>
                <a class="more open_sans margin_bottom" href="<?php the_sub_field('com_about_link_url'); ?>"><?php the_sub_field('com_about_link_text'); ?></a>
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>
