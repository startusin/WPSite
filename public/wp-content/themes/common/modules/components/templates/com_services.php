<?php $posts = get_posts(['posts_per_page' => -1, 'post_type' => 'post']);?>
<div class="policies_block">
    <div class="container">
        <div class="title_margin">
            <div class="row align-items-center no-gutters">
                <div class="col-8">
                    <p class="title_no_margin"><?php the_sub_field('com_services_title'); ?></p>
                </div>
                <div class="col-4 text-right"><a class="more open_sans" href="<?php the_sub_field('com_services_link_url'); ?>"><?php echo i18nString('See all'); ?></a></div>
            </div>
        </div>
        <div class="policies_sider">
            <section class="policies_carusel">
                <?php foreach( $posts as $post ):setup_postdata( $post ); ?>
                    <?php global $post; ?>
                    <a href="<?php echo get_permalink($post); ?>">
                        <div class="policies_slide">
                            <?php echo wp_get_attachment_image(get_field('blog_basic_image', $post), 'wp-blog-slide'); ?>
                            <p class="policies_text"><?php echo get_the_title($post); ?></p>
                        </div>
                    </a>
                <?php endforeach; ?>
            </section>
            <div class="policies_previous"><i class="fas fa-chevron-left"></i></div>
            <div class="policies_next"><i class="fas fa-chevron-right"></i></div>
        </div>
    </div>
</div>
<div class="clear"></div>
