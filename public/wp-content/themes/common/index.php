<?php get_header(); ?>
<?php $page_id = get_queried_object_id(); ?>

<div class="blog-template">
    <div class="clear"></div>
    <div class="container">
        <div class="clear"></div>
        <h1 class="p-header"><?php the_field('blog_page_title', $page_id); ?></h1>
        <h2 class="p-header-mini"><?php the_field('blog_page_description', $page_id); ?></h2>
        <div class="clear"></div>
    </div>

    <?php if(get_field('blog_page_related', $page_id)): ?>
    <div class="row">
        <?php while( have_rows('blog_page_related', $page_id) ): the_row(); ?>
            <div class="col-md-4">
                <a href="<?php the_sub_field('blog_page_related_post'); ?>">
                    <div class="blog-one">
                        <?php echo wp_get_attachment_image(get_sub_field('blog_page_related_background'), 'full', false, array('class' => 'blog-one-img')); ?>
                        <p class="blog-one-tex"><?php the_sub_field('blog_page_related_title'); ?></p>
                    </div>
                </a>
            </div>
        <?php endwhile; ?>
    </div>
    <?php endif; ?>

    <?php
    $paged = get_query_var( 'paged' ) ?? 1;
    $query = new WP_Query( array('post_type' => array('post'), 'paged' => $paged) );
    ?>

    <div class="container">
        <div class="blog-draw">
            <?php $counter = 0; ?>
            <?php while($query->have_posts()): $query->the_post(); $counter++; ?>
                <div class="blog-draw-data">
                    <div class="col-md-6">
                        <div class="blog-page">
                            <?php echo wp_get_attachment_image(get_field('blog_basic_image', get_the_ID()), 'wp-blog', false, array('class' => 'blog-page-img')); ?>
                            <h2 class="blog-page-header"><?php echo get_the_title(); ?></h2>
                            <h3 class="blog-page-d"><?php the_field('blog_basic_short_description', get_the_ID()); ?></h3>
                            <div class="read">
                                <a class="read-more" href="<?php the_permalink(); ?>">Read more</a>
                                <p class="share">Share</p>
                            </div>
                        </div>
                    </div>
                    <?php if($counter % 2 === 0): ?><div class="clearfix"></div><?php endif; ?>
                </div>
            <?php endwhile; ?>

            <?php wp_reset_postdata(); ?>
        </div>
        <div class="blog-f">

            <?php the_posts_pagination(); ?>

            <?php $query = new WP_Query( array('post_type' => array('tags'), 'posts_per_page' => -1, 'post_status' => 'publish') ); ?>
            <?php while($query->have_posts()): $query->the_post(); ?>
                <a class="teg" href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </div>

        <div class="clear"></div>
    </div>

    <div class="start-saving">
        <div class="container">

            <div class="clear"></div>

            <p class="start-saving-top">Start saving today! Try our <strong class="green">Free</strong> Trial</p>

            <div class="clear"></div>

            <div class="row">

                <?php echo do_shortcode('[contact-form-7 id="223" title="Contact Us"]'); ?>

            </div>

            <div class="clear"></div>

            <p class="start-saving-bottom">By clicking «Get Started» I agree to MarketMan’s Terms &amp; Conditions</p>

            <div class="clear"></div>

        </div>
    </div>
</div>

<?php get_footer() ?>
