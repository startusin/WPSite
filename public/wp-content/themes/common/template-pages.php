<?php
/*
Template Name: All page
*/
?>
<?php get_header(); ?>
<?php $page_id = get_the_ID(); ?>
    <?php if (get_field('all_page_layout') === 'banner'): ?>
        <div class="banner d-flex flex-row justify-content-center align-items-center" style="background-image: url(<?php echo wp_get_attachment_image_src(get_field('all_file_image'), 'full')[0]; ?>)"></div>
    <?php endif; ?>

    <?php if (get_field('all_page_layout') === 'file'): ?>
    <div class="header_detail">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <p class="title_detail"><?php the_field('all_page_title'); ?></p>
                    <a href="" class="bold green">Press Release</a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <div class="padding-download">
                        <?php $file = get_field('all_page_file');?>
                        <a href="<?php echo $file['url']; ?>" class="download open_sans">Download</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 padding-right">
                <p class="title"><?php echo get_the_title(); ?></p>
                <div class="text_after open_sans">
                    <?php if (get_field('all_page_bold_title')): ?>
                        <div class="blue twenty"><?php the_field('all_page_bold_title'); ?></div>
                    <?php endif; ?>
                    <?php
                    $content_post = get_post(get_the_ID());
                    echo $content_post->post_content;
                    ?>
                </div>

                <?php if(get_field('all_page_download')): ?>
                    <hr>
                    <div class="title bold downloads-title">Downloads</div>
                    <?php while(has_sub_field('all_page_download')): ?>
                        <?php $file = get_sub_field('all_page_download_file');?>
                        <a href="<?php echo $file['url']; ?>" class="url open_sans folder"><?php echo $file['filename']; ?></a>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                <div class="right_block">
                    <p class="title bold right_title">About Us</p>
                    <ul class="policies_menu open_sans">
                        <?php $rows = get_field('header_menu', 'option'); ?>
                        <?php foreach ($rows[0]['header_menu_dropdown'] as $row): ?>
                            <li>
                                <a href="<?php echo $row['header_menu_dropdown_url']; ?>" class="page_<?php echo $row['header_menu_dropdown_title']; ?>"><?php echo $row['header_menu_dropdown_title']; ?></a>
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
