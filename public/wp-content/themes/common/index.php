<?php get_header(); ?>
<?php $page = $pageID = get_queried_object_id(); ?>
    <div class="blog-template-default">
        <div class="container">
            <ul class="plus_menu open_sans">
                <?php $menu_categories = get_field('blog_page_categories', $pageID); ?>
                <?php foreach ($menu_categories as $menu_category): ?>
                    <li><a href="<?php echo get_permalink( $menu_category ); ?>"><?php echo get_the_title($menu_category); ?></a></li>
                <?php endforeach; ?>
            </ul>
            <p class="title"><?php echo get_field('blog_page_title_top', $page);?></p>
            <?php $blog_page_featured_publications_main = get_field('blog_page_featured_publications_main', $pageID);?>
            <?php setup_postdata( $blog_page_featured_publications_main );?>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                    <div class="featured_main_img">
                        <a href="<?php the_permalink($blog_page_featured_publications_main); ?>"><?php echo wp_get_attachment_image(get_field('blog_basic_image', $blog_page_featured_publications_main), 'full'); ?></a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                    <a href="<?php the_permalink($blog_page_featured_publications_main); ?>">
                        <p class="title_new bold arrow"><?php echo get_the_title($blog_page_featured_publications_main); ?></p>
                    </a>
                    <a href="<?php the_permalink($blog_page_featured_publications_main); ?>">
                        <p class="description_new open_sans"><?php echo get_the_excerpt(); ?></p>
                        <hr>
                    </a>
                    <?php $post_сategories = get_field('blog_basic_сategory'); ?>
                    <?php if( $post_сategories ): ?>
                        <?php
                        $links = [];
                        foreach($post_сategories as $сategory)
                            $links[] = '<a href="'.get_permalink($сategory).'" class="bold">'.get_the_title($сategory).'</a>';
                        echo join(', ',$links);
                        ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <div class="container">
            <?php $blog_page_featured_publications = get_field('blog_page_featured_publications', $pageID);?>
            <div class="row">
                <?php foreach( $blog_page_featured_publications as $post): ?>
                    <?php setup_postdata($post); ?>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                        <div class="new_col">
                            <div class="featured_img">
                                <a href="<?php the_permalink(); ?>">
                                    <?php echo wp_get_attachment_image(get_field('blog_basic_image'), 'full'); ?>
                                </a>
                            </div>
                            <div class="new_b">
                                <a href="<?php the_permalink(); ?>">
                                    <p class="title_new bold sub-item-arrow"><?php the_title(); ?></p>
                                </a>
                                <a href="<?php the_permalink(); ?>">
                                    <div class="description_new open_sans"><?php echo get_the_excerpt(get_the_ID()); ?></div>
                                </a>
                                <hr>
                                <?php $post_сategories = get_field('blog_basic_сategory'); ?>
                                <?php if( $post_сategories ): ?>
                                    <?php
                                    $links = [];
                                    foreach($post_сategories as $сategory)
                                        $links[] = '<a href="'.get_permalink($сategory).'" class="bold">'.get_the_title($сategory).'</a>';
                                    echo join(', ',$links);
                                    ?>
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
                <div class="publication_block">
                    <a href="<?php the_permalink(); ?>">
                        <p class="title_new bold"><?php echo get_the_title(); ?></p>
                    </a>
                    <a href="<?php the_permalink(); ?>">
                        <div class="description_new open_sans"><?php echo get_the_excerpt(get_the_ID()); ?></div>
                    </a>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="date open_sans"><?php echo get_the_date('d/m/Y'); ?></div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-8 col-lg-10">
                            <?php $post_сategories = get_field('blog_basic_сategory'); ?>
                            <?php if( $post_сategories ): ?>
                                <?php
                                $links = [];
                                foreach($post_сategories as $сategory)
                                    $links[] = '<a href="'.get_permalink($сategory).'" class="arrow">'.get_the_title($сategory).'</a>';
                                echo join(', ',$links);
                                ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php if($counter % 2 === 0): ?>
                    <div class="clearfix"></div>
                <?php endif; ?>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <div class="open_sans bold href_right margin_top">
                <?php echo paginate_links(['prev_text' => '', 'next_text' => 'Show more']); ?>
            </div>
        </div>
        <div class="clear"></div>
    </div>
<?php get_footer() ?>
