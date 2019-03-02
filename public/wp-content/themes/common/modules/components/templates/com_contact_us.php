<main>
    <div class="contact">
        <div class="container">
            <div class="col-md-6">
                <h1 class="p-header"><?php the_sub_field('com_contact_us_title'); ?></h1>

                <?php echo do_shortcode('[contact-form-7 id="'.get_sub_field('com_contact_us_form').'"]'); ?>
                <div class="clear"></div>
            </div>


            <div class="col-md-6 right-two">
                <div class="map">
                    <iframe src="<?php the_sub_field('com_contact_us_map_link'); ?>" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</main>