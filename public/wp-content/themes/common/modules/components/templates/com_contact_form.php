<div class="start-saving"<?php if(get_sub_field('com_contact_form_background')): ?> style="background-image: url('<?php the_sub_field('com_contact_form_background'); ?>')"<?php endif; ?>>
    <div class="container">
        <div class="clear"></div>
        <?php if(get_sub_field('com_contact_form_title')): ?>
            <h1 class="start-saving-top"><?php the_sub_field('com_contact_form_title'); ?></h1>
        <?php endif; ?>

        <?php if(get_sub_field('com_contact_form_description')): ?>
            <h2 class="description"><?php the_sub_field('com_contact_form_description'); ?></h2>
        <?php endif; ?>

        <div class="clear"></div>
        <div class="row<?php if(!get_sub_field('com_contact_form_background')): ?> no-bg<?php endif; ?>">
            <?php if (get_sub_field('com_contact_form_form')): ?>
                <?php echo do_shortcode('[contact-form-7 id="'.get_sub_field('com_contact_form_form').'"]'); ?>
            <?php endif; ?>
        </div>
        <div class="clear"></div>

        <?php if(get_sub_field('com_contact_form_additional_text')): ?>
            <p class="start-saving-bottom"><?php the_sub_field('com_contact_form_additional_text'); ?></p>
            <div class="clear"></div>
        <?php endif; ?>
    </div>
</div>
