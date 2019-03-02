<?php global $geodata; ?>
<div class="mode-logos">
    <div class="clear"></div>
    <h1 class="p-header"><?php the_sub_field('com_customers_title'); ?></h1>
    <div class="clear"></div>
    <div class="container">
        <div class="row text-center">
            <?php $customers = get_posts(array('numberposts' => -1, 'post_type' => 'customers')); ?>
            <?php foreach ($customers as $customer): ?>
                <?php $geogroup = get_field('page_basic_geolocation', $customer->ID); ?>
                <?php if (!$geogroup || !$geodata['country_code'] || in_array($geodata['group'], $geogroup)): ?>
                    <div class="m"><?php echo wp_get_attachment_image(get_field('customers_basic_logo', $customer->ID), 'full'); ?></div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>
