<section id="Clients-Feedbacks-area" class="pd-100-75">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="client-says-v2 owl-carousel owl-theme">
                    <?php while (have_rows('com_testimonials_testimonials')) : the_row(); ?>
                        <div class="testimonial-item">
                            <div class="author_img">
                                <?php echo wp_get_attachment_image(get_sub_field('com_testimonials_testimonials_image'), 'full'); ?>
                            </div>
                            <div class="author-details">
                                <h3><?php the_sub_field('com_testimonials_testimonials_title'); ?></h3>
                                <h6><?php the_sub_field('com_testimonials_testimonials_subtitle'); ?></h6>
                            </div>
                            <div class="author-says">
                                <p><?php the_sub_field('com_testimonials_testimonials_text'); ?></p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</section>
