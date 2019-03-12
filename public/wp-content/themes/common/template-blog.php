<?php
/*
Template Name: Blog
*/
?>
<?php get_header(); ?>
<div class="banner_about" style="background: url(<?php echo wp_get_attachment_image_src(get_field('employers_page_banner'), 'full')[0]; ?>);"></div>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
            <p class="title"><?php the_field('employers_page_title'); ?></p>
            <div class="clear"></div>

<?php $employers = get_field('employers_page_employers'); ?>
<?php foreach ($employers as $id): ?>
    <div class="secretariat">
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <?php echo wp_get_attachment_image(get_field('employers_basic_photo', $id), 'full'); ?>
            </div>

            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                <p class="secretariat_name bold blue"><?php echo get_the_title($id); ?></p>
                <p class="secretariat_secretary bold"><?php echo get_field('employers_basic_position', $id); ?></p>
                <p class="secretariat_description open_sans"><?php echo get_field('employers_basic_text', $id); ?></p>
            </div>
        </div>
    </div>

<?php endforeach; ?>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-4">
            <div class="right_block">
                <p class="title bold">About Us</p>
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
