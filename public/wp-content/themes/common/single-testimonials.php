<?php get_header(); ?>
<?php $postID = get_the_ID(); ?>
<?php $bg = wp_get_attachment_image_src(get_field('testimonials_basic_image', $postID), 'full'); ?>

    <div class="testimonials-template-item">
        <header class="article" style="background-image: url('<?php echo $bg[0]; ?>');">
            <div class="container">

                <div class="col-md-12">
                    <div class="banner-text-article">
                        <p class="p-description-banner-text-article"><?php echo get_the_title($postID); ?></p>
                    </div>
                </div>
            </div>
        </header>

        <main>
            <div class="container">
                <div class="article-p">
                    <?php the_field('testimonials_basic_content', $postID); ?>
                    <div class="clear"></div>

                    <?php if(get_field('testimonials_basic_featured', $postID)): ?>
                        <?php foreach (get_field('testimonials_basic_featured', $postID) as $related): ?>
                            <div class="col-md-4">
                                <div class="blog-page">
                                    <?php echo wp_get_attachment_image(get_field('testimonials_basic_image', $related), 'wp-blog', false, array('class' => 'blog-page-img')); ?>
                                    <p class="blog-page-header"><?php echo get_the_title($related); ?></p>
                                    <p class="blog-page-d"><?php the_field('testimonials_basic_short_testimonial', $related); ?></p>

                                    <div class="read">
                                        <a class="read-more" href="<?php the_permalink($related); ?>">Read more</a>
                                        <p class="share">Share</p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <div class="clearfix"></div>
                </div>
            </div>
        </main>
    </div>

<?php get_footer(); ?>