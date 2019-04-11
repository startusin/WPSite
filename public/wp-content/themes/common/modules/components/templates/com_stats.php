<div class="number_block">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="title"><?php the_sub_field('com_stats_title'); ?></div>
                <div class="text"><?php the_sub_field('com_stats_text'); ?></div>

                <?php $rows = get_sub_field('com_stats_rows'); ?>
                <?php foreach ($rows as $i => $row): ?>
                    <div class="item">
                        <span class="number open_sans"><?php echo $row['com_stats_rows_title']; ?></span>
                        <span class="after_text open_sans"><?php echo $row['com_stats_rows_description']; ?></span>
                    </div>
                    <?php if (($i + 1) % 2 === 0): ?><div class="clearfix"></div><?php endif; ?>
                <?php endforeach; ?>

                <div class="more">
                    <a href="<?php the_sub_field('com_stats_link_url'); ?>">
                        <?php the_sub_field('com_stats_link_text'); ?>
                    </a>
                </div>
            </div>
        </div>

        <div class="clear"></div>
    </div>
</div>
