<section id="about-us">
    <div class="container-fluide">
        <div class="row space">
            <div class="col-lg-6 space">
                <div class="about-us-details">
                    <h2><?php the_sub_field('com_about_title'); ?></h2>
                    <?php the_sub_field('com_about_description'); ?>
                </div>
            </div>
            <div class="col-lg-6 space">
                <div class="design-team-image">
                    <?php echo wp_get_attachment_image(get_sub_field('com_about_image'), 'full'); ?>
                </div>
            </div>
        </div>
    </div>
</section>
