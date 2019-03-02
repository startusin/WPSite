<section id="our-clients" class="pd-100">
    <div class="container">
        <div class="row">
            <div class="offset-lg-2 col-lg-8">
                <div class="section-title-v2 text-center">
                    <h2><?php the_sub_field('com_logos_title'); ?></h2>
                    <?php the_sub_field('com_logos_description'); ?>
                </div>
            </div>
        </div>
        <!-- all client box -->
        <div class="row">
            <div class="col-lg-12">
                <?php while (have_rows('com_logos_logos')) : the_row(); ?>
                    <div class="client-logo col-xs-12 col-sm-6 col-md-3">
                        <a href="">
                            <?php echo wp_get_attachment_image(get_sub_field('com_logos_logos_image'), 'full'); ?>
                        </a>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</section>
