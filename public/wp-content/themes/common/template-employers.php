<?php
/*
Template Name: Employers
*/
?>
<?php get_header(); ?>
<?php $page_id = get_the_ID(); ?>
    <div class="banner_about" style="background: url(<?php echo wp_get_attachment_image_src(get_field('employers_page_banner'), 'full')[0]; ?>);"></div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                <p class="title title-top"><?php the_field('employers_page_title'); ?></p>
                <div class="clear hidden-xs"></div>
                <?php $employers = get_field('employers_page_employers'); ?>
                <?php foreach ($employers as $id): ?>
                    <div class="secretariat">
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <?php echo wp_get_attachment_image(get_field('employers_basic_photo', $id), 'full'); ?>
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                <div class="secretariat_name bold blue"><?php echo get_the_title($id); ?></div>
                                <div class="secretariat_secretary bold"><?php echo get_field('employers_basic_position', $id); ?></div>
                                <div class="secretariat_description open_sans"><?php echo get_field('employers_basic_text', $id); ?></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-4">
                <div class="right_block">
                    <p class="title bold right_title"><?php the_field('employers_page_right_menu_title') ?></p>
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
