<?php get_header(); ?>
    <div class="blog-template-default">
        <div class="container">
            <ul class="plus_menu open_sans">
                <li><a href="">Press Releases</a></li>
                <li><a href="">Annual Reports</a></li>
                <li><a href="" class="active">Position Papers</a></li>
            </ul>
            <?php $page = get_queried_object_id(); ?>
            <p class="title"><?php echo get_field('blog_page_title_1', $page);?></p>
            <?php $blog_page_featured_publications_main = get_field('blog_page_featured_publications_main', $page);?>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                    <div class="featured_main_img">
                        <?php echo wp_get_attachment_image(get_field('blog_basic_image', $blog_page_featured_publications_main), 'full'); ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                    <p class="title_new bold arrow"><?php echo get_the_title($blog_page_featured_publications_main); ?></p>
                    <p class="description_new open_sans"><?php the_field('blog_basic_short_description', $blog_page_featured_publications_main); ?></p>
                    <hr>
                    <a href="<?php echo get_the_permalink($blog_page_featured_publications_main); ?>" class="bold">Press Release</a>
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <div class="container">
            <?php $blog_page_featured_publications = get_field('blog_page_featured_publications', $page);?>
            <div class="row">
                <?php foreach( $blog_page_featured_publications as $post): ?>
                    <?php setup_postdata($post); ?>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                        <div class="new_col">
                            <div class="featured_img">
                                <?php echo wp_get_attachment_image(get_field('blog_basic_image'), 'full'); ?>
                            </div>
                            <div class="new_b">
                                <p class="title_new bold arrow"><?php the_title(); ?></p>
                                <p class="description_new open_sans"><?php the_field('blog_basic_short_description'); ?></p>
                                <hr>
                                <a href="<?php the_permalink(); ?>" class="bold">Policy Papers</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php $page_id = get_queried_object_id(); ?>
        <?php
        $paged = get_query_var( 'paged' ) ?? 1;
        $query = new WP_Query( array('post_type' => array('post'), 'paged' => $paged) );
        ?>
        <div class="container">
            <p class="title"><?php echo get_field('blog_page_title_2', $page);?></p>
            <?php $counter = 0; ?>
            <?php while($query->have_posts()): $query->the_post(); $counter++; ?>
                <div class="publication_block">
                    <p class="title_new bold"><?php echo get_the_title(); ?></p>
                    <p class="description_new open_sans"><?php the_field('blog_basic_short_description', get_the_ID()); ?></p>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="date open_sans"><?php the_date('Y/m/d'); ?></div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-8 col-lg-10">
                            <a href="<?php the_permalink(); ?>" class="arrow">Press Release, Policy Papers</a>
                        </div>
                    </div>
                </div>
                <?php if($counter % 2 === 0): ?>
                    <div class="clearfix"></div>
                <?php endif; ?>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php the_posts_pagination(); ?>
            <?php $query = new WP_Query( array('post_type' => array('tags'), 'posts_per_page' => -1, 'post_status' => 'publish') ); ?>
            <?php while($query->have_posts()): $query->the_post(); ?>
                <a class="teg" href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <a href="" class="open_sans bold href_right margin_top">Show more</a>
        </div>
        <div class="clear"></div>
    </div>
<?php get_footer() ?>
