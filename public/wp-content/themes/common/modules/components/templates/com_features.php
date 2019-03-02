<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <?php if (get_sub_field('com_features_title')): ?><h1 class="p-header"><?php the_sub_field('com_features_title'); ?></h1><?php endif; ?>
            <?php if (get_sub_field('com_features_description')): ?><h2 class="p-header-desc"><?php the_sub_field('com_features_description'); ?></h2><?php endif; ?>
        </div>
    </div>
</div>

<?php $counter = 0; ?>
<?php if( have_rows('com_features_feature') ): ?>
    <?php while( have_rows('com_features_feature') ): the_row(); $counter++; ?>
        <div class="item<?php if ($counter > 1): ?> consolidate<?php endif; ?>" >
            <div class="clear"></div>
            <div class="container">
                <?php
                $pr_elem = get_sub_field('com_features_feature_primary_elements');
                $sec_elem = get_sub_field('com_features_feature_secondary_elements');
                ?>
                <?php if ($counter % 2 === 0): ?>
                    <div class="col-md-7">
                        <?php if (in_array('image', $sec_elem) && get_sub_field('com_features_feature_image')): ?>
                            <figure class="dir-rtl"><?php echo wp_get_attachment_image(get_sub_field('com_features_feature_image'), 'full'); ?></figure>
                        <?php endif; ?>

                        <?php if (in_array('blueblock', $sec_elem)): ?>
                            <ul class="suppliers-menu-blue"><?php the_sub_field('com_features_feature_bluetext'); ?></ul>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <div class="col-md-5">
                    <?php if (in_array('title', $pr_elem) && get_sub_field('com_features_feature_title')): ?><h2 class="p-header-b"><?php the_sub_field('com_features_feature_title'); ?></h2><?php endif; ?>
                    <?php if (in_array('description', $pr_elem) && get_sub_field('com_features_feature_text')): ?><h3 class="p-description-b"><?php the_sub_field('com_features_feature_text'); ?></h3><?php endif; ?>

                    <?php if (in_array('testimonial', $pr_elem)): ?>
                        <?php
                        $testimonial = get_sub_field('com_features_feature_testimonial');
                        $customer = get_field('testimonials_basic_customer', $testimonial);
                        ?>
                        <?php $projects = get_field('customers_basic_projects', $customer); ?>

                        <div class="customer-div">
                            <?php foreach ($projects as $project): ?>
                                <?php if(get_field('projects_basic_link', $project)): ?><a href="<?php the_field('projects_basic_link', $project); ?>"><?php endif;?>
                                <?php echo wp_get_attachment_image(get_field('projects_basic_logo', $project), 'wp-avatar', false, array('class' => 'company-logo')); ?>
                                <?php if(get_field('projects_basic_link', $project)): ?></a><?php endif;?>
                            <?php endforeach; ?>

                            <div class="p-description-b-bocata">
                                <?php the_field('testimonials_basic_short_testimonial', $testimonial); ?>
                            </div>
                            <div class="icon">
                                <?php echo wp_get_attachment_image(get_field('customers_basic_photo', $customer), 'wp-avatar', false, array('class' => 'client-logo')); ?>
                                <div class="autor">
                                    <?php echo get_the_title($customer); ?>
                                    <?php if(get_field('customers_basic_location', $customer)): ?>
                                        - <?php the_field('customers_basic_location', $customer); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if (in_array('iconsblock', $pr_elem)): ?>
                        <ul class="suppliers-menu">
                            <?php if( have_rows('com_features_feature_iconitems') ): ?>
                                <?php while( have_rows('com_features_feature_iconitems') ): the_row(); ?>
                                    <li>
                                        <div class="suppliers-weight">
                                            <?php echo wp_get_attachment_image(get_sub_field('com_features_feature_iconitems_icon'), 'full', false, array('class' => 'suppliers-img')); ?>
                                        </div>
                                        <p><?php the_sub_field('com_features_feature_iconitems_title'); ?></p>
                                    </li>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </ul>
                    <?php endif; ?>
                    <?php if (in_array('greenblock', $pr_elem)): ?>
                        <ul class="suppliers-menu-green"><?php the_sub_field('com_features_feature_greentext'); ?></ul>
                    <?php endif; ?>
                </div>

                <?php if ($counter % 2 !== 0): ?>
                    <div class="col-md-7">
                        <?php if (in_array('image', $sec_elem) && get_sub_field('com_features_feature_image')): ?>
                            <figure class="dir-ltr"><?php echo wp_get_attachment_image(get_sub_field('com_features_feature_image'), 'full'); ?></figure>
                        <?php endif; ?>

                        <?php if (in_array('blueblock', $sec_elem)): ?>
                            <ul class="suppliers-menu-blue"><?php the_sub_field('com_features_feature_bluetext'); ?></ul>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="clear"></div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>
