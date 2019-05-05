<?php
/*
Template Name: Publications
*/
?>
<?php get_header(); ?>
<?php $page_id = get_the_ID(); ?>
    <?php if (get_field('publications_basic_layout') === 'banner'): ?>
        <div class="banner d-flex flex-row justify-content-center align-items-center" style="background-image: url(<?php echo wp_get_attachment_image_src(get_field('publications_basic_image'), 'wp-blog-bannner')[0]; ?>)"></div>
    <?php endif; ?>

    <?php if (get_field('publications_basic_layout') === 'file'): ?>
    <div class="header_detail">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <p class="title_detail"><?php the_field('publications_basic_title'); ?></p>
                    <?php $post_categories = get_field('publications_basic_categories'); ?>
                    <?php if( $post_categories ): ?>
                        <?php
                        $links = [];
                        foreach($post_categories as $category)
                            $links[] = '<a href="/?s=&cats%5B%5D='.$category.'&date=all&lang='.(isset($_REQUEST['lang']) && !empty($_REQUEST['lang']) ? $_REQUEST['lang'] : 'en').'" class="bold">'.get_the_title($category).'</a>';
                        echo join(', ',$links);
                        ?>
                    <?php endif; ?>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <div class="center">
                        <?php $file = get_field('publications_basic_file');?>
                        <a href="<?php echo $file['url']; ?>" class="download open_sans"><?php echo i18nString('Download'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                <div class="text_after open_sans">
                    <?php if (get_field('publications_basic_top_title')): ?>
                        <div class="green"><?php the_field('publications_basic_top_title'); ?></div>
                    <?php endif; ?>
                    <?php echo str_replace("\n", '<br>', get_field('publications_basic_content')); ?>
                </div>

                <?php $thelink = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
                <ul class="social-pub">
                    <li><a href="https://twitter.com/intent/tweet?url=<?php echo $thelink; ?>"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $thelink; ?>"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $thelink; ?>"><i class="fab fa-linkedin-in"></i></a></li>
                </ul>

                <?php if(get_field('publications_basic_download')): ?>
                    <hr>
                    <div class="title bold downloads-title"><?php echo i18nString('Downloads'); ?></div>
                    <?php while(has_sub_field('publications_basic_download')): ?>
                        <?php $file = get_sub_field('publications_basic_download_file');?>
                        <a href="<?php echo $file['url']; ?>" class="url open_sans folder"><?php echo $file['filename']; ?></a>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="visible-lg col-lg-1"></div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                <div class="right_block">
                    <p class="title bold right_title"><?php echo i18nString('All Publications'); ?></p>
                    <ul class="policies_menu open_sans">
                        <?php $rows = get_field('header_menu', 'option'); ?>
                        <?php foreach ($rows[3]['header_menu_dropdown'] as $row): ?>
                            <li>
                                <?php if(isset($row['header_menu_dropdown_custom_url']) && !empty($row['header_menu_dropdown_custom_url'])): ?>
                                    <a href="<?php echo $row['header_menu_dropdown_custom_url']; ?>"><?php echo $row['header_menu_dropdown_title']; ?></a>
                                <?php else: ?>
                                    <a href="<?php echo $row['header_menu_dropdown_url']; ?>" class="page_<?php echo $row['header_menu_dropdown_title']; ?>"><?php echo $row['header_menu_dropdown_title']; ?></a>
                                <?php endif; ?>
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
