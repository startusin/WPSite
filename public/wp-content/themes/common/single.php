<?php get_header(); ?>
<?php $page_id = get_the_ID(); ?>
    <div class="clear"></div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                <?php echo wp_get_attachment_image(get_field('blog_basic_image'), 'wp-blog-bannner'); ?>
                <p class="title title-blog-name"><?php echo get_the_title(); ?></p>
                <div class="text_after open_sans">
                    <?php if (get_field('blog_basic_sub_title')): ?>
                        <div class="blue"><?php the_field('blog_basic_sub_title'); ?></div>
                    <?php endif; ?>
                    <?php
                    $content_post = get_post(get_the_ID());
                    $content = str_replace("\n", '<br>', $content_post->post_content);
                    echo $content;
                    ?>
                </div>

                <?php if(get_field('blog_basic_download')): ?>
                    <hr>
                    <div class="title_download bold downloads-title"><?php echo i18nString('Downloads'); ?></div>
                    <?php while(has_sub_field('blog_basic_download')): ?>
                        <?php $file = get_sub_field('blog_basic_download_file');?>
                        <a href="<?php echo $file['url']; ?>" class="url open_sans folder"><?php echo !empty($file['title']) ? $file['title'] : $file['filename']; ?></a>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 policies">
                <div class="right_block">
                    <p class="title bold right_title"><?php echo i18nString('All Policies'); ?></p>
                    <ul class="policies_menu open_sans">
                        <?php $menu = get_posts(['post_type' => 'post', 'numberposts' => 30, 'orderby'=> 'title', 'order' => 'ASC']); ?>
                        <?php foreach ($menu as $item): ?>
                            <li>
                                <a href="<?php the_permalink($item->ID); ?>" class="page_<?php echo $item->ID; ?>"><?php echo $item->post_title; ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
<style>
    .page_<?php echo $page_id; ?> {
        color: #245590 !important;
        font-weight: bold !important;
    }
</style>
<?php get_footer(); ?>
