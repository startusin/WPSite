<?php get_header(); ?>
    <div class="clear"></div>
    <div class="blog-template-default">
        <div class="container">
            <ul class="plus_menu open_sans">
                <li><a href="">Press Releases</a></li>
                <li><a href="">Annual Reports</a></li>
                <li><a href="" class="active">Position Papers</a></li>
            </ul>
            <?php $page = $pageID = get_queried_object_id(); ?>
            <p class="title"><?php echo get_field('blog_page_title_top', $page);?></p>
            <?php $blog_page_featured_publications_main = get_field('blog_page_featured_publications_main', $page);?>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                    <div class="featured_main_img">
                        <?php echo wp_get_attachment_image(get_field('blog_basic_image', $blog_page_featured_publications_main), 'full'); ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                    <a href="<?php the_permalink(); ?>"><p class="title_new bold arrow"><?php echo get_the_title(); ?></p></a>
                    <p class="description_new open_sans"><?php echo get_the_excerpt($blog_page_featured_publications_main); ?></p>
                    <hr>
                    <?php $cats = wp_get_post_categories($blog_page_featured_publications_main, array('fields' => 'all')); ?>
                    <?php if ($cats): ?>
                        <a href="<?php echo get_the_permalink($blog_page_featured_publications_main); ?>" class="bold">
                            <?php foreach ($cats as $cat): $recat[] = $cat->name; endforeach; ?>
                            <?php echo implode(', ', $recat); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <div class="container">
            <?php $blog_page_featured_publications = get_field('blog_page_featured_publications', $pageID);?>
            <div class="row">
                <?php foreach( $blog_page_featured_publications as $post): ?>
                    <?php $recat = array(); ?>
                    <?php setup_postdata($post); ?>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                        <div class="new_col">
                            <div class="featured_img">
                                <?php echo wp_get_attachment_image(get_field('blog_basic_image'), 'full'); ?>
                            </div>
                            <?php $cats = wp_get_post_categories($post->ID, array('fields' => 'all')); ?>
                            <div class="new_b">
                                <a href="<?php the_permalink(); ?>"><p class="title_new bold sub-item-arrow"><?php the_title(); ?></p></a>
                                <p class="description_new open_sans"><?php echo get_the_excerpt(get_the_ID()); ?></p>
                                <hr>
                                <?php if ($cats): ?>
                                    <a href="<?php the_permalink(); ?>" class="bold">
                                        <?php foreach ($cats as $cat): $recat[] = $cat->name; endforeach; ?>
                                        <?php echo implode(', ', $recat); ?>
                                    </a>
                                <?php endif; ?>
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
            <p class="title"><?php echo get_field('blog_page_title_bottom', $pageID); ?></p>
            <?php $counter = 0; ?>
            <?php while($query->have_posts()): $query->the_post(); $counter++; ?>
                <?php $recat = array(); ?>
                <div class="publication_block">
                    <a href="<?php the_permalink(); ?>"><p class="title_new bold"><?php echo get_the_title(); ?></p></a>
                    <p class="description_new open_sans"><?php echo get_the_excerpt(get_the_ID()); ?></p>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="date open_sans"><?php echo get_the_date('Y/m/d'); ?></div>
                        </div>
                        <?php $cats = wp_get_post_categories(get_the_ID(), array('fields' => 'all')); ?>
                        <?php if ($cats): ?>
                            <div class="col-xs-12 col-sm-6 col-md-8 col-lg-10">
                                <a href="<?php the_permalink(); ?>" class="arrow">
                                    <?php foreach ($cats as $cat): $recat[] = $cat->name; endforeach; ?>
                                    <?php echo implode(', ', $recat); ?>
                                </a>
                            </div>
                        <?php endif; ?>
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

