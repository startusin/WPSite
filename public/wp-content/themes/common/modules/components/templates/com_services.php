<section id="our-services" class="pd-100-75">
    <div class="container">
        <div class="row">
            <div class="offset-lg-2 col-lg-8">
                <div class="section-title-v2 text-center">
                    <h2><?php the_sub_field('com_services_title'); ?></h2>
                    <div><?php the_sub_field('com_services_description'); ?></div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php while (have_rows('com_services_services')) : the_row(); ?>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="serviceBox">
                        <div class="service-icon">
                            <?php echo wp_get_attachment_image(get_sub_field('com_services_services_icon'), 'full'); ?>
                        </div>
                        <h3 class="title"><?php the_sub_field('com_services_services_title'); ?></h3>
                        <div class="description"><?php the_sub_field('com_services_services_description'); ?></div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
