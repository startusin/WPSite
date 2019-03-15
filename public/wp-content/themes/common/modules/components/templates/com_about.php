<div class="pharmacists_block">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="title"><?php the_sub_field('com_about_title'); ?></div>
                <div class="pharmacists_text open_sans"><?php the_sub_field('com_about_text'); ?></div>
                <a class="more open_sans margin_bottom" href="<?php the_sub_field('com_about_link_url'); ?>"><?php the_sub_field('com_about_link_text'); ?></a>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 images-inner">
                <div class="row">
                    <?php $images = get_sub_field('com_about_images'); ?>
                    <?php $counter = 0; ?>

                    <?php foreach ($images as $i => $image): $counter++; ?>
                        <?php if ($i % 2 === 0): $counter = 1; ?><div class="col-6"><?php endif; ?>
                            <img src="<?php echo $image['url']; ?>">
                        <?php if ($counter === 2): ?></div><?php endif; ?>
                        <?php if (($i + 1) === count($images)): ?></div><?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>
