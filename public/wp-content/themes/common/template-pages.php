<?php
/*
Template Name: All page
*/
?>
<?php get_header(); ?>
    <?php if (get_field('all_page_layout') === 'banner'): ?>
        <div class="banner d-flex flex-row justify-content-center align-items-center" style="background-image: url(<?php echo wp_get_attachment_image_src(get_field('all_file_image'), 'full')[0]; ?>)"></div>
    <?php endif; ?>

    <?php if (get_field('all_page_layout') === 'file'): ?>
    <div class="header_detail">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <p class="title_detail"><?php the_field('all_page_title'); ?></p>
                    <a href="" class="bold">Press Release</a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <div class="center">
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
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                <p class="title"><?php echo get_the_title(); ?></p>
                <p class="text_after open_sans">
                    <?php
                    $content_post = get_post(get_the_ID());
                    echo $content_post->post_content;
                    ?>
                </p>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                <div class="right_block">
                    <p class="title bold">All Publications</p>
                    <ul class="policies_menu open_sans">
                        <li><a href="">Vision and Mission</a></li>
                        <li><a href="">History of the organisation</a></li>
                        <li><a href="">Structure</a></li>
                        <li><a href="">Financial information</a></li>
                        <li><a href="">Members</a></li>
                        <li><a href="">Secretariat</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
<?php get_footer(); ?>
