<?php
/*
Template Name: All page
*/
?>
<?php get_header(); ?>
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
                    <?php $menus = get_field('all_page_menu');?>
                    <?php foreach ($menus as $id_one): ?>
                        <p class="title bold"><?php echo get_the_title($id_one); ?></p>
                        <ul class="policies_menu open_sans">
                            <?php echo the_field('basic_page_menu'); ?> <!-- тут -->
                        </ul>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
<?php get_footer(); ?>
