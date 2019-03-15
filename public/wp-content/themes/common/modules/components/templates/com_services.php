<div class="policies_block">
    <div class="container">
        <div class="clear"></div>
        <div class="title_margin">
            <div class="row align-items-center no-gutters">
                <div class="col-8"><p class="title_no_margin"><?php the_sub_field('com_services_title'); ?></p></div>
                <div class="col-4 text-right"><a class="more open_sans" href="">View all</a></div>
            </div>
        </div>

        <div class="policies_sider">
            <section class="policies_carusel">
                <?php $rows = get_sub_field('com_services_services'); ?>
                <?php foreach ($rows as $row): ?>
                    <a href="#">
                        <div class="policies_slide">
                            <img src="<?php echo wp_get_attachment_image_src(get_field('services_basic_icon', $row), 'full')[0]; ?>">
                            <p class="policies_text"><?php echo get_the_title($row); ?></p>
                        </div>
                    </a>
                <?php endforeach; ?>
            </section>

            <div class="policies_previous"><i class="fas fa-chevron-left"></i></div>
            <div class="policies_next"><i class="fas fa-chevron-right"></i></div>

        </div>
    </div>
</div>
<div class="clear"></div>
