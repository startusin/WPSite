<?php
/*
Template Name: Members
*/
?>
<?php get_header(); ?>

<div class="container">
    <div class="clear"></div>
    <p class="title"><?php the_field('members_page_title'); ?></p>

    <ul class="members_menu open_sans">
        <li><a class="active" href="">Ordinary members</a></li>
        <li><a href="">Observer members</a></li>
    </ul>

    <?php $members = get_field('members_page_members'); ?>

    <div class="row">
        <?php foreach ($members as $id): ?>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <a href="#">
                    <div class="members_block">
                        <?php echo wp_get_attachment_image(get_field('members_basic_flag', $id), 'full', false, array('class' => 'country_photo')); ?>
                        <div class="country_name bold"><?php echo get_the_title($id); ?></div>
                        <div class="country_description open_sans first"><?php the_field('members_basic_description', $id); ?></div>
                        <div class="hr_new"></div>
                        <div class="country_description open_sans"><?php the_field('members_basic_subdescription', $id); ?></div>
                        <div class="hr_new"></div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php get_footer(); ?>
