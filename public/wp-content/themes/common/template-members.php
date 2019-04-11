<?php
/*
Template Name: Members
*/
?>
<?php get_header(); ?>

<div class="container">
    <div class="clear"></div>
    <p class="title"><?php the_field('members_page_title'); ?></p>

    <?php $isObserved = get_the_ID() === 972 || get_the_ID() === 1053; ?>
    <ul class="members_menu open_sans">
        <li><a <?php if (!$isObserved): ?>class="active" <?php endif; ?>href="/members/?lang=<?php echo $_REQUEST['lang'] ?? 'en'; ?>">Ordinary members</a></li>
        <li><a <?php if ($isObserved): ?>class="active" <?php endif; ?>href="/observed-members/?lang=<?php echo $_REQUEST['lang'] ?? 'en'; ?>">Observer members</a></li>
    </ul>

    <?php $members = get_posts(['posts_per_page' => -1, 'post_type' => 'members', 'fields' => 'ids', 'orderby'=> 'title', 'order' => 'ASC']); ?>

    <div class="row">
        <?php foreach ($members as $id): ?>
            <?php if (($isObserved && get_field('members_basic_observed', $id)) || (!$isObserved && !get_field('members_basic_observed', $id))): ?>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <a href="#" data-toggle="modal" data-target="#<?php echo $id ?>">
                    <div class="members_block">
                        <?php echo wp_get_attachment_image(get_field('members_basic_flag', $id), 'full', false, array('class' => 'country_photo')); ?>
                        <div class="country_name bold"><?php echo get_the_title($id); ?></div>

                        <?php $description = get_field('members_basic_description', $id) ?>
                        <?php if($description) : ?>
                        <div class="country_description open_sans first"><?php echo $description; ?></div>
                        <div class="hr_new"></div>
                        <?php endif; ?>

                        <?php $subdescription = get_field('members_basic_subdescription', $id) ?>
                        <?php if($subdescription) : ?>
                        <div class="country_description open_sans"><?php echo $subdescription; ?></div>
                        <div class="hr_new"></div>
                        <?php endif; ?>
                    </div>
                </a>
            </div>

            <!-- The Modal -->
            <div class="modal fade bd-example-modal-lg" id="<?php echo $id ?>">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <?php echo wp_get_attachment_image(get_field('members_basic_flag', $id), 'full', false, array('class' => 'country_photo')); ?>
                            <span class="country_name bold"><?php echo get_the_title($id); ?></span>
                            <button type="button" class="close" data-dismiss="modal"><img src="/wp-content/themes/common/modules/theme/assets/img/close.png" alt=""></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body open_sans">
                            <p class="blue"><?php the_field('members_basic_person', $id); ?></p>
                            <?php echo wp_get_attachment_image(get_field('members_basic_modal_image', $id), 'full', false, array('class' => 'modal_img')); ?>
                            <?php the_field('members_basic_modal_center_content', $id); ?>
                            <div class="hr_new"></div>
                            <p class="country_description"><?php the_field('members_basic_modal_buttom_text', $id); ?></p>
                            <div class="hr_new"></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>

<?php get_footer(); ?>
