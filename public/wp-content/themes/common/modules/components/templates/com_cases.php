<section id="case-study" class="pd-bo" style="background-color: <?php the_sub_field('com_cases_background'); ?>">
    <div class="container">
        <div class="row">
            <div class="offset-lg-2 col-lg-8">
                <div class="section-title-v2 text-center">
                    <h2><br><?php the_sub_field('com_cases_title'); ?></h2>
                    <?php if (!have_rows('com_cases_cases')): ?>
                        <p>Coming soon...</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="post-box-area">
                    <div class="latestPost owl-carousel">
                        <?php while (have_rows('com_cases_cases')) : the_row(); ?>
                            <div class="post-box">
                                <?php if (get_sub_field('com_cases_cases_link')): ?><a href="<?php the_sub_field('com_cases_cases_link'); ?>"><?php endif; ?>
                                    <?php echo wp_get_attachment_image(get_sub_field('com_cases_cases_image'), 'full'); ?>
                                    <div class="post-text">
                                        <h4><?php the_sub_field('com_cases_cases_title'); ?></h4>
                                        <?php the_sub_field('com_cases_cases_text'); ?>
                                    </div>
                                <?php if (get_sub_field('com_cases_cases_link')): ?></a><?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
