<?php
/*
Template Name: Contact
*/
?>
<?php get_header(); ?>

<section id="contact" class="pd-bo">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <?php echo do_shortcode('[contact-form-7 id="4"]'); ?>
                <br><br>
            </div>

            <div class="col-lg-1 visible-lg"></div>

            <div class="col-lg-4 map-section">
                <strong>Ukrainian Office</strong><br><br>
                <span class="location-desc">128a Horodotska str,<br>
                    Lviv, Ukraine</span><br><br>
                <img src="<?php module_img('theme/locationmap.png'); ?>" class="img-responsive" /><br><br>
                <a href="https://goo.gl/maps/9eu13h5KF432" target="_blank" class="gmaps-link">View on Google Maps</a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
